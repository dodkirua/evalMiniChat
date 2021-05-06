<?php


namespace Controller\Classes;


class ErrorController extends Controller{

    public function connectError() : void {
        $var['error'] = 'connection non valide veuillez réessayer';
        $this->render('connectError','Connectez-vous',$var);
    }

}