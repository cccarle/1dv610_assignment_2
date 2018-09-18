<?php
require_once './lib/Database.php';
require_once './controller/LoginController.php';
require_once './controller/MainController.php';
require_once './controller/ErrorMessage.php';

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
        $this->Err = new ErrorMessage();
        $this->lgController = new LoginController();
        $this->mainController = new MainController();
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

        // check that the row has an user found with the provide username
        if ($this->db->rowCount() > 0) {

            $hashed_password = $row->user_password;

            // om hasat lösen passar med inskriva lösen,
            if (password_verify($this->password, $hashed_password)) {
                $s = true;
                $this->lgController->GetErrorMessageFromDB($this->Err->loginAttempSuccessful());
                $this->mainController->setToLoggedIn();


            } else {

                 $this->lgController->GetErrorMessageFromDB($this->Err->incorrectCredentials());
            }

        } else {
            return $this->lgController->GetErrorMessageFromDB($this->Err->userNameDoesNotExist());
        }

    }
}
