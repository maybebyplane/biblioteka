<?php 

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\KsiazkaEditForm;

class KsiazkaEditCtrl {

    private $form;

    
    public function __construct() {
        $this->form = new KsiazkaEditForm();
    }

   
    public function validate() {                    
        $this->form->id_ksiazki = ParamUtils::getFromRequest('id_ksiazki', true, 'Błędne wywołanie aplikacji');
        $this->form->kategoria = ParamUtils::getFromRequest('kategoria', true, 'Błędne wywołanie aplikacji');
        $this->form->tytul = ParamUtils::getFromRequest('tytul', true, 'Błędne wywołanie aplikacji');
        $this->form->nazwisko_autora = ParamUtils::getFromRequest('nazwisko_autora', true, 'Błędne wywołanie aplikacji');
        $this->form->imie_autora = ParamUtils::getFromRequest('imie_autora', true, 'Błędne wywołanie aplikacji');
        $this->form->czy_dostepna = ParamUtils::getFromRequest('czy_dostepna', true, 'Błędne wywołanie aplikacji');

        if (App::getMessages()->isError())
            return false;

        if (empty(trim($this->form->kategoria))) {
           Utils::addErrorMessage('Wprowadź kategorię');
        }
        if (empty(trim($this->form->tytul))) {
            Utils::addErrorMessage('Wprowadź tytul');
        }
        if (empty(trim($this->form->nazwisko_autora))) {
           Utils::addErrorMessage('Wprowadź Nazwisko Autora');
        }
        if (empty(trim($this->form->imie_autora))) {
           Utils::addErrorMessage('Wprowadź Imię Autora');
        }
        if (empty(trim($this->form->czy_dostepna))) {
           Utils::addErrorMessage('Wprowadź dostępność');
        }

        if (App::getMessages()->isError())
            return false;

        return !App::getMessages()->isError();
    
        
    }       
    
        
    public function action_dodajKsiazka() {        
        if ($_SERVER['REQUEST_METHOD'] === "GET"){
            $this->generateView();
        } else if ($_SERVER['REQUEST_METHOD'] === "POST"){
            if ($this->validate()){
                try{
                    App::getDB()->insert("ksiazka", [
                        "kategoria" => $this->form->kategoria,
                        "tytul" => $this->form->tytul,
                        "nazwisko_autora" => $this->form->nazwisko_autora,
                        "imie_autora" => $this->form->imie_autora,
                        "czy_dostepna" => $this->form->czy_dostepna
                    ]);                    
                } catch (Exception $ex) {
                    Utils::addErrorMessage('Wystąpił błąd podczas zapisywania');
                    if (App::getConf()->debug)
                        Utils::addErrorMessage($e->getMessage());
                }
            } 
        $this->generateView();
        }
    }


    public function action_edytujKsiazka() {        
        try {
            $record = App::getDB()->get("ksiazka", "*", [
                "ID_ksiazki" => $_GET['id_ksiazki']
            ]);
                $this->form->id_ksiazki = $record['ID_ksiazki'];
                $this->form->kategoria = $record['kategoria'];
                $this->form->tytul = $record['tytul'];
                $this->form->nazwisko_autora = $record['nazwisko_autora'];
                $this->form->imie_autora = $record['imie_autora'];
                $this->form->czy_dostepna = $record['czy_dostepna'];
                
                $this->generateView();
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }        
    }

    
    public function action_usunKsiazka() {
        try {
            App::getDB()->delete("ksiazka", [
                "ID_ksiazki" => $_GET['id_ksiazki']
            ]);
            Utils::addInfoMessage('Pomyślnie usunięto książkę z bazy zasobów');
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        App::getRouter()->forwardTo("listaKsiazka");
    }

    
    public function action_zapiszKsiazka() {
        if ($this->validate()){
            try {
                if ($this->form->id_ksiazki == '') {
                    App::getDB()->insert("ksiazka", [
                        "kategoria" => $this->form->kategoria,
                        "tytul" => $this->form->tytul,
                        "nazwisko_autora" => $this->form->nazwisko_autora,
                        "imie_autora" => $this->form->imie_autora,
                        "czy_dostepna" => $this->form->czy_dostepna
                    ]);                    
                } else {      
                    App::getDB()->update("ksiazka", [
                        "kategoria" => $this->form->kategoria,
                        "tytul" => $this->form->tytul,
                        "nazwisko_autora" => $this->form->nazwisko_autora,
                        "imie_autora" => $this->form->imie_autora,
                        "czy_dostepna" => $this->form->czy_dostepna
                    ], [
                        "ID_ksiazki" => $_POST['id_ksiazki']
                    ]);
                }
                Utils::addInfoMessage('Pomyślnie zapisano rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
                    $this->generateView();
            }
            App::getRouter()->redirectTo('listaKsiazka');
        }    
    }
    
    
    public function generateView() {
        App::getSmarty()->assign('form', $this->form);
        
        App::getSmarty()->display('ksiazkaEdit.tpl');
    }
    
}
