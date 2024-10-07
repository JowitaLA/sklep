<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('main'); #default action
//App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('main', 'MainCtrl');

Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('logout', 'LoginCtrl');

Utils::addRoute('forgot_pass', 'Forgot_Pass');

Utils::addRoute('register', 'RegisterCtrl');
