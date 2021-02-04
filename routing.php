<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('listaKsiazka'); #default action
App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('loginShow',            'LoginCtrl');
Utils::addRoute('login',                'LoginCtrl');
Utils::addRoute('logout',               'LoginCtrl');
Utils::addRoute('dodajCzytelnik',       'CzytelnikEditCtrl'    );
Utils::addRoute('zapiszCzytelnik',      'CzytelnikEditCtrl'    );
Utils::addRoute('usunCzytelnik',        'CzytelnikEditCtrl'    );
Utils::addRoute('edytujCzytelnik',      'CzytelnikEditCtrl'    );
Utils::addRoute('listaCzytelnik',       'CzytelnikCtrl'        );
Utils::addRoute('dodajKsiazka',         'KsiazkaEditCtrl'      );
Utils::addRoute('zapiszKsiazka',        'KsiazkaEditCtrl'      );
Utils::addRoute('usunKsiazka',          'KsiazkaEditCtrl'      );
Utils::addRoute('edytujKsiazka',        'KsiazkaEditCtrl'      );
Utils::addRoute('listaKsiazka',         'KsiazkaCtrl'          );
Utils::addRoute('dodajPracownik',       'PracownikEditCtrl'    );
Utils::addRoute('zapiszPracownik',      'PracownikEditCtrl'    );
Utils::addRoute('usunPracownik',        'PracownikEditCtrl'    );
Utils::addRoute('edytujPracownik',      'PracownikEditCtrl'    );
Utils::addRoute('listaPracownik',       'PracownikCtrl'        );
Utils::addRoute('historiaWypozyczen',   'WypożyczeniaCtrl'     );