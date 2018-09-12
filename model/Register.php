<?php
include './lib/Database.php';

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

        $this->Register();
    }

    /*
    Register user
     */

    public function Register()
    {
        // hash password
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);

        $this->db->query('INSERT INTO users(user_username,user_password) VALUES(:user_username,:user_password)');
        // Bind values
        $this->db->bind(':user_username', $this->username);
        $this->db->bind(':user_password', $this->password);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
