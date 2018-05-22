<?php

$task_id = $_POST['task_id'];
$object_id=$_POST['object_id'];
$pos_num=$_POST['pos_num'];
$notuse=$_POST['boxnotuse'];
$fullfuck = $_POST['fullfuck'];
$update = array();
$progress=$_POST['krpercent'];
echo $progress;
if($progress>90){
    $progress=90;
}
//Рассчитываем процент
// $responce = array();
// $plan = plan_listR($pos_num);
// foreach($plan['tasks'] as $key=>$task){
//     $update[$key]=(isset($_POST[$key]))?1:0;s
//     if($update[$key]==1){
//         $progress+=$task['percent'];
//         $responce[]='Отмечено: '.$task['title'];
//     }
// }
// var_export($plan);

//Создаем новую запись
if($task_id=='new'){
    // $keys=array(); $values=array(); 
    // foreach ($update as $key => $value) { 
    //     $keys[]='`'.$key.'`'; 
    //     $values[]="'".$value."'";
    // }

    $sql = "INSERT INTO `plancontrolR` (`object_id`, `pos_num`, `progress`) 
    VALUES ('".$object_id."', '".$pos_num."', '".$progress."')";

    $result = query ($sql);
    echo "Устанавливаю Процент";
}

//Обновляем запись
if(is_numeric($task_id)){
    // $sql_update=array();
    // foreach ($update as $key => $val) {
    //     $sql_update[]="`".$key."` = '".$val."'";
    // }
    
    $sql = "UPDATE plancontrolR SET arhgh = NULL, arhpdf = NULL, progress = ".$progress." WHERE id=".$task_id." LIMIT 1";
    
    $result = query($sql);

    // if($fullfuck=="on"){
    //     $setfulluck = query("UPDATE plancontrolR SET fullfuck = 1 WHERE id=".$task_id);
    //     }else{
    //         $setfulluck = query("UPDATE plancontrolR SET fullfuck = NULL WHERE id=".$task_id);
    //     }
    echo "Устанавливаю Процент";

}

//проверяем - используется раздел или нет
if(is_numeric($task_id) && $notuse==1){
    $setnotuse = query("UPDATE plancontrolR SET notuse = '$notuse' ,progress = 0 WHERE id=".$task_id);
    echo "Убираем раздел";
}
if($task_id=='new' && $notuse==1){
    $setnotuse = query ("INSERT INTO `plancontrolR` (`object_id`, `pos_num`, `progress`, `notuse`) VALUES ('".$object_id."', '".$pos_num."', '0', '".$notuse."')");
    echo "Убираем раздел";
}
?>
<h4><i class="fas fa-sync fa-spin"></i></h4>

<meta http-equiv="refresh" content="2">