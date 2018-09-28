<?php

class ErrorMessage
{
    public function noUsernameProvided()
    {
        return 'Username is missing';
    }

    public function noPasswordProvided()
    {
        return 'Password is missing';
    }

    public function userNameToShort()
    {
        return 'Username has too few characters, at least 3 characters.';
    }

    public function passwordToShort()
    {
        return 'Password has too few characters, at least 6 characters.';
    }

    public function userNameDoesNotExist()
    {
        return 'Wrong name or password';
    }

    public function incorrectCredentials()
    {
        return 'Wrong name or password';
    }

    public function loginAttempSuccessful()
    {
        return 'Welcome';
    }

    public function logOut()
    {
        return 'Bye bye!';
    }

    public function passwordNotMatch()
    {
        return 'Passwords do not match.';
    }

    public function usernameAlreadyTaken()
    {
        return 'User exists, pick another username.';
    }
    
    public function somethingWentWrong()
    {
        return 'Something went wrong, please try register again';
    }
}
