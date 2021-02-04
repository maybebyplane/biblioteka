<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\WypozyczeniaForm;


class HistoriaWypozyczenCtrl{
    private $form;
    private $records;
        
    public function __construct(){
	//stworzenie potrzebnych obiektów
        $this->form = new WypozyczeniaForm();
    }        
        
    public function validate() {
        $this->form->id_ksiazki = ParamUtils::getFromRequest('id_ksiazki');
//        $this->form->nazwisko_autora = ParamUtils::getFromRequest('nazwisko_autora');
        
        return !App::getMessages()->isError();
    }
	
    public function action_listaWypozyczen(){    
        // 1. Walidacja danych formularza (z pobraniem)
        // - W tej aplikacji walidacja nie jest potrzebna, ponieważ nie wystąpią błedy podczas podawania nazwiska.
        //   Jednak pozostawiono ją, ponieważ gdyby uzytkownik wprowadzał np. datę, lub wartość numeryczną, to trzeba
        //   odpowiednio zareagować wyświetlając odpowiednią informację (poprzez obiekt wiadomości Messages)
        $this->validate();
        
        // 2. Przygotowanie mapy z parametrami wyszukiwania (nazwa_kolumny => wartość)
        $search_params = []; //przygotowanie pustej struktury (aby była dostępna nawet gdy nie będzie zawierała wierszy)
	if ( isset($this->form->id_ksiazki) && !empty(($this->form->id_ksiazki)) ) {
            $search_params['id_ksiazki'] = $this->form->id_ksiazki;
                               //⬆ musi tu być, bez tego nie znajduje książek!
        }
                
        // 3. Pobranie listy rekordów z bazy danych
        // W tym wypadku zawsze wyświetlamy listę osób bez względu na to, czy dane wprowadzone w formularzu wyszukiwania są poprawne.
        // Dlatego pobranie nie jest uwarunkowane poprawnością walidacji (jak miało to miejsce w kalkulatorze)
        //przygotowanie frazy where na wypadek większej liczby parametrów        
        
        //wykonanie zapytania
		
        try {        
            $this->records = App::getDB()->select("wypozyczenia", [
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

        // 4. wygeneruj widok      
	App::getSmarty()->assign('searchForm',$this->form); 
        App::getSmarty()->assign('wypozyczenia',$this->records); 
		
        App::getSmarty()->display('historiaWypozyczen.tpl');
    }
}