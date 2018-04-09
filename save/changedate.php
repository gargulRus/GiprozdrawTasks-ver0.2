<?php
$id = $_POST['id'];
$obid = $_POST['object-id'];
$date = $_POST['date'];
$pos_num = $_POST['pos_num'];
$newdate = $_POST['calendar'];

if(isset($_POST['deletedate'])){
  $del=1;
}else{
   $del=2;
}

if ($del==2){
    if(strlen($date)>1){
        if(strlen($newdate)>1){
            $result = query ("UPDATE jobplan SET data = '$newdate' WHERE id='$id'");
            $action="Меняем дату ";
        }else{
            $action="Вы не указали дату! ";
        }      
    }else{
        if(strlen($newdate)>1){
            $result = query ("INSERT INTO `jobplan` (`object_id`, `pos_num`, `data`)
            VALUES ('".$obid."', '".$pos_num."', '".$newdate."')");
            $action="Меняем дату ";
        }else{
            $action="Вы не указали дату! ";
        }
    }
}else {
    if(strlen($date)>1){
	$result2 = query ("DELETE FROM jobplan WHERE id='$id'");
    $action="Снимаем дату";
    }else{
        $action="Даты нет!";
    }
}

?>

<div class="fomrobject">
<h4><?php echo $action; ?> <i class="fas fa-sync fa-spin"></i></h4>
<script type="text/javascript">
$( document ).ready(function() {
	setTimeout(function(){ location.reload(); }, 1500);
 

});
</script>
</div>