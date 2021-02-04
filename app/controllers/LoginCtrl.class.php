<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use app\forms\LoginForm;

class LoginCtrl{
    private $form;
	
    public function __construct(){
	$this->form = new LoginForm();
    }
	
    
    public function validate() {
	$this->form->login = ParamUtils::getFromRequest('login');
	$this->form->pass = ParamUtils::getFromRequest('pass');

	if (!isset($this->form->login))
            return false;

	if (empty($this->form->login)) {
            Utils::addErrorMessage('Nie podano loginu');
	}
	if (empty($this->form->pass)) {
            Utils::addErrorMessage('Nie podano hasła');
	}

	if (App::getMessages()->isError())
            return false;


        $dbUser = App::getDB()->select("pracownik", "*",["login" => $this->form->login]);
	if (count($dbUser)>0 && ($this->form->pass == $dbUser[0]['haslo'])) {
            $id=$dbUser[0]['ID_pracownika'];
            \core\SessionUtils::store('id_pracownika', $id);
            RoleUtils::addRole('pracownik');
        } else {
            Utils::addErrorMessage('Niepoprawny login lub hasło');
        }   	
        return !App::getMessages()->isError();
    }

    
    public function action_loginShow(){
        $this->generateView(); 
    }
	
    
    public function action_login(){
	if ($this->validate()){
            Utils::addErrorMessage('Poprawnie zalogowano do systemu');
            App::getRouter()->redirectTo("listaKsiazka");
	} else {
            $this->generateView(); 
        }		
    }
	
    
    public function action_logout(){
	session_destroy();
	
	App::getRouter()->redirectTo("listaKsiazka");
    }	
	
    
    public function generateView(){
        App::getSmarty()->assign('form',$this->form);
	App::getSmarty()->display('LoginView.tpl');		
    }
    
}