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
	$action=" переименован";
}else {
	$result2 = query ("DELETE FROM objects WHERE id='$id'");
	$action=" удален";
}
?>

<div class="fomrobject">

<h4>Объект <?php echo $action; ?>, ждите.. </h4>
<meta http-equiv="refresh" content="3">

</div>