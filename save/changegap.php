<?php
$id = $_POST['id'];
$idgap = $_POST['idgap'];

if(isset($_POST['deleteobject'])){
  $del=1;
}else{
   $del=2;
}

if ($del==2){
	$result = query ("UPDATE objects SET gap_id = '$idgap' WHERE id='$id'");
	$action="Меняем ";
}else {
	$result2 = query ("UPDATE objects SET gap_id = NULL WHERE id='$id'");
	$action="Снимаем ";
}

?>

<div class="fomrobject">
<h4><?php echo $action; ?> ГАПа <i class="fas fa-sync fa-spin"></i></h4>
<script type="text/javascript">
$( document ).ready(function() {
	setTimeout(function(){ location.reload(); }, 1500);
 

});
</script>
</div>