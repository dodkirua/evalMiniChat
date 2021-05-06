<?php

namespace Controller\Classes;

use Controller\Classes\Controller;
use Model\Manager\ChatRoomManager;

class HomeController extends Controller{

    /**
     * display the connect page
     */
    public function display() : void{
        $this->render('connect','Connectez-vous');
    }

    public function chatSelect() : void {
        $array = (new ChatRoomManager())->getAll();
        $var = [];

        foreach ($array as $chat){
            $tmp = $chat->getall();
            $var[] = $tmp;
        }

        $this->render('select','Sélectionner la chat room',$var);

    }
}