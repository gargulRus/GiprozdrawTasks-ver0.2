<?php

session_start(); 
// error_reporting(0); //Протокол ошибок выключен
//ini_set('display_errors',1); //Включаем ошибка в конфигурации PHP
//error_reporting(-1); //Вывод всех ошибок
include_once(__DIR__."/core/connect.php");
include_once(__DIR__."/core/functions.php");
if ($_COOKIE['login']==""){
  echo '
  <link rel="stylesheet" href="css/form.css">
  <link rel="stylesheet" href="/plugins/fontawesome/css/fontawesome-all.min.css">
  <div class="formposition">
    <div class="container">
      <div class="row">
        <div class="col-md-offset-3 col-md-6">
          <form class="form-horizontal" action="enter.php" method="POST">
            <span class="heading">Пожалуйста, войдите в систему.</span>
            <div class="form-group">
            <input type="text" class="form-control" name="login" id="inputlogin" placeholder="Логин">
            <i class="fa fa-user"></i>
            </div>
            <div class="form-group help">
            <input type="password" class="form-control" name="pass" id="inputpass" placeholder="Пароль">
            <i class="fa fa-lock"></i>
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-default">ВХОД</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
';
echo "<div class='footer-form'>
        <p>© АО &quot;Гипроздрав&quot; "; echo date("Y");echo "</p>
      </div>";

}

if(empty($_COOKIE['login'])){

}else{
  if(isset($_GET['save'])){
  include(__DIR__.'/save/'.$_GET['save'].'.php');
  exit;
}

//Обновленный ajax обработчик
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
  sleep(1);
  load_modal();
  exit;
}

include(__DIR__.'/template/index.php');
}
?>