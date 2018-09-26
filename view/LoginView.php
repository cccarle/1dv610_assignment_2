<?php

require_once "./controller/LoginController.php";

class LoginView
{
    private static $login = 'LoginView::Login';
    private static $name = 'LoginView::UserName';
    private static $password = 'LoginView::Password';
    private static $cookieName = 'LoginView::CookieName';
    private static $cookiePassword = 'LoginView::CookiePassword';
    private static $keep = 'LoginView::KeepMeLoggedIn';
    private static $messageId = 'LoginView::Message';
    private static $logout = 'LoginView::Logout';

    /**
     * Create HTTP response
     *
     * Should be called after a login attempt has been determined
     *
     * @return  void BUT writes to standard output and cookies!
     */

    public function __construct()
    {
        $this->loginController = new LoginController();

        $this->session = new SessionController();
    }

    public function renderLogInForm()
    {
        $message = '';

        if (!empty($_POST)) {
            $this->loginController->ValidateUserCredentials($this->getRequestUserName(), $this->getRequestUserPassword());
            $message = $this->loginController->ShowErrorMessage();
        } else {
            $message = '';
        }

        if (!$this->session->checkIfLoggedIn() === true) {

            $response = $this->generateLoginFormHTML($message);

        } else {
            
            $response = $this->generateLogoutButtonHTML($message);
        }


        if(!empty($_REQUEST[self::$logout])) {
            
            $message='Bye Bye!';

            $response = $this->generateLoginFormHTML($message);
        }
        


        return $response;
    }

    /**
     * Generate HTML code on the output buffer for the logout button
     * @param $message, String output message
     * @return  void, BUT writes to standard output!
     */
    private function generateLogoutButtonHTML($message)
    {
        return '
			<form  method="post" >
				<p id="' . self::$messageId . '">' . $message . '</p>
				<input type="submit" name="' . self::$logout . '" value="logout"/>
			</form>
		';
    }

    /**
     * Generate HTML code on the output buffer for the logout button
     * @param $message, String output message
     * @return  void, BUT writes to standard output!
     */

    private function generateLoginFormHTML($message)
    {
        return '
			<form method="post" >
				<fieldset>
					<legend>Login - Enter Username and password</legend>
					<p id="' . self::$messageId . '">' . $message . '</p>
					<label for="' . self::$name . '">Username :</label>
					<input type="text" id="' . self::$name . '" name="' . self::$name . '" value="' . $this->getRequestUserName() . '" />
					<label for="' . self::$password . '">Password :</label>
					<input type="password" id="' . self::$password . '" name="' . self::$password . '" />
					<label for="' . self::$keep . '">Keep me logged in  :</label>
					<input type="checkbox" id="' . self::$keep . '" name="' . self::$keep . '" />

					<input type="submit" name="' . self::$login . '" value="login" />
				</fieldset>
			</form>
		';
    }

    //CREATE GET-FUNCTIONS TO FETCH REQUEST VARIABLES
    public function getRequestUserName()
    {
        $name = self::$name;
        if (isset($_POST[$name])) {
            return $_REQUEST[$name];
        } else {
            return "";
        }
    }


    private function getRequestUserPassword()
    {
        //RETURN REQUEST VARIABLE: USERNAME
        $password = self::$password;
        if (isset($_POST[$password])) {
            return $_POST[$password];
        } else {
            return "";
        }
    }
}
