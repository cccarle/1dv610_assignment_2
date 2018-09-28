<?php

require_once './controller/ErrorMessage.php';
require_once './model/Register.php';

class RegisterController
{

    private static $message = '';

    public function __construct()
    {
        $this->Err = new ErrorMessage();
    }

    // TODO: move validation of credentails to view

    public function ValidateUserCredentials($username, $password, $password2)
    {

        if (empty($password)) {

            self::$message .= $this->Err->passwordToShort();

        } elseif (strlen($password) < 6) {

            self::$message = $this->Err->passwordToShort();

        } elseif ($password != $password2) {

            self::$message = $this->Err->passwordNotMatch();

        }

        if (empty($username)) {

            self::$message .= $this->Err->userNameToShort();

        } elseif (strlen($username) < 3) {

            self::$message = $this->Err->userNameToShort();

        } elseif (preg_match("/[^A-Za-z0-9]/", $username)) {

            $username = preg_replace('/[^\p{L}\p{N}\s]/u', '', $username);

            self::$message = 'Username contains invalid characters.';

        } elseif (empty(self::$message)) {

            $this->AttempToRegisterNewUser($username, $password);

        }
    }

    public function ShowUserResponseMessages()
    {
        return self::$message;

    }

    private function AttempToRegisterNewUser($username, $password)
    {
        new Register($username, $password);
    }

    public function ShowUserReponseMessageFromDB($msgFromDB)
    {
        self::$message = $msgFromDB;
    }
}
