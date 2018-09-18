<?php

class ErrorMessage
{
    // Display error messages

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
        return 'Username must be at least 3 characters';
    }

    public function passwordToShort()
    {
        return 'Password must be at least 6 characters';
    }

    public function userNameDoesNotExist()
    {
        return 'Username does not exist';

    }

    public function incorrectCredentials()
    {

        return 'Wrong Password or Username';

    }

    public function loginAttempSuccessful()
    {

        return 'Log in went successful';

    }

    public function passwordNotMatch()
    {
        return 'Password do not match';
    }

    public function usernameAlreadyTaken()
    {
        return 'Username aldready taken';
    }
    
    public function somethingWentWrong()
    {
        return 'Something went wrong, please try register again';
    }
}
