<?php

namespace Controller\Classes;

use Controller\Classes\Controller;

class ChatController extends Controller {

    /**
     * display the chatroom by id
     * @param int $numChat
     */
    public function display(int $numChat) : void {
        $var = [
          'numChat' => $numChat,
        ];

        $this->render('home','MiniChat',$var);
    }


}