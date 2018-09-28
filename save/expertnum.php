<?php
$id = $_POST['task_id'];
$object_id=$_POST['object_id'];
$pos_num=$_POST['pos_num'];
$percent = $_POST['percent'];
$object_name = $_POST['object_name'];
$task_name = $_POST['task_name'];
$user=$_COOKIE['login'];

//проверяем чек-бокс удаления
$action;
if(isset($_POST['deleteexp'])){
  $del=1;
}else{
   $del=2;
}


//Проверяем - существует ли папка с объектом
$somestring= $_SERVER["DOCUMENT_ROOT"].'/expertise/'.$object_name;
if (file_exists($somestring)) {

} else {
    mkdir($somestring , 0777);
    chmod($somestring , 03777);
}


$uploaddir = $_SERVER["DOCUMENT_ROOT"].'/expertise/'.$object_name.'/';


if($_FILES['userfile']['type']=='application/msword'){
    $namefile= $task_name.'.doc';
}else{
$namefile= $task_name.'.docx';
}

$uploadfile = $uploaddir .$namefile;
// echo $task_name."\n";
// echo "<br>";
// echo $namefile."\n";
// echo "<br>";
if(is_numeric( $id)){
     if($del==1){
        $result2 = query ("DELETE FROM planexpert WHERE id='$id'");
        unlink($_SERVER["DOCUMENT_ROOT"].'/expertise/'.$object_name.'/'.$task_name.'.doc');
        unlink($_SERVER["DOCUMENT_ROOT"].'/expertise/'.$object_name.'/'.$task_name.'.docx');
        echo "Удаляем замечания";
     }else{
        $result6 = query("UPDATE planexpert SET exp_num = '$percent', user = '$user' WHERE id=".$id);
        echo "Меняем кол-во замечаний";
     }
}elseif(!empty($_FILES['userfile']['name']) && !empty($percent)){

    if($_FILES['userfile']['type']!='application/vnd.openxmlformats-officedocument.wordprocessingml.document' && $_FILES['userfile']['type']!='application/msword'){
        echo "Неверный тип документа!";
    }elseif (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile) ) {
        $result = query ("INSERT INTO `planexpert` (`object_id`, `pos_num`, `exp_num` , `user`) VALUES ('".$object_id."', '".$pos_num."', '".$percent."', '".$user."')");
        echo "Файл загружен и замечания установлены!.\n";
    } else {
        echo "Ошибка загрузки!\n";
    }
}else{
    echo "ВЫБЕРИТЕ ФАЙЛ ДЛЯ ЗАГРУЗКИ И УКАЖИТЕ КОЛ-ВО ЗАМЕЧАНИЙ!";
}
// echo "<br>";
// var_export($uploaddir);
// echo "<br>";
// var_export($uploadfile);
// echo "<br>";
// echo "<pre>";
// print_r($_FILES);
// echo "</pre>";

if($_SESSION['mode']=='admin'){
    echo '<meta http-equiv="refresh" content="2; url=http://192.168.62.33/?page=planexpert.php">'; 
}elseif($_SESSION['mode']=='expert'){
    echo '<meta http-equiv="refresh" content="2; url=http://192.168.62.33/?page=planexpert.php">'; 
}else{}


?>

