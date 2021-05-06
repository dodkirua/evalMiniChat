<?php

namespace Controller\Classes;

use Controller\Classes\Controller;

class ChatController extends Controller {

    public function display(int $numChat) : void {
        $var = [
          'numChat' => $numChat,
        ];

        $this->render('home','MiniChat',$var);
    }
}