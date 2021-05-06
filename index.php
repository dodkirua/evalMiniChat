<?php

use Controller\Classes\ChatController;
use Controller\Classes\ConnectController;
use Controller\Classes\HomeController;

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
                    (new ConnectController())->testConnection();
                    break;
                default :
                    break;
            }
            break;

        default :
            break;
    }
}
else {
    (new HomeController())->display();
}