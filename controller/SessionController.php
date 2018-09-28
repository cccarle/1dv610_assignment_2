<?php

class SessionController
{
    private static $isLoggedIn = "sessionController::isLoggedIn";


    public function setToLoggedIn($isLoggedIn)
    {
        return $_SESSION[self::$isLoggedIn] = $isLoggedIn;
    }

    public function checkIfLoggedIn()
    {
        return isset($_SESSION[self::$isLoggedIn]);
    }



    // TODO
    // set session for current user, userId
}