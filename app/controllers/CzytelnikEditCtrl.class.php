<?php 

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\CzytelnikEditForm;

class CzytelnikEditCtrl {

    private $form;

    
    public function __construct() {
        $this->form = new CzytelnikEditForm();
    }

   
    public function validate() {                    
        $this->form->id_czytelnika = ParamUtils::getFromRequest('id_czytelnika', true, 'Błędne wywołanie aplikacji');
        $this->form->nazwisko = ParamUtils::getFromRequest('nazwisko', true, 'Błędne wywołanie aplikacji');
        $this->form->imie = ParamUtils::getFromRequest('imie', true, 'Błędne wywołanie aplikacji');
        $this->form->pesel = ParamUtils::getFromRequest('pesel', true, 'Błędne wywołanie aplikacji');
        $this->form->id_wypozyczenia = ParamUtils::getFromRequest('id_wypozyczenia', true, 'Błędne wywołanie aplikacji');

        if (App::getMessages()->isError())
            return false;

        if ($this->form->nazwisko == "") {
            App::getMessages()->addMessage(new Message('Wprowadź Nazwisko', Message::ERROR));
            return false;
        }
        if ($this->form->imie == "") {
            App::getMessages()->addMessage(new Message('Wprowadź Imię', Message::ERROR));
            return false;
        }
        if ($this->form->pesel == "") {
            App::getMessages()->addMessage(new Message('Wprowadź PESEL', Message::ERROR));
            return false;
        }

        if (App::getMessages()->isError())
            return false;

        return !App::getMessages()->isError();
    
        
    }       
    
        
    public function action_dodajCzytelnik() {        
        if ($_SERVER['REQUEST_METHOD'] === "GET"){
            $this->generateView();
        } else if ($_SERVER['REQUEST_METHOD'] === "POST"){
            if ($this->validate()){
                try{
                    App::getDB()->insert("czytelnik", [
                        "nazwisko" => $this->form->nawisko,
                        "imie" => $this->form->imie,
                        "pesel" => $this->form->pesel,
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


    public function action_edytujCzytelnik() {        
        try {
            $record = App::getDB()->get("czytelnik", "*", [
                "ID_czytelnika" => $_GET['id_czytelnika']
            ]);
                $this->form->id_ksiazki = $record['ID_czytelnika'];
                $this->form->kategoria = $record['nazwisko'];
                $this->form->tytul = $record['imie'];
                $this->form->nazwisko_autora = $record['pesel'];
                $this->form->id_wypozyczenia = $record['id_wypozyczenia'];
                
                $this->generateView();
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }        
    }

    
    public function action_usunCzytelnik() {
        try {
            App::getDB()->delete("czytelnik", [
                "ID_czytelnika" => $_GET['id_czytelnik']
            ]);
            Utils::addInfoMessage('Pomyślnie usunięto Czytelnika z bazy danych');
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        App::getRouter()->forwardTo("listaCzytelnik");
    }

    
    public function action_zapiszCzytelnik() {
        if ($this->validate()){
            try {
                if ($this->form->id_czytelnika == '') {
                    App::getDB()->insert("czytelnik", [
                        "nazwisko" => $this->form->nazwisko,
                        "imie" => $this->form->imie,
                        "pesel" => $this->form->pesel,
                    ]);                    
                } else {      
                    App::getDB()->update("czytelnik", [
                        "nazwisko" => $this->form->nazwisko,
                        "imie" => $this->form->imie,
                        "pesel" => $this->form->pesel,
                        "imie_autora" => $this->form->imie_autora,
                        "czy_dostepna" => $this->form->czy_dostepna
                    ], [
                        "ID_czytelnika" => $_POST['id_ksiazki']
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
    
//    public function wypozyczenie(){
//        $this->form->id_ksiazki = ParamUtils::getFromRequest('id_ksiazki', true, 'Błędne wywołanie aplikacji'); 
//        
//        try {
//                App::getDB()->update("ksiazka", [
//                    "kategoria" => $this->form->kategoria,
//                    "tytul" => $this->form->tytul,
//                    "nazwisko_autora" => $this->form->nazwisko_autora,
//                    "imie_autora" => $this->form->imie_autora,
//                    "czy_dostepna" => $this->form->czy_dostepna
//                ]);  
//                 Utils::addInfoMessage('Pomyślnie zapisano rekord');
//            } catch (\PDOException $e) {
//                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
//                if (App::getConf()->debug)
//                    Utils::addErrorMessage($e->getMessage());
//            }
//    }
    
    public function generateView() {
        App::getSmarty()->assign('form', $this->form);
        
        App::getSmarty()->display('ksiazkaEdit.tpl');
    }
    
}
