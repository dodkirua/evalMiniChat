<?php


namespace App\Classes\Manager;

use App\Classes\Entity\DB;
use App\Classes\Entity\User;

class UserManager{
    /**
     * return a list of private message
     * @return array
     */
    public function getAll(): array {
        $chatRoom = [];
        $request = DB::getInstance()->prepare("SELECT * FROM user");
        $request->execute();
        $chatResponse= $request->fetchAll();

        if ($chatResponse) {
            foreach ($chatResponse as $item) {
                $chatRoom[] = new User(intval($item['id']),$item['username'],$item['password'],$item['mail'],$item['image'],$item['validation'],$item['key'],$item['data_autorisation']);
            }
        }
        return $chatRoom;
    }

    /**
     * return a chatroom by id
     * @param int $id
     * @return User|null
     */
    public function get(int $id) : ?User{
        $request = DB::getInstance()->prepare("SELECT * FROM user WHERE id = :id");
        $request->bindValue(':id',$id);
        $request->execute();
        $item = $request->fetch();
        if ($item){
            return new Message($id,$item['username'],$item['password'],$item['mail'],$item['image'],$item['validation'],$item['key'],$item['data_autorisation']);

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
     * @param string $username
     * @param string $pass
     * @param string $mail
     * @param string $image
     * @param int $validation
     * @param string $key
     * @param int $dateAutorisation
     * @return bool
     */
    public function add(string $username,string $pass, string $mail, string $image, int $validation, string $key, int $dateAutorisation): bool {
        $request = DB::getInstance()->prepare("        
            INSERT INTO user (username, password, mail, image, validation, validation_key, data_autorisation)
            VALUES (:username, :password, :mail, :image, :validation, :key, :data_autorisation)");
        $request->bindValue(':username',$username);
        $request->bindValue(':password',$pass);
        $request->bindValue(':mail',$mail);
        $request->bindValue(':image',$image);
        $request->bindValue(':validation',$validation);
        $request->bindValue(':key',$key);
        $request->bindValue(':data_autorisation',$dateAutorisation);

        $request->execute();
        return intval(DB::getInstance()->lastInsertId()) !==0;
    }
}