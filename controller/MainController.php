<?php
require_once 'view/LoginView.php';
require_once 'view/LayoutView.php';
require_once 'view/RegisterView.php';
require_once 'view/DateTimeView.php';
require_once 'controller/LoginController.php';


class MainController
{

    public function __construct()
    {
        $this->loginView = new LoginView();
        $this->layoutView = new LayoutView();
        $this->registerView = new RegisterView();
        $this->dtv = new DateTimeView();
        $this->lg = new LogInController();
    }



    public function render()
    {
        $this->layoutView->renderLayoutView(
            $this->loginView,
            $this->registerView,
            $this->dtv
        );
    }


 
}
