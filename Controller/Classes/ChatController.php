<?php

namespace Controller\Classes;

use Controller\Classes\Controller;
use Model\DB;
use Model\Manager\ChatRoomManager;

class ChatController extends Controller {

    /**
     * display the chatroom by id
     * @param int $numChat
     */
    public function display(int $numChat) : void {
        $name = (new ChatRoomManager())->get($numChat)->getName();
        $var = [
            'numChat' => $numChat,
            'userId' => $_SESSION['user']['id'],
            'chatName' => $name,
        ];

        $this->render('home','MiniChat',$var);
    }

    /**
     * display the form to add a chatroom
     */
    public function displayAddChat() : void {
        $this->render('addChat','Ajout de chat');
    }

    public function addChat(){
        if (isset($_POST['name'])){
            $name = SecurityController::sanitize($_POST['name']);
            (new ChatRoomManager())->add($name);
            $num = DB::getInstance()->lastInsertId();
            $this->display(intval($num));
        }
    }
}