<?php

namespace Controller\Classes;

class SecurityController{

    /**
     * Method that returns a healthy character string for the database
     * @param $data
     * @return String
     */
    public static function sanitize($data) : String {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return addslashes($data);
    }

    /**
     * verify pattern's password
     * @param $pass
     * @return bool
     */
    public static function checkPass($pass) : bool{
        $maj = preg_match('@[A-Z]@', $pass);
        $min = preg_match('@[a-z]@', $pass);
        $number = preg_match('@[0-9]@', $pass);
        $char = preg_match('@[^a-zA-Z\d]@', $pass);

        if(!$maj|| !$min || !$number || !$char || strlen($pass) < 10)    {
            return false;
        }
        else{
            return true;
        }
    }
}



