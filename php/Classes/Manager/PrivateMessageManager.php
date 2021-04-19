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
    public function getAll(): array {
        $chatRoom = [];
        $request = DB::getInstance()->prepare("SELECT * FROM private_message");
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
    public function get(int $id) : ?PrivateMessage{
        $request = DB::getInstance()->prepare("SELECT * FROM private_message WHERE id = :id");
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
    public function del(int $id) : bool    {
        $request = DB::getInstance()->prepare("DELETE FROM private_message WHERE id = :id");
        $request->bindValue(':id',$id);
        return $request->execute();
    }

    /**
     * add a chatroom
     * @param int $messageid
     * @param int $userId
     * @param int $user2Id
     * @return bool
     */
    public function add(int $messageid, int $userId, int $user2Id): bool {
        $request = DB::getInstance()->prepare('
            INSERT INTO private_message (message_id, user_id, user2_id)
            VALUES (:message_id, :user_id, :user2_id)');
        $request->bindValue(':message_id',$messageid);
        $request->bindValue(':user_id',$userId);
        $request->bindValue(':user2_id',$user2Id);
        $request->execute();
        return intval(DB::getInstance()->lastInsertId()) !==0;
    }
}