<?php

$id = $_POST['id'];
$objid=$_POST['object-id'];
$pos_num=$_POST['pos'];
$progress = $_POST['progress'];

if(isset($_POST['graph'])){
    $graph = 1;
}else {
    $graph = 2;
}
if(isset($_POST['spec'])){
    $spec = 1;
}else {
    $spec = 2;
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
// echo 'Подстчет процентов';

//проверяем наличие записи в ячейке. Если true делаем if
//если false делаем else

if(is_numeric( $id)){
    $result6 = query("SELECT progress FROM plancontrolR WHERE id=".$id);
    while($list4 = mysqli_fetch_assoc($result6)){
        $cnt=$list4['progress'];
    }

        if($graph==1){
            $cnt=$cnt+40;
            if($spec==1){
                $cnt=$cnt+50;
                echo "ошибка!!";
                echo $cnt;
            }else{
                    echo "Вносим Графическую часть";
                    $result6 = query("UPDATE plancontrolR SET gh = '1',progress = '$cnt' WHERE id=".$id);
            }
        }elseif($spec==1){
            $cnt=$cnt+50;
            echo "Вносим Спецификацию";
            $result6 = query("UPDATE plancontrolR SET sp = '1',progress = '$cnt' WHERE id=".$id);
        }else{
            echo "Ошибка!";
        }  
}else{
    //проверяем какие чекбоксы пришли, и на основе этого делаем запись в базу.
        if($graph==1){
            $count=$count+40;
            if($spec==1){
                $count=$count+50;
                $result = query ("INSERT INTO `plancontrolR` (`object_id`, `pos_num`, `progress`, `gh`, `sp`) VALUES ('".$objid."', '".$pos_num."', '".$count."', '".$graph."', '".$spec."' )");
                echo "Вносим Графическую часть и Спецификацию";
            }else{
                $result = query ("INSERT INTO `plancontrolR` (`object_id`, `pos_num`, `progress`, `gh`) VALUES ('".$objid."', '".$pos_num."', '".$count."', '".$graph."')");
                echo "Вносим Графическую часть";
            }
        }elseif ($spec==1) {
            $count=$count+50;
            $result = query ("INSERT INTO `plancontrolR` (`object_id`, `pos_num`, `progress`, `sp`) VALUES ('".$objid."', '".$pos_num."', '".$count."', '".$spec."' )");
            echo "Вносим Спецификацию";
        }else{
            echo "Сохранять нечего!";
        }
    }

?>

<h4><i class="fas fa-sync fa-spin"></i></h4>
<script type="text/javascript">
$( document ).ready(function() {
	setTimeout(function(){ location.reload(); }, 1500);
 

});
</script>