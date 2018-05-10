<?php

$task_id = $_POST['task_id'];
$object_id=$_POST['object_id'];
$pos_num=$_POST['pos_num'];
$progress=90;

$update = array();

echo $task_id." Ид Задачи";
echo $object_id." ИД объекта";
echo $pos_num." Номер раздела";

//Рассчитываем процент
$responce = array();
$plan = arhiv_listR($pos_num);
foreach($plan['tasks'] as $key=>$task){
    $update[$key]=(isset($_POST[$key]))?1:0;
    if($update[$key]==1){
        $progress+=$task['percent'];
        $responce[]='Отмечено: '.$task['title'];
    }
}

echo $progress." процент";

//Создаем новую запись
// if($task_id=='new'){

//     $keys=array(); $values=array(); 
//     foreach ($update as $key => $value) { 
//         $keys[]='`'.$key.'`'; 
//         $values[]="'".$value."'";
//     }

//     $sql = "INSERT INTO `plancontrol` (`object_id`, `pos_num`, `progress`, ".implode(',',$keys).") 
//     VALUES ('".$object_id."', '".$pos_num."', '".$progress."', ".implode(',',$values)." )";

//     $result = query ($sql);

//     echo implode('<br>',$responce);
// }

//Обновляем запись
if(is_numeric($task_id)){
    $sql_update=array();
    foreach ($update as $key => $val) {
        $sql_update[]="`".$key."` = '".$val."'";
    }
    
    $sql = "UPDATE plancontrolR SET ";
    $sql.= implode(',',$sql_update);
    $sql.=",  `progress` = '".$progress."' WHERE id='".$task_id."' LIMIT 1";
    // `arhgh` = NULL, `arhpdf` = NULL,
    $result = query($sql);
    echo implode('<br>',$responce);
    echo $sql;
}
?>
<h4><i class="fas fa-sync fa-spin"></i></h4>

<meta http-equiv="refresh" content="2">