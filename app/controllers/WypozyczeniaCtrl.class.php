<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\WypozyczeniaForm;


class WypozyczeniaCtrl{
    private $form;
    
    
    public function __construct(){
        $this->form = new WypozyczeniaForm();
    }        
    
    
    public function validate() {
        //pobieramy dane
        $this->form->id_ksiazki = ParamUtils::getFromRequest('id_ksiazki');
        $this->form->id_czytelnika = ParamUtils::getFromRequest('id_czytelnika');
    }
  
    
    
    public function action_wypozyczKsiazka() {
        //$zmienna = wypozycz;
        $this->validate();
        try{
        //dodać wypozyczenie do bazy danych
            App::getDB()->insert("wypozyczenie", [
                "data_oddania" => null,
                "ID_ksiazki" => $this->form->id_ksiazki,
                "ID_czytelnika" => $this->form->id_czytelnika,
                "ID_pracownika" => \core\SessionUtils::load('id_pracownika', true)
            ]);
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas zapisu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
            
            $insert_id = App::getDB()->id(); //id rekordu, który wprowadziliśmy
            Utils::addInfoMessage('Pomyślnie wypożyczono');//
    
//aktualizuję dostępnosć ksiażki oraz informację o wypożyczeniu u czytelnika
            
        try{
            App::getDB()->update("ksiazka", [
                "czy_dostepna" => 'N'
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
                "ID_wypozyczenia" => $insert_id
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
     