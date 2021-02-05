<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\HistoriaWypozyczenForm;


class HistoriaWypozyczenCtrl{
    private $form;
    private $records;
    
    
    public function __construct(){
        $this->form = new HistoriaWypozyczenForm();
    }        
     
    
    public function validate() {
        $this->form->id_wypozyczenia = ParamUtils::getFromRequest('id_wypozyczenia');
        $this->form->id_ksiazki = ParamUtils::getFromRequest('id_ksiazki');
        
        return !App::getMessages()->isError();
    }

    
    public function action_listaWypozyczen(){    
        $this->validate();
        
        $search_params = [];
	if ( isset($this->form->id_ksiazki) && !empty(($this->form->id_ksiazki)) ) {
            $search_params['id_ksiazki'] = $this->form->id_ksiazki;
        }
		
        try {        
            $this->records = App::getDB()->select("wypozyczenie", [
		"ID_wypozyczenia",
		"data_wypozyczenia",
		"data_oddania",
		"id_ksiazki",
		"id_czytelnika",
		"id_pracownika",
            ], $where);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
    
	App::getSmarty()->assign('searchForm',$this->form); 
        App::getSmarty()->assign('wypozyczenie',$this->records); 
		
        App::getSmarty()->display('historiaWypozyczen.tpl');
    }
    
}