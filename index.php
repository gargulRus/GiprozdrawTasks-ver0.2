<?php

ini_set('display_errors',1); //Включаем ошибка в конфигурации PHP
session_start(); 
//error_reporting(0); //Протокол ошибок выключен
error_reporting(-1); //Вывод всех ошибок

//подключаем базу
include_once(__DIR__."/core/connect.php");


// Установимть админские права:
//в ссылке браузера добавить ?mode=admin
//тогда будет работать блок php дающий возможность управлять таблицей
// if(isset($_GET['mode']) && $_GET['mode'] == 'admin'){
//   $_SESSION['admin'] = true;
// }

//данная конструкция вызывается при обращении ?save="#"
//выполняет код скрипта и останаливает дальнейший вывод.
if(isset($_GET['save'])){
  include(__DIR__.'/save/'.$_GET['save'].'.php');
  exit;
}
//Грузим страницу по умолчанию. Без админских прав.
$page = (isset($_GET['page']))
    ? $_GET['page']
    : 'main.php';


?>
<!doctype html>
<html>
 <head>
        <meta charset="utf-8">
        <title>План работ АО "Гипроздорав"</title>
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/bootstrap.css">
         <link rel="shortcut icon" href="/image/logo.ico" type="image/x-icon">
         <link rel="stylesheet" href="/plugins/fontawesome/css/fontawesome-all.min.css">
         <script src="/scripts/clock.js"></script>
         <link rel="stylesheet" type="text/css" href="css/tcal.css" />
	
    </head>
    <body>
        <div class="one">
            <div class="two1">
                <img src="/image/logo.png" class="logoimg">
            </div>
            <div class="two2">
                <h1>ПЛАН РАБОТ АО ГИПРОЗДРАВ В 2018 Г.</h1>
            </div>
                        <div class="clock">
             <span id="doc_time"></span>
             <script type="text/javascript">
                 clock();
             </script>
           </div>
        </div>
        
<div class="content">
<a href="/?page=main.php" class="btn btn-gipro">План работ по договорам</a>
<a href="/?page=plancontrol.php" class="btn btn-gipro">Таблица контроля</a>
<a href="/?page=planforyear.php" class="btn btn-gipro">План работ на год</a>
  <!-- Если открыта сессия админа - выдаем главную страницу -->
  <!-- с редактируемой таблицей -->
              <?php
                if(isset($_SESSION['admin'])){
                    $page = (isset($_GET['page']))
                    ? $_GET['page']
                    : 'main.php';
                    include(__DIR__.'/pages/'.$page);
               } else{
                include(__DIR__.'/pages/'.$page);
               }
      ?>    

  </div>
      <!-- Site footer -->
      <div class="footer">
        <p>© АО &quot;Гипроздрав&quot; <?=date('Y');?></p>
      </div> <!-- /Site footer -->

    </div> <!-- /container -->
    </body>
</html>