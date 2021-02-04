<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\CzytelnikSearchForm;


class CzytelnikCtrl{
    private $form;
    private $records;
        
    public function __construct(){
	//stworzenie potrzebnych obiektów
        $this->form = new CzytelnikSearchForm();
    }        
        
    public function validate() {
        $this->form->nazwisko = ParamUtils::getFromRequest('nazwisko');
        
        return !App::getMessages()->isError();
    }
	
    public function action_listaCzytelnik(){    
        // 1. Walidacja danych formularza (z pobraniem)
        // - W tej aplikacji walidacja nie jest potrzebna, ponieważ nie wystąpią błedy podczas podawania nazwiska.
        //   Jednak pozostawiono ją, ponieważ gdyby uzytkownik wprowadzał np. datę, lub wartość numeryczną, to trzeba
        //   odpowiednio zareagować wyświetlając odpowiednią informację (poprzez obiekt wiadomości Messages)
        $this->validate();
        
        // 2. Przygotowanie mapy z parametrami wyszukiwania (nazwa_kolumny => wartość)
        $search_params = []; //przygotowanie pustej struktury (aby była dostępna nawet gdy nie będzie zawierała wierszy)
	if ( isset($this->form->nazwisko) && !empty(($this->form->nazwisko)) ) {
            $search_params['nazwisko[~]'] = $this->form->nazwisko.'%'; // dodanie symbolu % zastępuje dowolny ciąg znaków na końcu
	}
                
        // 3. Pobranie listy rekordów z bazy danych
        // W tym wypadku zawsze wyświetlamy listę osób bez względu na to, czy dane wprowadzone w formularzu wyszukiwania są poprawne.
        // Dlatego pobranie nie jest uwarunkowane poprawnością walidacji (jak miało to miejsce w kalkulatorze)
        //przygotowanie frazy where na wypadek większej liczby parametrów        
	$num_params = sizeof($search_params); 
	if ($num_params > 1) {
            $where = [ "AND" => &$search_params ];
	} else {
            $where = &$search_params;
	}
        //dodanie frazy sortującej po tytule
	$where ["ORDER"] = "nazwisko";
        
        //wykonanie zapytania
		
        try {        
            $this->records = App::getDB()->select("czytelnik", [
		"ID_czytelnika",
		"nazwisko",
		"imie",
		"pesel",
		"ID_wypozyczenia",
                    ], $where);
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
        }

        // 4. wygeneruj widok      
	App::getSmarty()->assign('searchForm',$this->form); 
        App::getSmarty()->assign('czytelnik',$this->records); 
		
        App::getSmarty()->display('czytelnikView.tpl');
    }
}