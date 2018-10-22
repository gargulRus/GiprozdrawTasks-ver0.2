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

//Определяем какие страницы подключать в зависимости от прав доступа
if($_COOKIE['role']=='admin'){

    include(__DIR__.'/../template/plancontrolR-users.php');

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
            if(isset($row['task'][$key_m]) && $row['task'][$key_m]['notuse']==1){
                echo '<td><a 
                href="#" class="openformtask">Не исп.
                </a> </td>';
            }elseif(isset($row['task'][$key_m])){
                if($row['task'][$key_m]['fullfuck']==1){
                    if($key_m==3 || $key_m==4 || $key_m==5 || $key_m==6){
                        echo '<td alt="' . $row['task'][$key_m]['id'] . '" bgcolor="#e8d532"><a 
                        href="/?modal=updatetaskkrR&pos_num='.$key_m.'&task_id='.$row['task'][$key_m]['id'].'&object_id='.$row['id'].'&object_name='.$row['name'].'&fullfuckis='.$row['task'][$key_m]['fullfuck'].'" class="modal-a openformtask"
                        >'. $row['task'][$key_m]['progress'] .' %</a></td>';
                    }else{
                    echo '<td alt="' . $row['task'][$key_m]['id'] . '" bgcolor="#e8d532"><a 
                    href="/?modal=updatetaskR&pos_num='.$key_m.'&task_id='.$row['task'][$key_m]['id'].'&object_id='.$row['id'].'&object_name='.$row['name'].'&fullfuckis='.$row['task'][$key_m]['fullfuck'].'" class="modal-a openformtask"
                    >'. $row['task'][$key_m]['progress'] .' %</a></td>';
                    }
                }else{
                    if($key_m==3 || $key_m==4 || $key_m==5 || $key_m==6){
                        echo '<td alt="' . $row['task'][$key_m]['id'] . '"><a 
                        href="/?modal=updatetaskkrR&pos_num='.$key_m.'&task_id='.$row['task'][$key_m]['id'].'&object_id='.$row['id'].'&object_name='.$row['name'].'" class="modal-a openformtask"
                        >'. $row['task'][$key_m]['progress'] .' %</a></td>';
                    }else{
                    echo '<td alt="' . $row['task'][$key_m]['id'] . '"><a 
                    href="/?modal=updatetaskR&pos_num='.$key_m.'&task_id='.$row['task'][$key_m]['id'].'&object_id='.$row['id'].'&object_name='.$row['name'].'" class="modal-a openformtask"
                    >'. $row['task'][$key_m]['progress'] .' %</a></td>';
                    }
                }
            }else{
                if($key_m==3 || $key_m==4 || $key_m==5 || $key_m==6){
                    echo '<td><a 
                href="/?modal=updatetaskkrR&pos_num='.$key_m.'&task_id=new&object_id='.$row['id'].'&object_name='.$row['name'].'" class="modal-a openformtask hideFuck">+
                </a> </td>';
                }else {
                    echo '<td><a 
                href="/?modal=updatetaskR&pos_num='.$key_m.'&task_id=new&object_id='.$row['id'].'&object_name='.$row['name'].'" class="modal-a openformtask hideFuck">+
                </a> </td>';
                }
            }
        }
        
        echo '</tr>';
    $pp++;
        }else{}
    }
       echo "</table>";
}elseif($_COOKIE['role']=='spec' || $_COOKIE['role']=='gap' 
        || $_COOKIE['role']=='kr' || $_COOKIE['role']=='ov'){
    include(__DIR__.'/../template/plancontrolR-users.php');
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

        if($_COOKIE['login']=='genplan'){
            $logo1=1;
            $logo2=1;
            $logo3=1;
            $logo4=1;
        }elseif($_COOKIE['login']=='amelko'){
            $logo1=2;
            $logo2=2;
            $logo3=2;
            $logo4=2;
        }elseif($_COOKIE['login']=='gurianov'){
            $logo1=2;
            $logo2=2;
            $logo3=2;
            $logo4=2;
        }elseif($_COOKIE['login']=='verstunina'){
            $logo1=2;
            $logo2=2;
            $logo3=2;
            $logo4=2;
        }elseif($_COOKIE['login']=='soloviova'){
            $logo1=2;
            $logo2=2;
            $logo3=2;
            $logo4=2;
        }elseif($_COOKIE['login']=='zukova'){
            $logo1=3;
            $logo2=3;
            $logo3=3;
            $logo4=3;
        }elseif($_COOKIE['login']=='glazkov'){
            $logo1=3;
            $logo2=3;
            $logo3=3;
            $logo4=3;
        }elseif($_COOKIE['login']=='eom'){
            $logo1=4;
            $logo2=5;
            $logo3=6;
            $logo4=6;
        }elseif($_COOKIE['login']=='vk'){
            $logo1=7;
            $logo2=8;
            $logo3=9;
            $logo4=10;
        }elseif($_COOKIE['login']=='semenova'){
            $logo1=11;
            $logo2=11;
            $logo3=11;
            $logo4=11;
        }elseif($_COOKIE['login']=='belakov'){
            $logo1=11;
            $logo2=11;
            $logo3=11;
            $logo4=11;
        }elseif($_COOKIE['login']=='ot'){
            $logo1=12;
            $logo2=12;
            $logo3=12;
            $logo4=12;
        }elseif($_COOKIE['login']=='hs'){
            $logo1=13;
            $logo2=13;
            $logo3=13;
            $logo4=13;
        }elseif($_COOKIE['login']=='ts'){
            $logo1=14;
            $logo2=14;
            $logo3=14;
            $logo4=14;
        }elseif($_COOKIE['login']=='itp'){
            $logo1=15;
            $logo2=15;
            $logo3=15;
            $logo4=15;
        }elseif($_COOKIE['login']=='ss'){
            $logo1=16;
            $logo2=16;
            $logo3=16;
            $logo4=16;
        }elseif($_COOKIE['login']=='mg'){
            $logo1=17;
            $logo2=18;
            $logo3=18;
            $logo4=18;
        }elseif($_COOKIE['login']=='th'){
            $logo1=19;
            $logo2=19;
            $logo3=19;
            $logo4=19;
        }elseif($_COOKIE['login']=='avtom'){
            $logo1=20;
            $logo2=20;
            $logo3=20;
            $logo4=20;
        }elseif($_COOKIE['login']=='smeti'){
            $logo1=21;
            $logo2=21;
            $logo3=21;
            $logo4=21;
        }else{}
    

    foreach ($pos_num as $key_m => $col) {
        if(isset($row['task'][$key_m]) && $row['task'][$key_m]['notuse']==1){
            echo '<td><a 
            href="#" class="openformtask">Не исп.
            </a> </td>';
        }elseif(isset($row['task'][$key_m])){
            if($row['task'][$key_m]['fullfuck']==1){
                if($key_m==$logo1 || $key_m==$logo2 || $key_m==$logo3 || $key_m==$logo4){
                    if($key_m==3 || $key_m==4 || $key_m==5 || $key_m==6){
                        echo '<td alt="' . $row['task'][$key_m]['id'] . '" bgcolor="#e8d532"><a 
                        href="/?modal=updatetaskkrR&pos_num='.$key_m.'&task_id='.$row['task'][$key_m]['id'].'&object_id='.$row['id'].'&object_name='.$row['name'].'&fullfuckis='.$row['task'][$key_m]['fullfuck'].'" class="modal-a openformtask"
                        >'. $row['task'][$key_m]['progress'] .' %</a></td>';
                    }else{
                    echo '<td alt="' . $row['task'][$key_m]['id'] . '" bgcolor="#e8d532"><a 
                    href="/?modal=updatetaskR&pos_num='.$key_m.'&task_id='.$row['task'][$key_m]['id'].'&object_id='.$row['id'].'&object_name='.$row['name'].'&fullfuckis='.$row['task'][$key_m]['fullfuck'].'" class="modal-a openformtask"
                    >'. $row['task'][$key_m]['progress'] .' %</a></td>';
                    }
                }else{
                    echo '<td  bgcolor="#e8d532"><a 
                    href="#" class="openformtask"
                    >'. $row['task'][$key_m]['progress'] .' %</a></td>';
                }
            }else{
                if($key_m==$logo1 || $key_m==$logo2 || $key_m==$logo3 || $key_m==$logo4){
                    if($key_m==3 || $key_m==4 || $key_m==5 || $key_m==6){
                        echo '<td alt="' . $row['task'][$key_m]['id'] . '"><a 
                        href="/?modal=updatetaskkrR&pos_num='.$key_m.'&task_id='.$row['task'][$key_m]['id'].'&object_id='.$row['id'].'&object_name='.$row['name'].'" class="modal-a openformtask"
                        >'. $row['task'][$key_m]['progress'] .' %</a></td>';
                    }else{
                    echo '<td alt="' . $row['task'][$key_m]['id'] . '"><a 
                    href="/?modal=updatetaskR&pos_num='.$key_m.'&task_id='.$row['task'][$key_m]['id'].'&object_id='.$row['id'].'&object_name='.$row['name'].'" class="modal-a openformtask"
                    >'. $row['task'][$key_m]['progress'] .' %</a></td>';
                    }
                }else{
                    echo '<td><a 
                    href="#" class="openformtask"
                    >'. $row['task'][$key_m]['progress'] .' %</a></td>';
                }
            }
        }else{
            if($key_m==$logo1 || $key_m==$logo2 || $key_m==$logo3 || $key_m==$logo4){
                if($key_m==3 || $key_m==4 || $key_m==5 || $key_m==6){
                    echo '<td><a 
                href="/?modal=updatetaskkrR&pos_num='.$key_m.'&task_id=new&object_id='.$row['id'].'&object_name='.$row['name'].'" class="modal-a openformtask hideFuck">+
                </a> </td>';
                }else {
                    echo '<td><a 
                href="/?modal=updatetaskR&pos_num='.$key_m.'&task_id=new&object_id='.$row['id'].'&object_name='.$row['name'].'" class="modal-a openformtask hideFuck">+
                </a> </td>';
                }
            }else{
                echo '<td><a 
                href="#" class=" openformtask hideFuck">+
                </a> </td>';
            }
        }
    }
    
    echo '</tr>';
$pp++;
    }else{}
}
   echo "</table>";
}elseif($_COOKIE['role']=='gip'){
    include(__DIR__.'/../template/plancontrolR-users.php');

    foreach ($list as $key => $row) {
        if($row['arhiv_id']== NULL){
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
        }else{}
    }
       echo "</table>";
}elseif($_COOKIE['role']=='arhiv'){
    include(__DIR__.'/../template/plancontrolR-users.php');
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
            if(isset($row['task'][$key_m]) && $row['task'][$key_m]['notuse']==1){
                echo '<td><a 
                href="#" class="openformtask">Не исп.
                </a> </td>';
            }elseif(isset($row['task'][$key_m])){
                if($row['task'][$key_m]['progress']<89){
                    if($row['task'][$key_m]['fullfuck']==1){
                    echo '<td bgcolor="#e8d532"><a 
                    href="#" class="openformtask"
                    >'. $row['task'][$key_m]['progress'] .' %</a></td>';
                    }else{
                        echo '<td><a 
                        href="#" class="openformtask"
                        >'. $row['task'][$key_m]['progress'] .' %</a></td>';
                    }
                }else{
                    if($row['task'][$key_m]['fullfuck']==1){
                    echo '<td bgcolor="#e8d532" ><a 
                    href="/?modal=arhivR&pos_num='.$key_m.'&task_id='.$row['task'][$key_m]['id'].'&object_id='.$row['id'].'&object_name='.$row['name'].'" class="modal-a openformtask">'. $row['task'][$key_m]['progress'] .'%
                    </a> </td>';
                    }else{
                    echo '<td><a 
                    href="/?modal=arhivR&pos_num='.$key_m.'&task_id='.$row['task'][$key_m]['id'].'&object_id='.$row['id'].'&object_name='.$row['name'].'" class="modal-a openformtask">'. $row['task'][$key_m]['progress'] .'%
                    </a> </td>';
                    }
                }
            }else{
                echo '<td><a 
                href="#" class="openformtask hideFuck">+
                </a> </td>';
            }
        }
        echo '</tr>';
    $pp++;
        }else{}
    }
       echo "</table>";
}elseif($_COOKIE['role']=='expert'){
    include(__DIR__.'/../template/plancontrolR-users.php');

    foreach ($list as $key => $row) {
        if($row['arhiv_id']== NULL){
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
        }else{}
    }
       echo "</table>";
    
}else{
    echo '<h1>Ошибка в правах доступа!</h1>';
}

?>
<script>
$(document).ready(function($) {
    $nav = $('.fixed-div');
    $nav.css('width', $nav.outerWidth());
    $window = $(window);
    $h = $nav.offset().top;
    $window.scroll(function() {
        if ($window.scrollTop() > $h) {
            $nav.addClass('fixed');
        } else {
            $nav.removeClass('fixed');
        }
    });
});
</script>