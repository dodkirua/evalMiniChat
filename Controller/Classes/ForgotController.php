<?php


namespace Controller\Classes;


class ForgotController extends Controller{

    public function display(){
        $this->render('forgot','Mot de passe oublié');
    }
}