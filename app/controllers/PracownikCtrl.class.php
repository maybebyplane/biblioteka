<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\PracownikSearchForm;


class PracownikCtrl{
    private $form;
    private $records;
        
    public function __construct(){
        $this->form = new PracownikSearchForm();
    }        
    
    
    public function validate() {
        $this->form->nazwisko = ParamUtils::getFromRequest('nazwisko');
        
        return !App::getMessages()->isError();
    }
	
    
    public function action_listaPracownik(){    
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
            $this->records = App::getDB()->select("pracownik", [
		"ID_pracownika",
		"nazwisko",
		"imie",
		"login",
		"haslo",
            ], $where);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        
        
	App::getSmarty()->assign('searchForm',$this->form); 
        App::getSmarty()->assign('pracownik',$this->records); 
		
        App::getSmarty()->display('pracownikView.tpl');
    }
}