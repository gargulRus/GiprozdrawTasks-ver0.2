<?php
//Смотри коментарии в newgip.php
$action;
if(isset($_POST['deleteexp'])){
  $del=1;
}else{
   $del=2;
}

if(isset($_POST['renameexp'])){
  $ren=1;
}else{
   $ren=2;
}

$name=$_POST['name'];
$id=$_POST['idexp'];
$rename=$_POST['rename'];

if(strlen($_POST['name'])>1){
    $action = "Создаю Ответственного";
    $result = query ("INSERT INTO experts (exp_name) VALUES ('$name')");
}elseif($del==1 && $ren==1){
    echo "ОШИБКА!";
}elseif($del==1){
    $action = "Удаляю Ответственного";
    $result1 = query ("DELETE FROM experts WHERE id='$id'");
}elseif($ren==1){
    $action = "Переименовываю Ответственного";
    $result2 = query ("UPDATE experts SET exp_name = '$rename' WHERE id='$id'");
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