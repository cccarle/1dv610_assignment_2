<?php
require_once './lib/Database.php';
require_once './controller/LoginController.php';

class Login
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

        $this->Login();
    }

    /*
    Login user
     */

    public function Login()
    {
        $this->db->query('SELECT * FROM users WHERE user_username = :user_username');
        $this->db->bind(':user_username', $this->username);

        $row = $this->db->single();

        $hashed_password = $row->user_password;

        if (!$hashed_password) {
            // handle if there is no user here
            echo 'there is no user with this usernme';
        }

        // om hasat lösen passar med inskriva lösen,
        if (password_verify($this->password, $hashed_password)) {
          
            echo 'logged in';

        } else {

            echo 'Wrong Password or Username';

        }
    }
}
