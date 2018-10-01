<?php

$task_id = $_POST['task_id'];
$object_id=$_POST['object_id'];
$pos_num=$_POST['pos_num'];
$notuse=$_POST['boxnotuse'];
// $fullfuck = $_POST['fullfuck'];
$update = array();
$progress=0;
$user=$_COOKIE['login'];
//Рассчитываем процент
$responce = array();
$plan = plan_list($pos_num);
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
    if($notuse==1){
        $setnotuse = query ("INSERT INTO `plancontrol` (`object_id`, `pos_num`, `progress`, `notuse`, `user`) VALUES ('".$object_id."', '".$pos_num."', '0', '".$notuse."', '".$user."')");
        echo "Убираем раздел";
    }else{
    $sql = "INSERT INTO `plancontrol` (`object_id`, `pos_num`, `progress`, `user`, ".implode(',',$keys).") 
    VALUES ('".$object_id."', '".$pos_num."', '".$progress."', '".$user."', ".implode(',',$values)." )";

    $result = query ($sql);
    }
    echo implode('<br>',$responce);
}

//Обновляем запись
if(is_numeric($task_id) && $notuse==1){
    $setnotuse = query("UPDATE plancontrol SET notuse = '$notuse' ,progress = 0, user = '$user' WHERE id=".$task_id);
    echo "Убираем раздел";
}elseif(is_numeric($task_id)){
    $sql_update=array();
    foreach ($update as $key => $val) {
        $sql_update[]="`".$key."` = '".$val."'";
    }
    
    $sql = "UPDATE plancontrol SET ";
    $sql.= implode(',',$sql_update);
    $sql.=", `arhgh` = NULL, `arhpdf` = NULL, `progress` = '".$progress."', `user` = '".$user."' WHERE id='".$task_id."' LIMIT 1";
    $result = query($sql);
    // if($fullfuck=="on"){
    // $setfulluck = query("UPDATE plancontrol SET fullfuck = 1 WHERE id=".$task_id);
    // }else{
    //     $setfulluck = query("UPDATE plancontrol SET fullfuck = NULL WHERE id=".$task_id);
    // }
    echo implode('<br>',$responce);

}

//проверяем - используется раздел или нет
// if(is_numeric($task_id) && $notuse==1){
//     $setnotuse = query("UPDATE plancontrol SET notuse = '$notuse' ,progress, = 0, user = '$user' WHERE id=".$task_id);
//     echo "Убираем раздел";
// }

?>


<h4><i class="fas fa-sync fa-spin"></i></h4>

<meta http-equiv="refresh" content="2">