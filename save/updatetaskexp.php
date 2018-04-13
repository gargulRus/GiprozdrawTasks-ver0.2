<?php
$id = $_POST['id'];
$objid=$_POST['object-id'];
$pos_num=$_POST['pos'];
$progress = $_POST['progress'];
$expprog = $_POST['name'];

$action;
if(isset($_POST['deleteobject'])){
  $del=1;
}else{
   $del=2;
}
if(is_numeric( $id)){
     if($del==1){
        $result2 = query ("DELETE FROM planexpert WHERE id='$id'");
        $action = "Удаляем замечания";
     }else{
        $result6 = query("UPDATE planexpert SET exp_num = '$expprog' WHERE id=".$id);
        $action = "Меняем кол-во замечаний";
     }
}else{
    $result = query ("INSERT INTO `planexpert` (`object_id`, `pos_num`, `exp_num`) VALUES ('".$objid."', '".$pos_num."', '".$expprog."')");
    $action = "Устанавливаем кол-во замечаний";
}

?>

<div class="fomrobject">
<h4><?php echo $action; ?>  <i class="fas fa-sync fa-spin"></i></h4>
<script type="text/javascript">
$( document ).ready(function() {
	setTimeout(function(){ location.reload(); }, 1500);
 

});
</script>
</div>