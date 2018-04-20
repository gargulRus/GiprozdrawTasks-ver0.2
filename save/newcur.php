<?php
//Смотри коментарии в newgip.php
$action;
if(isset($_POST['deletecur'])){
  $del=1;
}else{
   $del=2;
}

if(isset($_POST['renamecur'])){
  $ren=1;
}else{
   $ren=2;
}

$name=$_POST['name'];
$id=$_POST['idcur'];
$rename=$_POST['rename'];

if(strlen($_POST['name'])>1){
    $action = "Создаю Куратора";
    $result = query ("INSERT INTO curators (cur_name) VALUES ('$name')");
}elseif($del==1 && $ren==1){
    echo "ОШИБКА!";
}elseif($del==1){
    $action = "Удаляю Куратора";
    $result1 = query ("DELETE FROM curators WHERE id='$id'");
}elseif($ren==1){
    $action = "Переименовываю Куратора";
    $result2 = query ("UPDATE curators SET cur_name = '$rename' WHERE id='$id'");
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