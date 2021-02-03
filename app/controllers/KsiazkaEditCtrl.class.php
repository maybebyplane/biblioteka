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
    public function validateAdd() {
//0. Pobranie parametrów z walidacją
        $this->form->id_ksiazki = ParamUtils::getFromRequest('id_ksiazki', true, 'Błędne wywołanie aplikacji');
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

//    public function action_dodajKsiazka() {
//        $this->generateView();
//    }

//wyświeltenie rekordu do edycji wskazanego parametrem 'id_ksiazki'
    public function action_edytujKsiazka() {
        
//1. walidacja id ksiazki do edycji
            try {
               
// 2. odczyt z bazy danych książki o podanym ID (tylko jednego rekordu)
                $record = App::getDB()->get("ksiazka", "*", [
                    "ID_ksiazki" => $_GET['id']
                ]);
//2.1 jeśli książka istnieje to wpisz dane do obiektu formularza
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
// 1. walidacja id ksiazki do usuniecia
            try {
// 2. usunięcie rekordu
                App::getDB()->delete("ksiazka", [
                    "ID_ksiazki" => $_GET['id']
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto książkę z bazy zasobów');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

// 3. Przekierowanie na stronę listy książek
        App::getRouter()->forwardTo('listaKsiazka');
    }

    public function action_zapiszKsiazka() {

// 1. Walidacja danych formularza (z pobraniem)
        //if ($this->validateAdd()) {
// 2. Zapis danych w bazie
            try {

//2.1 Nowy rekord
//sprawdź liczebność rekordów - nie pozwalaj przekroczyć 50
//                    $count = App::getDB()->count("ksiazka");
//                    if ($count <= 50) {
//                        App::getDB()->insert("ksiazka", [
//                            "kategoria" => $this->form->kategoria,
//                            "tytul" => $this->form->tytul,
//                            "nazwisko_autora" => $this->form->nazwisko_autora,
//                            "imie_autora" => $this->form->imie_autora,
//                            "czy_dostepna" => $this->form->czy_dostepna
//                        ]);
//                    } else { //za dużo rekordów
//// Gdy za dużo rekordów to pozostań na stronie
//                        Utils::addInfoMessage('Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy usuń wybrany wpis.');
//                        $this->generateView(); //pozostań na stronie edycji
//                        exit(); //zakończ przetwarzanie, aby nie dodać wiadomości o pomyślnym zapisie danych
//                    }
//                } else {
//2.2 Edycja rekordu o danym ID || UPDATE ksiazka set autor = cos ... where id = $_GET['idKsiazki']
                 
                    
                    App::getDB()->update("ksiazka", [
                        "kategoria" => $this->form->kategoria,
                        "tytul" => $this->form->tytul,
                        "nazwisko_autora" => $this->form->nazwisko_autora,
                        "imie_autora" => $this->form->imie_autora,
                        "czy_dostepna" => $this->form->czy_dostepna
                            ], [
                        "ID_ksiazki" => $_POST['id']
                    ]);
                
                
                Utils::addInfoMessage('Pomyślnie zapisano rekord');
                
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());  
            } 
            App::getRouter()->redirectTo('listaKsiazka');
            
            
            
// 3c. Gdy błąd walidacji to pozostań na stronie
            
        }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        
        App::getSmarty()->display('ksiazkaEdit.tpl');
    }
    
}
