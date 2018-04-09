<?php
$rename = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$id = $_POST['id'];

$action;
if(isset($_POST['deleteobject'])){
  $del=1;
}else{
   $del=2;
}
if ($del==2){
	$result = query ("UPDATE objects SET name = '$rename' WHERE id='$id'");
	$action=" изменяется";
}else {
	$result2 = query ("DELETE FROM objects WHERE id='$id'");
	$action=" удаляется";
}
?>

<div class="fomrobject">
<h4>Объект <?php echo $action; ?>  <i class="fas fa-sync fa-spin"></i></h4>
<script type="text/javascript">
$( document ).ready(function() {
	setTimeout(function(){ location.reload(); }, 1500);
 

});
</script>
</div>