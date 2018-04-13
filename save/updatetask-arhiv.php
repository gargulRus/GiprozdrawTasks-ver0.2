<?php

$id = $_POST['id'];
$objid=$_POST['object-id'];
$pos_num=$_POST['pos'];
$progress = $_POST['progress'];


if(isset($_POST['pz'])){
    $pz = 1;
}else {
    $pz = 2;
}

$count=0;

// echo $id . " ID";
// echo '<br>';
// echo $objid . " OBID";
// echo '<br>';
// echo $pos_num ." POSNUM";
// echo '<br>';
// echo $progress . " PROGRESS";
// echo '<br>';
// echo $graph ." GH" ;
// echo '<br>';
// echo $pz ." PZ";
// echo '<br>';
// echo $spec ." SPEC";
// echo '<br>';

//проверяем наличие записи в ячейке. Если true делаем if
//если false делаем else

if(is_numeric( $id)){

    $result6 = query("SELECT progress FROM plancontrol WHERE id=".$id);
    while($list4 = mysqli_fetch_assoc($result6)){
        $cnt=$list4['progress'];
    }

    if($pz==1){
        $cnt=$cnt+10;
        echo "Подтверждаю прием документации! ";
        $result6 = query("UPDATE plancontrol SET arch = '1' ,progress = '$cnt' WHERE id=".$id);
        }else{
            echo "Не могу подтвердить! Пусто или ошибка!";
        }  
    }else{
        echo "Не могу подтвердить! Пусто или ошибка!";
    }
?>

<h4><i class="fas fa-sync fa-spin"></i></h4>
<script type="text/javascript">
$( document ).ready(function() {
	setTimeout(function(){ location.reload(); }, 500);
 

});
</script>