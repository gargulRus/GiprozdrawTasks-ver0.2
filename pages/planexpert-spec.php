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
            if(isset($row['task'][$key_m])){
                  echo '<td alt="' . $row['task'][$key_m]['id'] . '">  '. $row['task'][$key_m]['exp_num'] .'</td>';
            }else{
                echo '<td>
                    </td>';
            }
        }
        echo '</tr>';
    $pp++;
  }
       echo "</table>";
?>