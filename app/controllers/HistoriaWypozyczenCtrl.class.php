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
        //$this->form->id_wypozyczenia = ParamUtils::getFromRequest('id_wypozyczenia');
        $this->form->id_ksiazki = ParamUtils::getFromRequest('id_ksiazki');
        
        return !App::getMessages()->isError();
    }

    
    public function action_listaWypozyczen(){    
        $this->validate();
        
        $search_params = [];
	if ( isset($this->form->id_ksiazki) && !empty(($this->form->id_ksiazki)) ) {
            $search_params['id_ksiazki'] = $this->form->id_ksiazki;
        }
	
        $num_params = sizeof($search_params); 
	if ($num_params > 1) {
            $where = [ "AND" => &$search_params ];
	} else {
            $where = &$search_params;
	}

	$where ["ORDER"] = "data_oddania";
        
        try {        
            $this->records = App::getDB()->select("wypozyczenie",[
                "[>]ksiazka"=>"ID_ksiazki", 
                "[>]czytelnik"=>"ID_czytelnika",
                "[>]pracownik"=>"ID_pracownika"
            ], [
		"wypozyczenie.ID_wypozyczenia",
		"wypozyczenie.data_wypozyczenia",
		"wypozyczenie.data_oddania",
		"ksiazka.ID_ksiazki",
		"ksiazka.tytul",
		"czytelnik.ID_czytelnika",
		"czytelnik.nazwisko",
		"czytelnik.imie",
		"pracownik.ID_pracownika",
		"pracownik.nazwisko(nazw_prac)",
		"pracownik.imie(imie_prac)"
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