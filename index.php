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

}elseif($_COOKIE['login']=='levin'){
  $_SESSION['mode']='admin';
}elseif($_COOKIE['login']=='spec' 
|| $_COOKIE['login']=='gip' || $_COOKIE['login']=='genplan' || $_COOKIE['login']=='kr' || $_COOKIE['login']=='eom' || $_COOKIE['login']=='vk'
|| $_COOKIE['login']=='ov' || $_COOKIE['login']=='ot' || $_COOKIE['login']=='hs' || $_COOKIE['login']=='ts' || $_COOKIE['login']=='itp' || $_COOKIE['login']=='ss' 
|| $_COOKIE['login']=='mg' || $_COOKIE['login']=='th' || $_COOKIE['login']=='avtom' || $_COOKIE['login']=='pos' || $_COOKIE['login']=='atz' || $_COOKIE['login']=='oos' 
|| $_COOKIE['login']=='ppm' || $_COOKIE['login']=='gocs' || $_COOKIE['login']=='odi' || $_COOKIE['login']=='ee' || $_COOKIE['login']=='smeti' || $_COOKIE['login']=='beo' 
|| $_COOKIE['login']=='ozds' || $_COOKIE['login']=='amelko' || $_COOKIE['login']=='gurianov' || $_COOKIE['login']=='verstunina'
|| $_COOKIE['login']=='soloviova' || $_COOKIE['login']=='zukova' || $_COOKIE['login']=='glazkov'  || $_COOKIE['login']=='semenova' 
|| $_COOKIE['login']=='belakov'  || $_COOKIE['login']=='vasenkov'  || $_COOKIE['login']=='gavrilin'  || $_COOKIE['login']=='polakov' 
|| $_COOKIE['login']=='yaskov'  || $_COOKIE['login']=='Isemenova'
){
  $_SESSION['mode']='spec';
}elseif($_COOKIE['login']=='gip'){
  $_SESSION['mode']='gip';
}elseif($_COOKIE['login']=='arhc'){
  $_SESSION['mode']='spec';
}elseif($_COOKIE['login']=='arhiv'){
  $_SESSION['mode']='arhiv';
}elseif($_COOKIE['login']=='expert'){
  $_SESSION['mode']='expert';
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