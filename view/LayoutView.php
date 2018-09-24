<?php

require_once './controller/SessionController.php';

class LayoutView
{

    public function __construct()
    {

        $this->session = new SessionController();

    }

    public function renderLayoutView(LoginView $LoginView, RegisterView $RegisterView, DateTimeView $dtv)
    {
        $view = null;

        if (isset($_GET["register"])) {
            $view = $RegisterView->renderRegisterInForm();
        } elseif (!$this->session->checkIfLoggedIn()) {
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

              ' . $this->renderBackToLogInLink() . '

              ' . $this->renderIsLoggedIn() . '

              <div class="container">
                  ' . $view . '

                  ' . $dtv->show() . '
              </div>
          </body>
      </html>
  ';
    }

    private function renderIsLoggedIn()
    {
        if ($this->session->checkIfLoggedIn()) {
            return '<h2>Logged in</h2>';
        } else {
            return '<h2>Not logged in</h2>';
        }
    }

    private function renderBackToLogInLink()
    {
        if (isset($_GET["register"])) {
            return '<a href="/1dv610_assignment_2-master/">Back to login</a>';
        } elseif($this->session->checkIfLoggedIn() === false) {
            return '<a href="/1dv610_assignment_2-master/?register">Register a new user</a>';

        }
    }
}
