<?php

require_once "./controller/RegisterController.php";


class RegisterView
{

    private static $register = 'RegisterView::Login';
    private static $logout = 'RegisterView::Logout';
    private static $name = 'RegisterView::UserName';
    private static $password = 'RegisterView::Password';
    private static $passwordRepeat = 'RegisterView::PasswordRepeat';
    private static $cookieName = 'RegisterView::CookieName';
    private static $cookiePassword = 'RegisterView::CookiePassword';
    private static $keep = 'RegisterView::KeepMeLoggedIn';
    private static $messageId = 'RegisterView::Message';


    public function __construct()
    {
        $this->registerController = new RegisterController();

    }

    public function renderRegisterInForm()
    {
		$message = '';
		
		if (!empty($_POST)) {
            $this->registerController->ValidateUserCredentials($this->getRequestUserName(), $this->getRequestUserPassword(), $this->getRequestUserPassword2());
            $message = $this->registerController->ShowErrorMessage();
        }

        $response = $this->generateRegisterFormHTML($message);

        return $response;
    }

    private function generateRegisterFormHTML($message)
    {
        return '
			<form method="post" >
				<fieldset>
					<legend>Register new user - Enter Username and password</legend>
					<p id="' . self::$messageId . '">' . $message . '</p>

					<label for="' . self::$name . '">Username :</label>
					<input type="text" id="' . self::$name . '" name="' . self::$name . '" value="" />
					<br>
					<label for="' . self::$password . '">Password :</label>
					<input type="password" id="' . self::$password . '" name="' . self::$password . '" />
					<label for="' . self::$passwordRepeat . '">
					<br>
					 Password :</label>
					<input type="password" id="' . self::$passwordRepeat . '" name="' . self::$passwordRepeat . '" />
					<input type="submit" name="' . self::$register . '" value="register" />
				</fieldset>
			</form>
		';
	}
	


    //CREATE GET-FUNCTIONS TO FETCH REQUEST VARIABLES
    private function getRequestUserName()
    {
        //RETURN REQUEST VARIABLE: USERNAME
        $username = $_REQUEST[self::$name];
        return $username;
    }

    private function getRequestUserPassword()
    {
        $password = $_REQUEST[self::$password];
        return $password;
    }


    private function getRequestUserPassword2()
    {
        $passwordRepeat = $_REQUEST[self::$passwordRepeat];
        return $passwordRepeat;
    }
}
