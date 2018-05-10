<div class="buttnons">
<a href="/?page=main-gip.php" class="btn btn-gipro">План работ по договорам</a>
<a href="/?page=plancontrol-gip.php" class="btn btn-gipro">Таблица контроля</a>
<a href="/?page=planforyear-gip.php" class="btn btn-gipro">План работ на год</a>
<br>
<br>
<a href="/?page=plancontrol-gip.php" class="btn btn-gipro">План работ стадия Проект</a>
<a href="/?page=planexpert-gip.php" class="btn btn-gipro">Замечания Экспертизы</a>
<a href="/?page=plancontrolR-gip.php" class="btn btn-gipro">План работ стадия Рабочка</a>

</div>
<?php
include(__DIR__.'/../template/plancontrol-users.php');
foreach ($list as $key => $row) {
    echo '<tr>';
    echo '<td>' . $pp . '</td>';
    echo '<td>'. $row['name'] .'</td>';

    foreach ($pos_num as $key_m => $col) {
        
        if(isset($row['task'][$key_m]) && $row['task'][$key_m]['notuse']==1){
            echo '<td><a 
            href="#" class="openformtask">Не исп.
            </a> </td>';
        }elseif(isset($row['task'][$key_m])){
                echo '<td alt="' . $row['task'][$key_m]['id'] . '">'. $row['task'][$key_m]['progress'] .'%</td>';
        }else{
            echo '<td></td>';
        }
    }
    echo '</tr>';
$pp++;
}
   echo "</table>";
?>