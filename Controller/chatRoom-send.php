<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/import.php";

use Controller\Classes\SecurityController;
use Model\Manager\MessageManager;



$manager = new MessageManager();
$data = file_get_contents('php://input');
$data = json_decode($data, true);
var_dump($data);
// data verification and security
$content = $data['content'];
if (isset($content) && $content !== "") {
    $content = SecurityController::sanitize($data['content']);
    $manager->add(mb_strtolower($content), intval($data['user']), intval($data['chat_room']));
}
exit;