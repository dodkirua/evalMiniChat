<?php


namespace Model\Manager;

use Model\DB;
use Model\Entity\Message;
use DateTime;
use PDOStatement;

class MessageManager{
    /**
     * return a list of private message
     * @return array
     */
    public function getAll(): array {
        $request = DB::getInstance()->prepare("SELECT * FROM message");
        return $this->getAllTmp($request);
    }

    /**
     * return array of message for a chatroom
     * @param int $chatRoomId
     * @return array
     */
    public function getAllByChatRoom(int $chatRoomId) : array {

        $request = DB::getInstance()->prepare("SELECT * FROM message WHERE chat_room_id = :chat");
        $request->bindValue(':chat',$chatRoomId);
        return $this->getAllTmp($request);
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
            $userManager = new UserManager();
            $chatManager = new ChatRoomManager();
            $user = $userManager->get(intval($item['user_id']));
            $chat = $chatManager->get(intval($item['chat_room_id']));
            return new Message($id,$item['text'],$item['date'],$user , $chat);

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
        $request->bindValue(':text',mb_strtolower($text));
        $date = new DateTime();
        $date = $date->getTimestamp();
        $request->bindValue(':date',$date);
        $request->bindValue(':user_id',$userId);
        $request->bindValue(':chat_room_id',$chatRoomId);

        $request->execute();
        return intval(DB::getInstance()->lastInsertId()) !==0;
    }

    /**
     * return  a array for a getall function
     * @param PDOStatement $request
     * @return array
     */
    private function getAllTmp(PDOStatement $request) : array{
        $chatRoom = [];
        $request->execute();
        $chatResponse= $request->fetchAll();

        if ($chatResponse) {
            foreach ($chatResponse as $item) {
                $userManager = new UserManager();
                $chatManager = new ChatRoomManager();
                $user = $userManager->get(intval($item['user_id']));
                $chat = $chatManager->get(intval($item['chat_room_id']));

                $chatRoom[] = new Message(intval($item['id']),$item['text'],$item['date'],$user , $chat);
            }
        }
        return $chatRoom;
    }
}


