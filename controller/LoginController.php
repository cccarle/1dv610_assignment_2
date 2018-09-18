<?php

include './model/Login.php';
require_once './view/LoginView.php';
require_once './controller/ErrorMessage.php';

/**
 * LoginController
 * Controls everything that is authentication-login related
 */

class LoginController
{

    private static $message = '';

    public function __construct()
    {
        $this->Err = new ErrorMessage();
    }

    public function ValidateUserCredentials($username, $password)
    {

        /*
        Validate password
         */

        if (empty($password)) {

            self::$message = $this->Err->noPasswordProvided();

        } elseif (strlen($password) < 6) {

            self::$message = $this->Err->passwordToShort();

        }

        /*
        Validate username
         */

        if (empty($username)) {

            self::$message = $this->Err->noUsernameProvided();

        } elseif (strlen($username) < 3) {

            self::$message = $this->Err->userNameToShort();

        } else {

            $this->AttempToLogIn($username, $password);
        }
    }

    /*
    Return Error Message
     */

    public function ShowErrorMessage(): string
    {
        return self::$message;

    }

    /*
    Attemp to login.
     */

    private function AttempToLogIn($username, $password)
    {
        new Login($username, $password);
    }

}
