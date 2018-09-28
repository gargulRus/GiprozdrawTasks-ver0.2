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
include(__DIR__.'/../template/planexpert-users.php');

foreach ($list as $key => $row) {
    echo '<tr>';
    echo '<td>' . $pp . '</td>';
    echo '<td><a 
        href="#" 
        data-toggle="modal" data-target="#renameobject" 
        class="openform" 
        data-id="'.$row['id'].'"
        data-name="'.$row['name'].'"
        >'. $row['name'] .'</a></td>';

    foreach ($pos_num as $key_m => $col) {
        if($row['taskP'][$key_m]['notuse']==1){
            echo '<td><a 
            href="#" class="openformtask">Не исп.
            </a> </td>';
        }elseif(isset($row['task'][$key_m])){
              echo '<td alt="' . $row['task'][$key_m]['id'] . '"><a 
                href=/?modal=expertnum&pos_num='.$key_m.'&task_id='.$row['task'][$key_m]['id'].'&object_id='.$row['id'].'&object_name='.$row['name'].'&count='.$row['task'][$key_m]['exp_num'].' class=" modal-a openformtaskexp" 
                >'. $row['task'][$key_m]['exp_num'] .'
                </a></td>';
        }else{
            echo '<td alt="' . $row['task'][$key_m]['id'] . '"><a 
            href=/?modal=expertnum&pos_num='.$key_m.'&task_id='.$row['task'][$key_m]['id'].'&object_id='.$row['id'].'&object_name='.$row['name'].' class=" modal-a openformtaskexp hideFuck" 
            >+</a></td>';
        }
    }
    echo '</tr>';
$pp++;
}
   echo "</table>";
   
?>