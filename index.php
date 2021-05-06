<?php
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
        default :
            break;
    }
}
else {

}