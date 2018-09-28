<?php
if ($_COOKIE['login']==""){
    // echo "<meta http-equiv='refresh' content='2; url=http://giprotable2'>";    
}elseif($_COOKIE['login']=='user'){
    $_SESSION['mode']='admin';
    // echo "<meta http-equiv='refresh' content='2; url=http://giprotable2'>";
}
?>
