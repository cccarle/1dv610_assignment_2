<?php

require_once './controller/ErrorMessage.php';
require_once './model/Register.php';

/**
 * LoginController
 * Controls everything that is authentication-login related
 */

class RegisterController
{

    private static $message = '';

    public function __construct()
    {
        $this->Err = new ErrorMessage();
    }

    public function ValidateUserCredentials($username, $password, $password2)
    {

        /*
        Validate password
         */

        if (empty($password)) {

            self::$message .= $this->Err->passwordToShort();

        } elseif (strlen($password) < 6) {

            self::$message = $this->Err->passwordToShort();

        } elseif ($password != $password2) {

            self::$message = $this->Err->passwordNotMatch();
        }

        /*
        Validate username
         */

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

    private function AttempToRegisterNewUser($username, $password)
    {
        new Register($username, $password);
    }

    /*
    Retrive any error message from the DB when an attemp to log in has been made.
     */

    public function GetErrorMessageFromDB($msgFromDB)
    {
        self::$message = $msgFromDB;
    }

    public  function successRegistration()
    {

        return true;
    }

}