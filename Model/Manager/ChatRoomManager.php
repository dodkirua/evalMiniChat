<?php


namespace Model\Manager;

use Model\DB;
use Model\Entity\ChatRoom;


class ChatRoomManager{

    /**
     * return a list of classroom
     * @return array
     */
    public function getAll(): array {
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
    public function get(int $id) : ?ChatRoom {
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
    public function del(int $id) : bool    {
        $request = DB::getInstance()->prepare("DELETE FROM chat_room WHERE id = :id");
        $request->bindValue(':id',$id);
        return $request->execute();
    }

    /**
     * add a chatroom
     * @param string $name
     * @return bool
     */
    public function add(string $name): bool {
        $request = DB::getInstance()->prepare('
            INSERT INTO chat_room (name)
            VALUES (:name)');
        $request->bindValue(':name',$name);
        $request->execute();
        return intval(DB::getInstance()->lastInsertId()) !==0;
    }
}