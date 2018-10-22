<?php
//Определяем кнопки верхнего меню
if($_SESSION['mode']=='admin'){
    echo '
    <div class="buttnons">
        <a href="/?page=main.php" class="btn btn-gipro">План работ по договорам</a>
        <a href="/?page=plancontrol.php" class="btn btn-gipro">Таблица контроля</a>
        <a href="/?page=planforyear.php" class="btn btn-gipro">План работ Факт</a>
        <a href="/?page=planforyear-plan.php" class="btn btn-gipro">План работ План</a>
        <a href="/?page=arhiv.php" class="btn btn-gipro">Архив</a>
        <a href="/?page=reports.php" class="btn btn-gipro">Отчеты</a>
    </div>';
}elseif($_SESSION['mode']=='spec' || $_SESSION['mode']=='gip' || $_SESSION['mode']=='arhiv' || $_SESSION['mode']=='expert'){
    echo '
    <div class="buttnons">
        <a href="/?page=main.php" class="btn btn-gipro">План работ по договорам</a>
        <a href="/?page=plancontrol.php" class="btn btn-gipro">Таблица контроля</a>
        <a href="/?page=planforyear.php" class="btn btn-gipro">План работ Факт</a>   
        <a href="/?page=planforyear-plan.php" class="btn btn-gipro">План работ План</a>
    </div>';
}else{
    echo '<h1>Ошибка в правах доступа!</h1>';
}

include(__DIR__.'/../template/planforyear-plan.php');
?>