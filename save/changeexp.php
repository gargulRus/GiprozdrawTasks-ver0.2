<?php
$id = $_POST['id'];
$idexp = $_POST['idexp'];

if(isset($_POST['deleteobject'])){
  $del=1;
}else{
   $del=2;
}

if ($del==2){
	$result = query ("UPDATE objects SET exp_id = '$idexp' WHERE id='$id'");
	$action="Меняем ";
}else {
	$result2 = query ("UPDATE objects SET exp_id = NULL WHERE id='$id'");
	$action="Снимаем ";
}

?>

<div class="fomrobject">
<h4><?php echo $action; ?> Отв. Эксп.<i class="fas fa-sync fa-spin"></i></h4>
<script type="text/javascript">
$( document ).ready(function() {
	setTimeout(function(){ location.reload(); }, 1500);
 

});
</script>
</div>