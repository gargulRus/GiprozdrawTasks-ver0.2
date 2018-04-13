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
if(isset($_POST['pz'])){
    $pz = 1;
}else {
    $pz = 2;
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

//проверяем наличие записи в ячейке. Если true делаем if
//если false делаем else

if(is_numeric( $id)){

    $result6 = query("SELECT progress FROM plancontrol WHERE id=".$id);
    while($list4 = mysqli_fetch_assoc($result6)){
        $cnt=$list4['progress'];
    }

    if($pz==1){
        $cnt=$cnt+30;
        if($graph==1){
            $cnt=$cnt+30;
            if($spec==1){
                $cnt=$cnt+30;
                echo "ошибка!!";
                echo $cnt;
            }else{
                    echo "сп есть, вносим гч, вносим пз";
                    $result6 = query("UPDATE plancontrol SET pz = '1', gh = '1',progress = '$cnt' WHERE id=".$id);
            }
        }elseif($spec==1){
            $cnt=$cnt+30;
            echo "гч есть, вносим сп, вносим пз";
            $result6 = query("UPDATE plancontrol SET pz = '1', sp = '1',progress = '$cnt' WHERE id=".$id);
        }else{
            echo "сп есть, гч есть , вносим пз";
            $result6 = query("UPDATE plancontrol SET pz = '1' ,progress = '$cnt' WHERE id=".$id);
        }  
    }elseif($graph==1){
        $cnt=$cnt+30;
        if($spec==1){
            $cnt=$cnt+30;
            echo "пз есть, вносим гч, вносим сп";
            $result6 = query("UPDATE plancontrol SET sp = '1', gh = '1',progress = '$cnt' WHERE id=".$id);
        }else{
            echo "сп есть, пз есть , вносим гч";
            $result6 = query("UPDATE plancontrol SET gh = '1' ,progress = '$cnt' WHERE id=".$id);
        }
    }elseif($spec==1){
        $cnt=$cnt+30;
        echo "пз есть, гч есть, вносим сп";
        $result6 = query("UPDATE plancontrol SET sp = '1' ,progress = '$cnt' WHERE id=".$id);
    }else{
        echo "Данные уже заполнены!";
    }
}else{
    //проверяем какие чекбоксы пришли, и на основе этого делаем запись в базу.
    if($pz==1){
        $count=$count+30;
        if($graph==1){
            $count=$count+30;
            if($spec==1){
                $count=$count+30;
                $result = query ("INSERT INTO `plancontrol` (`object_id`, `pos_num`, `progress`, `pz`, `gh`, `sp`) VALUES ('".$objid."', '".$pos_num."', '".$count."', '".$pz."', '".$graph."', '".$spec."' )");
                }else{
                $result = query ("INSERT INTO `plancontrol` (`object_id`, `pos_num`, `progress`, `pz`, `gh`) VALUES ('".$objid."', '".$pos_num."', '".$count."', '".$pz."', '".$graph."')");
                }
        }elseif ($spec==1) {
            $count=$count+30;
            $result = query ("INSERT INTO `plancontrol` (`object_id`, `pos_num`, `progress`, `pz`, `sp`) VALUES ('".$objid."', '".$pos_num."', '".$count."', '".$pz."', '".$spec."' )");
        }else{
            $result = query ("INSERT INTO `plancontrol` (`object_id`, `pos_num`, `progress`, `pz`) VALUES ('".$objid."', '".$pos_num."', '".$count."', '".$pz."')");
        }
    }elseif($graph==1){
        $count=$count+30;
        if($spec==1){
            $count=$count+30;
            $result = query ("INSERT INTO `plancontrol` (`object_id`, `pos_num`, `progress`, `gh`, `sp`) VALUES ('".$objid."', '".$pos_num."', '".$count."', '".$graph."', '".$spec."' )");
            }else{
            $result = query ("INSERT INTO `plancontrol` (`object_id`, `pos_num`, `progress`, `gh`) VALUES ('".$objid."', '".$pos_num."', '".$count."', '".$graph."' )");

            }
    }else if($spec==1){
        $count=$count+30;
        $result = query ("INSERT INTO `plancontrol` (`object_id`, `pos_num`, `progress`, `sp`) VALUES ('".$objid."', '".$pos_num."', '".$count."', '".$spec."' )");
    }else{
        echo "Сохранять нечего!";
    }
}

?>

<h4><i class="fas fa-sync fa-spin"></i></h4>
<script type="text/javascript">
$( document ).ready(function() {
	setTimeout(function(){ location.reload(); }, 500);
 

});
</script>