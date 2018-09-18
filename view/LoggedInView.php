<?php
class LoggedInView
{

    public function generateLoggedInView()
    {

        $response = $this->generateLoggedInHTML();
        return $response;
    }

    private function generateLoggedInHTML()
    {
        return '
            <h1>Welcome to your page </h1>
            <input type="submit" name="" value="logut" />		';
    }
}
