<?php

namespace Controller\Classes;

use Model\Manager\UserManager;
use Controller\Classes\Controller;

class ConnectController extends Controller{

    public function testConnection(): bool{
        if (isset($_POST['username']) && isset($_POST['pass'])){
            $user = $_POST['username'];
            $pass = $_POST['pass'];
            $userClass = (new UserManager())->passTest($user,$pass);
            if (!is_null($userClass)){

            }
        }
        return false;
    }
}