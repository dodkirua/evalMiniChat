<?php

use Controller\Classes\ChatController;
use Controller\Classes\ConnectController;
use Controller\Classes\ErrorController;
use Controller\Classes\ForgotController;
use Controller\Classes\HomeController;
use Controller\Classes\RegistrationController;

session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . "/import.php";

if (isset($_GET['ctrl'])) {

    switch ($_GET['ctrl']) {
        case 'chat' :
            if (isset($_GET['num'])) {
                (new ChatController())->display(intval($_GET['num']));
            }
            else {
                (new ChatController())->display(2);
            }
            break;
        case 'form' :
            switch ($_GET['action']){
                case 'connect':
                    if ((new ConnectController())->testConnection()){
                        (new HomeController())->chatSelect();
                    }
                    else {
                        (new ErrorController())->connectError();
                    }
                    break;
                case 'registration' :
                    (new RegistrationController())
                    break;
                default :
                    break;
            }
            break;
        case 'registration':
            (new RegistrationController)->display();
            break;

        case 'forgotpassword':
            (new ForgotController)->display();
            break;

        default :
            break;
    }
}
else {
    (new HomeController())->display();
}