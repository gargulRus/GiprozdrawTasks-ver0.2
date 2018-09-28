<?php
if($_SESSION['mode']=='admin'){
echo '
<div class="buttnons">
<a href="/?page=main.php" class="btn btn-gipro">План работ по договорам</a>
<a href="/?page=plancontrol.php" class="btn btn-gipro">Таблица контроля</a>
<a href="/?page=planforyear.php" class="btn btn-gipro">План работ на год факт</a>
<a href="/?page=planforyear-plan.php" class="btn btn-gipro">План работ на год план</a>
<a href="/?page=arhiv.php" class="btn btn-gipro">Архив</a>
<a href="/?page=reports.php" class="btn btn-gipro">Отчеты</a>
<br><br>
<a href="#" data-toggle="modal" data-target="#write" class="openformcreate btn btn-gipro">Объекты</a>
<a href="#" data-toggle="modal" data-target="#newgip" class="openformcreate btn btn-gipro">ГИПы</a>
<a href="#" data-toggle="modal" data-target="#newgap" class="openformcreate btn btn-gipro">ГАПы</a>
<a href="#" data-toggle="modal" data-target="#newov" class="openformcreate btn btn-gipro">ОВ</a>
<a href="#" data-toggle="modal" data-target="#newkr" class="openformcreate btn btn-gipro">КР</a>
<a href="#" data-toggle="modal" data-target="#newcur" class="openformcreate btn btn-gipro">Кураторы</a> 
<a href="#" data-toggle="modal" data-target="#newexp" class="openformcreate btn btn-gipro">Отв за Эксперт.</a>  
</div>';
}elseif($_SESSION['mode']=='spec' || $_SESSION['mode']=='gip' || $_SESSION['mode']=='arhiv' || $_SESSION['mode']=='expert'){
  echo '
  <div class="buttnons">
  <a href="/?page=main.php" class="btn btn-gipro">План работ по договорам</a>
  <a href="/?page=plancontrol.php" class="btn btn-gipro">Таблица контроля</a>
  <a href="/?page=planforyear.php" class="btn btn-gipro">План работ на год Факт</a>   
  <a href="/?page=planforyear.php" class="btn btn-gipro">План работ на год План</a>
</div>';
}else{
  echo '<h1>Ошибка в правах доступа!</h1>';
}


?>