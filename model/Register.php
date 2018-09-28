<?php

require_once './model/Database.php';
require_once './controller/RegisterController.php';
require_once './controller/ErrorMessage.php';

class Register
{
    private $db;
    private $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->db = new Database;
        $this->username = $username;
        $this->password = $password;
        $this->regController = new RegisterController();
        $this->Err = new ErrorMessage();
        $this->Register();
    }

    public function Register()
    {

        $this->db->query('SELECT * FROM users WHERE user_username = :user_username');
        $this->db->bind(':user_username', $this->username);

        $row = $this->db->single();

        // check that the row has an user found with the provide username
        if ($this->db->rowCount() > 0) {

            $this->regController->ShowUserReponseMessageFromDB($this->Err->usernameAlreadyTaken());

        } else {
            
            $this->password = password_hash($this->password, PASSWORD_BCRYPT);

            $this->db->query('INSERT INTO users(user_username,user_password) VALUES(:user_username,:user_password)');
            
            // Bind values
            $this->db->bind(':user_username', $this->username);
            $this->db->bind(':user_password', $this->password);

            if ($this->db->execute()) {
                $this->regController->successRegistration();
            } else {
                $this->regController->ShowUserReponseMessageFromDB($this->Err->somethingWentWrong());
            }
        }

    }
}
