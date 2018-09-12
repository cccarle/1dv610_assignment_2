<?php

include './model/Register.php';

/**
 * LoginController
 * Controls everything that is authentication-login related
 */

class LoginController
{

    public static function ValidateUserInfo($username, $passwordFromUser)
    {

        $data = [
            'name_err' => '',
            'password_err' => '',
        ];

        // Validate Password
        if (empty($passwordFromUser)) {

            $data['password_err'] = 'Pleae enter password';

        } elseif (strlen($passwordFromUser) < 6) {

            $data['password_err'] = 'Password must be at least 6 characters';

        }

        // Validate Username
        if (empty($username)) {

            $data['name_err'] = 'Please enter name';

        } elseif (strlen($username) < 3) {

            $data['name_err'] = 'Username must be at least 3 characters';

        }

        // If there is no errors, call db to register new user
        if ((empty($data['name_err']) && empty($data['password_err']))) {

            $registerNewUser = new Register($username, $passwordFromUser);

        } else {
            foreach ($data as $value) {
                echo $value;
            }
        }

    }
}
