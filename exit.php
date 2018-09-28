<?php
    setcookie("login", "");

    echo '<link rel="stylesheet" href="/plugins/fontawesome/css/fontawesome-all.min.css">';
    echo '<link rel="stylesheet" href="css/form.css">';
    echo"<div class='formposition'>";
    echo "<h1>До свидания! <i class='fa fa-spinner fa-spin' style='font-size:48px'></i></h1>";
    echo "</div>";
echo "
<script type='text/javascript'>
function ToAuth() {
    location='index.php';
    }

    setTimeout('ToAuth()', 2000);
</script>

";

?>
