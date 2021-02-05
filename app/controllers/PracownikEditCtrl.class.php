<?php 

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\PracownikEditForm;

class PracownikEditCtrl {

    private $form;

    
    public function __construct() {
        $this->form = new PracownikEditForm();
    }

   
    public function validate() {                    
        $this->form->id_pracownika = ParamUtils::getFromRequest('id_pracownika', true, 'Błędne wywołanie aplikacji');
        $this->form->nazwisko = ParamUtils::getFromRequest('nazwisko', true, 'Błędne wywołanie aplikacji');
        $this->form->imie = ParamUtils::getFromRequest('imie', true, 'Błędne wywołanie aplikacji');
        $this->form->login = ParamUtils::getFromRequest('login', true, 'Błędne wywołanie aplikacji');
        $this->form->pass = ParamUtils::getFromRequest('pass', true, 'Błędne wywołanie aplikacji');

        if (App::getMessages()->isError())
            return false;

        if ($this->form->nazwisko == "") {
            App::getMessages()->addMessage(new Message('Wprowadź Nazwisko', Message::ERROR));
            return false;
        }
        if ($this->form->imie == "") {
            App::getMessages()->addMessage(new Message('Wprowadź imię', Message::ERROR));
            return false;
        }
        if ($this->form->login == "") {
            App::getMessages()->addMessage(new Message('Wprowadź Login', Message::ERROR));
            return false;
        }
        if ($this->form->pass == "") {
            App::getMessages()->addMessage(new Message('Wprowadź Hasło', Message::ERROR));
            return false;
        }

        if (App::getMessages()->isError())
            return false;

        return !App::getMessages()->isError();
    
        
    }       
    
        
    public function action_dodajPracownik() {        
        if ($_SERVER['REQUEST_METHOD'] === "GET"){
            $this->generateView();
        } else if ($_SERVER['REQUEST_METHOD'] === "POST"){
            if ($this->validate()){
                try{
                    App::getDB()->insert("pracownik", [
                        "nazwisko" => $this->form->nazwisko,
                        "imie" => $this->form->imie,
                        "login" => $this->form->login,
                        "haslo" => $this->form->pass,
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


    public function action_edytujPracownik() {     
        try {
            $record = App::getDB()->get("pracownik", "*", [
                "ID_pracownika" => $_GET['id_pracownika']
            ]);
                $this->form->id_pracownika = $record['ID_pracownika'];
                $this->form->nazwisko = $record['nazwisko'];
                $this->form->imie = $record['imie'];
                $this->form->login = $record['login'];
                $this->form->pass = $record['haslo'];
                //
                
                $this->generateView();
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }        
    }

    
    public function action_usunPracownik() {
        try {
            App::getDB()->delete("pracownik", [
                "ID_pracownika" => $_GET['id_pracownika']
            ]);
            Utils::addInfoMessage('Pomyślnie usunięto dane Pracownika z bazy');
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas usuwania danych');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        App::getRouter()->forwardTo("listaPracownik");
    }

    
    public function action_zapiszPracownik() {
        if ($this->validate()){
            try {
                if ($this->form->id_pracownika == '') {
                    App::getDB()->insert("pracownik", [
                        "nazwisko" => $this->form->nazwisko,
                        "imie" => $this->form->imie,
                        "login" => $this->form->login,
                        "haslo" => $this->form->pass,
                    ]);                    
                } else {      
                    App::getDB()->update("pracownik", [
                        "nazwisko" => $this->form->nazwisko,
                        "imie" => $this->form->imie,
                        "login" => $this->form->login,
                        "haslo" => $this->form->pass,
                    ], [
                        "ID_pracownika" => $_POST['id_pracownika']
                    ]);
                }
                Utils::addInfoMessage('Pomyślnie zapisano Pracownika');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu danych Pracownika');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
                    $this->generateView();
            }
            App::getRouter()->redirectTo('listaPracownik');
        }    
    }
    

    public function generateView() {
        App::getSmarty()->assign('form', $this->form);
        
        App::getSmarty()->display('pracownikEdit.tpl');
    }
    
}
