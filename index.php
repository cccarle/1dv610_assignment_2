
<?php
//INCLUDE THE FILES NEEDED...

require_once 'controller/MainController.php';

//MAKE SURE ERRORS ARE SHOWN.sd MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');

//CREATE OBJECTS OF THE VIEWS
$mainController = new MainController();
$mainController->render();

