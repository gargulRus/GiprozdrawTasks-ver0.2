<?php
$action; //переменная для вывода действия

//Проверяем чекбокс на удаление
if(isset($_POST['deletekr'])){
  $del=1;
}else{
   $del=2;
}
//Проверяем чекбокс на переименование
if(isset($_POST['renamekr'])){
  $ren=1;
}else{
   $ren=2;
}
//Потому-что мне так удобно
$name=$_POST['name'];
$id=$_POST['idkr'];
$rename=$_POST['rename'];

/*
Проверяем первое поле в модальном окне,
если там есть символы - создаем новую запись в базе
если нет - проверяем оба чекбокса, - если были отмечены оба - выводим ошибку
если есть чекбос на удаление - удаляем запись по id
если есть чекбокс на переименование - переименовываем запись по id
*/

if(strlen($_POST['name'])>1){
    $action = "Создаю КР";
    $result = query ("INSERT INTO kr (krname) VALUES ('$name')");
}elseif($del==1 && $ren==1){
    echo "ОШИБКА!";
}elseif($del==1){
    $action = "Удаляю КР";
    $result1 = query ("DELETE FROM kr WHERE id='$id'");
}elseif($ren==1){
    $action = "Переименовываю КР";
    $result2 = query ("UPDATE kr SET krname = '$rename' WHERE id='$id'");
}

?>
<div class="fomrobject">
<h4> <?php echo $action; ?>  <i class="fas fa-sync fa-spin"></i></h4>
<script type="text/javascript">
$( document ).ready(function() {
	setTimeout(function(){ location.reload(); }, 1500);
 

});
</script>
</div>