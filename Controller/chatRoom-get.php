<?php
require_once "../import.php";

use Model\Manager\MessageManager;

$messageManager = new MessageManager();

$array = $messageManager->getAllByChatRoom(2);
$response = [];
foreach ($array as $item) {
    $tab['text'] = $item['text'];
    $tab['date'] = $item['date'];
    $tab['user'] = $item['user']->getUsername();
    $tab['chat_room'] = $item['chat_room']->getName();
    $response[] = $tab;
}

echo json_encode($response);