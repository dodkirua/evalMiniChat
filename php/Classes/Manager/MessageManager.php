<?php


namespace App\Classes\Manager;

use App\Classes\Entity\DB;
use App\Classes\Entity\Message;
use PDO;
use DateTime;

class MessageManager{
    /**
     * return a list of private message
     * @return array
     */
    public function getAll(): array {
        $chatRoom = [];
        $request = DB::getInstance()->prepare("SELECT * FROM message");
        $request->execute();
        $chatResponse= $request->fetchAll();

        if ($chatResponse) {
            foreach ($chatResponse as $item) {
                $chatRoom[] = new Message(intval($item['id']),$item['text'],$item['date'],$item['user_id'],$item['chat_room_id']);
            }
        }
        return $chatRoom;
    }

    /**
     * return a chatroom by id
     * @param int $id
     * @return Message|null
     */
    public function get(int $id) : ?Message{
        $request = DB::getInstance()->prepare("SELECT * FROM message WHERE id = :id");
        $request->bindValue(':id',$id);
        $request->execute();
        $item = $request->fetch();
        if ($item){
            return new Message($id,$item['text'],$item['date'],$item['user_id'],$item['chat_room_id']);

        }
        return null;
    }

    /**
     * delete a chatroom
     * @param int $id
     * @return bool
     */
    public function del(int $id) : bool    {
        $request = DB::getInstance()->prepare("DELETE FROM message WHERE id = :id");
        $request->bindValue(':id',$id);
        return $request->execute();
    }

    /**
     * add a chatroom
     * @param string $text
     * @param int $userId
     * @param int $chatRoomId
     * @return bool
     */
    public function add(string $text, int $userId , int $chatRoomId): bool {
        $request = DB::getInstance()->prepare('
            INSERT INTO message (text, date, user_id, chat_room_id)
            VALUES (:text, :date, :user_id, :chat_room_id)');
        $request->bindValue(':text',$text);
        $date = new DateTime();
        $date = $date->getTimestamp();
        $request->bindValue(':date',$date);
        $request->bindValue(':user_id',$userId);
        $request->bindValue(':user_id',$chatRoomId);

        $request->execute();
        return intval(DB::getInstance()->lastInsertId()) !==0;
    }
}