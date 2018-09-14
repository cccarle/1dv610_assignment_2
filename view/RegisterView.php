<?php

class RegisterView
{

    private function generateRegisterFormHTML($message)
    {
        return '
			<form method="post" name=" >
				<fieldset>
					<legend>Login - enter Username and password</legend>
					<p id="' . self::$messageId . '">' . $message . '</p>

					<label for="' . self::$name . '">Username :</label>
					<input type="text" id="' . self::$name . '" name="' . self::$name . '"  />

					<label for="' . self::$password . '">Password :</label>
					<input type="password" id="' . self::$password . '" name="' . self::$password . '" />

					<label for="' . self::$password2 . '">Password :</label>
					<input type="password" id="' . self::$password2 . '" name="' . self::$password2 . '" />

					<input type="submit" name="' . self::$login . '" value="login" />
				</fieldset>
			</form>
		';
    }
}
