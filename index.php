<?php

// ini_set('display_errors',1); //Включаем ошибка в конфигурации PHP
session_start(); 
//error_reporting(0); //Протокол ошибок выключен
// error_reporting(-1); //Вывод всех ошибок

//подключаем базу
include_once(__DIR__."/core/connect.php");
include_once(__DIR__."/core/functions.php");

// Установимть админские права:
// в ссылке браузера добавить ?mode=admin
// тогда будет работать блок php дающий возможность управлять таблицей
if(isset($_GET['mode']) && !empty($_GET['mode'])){
  if(!in_array($_GET['mode'],array('spec','gip','arhiv','admin','expert')) ){ die('Неправильный режим доступа'); }
  $_SESSION['mode'] = $_GET['mode'];
}


//данная конструкция вызывается при обращении ?save="#"
//выполняет код скрипта и останаливает дальнейший вывод.
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
?>