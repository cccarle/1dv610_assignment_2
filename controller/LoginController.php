<?php

include './model/Login.php';
require_once './view/LoginView.php';
require_once './controller/ErrorMessage.php';
require_once './controller/MainController.php';
require_once './controller/SessionController.php';

class LoginController
{

    private static $message = '';

    public function __construct()
    {
        $this->Err = new ErrorMessage();
        $this->session = new SessionController();

    }

     // TODO: move validation of credentails to view

    public function ValidateUserCredentials($username, $password)
    {

        if (empty($password)) {

            self::$message = $this->Err->noPasswordProvided();

        } elseif (strlen($password) < 6) {

            self::$message = $this->Err->passwordToShort();

        }

        if (empty($username)) {

            self::$message = $this->Err->noUsernameProvided();

        } elseif (strlen($username) < 3) {

            self::$message = $this->Err->userNameToShort();

        } elseif (empty(self::$message)) {

            $this->AttempToLogIn($username, $password);

        }
    }


    public function ShowUserResponseMessages()
    {
        return self::$message;

    }

    private function AttempToLogIn($username, $password)
    {
        new Login($username, $password);
    }


    public function GetErrorMessageFromDB($msgFromDB)
    {
        self::$message = $msgFromDB;
    }

    public function logOut()
    {
        self::$message = $this->Err->logOut();
        $this->session->logOutUser();
    }

    public function setUserSession()
    {
        $this->session->setToLoggedIn(true);
    }
}
