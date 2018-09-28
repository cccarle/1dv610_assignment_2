<?php

require_once './controller/SessionController.php';
require_once './controller/RegisterController.php';

class LayoutView
{

    public function __construct()
    {
        $this->session = new SessionController();
    }

    public function renderLayoutView(LoginView $LoginView, RegisterView $RegisterView, DateTimeView $DateTimeView)
    {

        $view = null;

        if (isset($_GET["register"])) {
            $view = $RegisterView->renderRegisterView();
        } else {
            $view = $LoginView->renderLoginView();
        }

        echo '<!DOCTYPE html>
      <html>
          <head>
              <meta charset="utf-8">
              <title>Login Example</title>
          </head>
          <body>
              <h1>Assignment 2</h1>

              ' . $this->renderNavLinks() . '

              ' . $this->renderIsLoggedIn() . '

              <div class="container">
                  ' . $view . '

                  ' . $DateTimeView->show() . '
              </div>
          </body>
      </html>
  ';
    }

    private function renderIsLoggedIn()
    {
        if ($this->session->checkIfLoggedIn() === true) {
            return '<h2>Logged in</h2>';
        } else {
            return '<h2>Not logged in</h2>';
        }
    }

    private function renderNavLinks()
    {
        if (isset($_GET["register"])) {
            return '<a href="?">Back to login</a>';
        } elseif ($this->session->checkIfLoggedIn() === false) {
            return '<a href="/1dv610_assignment_2-master/?register">Register a new user</a>';
        }
    }
}
