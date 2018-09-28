<?php

$task_id = $_POST['task_id'];
$object_id=$_POST['object_id'];
$pos_num=$_POST['pos_num'];
$progress=95;

$update = array();


//Рассчитываем процент
$responce = array();
$plan = arhiv_list($pos_num);
foreach($plan['tasks'] as $key=>$task){
    $update[$key]=(isset($_POST[$key]))?1:0;
    if($update[$key]==1){
        $progress+=$task['percent'];
        $responce[]='Отмечено: '.$task['title'];
    }
}



//Создаем новую запись
if($task_id=='new'){

    $keys=array(); $values=array(); 
    foreach ($update as $key => $value) { 
        $keys[]='`'.$key.'`'; 
        $values[]="'".$value."'";
    }

    $sql = "INSERT INTO `plancontrol` (`object_id`, `pos_num`, `progress`, ".implode(',',$keys).") 
    VALUES ('".$object_id."', '".$pos_num."', '".$progress."', ".implode(',',$values)." )";

    $result = query ($sql);

    echo implode('<br>',$responce);
}

//Обновляем запись
if(is_numeric($task_id)){
    $sql_update=array();
    foreach ($update as $key => $val) {
        $sql_update[]="`".$key."` = '".$val."'";
    }
    
    $sql = "UPDATE plancontrol SET ";
    $sql.= implode(',',$sql_update);
    $sql.=",  `progress` = '".$progress."' WHERE id='".$task_id."' LIMIT 1";
    // `arhgh` = NULL, `arhpdf` = NULL,
    $result = query($sql);
    echo implode('<br>',$responce);

}
// $numbers="ыва";
// $numbers = (int)$numbers;
// if(is_int($numbers) && $numbers>=10){
//     echo 'num'.$numbers;
//     }else{echo 'false';}
?>
<h4><i class="fas fa-sync fa-spin"></i></h4>

<meta http-equiv="refresh" content="2">