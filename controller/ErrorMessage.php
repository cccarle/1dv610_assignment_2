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

}
