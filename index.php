
<?php
//INCLUDE THE FILES NEEDED...
require_once 'view/LoginView.php';
require_once 'view/DateTimeView.php';
require_once 'view/LayoutView.php';
require_once 'view/RegisterView.php';
//MAKE SURE ERRORS ARE SHOWN.sd MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');
//CREATE OBJECTS OF THE VIEWS

if (!isset($_SESSION)) {
    session_start();
}

$v = new LoginView();
$dtv = new DateTimeView();
$lv = new LayoutView();
$lv->render(false, $v, $dtv);