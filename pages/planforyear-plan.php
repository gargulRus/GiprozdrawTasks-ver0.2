<div class="buttnons">
<?php
  if($_SESSION['mode']=='admin'){
      echo '
    <a href="/?page=main.php" class="btn btn-gipro">План работ по договорам</a>
    <a href="/?page=plancontrol.php" class="btn btn-gipro">Таблица контроля</a>
    <a href="/?page=planforyear.php" class="btn btn-gipro">План работ на год факт</a>
    <a href="/?page=planforyear-plan.php" class="btn btn-gipro">План работ на год план</a>
    ';
              }elseif($_SESSION['mode']=='spec'){
                echo '
                <a href="/?page=main-spec.php" class="btn btn-gipro">План работ по договорам</a>
                <a href="/?page=plancontrol-spec.php" class="btn btn-gipro">Таблица контроля</a>
                <a href="/?page=planforyear-spec.php" class="btn btn-gipro">План работ на год Факт</a>   
                <a href="/?page=planforyear-plan.php" class="btn btn-gipro">План работ на год План</a>
                ';
              }elseif($_SESSION['mode']=='gip'){
                echo '
<a href="/?page=main-gip.php" class="btn btn-gipro">План работ по договорам</a>
<a href="/?page=plancontrol-gip.php" class="btn btn-gipro">Таблица контроля</a>
<a href="/?page=planforyear-gip.php" class="btn btn-gipro">План работ на год Факт</a>
<a href="/?page=planforyear-plan.php" class="btn btn-gipro">План работ на год План</a>
';
              }elseif($_SESSION['mode']=='arhiv'){
                echo '
                <a href="/?page=main-arhiv.php" class="btn btn-gipro">План работ по договорам</a>
                <a href="/?page=plancontrol-arhiv.php" class="btn btn-gipro">Таблица контроля</a>
                <a href="/?page=planforyear-arhiv.php" class="btn btn-gipro">План работ на год Факт</a>
                <a href="/?page=planforyear-plan.php" class="btn btn-gipro">План работ на год План</a>
                ';
              }elseif($_SESSION['mode']=='expert'){
                echo '
<a href="/?page=main-expert.php" class="btn btn-gipro">План работ по договорам</a>
<a href="/?page=plancontrol-expert.php" class="btn btn-gipro">Таблица контроля</a>
<a href="/?page=planforyear-expert.php" class="btn btn-gipro">План работ на год Факт</a>
<a href="/?page=planforyear-plan.php" class="btn btn-gipro">План работ на год План</a>
';
              }else{}
?>
</div>

<?php
include(__DIR__.'/../template/planforyear-plan.php');
?>