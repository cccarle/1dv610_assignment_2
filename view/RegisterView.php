<?php

class RegisterView
{

    private static $register = 'RegisterView::Login';
    private static $logout = 'RegisterView::Logout';
    private static $name = 'RegisterView::UserName';
    private static $password = 'RegisterView::Password';
    private static $password2 = 'RegisterView::Password2';
    private static $cookieName = 'RegisterView::CookieName';
    private static $cookiePassword = 'RegisterView::CookiePassword';
    private static $keep = 'RegisterView::KeepMeLoggedIn';
    private static $messageId = 'RegisterView::Message';


    public function renderRegisterInForm()
    {

        $message = '';

        $response = $this->generateRegisterFormHTML($message);

        return $response;
    }

    private function generateRegisterFormHTML($message)
    {
        return '
			<form method="post" >
				<fieldset>
					<legend>Register new user - enter Username and password</legend>
					<p id="' . self::$messageId . '">' . $message . '</p>

					<label for="' . self::$name . '">Username :</label>
					<input type="text" id="' . self::$name . '" name="' . self::$name . '" value="" />
					<br>
					<label for="' . self::$password . '">Password :</label>
					<input type="password" id="' . self::$password . '" name="' . self::$password . '" />
					<label for="' . self::$password2 . '">
					<br>
					 Password :</label>
					<input type="password" id="' . self::$password2 . '" name="' . self::$password2 . '" />
					<input type="submit" name="' . self::$register . '" value="register" />
				</fieldset>
			</form>
		';
    }
}
