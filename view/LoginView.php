<?php

require_once "./controller/LoginController.php";

class LoginView
{
    private static $login = 'LoginView::Login';
    private static $name = 'LoginView::UserName';
    private static $SavedUsername = 'LoginView::SavedUsername';
    private static $password = 'LoginView::Password';
    private static $cookieName = 'LoginView::CookieName';
    private static $cookiePassword = 'LoginView::CookiePassword';
    private static $keep = 'LoginView::KeepMeLoggedIn';
    private static $messageId = 'LoginView::Message';
    private static $logout = 'LoginView::Logout';

    public function __construct()
    {
        $this->loginController = new LoginController();
        $this->session = new SessionController();
    }

    // TODO 
    // Move out remove logincontroller connections
    // make all the if´s cleaner

    public function renderLoginView()
    {
        $message = '';

        if (!empty($_POST)) {
            $this->loginController->ValidateUserCredentials($this->getRequestUserName(), $this->getRequestUserPassword());
            $message = $this->loginController->ShowUserResponseMessages();
        } else {
            $message = '';
        }

        if ($this->session->checkIfLoggedIn() === true) {

            $response = $this->generateLogoutButtonHTML($message);
        } elseif ($this->session->checkIfRegistrationWasSucceded() === true) {
            
            $message = 'Registered new user.';
            $response = $this->generateLoginFormHTML($message);

        } else {
            $response = $this->generateLoginFormHTML($message);
        }

        if ($this->isLogOutButtonPressed()) {
            $this->loginController->logOut();
            $message = $this->loginController->ShowUserResponseMessages();
            $response = $this->generateLoginFormHTML($message);
        }

        return $response;

    }

    private function generateLogoutButtonHTML($message)
    {
        return '
			<form  method="post" >
				<p id="' . self::$messageId . '">' . $message . '</p>
				<input type="submit" name="' . self::$logout . '" value="logout"/>
			</form>
		';
    }

    private function generateLoginFormHTML($message)
    {
        return '
			<form method="post" >
				<fieldset>
					<legend>Login - Enter Username and password</legend>
					<p id="' . self::$messageId . '">' . $message . '</p>
					<label for="' . self::$name . '">Username :</label>
					<input type="text" id="' . self::$name . '" name="' . self::$name . '" value="' . $this->checkWhichInputValueForUsernameToShow() . '" />
					<label for="' . self::$password . '">Password :</label>
					<input type="password" id="' . self::$password . '" name="' . self::$password . '" />
					<label for="' . self::$keep . '">Keep me logged in  :</label>
					<input type="checkbox" id="' . self::$keep . '" name="' . self::$keep . '" />

					<input type="submit" name="' . self::$login . '" value="login" />
				</fieldset>
			</form>
		';
    }

    public function isLogOutButtonPressed()
    {
        return isset($_REQUEST[self::$logout]);
    }

    public function checkWhichInputValueForUsernameToShow()
    {
        if ($this->session->checkIfRegistrationWasSucceded()) {
            return $this->session->getRegUsername();
        } else {
            return $this->getRequestUserName();
        }
    }

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
        $password = self::$password;

        if (isset($_POST[$password])) {
            return $_POST[$password];
        } else {
            return "";
        }
    }
}
