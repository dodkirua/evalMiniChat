<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/import.php";

use Model\Manager\MessageManager;



$manager = new MessageManager();
$data = file_get_contents('php://input');
$data = json_decode($data, true);

// data verification and security
$content = $data['content'];
if (isset($content) && $content !== ""){
    $content = SecurityController::sanitize($data['content']);
    if ($manager->add( strtolower($content) ,intval($data['user']), intval($data['chat_room']))){

    }
}




/*$message = $payload['message'];
$user = $payload['user'];

// On envoie le résultat du traitement.
$response = [
    'resp' => 'Ma réponse est: D, la réponse D ' . $message . ' ' . $user
];

echo json_encode($response);
// Envoi éventuel d'un code de réponse.
http_response_code(201); // 201 = created mais peut aussi être 200 ou autre ou encore rien du tout.*/
exit;