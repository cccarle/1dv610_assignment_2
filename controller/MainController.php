<?php
require_once 'view/LoginView.php';
require_once 'view/LayoutView.php';
require_once 'view/RegisterView.php';
require_once 'view/LoggedInView.php';
require_once 'view/DateTimeView.php';


class MainController
{
    private static $so = true;

    public function __construct()
    {
        $this->loginView = new LoginView();
        $this->layoutView = new LayoutView();
        $this->registerView = new RegisterView();
        $this->loggedInView = new LoggedInView();
        $this->dtv = new DateTimeView();
    }

    public function render()
    {
        $this->layoutView->renderLayoutView(
            self::$so,
            $this->loginView,
            $this->registerView,
            $this->loggedInView,
            $this->dtv
        );
    }

    public function setToLoggedIn()
    {
        self::$so = true;
    }
}
