<?php


class LayoutView {
  
  public function render($isLoggedIn, LoginView $v, DateTimeView $dtv) {
    echo '<!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Login Example</title>
        </head>
        <body>
          <h1>Assignment 2</h1>
          <a href="?register"> Register a new user</a>

          ' . $this->renderIsLoggedIn($isLoggedIn) . '
          
          <div class="container">
              ' . $v->response() . '
              
              ' . $dtv->show() . '
          </div>
         </body>
      </html>
    ';
  }
  
  private function renderIsLoggedIn($isLoggedIn) {
    if ($isLoggedIn) {
      return '<h2>Logged in</h2>';
    }
    else {
      return '<h2>Not logged in</h2>';
    }
  }

// check if it´s on register link
// TODO : find a way to make this dunamic

  // $rg = new RegisterView();

  // public function checkUrl(){
  //   if( $_SERVER['REQUEST_URI'] === 'http://192.168.64.2/1dv610_assignment_2-master/?register'){
  //     // rendera layoutView->render(false,$rg,$dtv)
  //   }
  // }

}
