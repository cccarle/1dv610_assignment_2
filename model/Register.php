<?php

require_once './lib/Database.php';
require_once './controller/RegisterController.php';
require_once './controller/ErrorMessage.php';

class Register
{
    private $db;
    private $username;
    private $password;

    /*
    Constructor
     * take in username & password
     * Initialize db conncetion
     */

    public function __construct($username, $password)
    {
        $this->db = new Database;
        $this->username = $username;
        $this->password = $password;
        $this->regController = new RegisterController();
        $this->Err = new ErrorMessage();
        $this->Register();
    }

    /*
    Register user
     */

    public function Register()
    {

        $this->db->query('SELECT * FROM users WHERE user_username = :user_username');
        $this->db->bind(':user_username', $this->username);

        $row = $this->db->single();

        // check that the row has an user found with the provide username
        if ($this->db->rowCount() > 0) {

            $this->regController->GetErrorMessageFromDB($this->Err->usernameAlreadyTaken());

        } else {
            // hash password
            $this->password = password_hash($this->password, PASSWORD_BCRYPT);

            $this->db->query('INSERT INTO users(user_username,user_password) VALUES(:user_username,:user_password)');
            
            // Bind values
            $this->db->bind(':user_username', $this->username);
            $this->db->bind(':user_password', $this->password);

            // Execute // om allt gick bra så läggs användare till i db
            if ($this->db->execute()) {
                return true;    // rendera startsida här
            } else {
                $this->regController->GetErrorMessageFromDB($this->Err->somethingWentWrong());
            }
        }

    }
}
