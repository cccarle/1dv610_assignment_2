<?php

require_once "./controller/RegisterController.php";

class RegisterView
{

    private static $register = 'RegisterView::Register';
    private static $logout = 'RegisterView::Logout';
    private static $name = 'RegisterView::Username';
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

    public function renderRegisterView()
    {
        $message = '';

        if (!empty($_POST)) {
            $this->registerController->ValidateUserCredentials($this->getRequestUserName(), $this->getRequestUserPassword(), $this->getRequestUserPassword2());
            $message = $this->registerController->ShowUserResponseMessages();
        }

        $response = $this->generateRegisterFormHTML($message);

        return $response;
    }

    private function generateRegisterFormHTML($message)
    {
        return '
			<form method="post"  >
				<fieldset>
					<legend>Register a new user - Enter Username and password</legend>
					<p id="' . self::$messageId . '">' . $message . '</p>
					<label for="' . self::$name . '">Username :</label>
					<input type="text" name="' . self::$name . '"  id="' . self::$name . '" value="' . $this->getRequestUserName() . '" />
					<label for="' . self::$password . '">Password :</label>
                    <input type="password" id="' . self::$password . '" name="' . self::$password . '" />
					<label for="' . self::$passwordRepeat . '"> Repeat password :</label>
                    <input type="password" id="' . self::$passwordRepeat . '" name="' . self::$passwordRepeat . '" />
					<input type="submit" name="' . self::$register . '" value="Register" />
				</fieldset>
			</form>
		';
    }

    private function getRequestUserName()
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
        $password = self::$password;

        if (isset($_POST[$password])) {
            return $_POST[$password];
        } else {
            return "";
        }
    }

    private function getRequestUserPassword2()
    {
        $passwordRepeat = self::$passwordRepeat;

        if (isset($_POST[$passwordRepeat])) {
            return $_POST[$passwordRepeat];
        } else {
            return "";
        }
    }
}