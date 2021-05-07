<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/import.php";

use Model\Manager\MessageManager;
if (isset($_GET['num'])){
    $chat = intval($_GET['num']);
}
else {
    $chat = 2;
}


$messageManager = new MessageManager();

$array = $messageManager->getAllByChatRoom($chat);
/*if (!$array){
    $array = $messageManager->getAllByChatRoom(2);
}*/
$response = [];

foreach ($array as $item) {
    $tab['content'] = $item->getContent();
    $tab['date'] = $item->getDate();
    $tab['user'] = $item->getUser()->getUsername();
    $tab['chat_room'] = $item->getChatRoom()->getName();
    $response[] = $tab;
}

echo json_encode($response);

exit;