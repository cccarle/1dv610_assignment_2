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

    private static $message = '';

    public function ValidateUserInfo($username, $passwordFromUser)
    {

        // Add error message to an array
        $data = [
            'name_err' => '',
            'password_err' => '',
        ];

        // Validate Password
        if (empty($passwordFromUser)) {

            $data['password_err'] = 'Password is missing';

        } elseif (strlen($passwordFromUser) < 6) {

            $data['password_err'] = 'Password must be at least 6 characters';

        }

        // Validate Username
        if (empty($username)) {

            $data['name_err'] = 'Username is missing';

        } elseif (strlen($username) < 3) {

            $data['name_err'] = 'Username must be at least 3 characters';

        }

        // If there is no errors, call db to register new user
        // else echo errors
        if ((empty($data['name_err']) && empty($data['password_err']))) {

            $registerNewUser = new Login($username, $passwordFromUser);

        } else {

            $comma_separated = implode(" ", $data);

            self::$message = $comma_separated;

        }

    }

    public function ShowErrorMessage()
    {
        return self::$message;



    }

    public static function isLoggedIn($isLoggedIn)
    {

        echo $isLoggedIn;
    }
}
