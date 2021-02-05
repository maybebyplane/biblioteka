<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\ZwrotyForm;


class ZwrotyCtrl{
    private $form;
    
    
    public function __construct(){
        $this->form = new ZwrotyForm();
    }        
    
    
    public function validate() {
        //pobieramy dane
        $this->form->id_wypozyczenia = ParamUtils::getFromRequest('id_wypozyczenia');
        $this->form->id_ksiazki = ParamUtils::getFromRequest('id_ksiazki');
        $this->form->id_czytelnika = ParamUtils::getFromRequest('id_czytelnika');
    }
  
    
    public function action_zwrocKsiazka() {
        $this->validate();

//aktualizuję datę oddania, dostępnosć ksiażki oraz informację o wypożyczeniu u czytelnika
        
        try{
            App::getDB()->update("wypozyczenie", [
                "data_oddania" => date("Y-m-d H:i:s")
            ], [
               "ID_wypozyczenia" => $this->form->id_wypozyczenia 
            ]);
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
            $insert_id = App::getDB()->id(); //id rekordu, który wprowadziliśmy
            Utils::addInfoMessage('Pomyślnie zwrócono');//
    
  
        try{
            App::getDB()->update("ksiazka", [
                "czy_dostepna" => 'T'
            ], [
                "ID_ksiazki" => $this->form->id_ksiazki
            ]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas aktualizacji');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
            
        try{    
            App::getDB()->update("czytelnik", [
                "ID_wypozyczenia" => null
            ], [
                "ID_czytelnika" => $this->form->id_czytelnika
            ]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas aktualizacji');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }    
            
        App::getRouter()->redirectTo('listaWypozyczen');
    }
    
    
}