<?php


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
}



