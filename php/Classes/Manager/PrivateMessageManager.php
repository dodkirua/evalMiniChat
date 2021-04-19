<?php


namespace App\Classes\Manager;

use App\Classes\Entity\DB;
use App\Classes\Entity\PrivateMessage;
use PDO;

class PrivateMessageManager{
    /**
     * return a list of private message
     * @return array
     */
    public function getPrivateMessages(): array {
        $chatRoom = [];
        $request = DB::getInstance()->prepare("SELECT * FROM private_messsage");
        $request->execute();
        $chatResponse= $request->fetchAll();

        if ($chatResponse) {
            foreach ($chatResponse as $item) {
                $chatRoom[] = new PrivateMessage(intval($item['id']),$item['message_id'],$item['user_id'],$item['user2_id']);
            }
        }
        return $chatRoom;
    }

    /**
     * return a chatroom by id
     * @param int $id
     * @return PrivateMessage|null
     */
    public function getChatRoom(int $id) : ?PrivateMessage{
        $request = DB::getInstance()->prepare("SELECT * FROM private_messsage WHERE id = :id");
        $request->bindValue(':id',$id);
        $request->execute();
        $req = $request->fetch();
        if ($req){
            return new PrivateMessage($id,$req['message_id'],$req['user_id'],$req['user2_id']);

        }
        return null;
    }

    /**
     * delete a chatroom
     * @param int $id
     * @return bool
     */
    public function delChatRoom(int $id) : bool    {
        $request = DB::getInstance()->prepare("DELETE FROM private_messsage WHERE id = :id");
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
            INSERT INTO private_messsage (message_id, user_id, user2_id)
            VALUES (:message_id, :user_id, :user2_id)');
        $request->bindValue(':message_id',$name);
        $request->bindValue(':user_id',$name);
        $request->bindValue(':user2_id',$name);
        $request->execute();
        return intval(DB::getInstance()->lastInsertId()) !==0;
    }
}