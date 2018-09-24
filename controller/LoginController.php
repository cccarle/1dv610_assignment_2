<?php

include './model/Login.php';
require_once './view/LoginView.php';
require_once './controller/ErrorMessage.php';
require_once './controller/MainController.php';
require_once './controller/SessionController.php';

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
        $this->session = new SessionController();

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

        } elseif (empty(self::$message)) {

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

    /*
    Retrive any error message from the DB when an attemp to log in has been made.
     */

    public function GetErrorMessageFromDB($msgFromDB)
    {
        self::$message = $msgFromDB;
    }

    public function createUserSession($user)
    {

        $this->session->setToLoggedIn(true);

    }
}
