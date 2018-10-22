<?php

$task_id = $_POST['task_id'];
$object_id=$_POST['object_id'];
$pos_num=$_POST['pos_num'];
$notuse=$_POST['boxnotuse'];
$fullfuck = $_POST['fullfuck'];
$update = array();
$progress=$_POST['krpercent'];
$user=$_COOKIE['login'];
echo $progress;
if($progress>90){
    $progress=90;
}

//Создаем новую запись
if($task_id=='new'){

    if($fullfuck=="on"){
        $sql = "INSERT INTO `plancontrolR` (`object_id`, `pos_num`, `progress`, `user`, `fullfuck`) 
        VALUES ('".$object_id."', '".$pos_num."', '".$progress."', '".$user."', '1')";
        $result = query ($sql);
        
        }else{
            $sql = "INSERT INTO `plancontrolR` (`object_id`, `pos_num`, `progress` , `user`) 
            VALUES ('".$object_id."', '".$pos_num."', '".$progress."', '".$user."')";
            $result = query ($sql);
        }

    echo "Устанавливаю Процент";
}

//Обновляем запись
if(is_numeric($task_id)){
    
    $sql = "UPDATE plancontrolR SET arhgh = NULL, arhpdf = NULL, progress = ".$progress.", user = ".$user." WHERE id=".$task_id." LIMIT 1";
    
    $result = query($sql);

    if($fullfuck=="on"){
        $setfulluck = query("UPDATE plancontrolR SET fullfuck = 1 , user = '".$user."' WHERE id=".$task_id);
        }else{
            $setfulluck = query("UPDATE plancontrolR SET fullfuck = NULL , user = '".$user."' WHERE id=".$task_id);
        }
    echo "Устанавливаю Процент";

}



//проверяем - используется раздел или нет
if(is_numeric($task_id) && $notuse==1){
    $setnotuse = query("UPDATE plancontrolR SET notuse = '$notuse' ,progress = 0 , user = '$user' WHERE id=".$task_id);
    echo "Убираем раздел";
}
if($task_id=='new' && $notuse==1){
    $setnotuse = query ("INSERT INTO `plancontrolR` (`object_id`, `pos_num`, `progress`, `notuse` , `user`) VALUES ('".$object_id."', '".$pos_num."', '0', '".$notuse."', '".$user."')");
    echo "Убираем раздел";
}
?>
<h4><i class="fas fa-sync fa-spin"></i></h4>

<meta http-equiv="refresh" content="2">