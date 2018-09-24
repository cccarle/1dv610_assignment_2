<?php

class SessionController
{
    private static $isLoggedIn;

    public function checkIfLoggedIn()
    {
        return isset($_SESSION[self::$isLoggedIn]);
    }

    public function setToLoggedIn($isLoggedIn)
    {
        return $_SESSION[self::$isLoggedIn] = $isLoggedIn;
    }

    // TODO
    // set session for current user, userId
}
