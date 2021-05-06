<?php

namespace Controller\Classes;

use Controller\Classes\Controller;

class HomeController extends Controller{
    public function display(){
        $this->render('connect','Connectez-vous');
    }
}