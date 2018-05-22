<div class="buttnons">
<a href="/?page=main-expert.php" class="btn btn-gipro">План работ по договорам</a>
<a href="/?page=plancontrol-expert.php" class="btn btn-gipro">Таблица контроля</a>
<a href="/?page=planforyear-expert.php" class="btn btn-gipro">План работ на год Факт</a>
<a href="/?page=planforyear-plan.php" class="btn btn-gipro">План работ на год План</a>
<br>
<br>
<a href="/?page=plancontrol-expert.php" class="btn btn-gipro">План работ стадия Проект</a>
<a href="/?page=planexpert-expert.php" class="btn btn-gipro">Замечания Экспертизы</a>
<a href="/?page=plancontrolR-expert.php" class="btn btn-gipro">План работ стадия Рабочка</a>

</div>

<?php
include(__DIR__.'/../template/plancontrolR-users.php');

foreach ($list as $key => $row) {
    echo '<tr>';
    echo '<td>' . $pp . '</td>';
    echo '<td>'. $row['name'] .'</td>';

    foreach ($pos_num as $key_m => $col) {
        if(isset($row['task'][$key_m]) && $row['task'][$key_m]['notuse']==1){
            echo '<td>
            Не исп.
            </td>';
        }elseif(isset($row['task'][$key_m])){
            if($row['task'][$key_m]['fullfuck']==1){
                echo '<td alt="" bgcolor="#e8d532">'. $row['task'][$key_m]['progress'] .' %
                </td>';
            }else{
                echo '<td alt="">'. $row['task'][$key_m]['progress'] .' %
                </td>';
            }
        }else{
            echo '<td> </td>';
        }
    }
    echo '</tr>';
$pp++;
}
   echo "</table>";

?>