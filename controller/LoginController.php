<?php

//include './model/Register.php';
include './model/Login.php';
require_once './view/LoginView.php';

/**
 * LoginController
 * Controls everything that is authentication-login related
 */

class LoginController
{

    private static $errorMessages = '';

    public function ValidateUserCredentials($username, $password)
    {

        // Add error message to an array
        $data = [
            'name_err' => '',
            'password_err' => '',
        ];

        // Validate Password
        if (empty($password)) {

            $data['password_err'] = 'Please enter password';

        } elseif (strlen($password) < 6) {

            $data['password_err'] = 'Password must be at least 6 characters';

        }

        // Validate Username
        if (empty($username)) {

            $data['name_err'] = 'Please enter name';

        } elseif (strlen($username) < 3) {

            $data['name_err'] = 'Username must be at least 3 characters';

        }

        // If there is no errors, call db to register new user
        // else echo errors
        if ((empty($data['name_err']) && empty($data['password_err']))) {

            new Login($username, $password);

        } else {

            $comma_separated = implode(" ", $data);

            self::$errorMessages = $comma_separated;

        }

    }

    public function ShowErrorMessage()
    {
        return self::$errorMessages;
    }

}
