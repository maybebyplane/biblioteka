<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\WypozyczeniaForm;


class WypozyczeniaCtrl{
    private $form;
    private $records;
    
    
    public function __construct(){
        $this->form = new WypozyczeniaForm();
    }        
    
    
    public function validate() {
        //pobieramy dane
        $this->form->id_ksiazki = ParamUtils::getFromRequest('id_ksiazki');
        $this->form->id_czytelnika = ParamUtils::getFromRequest('id_czytelnika');
    }
  
    
    
    public function action_wypozyczKsiazka() {
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
                Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
            $insert_id = App::getDB()->id(); //id rekordu, który wprowadziliśmy
            Utils::addInfoMessage('Pomyślnie wypozyczono');//
    
            //try
            App::getDB()->update("ksiazka", [
                "czy_dostepna" => 'N'
            ], [
                "ID_ksiazki" => $this->form->id_ksiazki
            ]);
            //catch
            
            $zmienna = $this->form->id_czytelnika;
            
            App::getDB()->update("czytelnik", [
                "ID_wypozyczenia" => $insert_id
            ], [
                "ID_czytelnika" => $this->form->id_czytelnika
            ]);
            
            
            App::getRouter()->redirectTo('listaWypozyczen');
    }
    
    
    
}
     