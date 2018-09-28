<?php
include_once(__DIR__."/core/connect.php");
if(!isset ($_SESSION['login'])){
        $login=$_POST['login'];
        $pass=$_POST['pass'];

        if(empty($login) or empty($pass)){
            exit("Вы ввели неверные данные<br>
            <input type='button' value='Назад' onclick='history.back()'>
            ");

        }
}
// echo $login;
// echo $pass;
// $login=siripslashes($login);
// $login=htmlspecialchars($login);

// $pass=siripslashes($pass);
// $pass=htmlspecialchars($pass);


$toAcc = query("SELECT * FROM autent WHERE login='".$login."'");
$accData = mysqli_fetch_array($toAcc);
// var_export($accData);
if($accData['pass']==""){
    exit("Ошибка авторизации!<br>
    <input type='button' value='Назад' onclick='history.back()'>
    ");
}else{
    if($accData['pass']==$pass){
    // echo "Авторизация успешна!";
    // echo "<input type='button' value='Назад' onclick='history.back()'>";
    setcookie("login", $accData['login'], time()+3600*24*365);
    setcookie("role", $accData['role'], time()+3600*24*365);
    setcookie("name", $accData['name'], time()+3600*24*365);
    setcookie("au_id", $accData['au_id'], time()+3600*24*365);
    echo '<link rel="stylesheet" href="/plugins/fontawesome/css/fontawesome-all.min.css">';
    echo '<link rel="stylesheet" href="css/form.css">';
    echo"<div class='formpositionhello'>";
    echo "<h1>Добро Пожаловать! <span style='margin:auto;'><i class='fa fa-spinner fa-spin' style='font-size:48px'></i></h1></span>";
    echo "</div>";
    }else{
        exit("Пароль неверный!<br>
        <input type='button' value='Назад' onclick='history.back()'>
        ");
    }
}

echo "
<script type='text/javascript'>
function ToAuth() {
    location='index.php';
    }

    setTimeout('ToAuth()', 2000);
</script>

";

?>
