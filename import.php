<?php
require_once "Model/Entity/ChatRoom.php";
require_once "Model/Entity/PrivateMessage.php";
require_once "Model/Entity/Message.php";
require_once "Model/Entity/User.php";

require_once "Model/Manager/ChatRoomManager.php";
require_once "Model/Manager/MessageManager.php";
require_once "Model/Manager/PrivateMessageManager.php";
require_once "Model/Manager/UserManager.php";

require_once "Controller/Classes/Controller.php";
require_once "Controller/Classes/ChatController.php";
require_once "Controller/Classes/HomeController.php";
require_once "Controller/Classes/ConnectController.php";
require_once "Controller/Classes/ErrorController.php";
require_once "Controller/Classes/ForgotController.php";
require_once "Controller/Classes/RegistrationController.php";

require_once "Model/DB.php";

require_once "Controller/Classes/SecurityController.php";