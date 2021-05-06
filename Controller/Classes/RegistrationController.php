<?php


namespace Controller\Classes;


class RegistrationController extends Controller{

    public function display(){
        $this->render('registration','Enregistrez vous');
    }

    public function registration() : bool{
        if (isset($_POST['username']) && isset($_POST['pass']) && isset($_POST['passVerify']) ){

        }
        return false;
    }
}