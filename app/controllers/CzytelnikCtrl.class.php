<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\CzytelnikSearchForm;


class CzytelnikCtrl{
    private $form;
    private $records;
    
    
    public function __construct(){
        $this->form = new CzytelnikSearchForm();
    }        
    
    
    public function validate() {
        $this->form->nazwisko = ParamUtils::getFromRequest('nazwisko');
        
        return !App::getMessages()->isError();
    }
	
    
    public function action_listaCzytelnik(){    
        $this->validate();
        
        $search_params = [];
	if ( isset($this->form->nazwisko) && !empty(($this->form->nazwisko)) ) {
            $search_params['nazwisko[~]'] = $this->form->nazwisko.'%';
	}
              
	$num_params = sizeof($search_params); 
	if ($num_params > 1) {
            $where = [ "AND" => &$search_params ];
	} else {
            $where = &$search_params;
	}

	$where ["ORDER"] = "nazwisko";
		
        try {        
            $this->records = App::getDB()->select("czytelnik", [
		"ID_czytelnika",
		"nazwisko",
		"imie",
		"pesel",
		"ID_wypozyczenia",
            ], $where);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

    
	App::getSmarty()->assign('searchForm',$this->form); 
        App::getSmarty()->assign('czytelnik',$this->records); 
		
        App::getSmarty()->display('czytelnikView.tpl');
    }
    
}