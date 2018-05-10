<div class="buttnons">
<a href="/?page=main-spec.php" class="btn btn-gipro">План работ по договорам</a>
    <a href="/?page=plancontrol-spec.php" class="btn btn-gipro">Таблица контроля</a>
    <a href="/?page=planforyear-spec.php" class="btn btn-gipro">План работ на год</a>   
<br>
<br>
<a href="/?page=plancontrol-spec.php" class="btn btn-gipro">План работ стадия Проект</a>
<a href="/?page=planexpert-spec.php" class="btn btn-gipro">Замечания Экспертизы</a>
<a href="/?page=plancontrolR-spec.php" class="btn btn-gipro">План работ стадия Рабочка</a>

</div>

<?php
include(__DIR__.'/../template/plancontrol-users.php');

    foreach ($list as $key => $row) {
        echo '<tr>';
        echo '<td>' . $pp . '</td>';
        // echo '<td><a 
        //     href="/?modal=renameobject&id='.$row['id'].'"
        //     class="openform modal-a" 
        //     >'. $row['name'] .'</a></td>';
        echo '<td><a 
        href="#" 
        data-toggle="modal" data-target="#renameobject" 
        class="openform" 
        data-id="'.$row['id'].'"
        data-name="'.$row['name'].'"
        >'. $row['name'] .'</a></td>';
   
        foreach ($pos_num as $key_m => $col) {
            if(isset($row['task'][$key_m]) && $row['task'][$key_m]['notuse']==1){
                echo '<td><a 
                href="#" class="openformtask">Не исп.
                </a> </td>';
            }elseif(isset($row['task'][$key_m])){
                    echo '<td alt="' . $row['task'][$key_m]['id'] . '"><a 
                    href="/?modal=updatetask&pos_num='.$key_m.'&task_id='.$row['task'][$key_m]['id'].'&object_id='.$row['id'].'" class="modal-a openformtask"
                    >'. $row['task'][$key_m]['progress'] .' %
                    </a></td>';
            }else{
                echo '<td><a 
                href="/?modal=updatetask&pos_num='.$key_m.'&task_id=new&object_id='.$row['id'].'" class="modal-a openformtask hideFuck">+
                </a> </td>';
            }
        }
        echo '</tr>';
    $pp++;
  }
       echo "</table>";
       
?>