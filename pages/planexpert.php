<?php

//Определяем кнопки верхнего меню
if($_COOKIE['role']=='admin'){
    echo '
    <div class="buttnons">
        <a href="/?page=main.php" class="btn btn-gipro">План работ по договорам</a>
        <a href="/?page=plancontrol.php" class="btn btn-gipro">Таблица контроля</a>
        <a href="/?page=planforyear.php" class="btn btn-gipro">План работ Факт</a>
        <a href="/?page=planforyear-plan.php" class="btn btn-gipro">План работ План</a>
        <a href="/?page=arhiv.php" class="btn btn-gipro">Архив</a>
        <a href="/?page=reports.php" class="btn btn-gipro">Отчеты</a>
    <br><br>
        <a href="/?page=plancontrol.php" class="btn btn-gipro">План работ стадия Проект</a>
        <a href="/?page=planexpert.php" class="btn btn-gipro">Замечания Экспертизы</a>
        <a href="/?page=plancontrolR.php" class="btn btn-gipro">План работ стадия Рабочка</a>
    </div>';
}elseif($_COOKIE['role']=='spec' || $_COOKIE['role']=='gip' || $_COOKIE['role']=='gap' 
        || $_COOKIE['role']=='kr' || $_COOKIE['role']=='ov' || $_COOKIE['role']=='arhiv' || $_COOKIE['role']=='expert'){
    echo '
    <div class="buttnons">
        <a href="/?page=main.php" class="btn btn-gipro">План работ по договорам</a>
        <a href="/?page=plancontrol.php" class="btn btn-gipro">Таблица контроля</a>
        <a href="/?page=planforyear.php" class="btn btn-gipro">План работ Факт</a>   
        <a href="/?page=planforyear-plan.php" class="btn btn-gipro">План работ План</a>
    <br><br>
        <a href="/?page=plancontrol.php" class="btn btn-gipro">План работ стадия Проект</a>
        <a href="/?page=planexpert.php" class="btn btn-gipro">Замечания Экспертизы</a>
        <a href="/?page=plancontrolR.php" class="btn btn-gipro">План работ стадия Рабочка</a>
    </div>';
}else{
    echo '<h1>Ошибка в правах доступа!</h1>';
}

if($_COOKIE['role']=='admin' || $_COOKIE['role']=='spec' || $_COOKIE['role']=='gip' || $_COOKIE['role']=='gap' 
        || $_COOKIE['role']=='kr' || $_COOKIE['role']=='ov' || $_COOKIE['role']=='expert'){
    include(__DIR__.'/../template/planexpert-users.php');

    foreach ($list as $key => $row) {
        if($row['arhiv_id']== NULL){
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
        }else{}
    }
       echo "</table>";
}elseif($_COOKIE['role']=='arhiv'){
    include(__DIR__.'/../template/planexpert-users.php');

    foreach ($list as $key => $row) {
        if($row['arhiv_id']== NULL){
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
        }else{}
    }
       echo "</table>";
}else{
    echo '<h1>Ошибка в правах доступа!</h1>';
}
?>