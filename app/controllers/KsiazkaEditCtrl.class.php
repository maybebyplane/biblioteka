<?php 

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\KsiazkaEditForm;

class KsiazkaEditCtrl {

    private $form; //dane formularza

    public function __construct() {
//stworzenie potrzebnych obiektów
        $this->form = new KsiazkaEditForm();
    }

// Walidacja danych przed zapisem (nowe dane lub edycja).
    public function validate() {
//0. Pobranie parametrów z walidacją
        $this->form->id_ksiazki = ParamUtils::getFromRequest('ID_ksiazki', true, 'Błędne wywołanie aplikacji');
        $this->form->kategoria = ParamUtils::getFromRequest('kategoria', true, 'Błędne wywołanie aplikacji');
        $this->form->tytul = ParamUtils::getFromRequest('tytul', true, 'Błędne wywołanie aplikacji');
        $this->form->nazwisko_autora = ParamUtils::getFromRequest('nazwisko_autora', true, 'Błędne wywołanie aplikacji');
        $this->form->imie_autora = ParamUtils::getFromRequest('imie_autora', true, 'Błędne wywołanie aplikacji');
        $this->form->czy_dostepna = ParamUtils::getFromRequest('czy_dostepna', true, 'Błędne wywołanie aplikacji');

        if (App::getMessages()->isError())
            return false;

// 1. sprawdzenie czy wartości wymagane nie są puste
        if ($this->form->kategoria == "") {
            App::getMessages()->addMessage(new Message('Wprowadź kategorię', Message::ERROR));
            return false;
        }
        if ($this->form->tytul == "") {
            App::getMessages()->addMessage(new Message('Wprowadź tytul', Message::ERROR));
            return false;
        }
        if ($this->form->nazwisko_autora == "") {
            App::getMessages()->addMessage(new Message('Wprowadź Nazwisko Autora', Message::ERROR));
            return false;
        }
        if ($this->form->imie_autora == "") {
            App::getMessages()->addMessage(new Message('Wprowadź Imię Autora', Message::ERROR));
            return false;
        }

        if (App::getMessages()->isError())
            return false;

        return !App::getMessages()->isError();
    }

//    public function validateEdit() { 
//        $this->form->id_ksiazki = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
//        return !App::getMessages()->isError();
//    }       
    
        
    public function action_dodajKsiazka() {        
//      if ($this->validate());
//          try{
//              App::getDB()->insert("ksiazka", [
//                  "kategoria" => $this->form->kategoria,
//                  "tytul" => $this->form->tytul,
//                  "nazwisko_autora" => $this->form->nazwisko_autora,
//                  "imie_autora" => $this->form->imie_autora,
//                  "czy_dostepna" => $this->form->czy_dostepna
//              ]);                    
//          } catch (Exception $ex) {
//              Utils::addErrorMessage('Wystąpił błąd podczas zapisywania');
//              if (App::getConf()->debug)
//                  Utils::addErrorMessage($e->getMessage());
//        }
        $this->generateView();
    }

//wyświeltenie rekordu do edycji wskazanego parametrem 'id_ksiazki'
    public function action_edytujKsiazka() {
       //$_SESSION['id_ksiazki'] = $_GET['id'];
//        if ($this->validate()){
            try {
            $record = App::getDB()->get("ksiazka", "*", [
                "ID_ksiazki" => $_GET['id']
            ]);
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
        //}
    }

    public function action_usunKsiazka() {
        try {
            App::getDB()->delete("ksiazka", [
                "ID_ksiazki" => $_GET['id']
            ]);
            Utils::addInfoMessage('Pomyślnie usunięto książkę z bazy zasobów');
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
// Przekierowanie na stronę listy książek
        App::getRouter()->forwardTo("listaKsiazka");
    }

    public function action_zapiszKsiazka() {
        //if ($this->validate()){
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
                    "ID_ksiazki" => $_POST['id']
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
        //}    
    }
    
    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        
        App::getSmarty()->display('ksiazkaEdit.tpl');
    }
    
}
