<?php
//INCLUDE THE FILES NEEDED...

require_once 'controller/MainController.php';

if (!isset($_SESSION)) {
    session_start();
}

//CREATE OBJECTS OF THE VIEWS
$mainController = new MainController();
$mainController->render();

