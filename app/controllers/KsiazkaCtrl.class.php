<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\KsiazkaSearchForm;


class KsiazkaCtrl{
    private $form;
    private $records;
    
    
    public function __construct(){
        $this->form = new KsiazkaSearchForm();
    }        
    
    
    public function validate() {
        $this->form->tytul = ParamUtils::getFromRequest('tytul');
//$this->form->nazwisko_autora = ParamUtils::getFromRequest('nazwisko_autora');
        
        return !App::getMessages()->isError();
    }
	
    public function action_listaKsiazka(){    
        $this->validate();
        
        $search_params = [];
	if ( isset($this->form->tytul) && !empty(($this->form->tytul)) ) {
            $search_params['tytul[~]'] = $this->form->tytul.'%';                
        }
                        
	$num_params = sizeof($search_params); 
	if ($num_params > 1) {
            $where = [ "AND" => &$search_params ];
	} else {
            $where = &$search_params;
	}

	$where ["ORDER"] = "nazwisko_autora";
		
        try {        
            $this->records = App::getDB()->select("ksiazka", [
		"ID_ksiazki",
		"kategoria",
		"tytul",
		"nazwisko_autora",
		"imie_autora",
		"czy_dostepna",
            ], $where);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
    
	App::getSmarty()->assign('searchForm',$this->form); 
        App::getSmarty()->assign('ksiazka',$this->records);
        //print_r($this->records);
		
        App::getSmarty()->display('ksiazkaView.tpl');
    }
    
}