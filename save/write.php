<?php
$action; //переменная для вывода действия
$user=$_COOKIE['login'];
//Проверяем чекбокс на удаление
if(isset($_POST['deleteob'])){
  $del=1;
}else{
   $del=2;
}
//Проверяем чекбокс на переименование
if(isset($_POST['renameob'])){
  $ren=1;
}else{
   $ren=2;
}

//Потому-что мне так удобно
$name=$_POST['name'];
$id=$_POST['idob'];
$rename=$_POST['rename'];

/*
Проверяем первое поле в модальном окне,
если там есть символы - создаем новую запись в базе
если нет - проверяем оба чекбокса, - если были отмечены оба - выводим ошибку
если есть чекбос на удаление - удаляем запись по id
если есть чекбокс на переименование - переименовываем запись по id
*/

if(strlen($_POST['name'])>1){
    $action = "Создаю Объект";
    $result = query ("INSERT INTO `objects` (`name`, `user`) VALUES ('".$name."', '".$user."')");
    $datanow= date("Y-m-d");   
    $text="В план работ добавлен новый объект ".$name." ".$datanow;
    $res = shell_exec ("sudo /var/www/html/scripts/sendob.sh '$text'");
}elseif($del==1 && $ren==1){
    echo "ОШИБКА!";
}elseif($del==1){
    $action = "Удаляю Объект";
    $result1 = query ("DELETE FROM objects WHERE id='$id'");
    $datanow= date("Y-m-d");   
    $text="Из плана работ удален объект ".$rename." ".$datanow;
    $res = shell_exec ("sudo /var/www/html/scripts/sendob.sh '$text'");
}elseif($ren==1){
    $action = "Переименовываю Объект";
    $result2 = query ("UPDATE objects SET name = '$rename' , user = '$user' WHERE id='$id'");
    $datanow= date("Y-m-d");   
    $text="В плане работ объект переименован ".$rename." ".$datanow;
    $res = shell_exec ("sudo /var/www/html/scripts/sendob.sh '$text'");
}
        

?>
<div class="fomrobject">
<h4> <?php echo $action; ?>  <i class="fas fa-sync fa-spin"></i></h4>
<script type="text/javascript">
$( document ).ready(function() {
	setTimeout(function(){ location.reload(); }, 2500);
 

});
</script>
</div>