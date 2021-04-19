<?php


namespace App\Classes\Manager;

use App\Classes\Entity\DB;
use App\Classes\Entity\ChatRoom;
use PDO;

class ChatRoomManager{

    /**
     * return a list of classroom
     * @return array
     */
    public function getChatRooms(): array {
    $chatRoom = [];
    $request = DB::getInstance()->prepare("SELECT * FROM chat_room");
    $request->execute();
    $chatResponse= $request->fetchAll();

    if ($chatResponse) {
        foreach ($chatResponse as $item) {
            $chatRoom[] = new ChatRoom(intval($item['id']),$item['name']);
        }
    }
    return $chatRoom;
    }

    /**
     * return a chatroom by id
     * @param int $id
     * @return ChatRoom|null
     */
    public function getChatRoom(int $id) : ?ChatRoom {
        $request = DB::getInstance()->prepare("SELECT * FROM chat_room WHERE id = :id");
        $request->bindValue(':id',$id);
        $request->execute();
        $chatRequest = $request->fetch();
        if ($chatRequest){
            return new ChatRoom($id,$chatRequest['name']);

        }
        return null;
    }

    /**
     * delete a chatroom
     * @param int $id
     * @return bool
     */
    public function delChatRoom(int $id) : bool    {
        $request = DB::getInstance()->prepare("DELETE FROM chat_room WHERE id = :id");
        $request->bindValue(':id',$id);
        return $request->execute();
    }

    /**
     * add a chatroom
     * @param string $name
     * @return bool
     */
    public function addChatRoom(string $name): bool {
        $request = DB::getInstance()->prepare('
            INSERT INTO chat_room (name)
            VALUES (:name)');
        $request->bindValue(':name',$name);
        $request->execute();
        return intval(DB::getInstance()->lastInsertId()) !==0;
    }
}