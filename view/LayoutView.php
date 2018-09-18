<?php

class LayoutView
{

    public function renderLayoutView(bool $isLoggedIn, LoginView $LoginView, RegisterView $RegisterView, LoggedInView $LoggedInView, DateTimeView $dtv)
    {
        $view;

        if ($_SERVER['REQUEST_URI'] === '/1dv610_assignment_2-master/?register') {
            $view = $RegisterView->renderRegisterInForm();
        } elseif($isLoggedIn === true){
            $view = $LoggedInView->generateLoggedInView();
        } else {
            $view = $LoginView->renderLogInForm();
        }

        echo '<!DOCTYPE html>
      <html>
          <head>
              <meta charset="utf-8">
              <title>Login Example</title>
          </head>
          <body>
              <h1>Assignment 2</h1>
              ' . $this->renderIsLoggedIn($isLoggedIn) . '
              <div class="container">
                  ' . $view . '

                  '. $dtv->show() .'
              </div>
          </body>
      </html>
  ';
    }


    
    private function renderIsLoggedIn($isLoggedIn)
    {
        if ($isLoggedIn) {
            return '<h2>Logged in</h2>';
        } else {
            if ($_SERVER['REQUEST_URI'] != '/1dv610_assignment_2-master/?register') {
                return '<a href="?register">Register a new user</a>
                        <br/>
                        <h2>Not logged in</h2>';
            } else {
                if ($_SERVER['REQUEST_URI'] === '/1dv610_assignment_2-master/?register') {
                    return '<a href="/1dv610_assignment_2-master/">Back to login</a>
                            <br/>
                            <h2>Not logged in</h2>';
                }
            }
        }
    }
}
