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
    include(__DIR__.'/../template/plancontrol-users.php');
    include(__DIR__.'/../template/plancontrol-edit.php');
}elseif($_COOKIE['role']=='spec' || $_COOKIE['role']=='gap' 
        || $_COOKIE['role']=='kr' || $_COOKIE['role']=='ov'){
    include(__DIR__.'/../template/plancontrol-users.php');

    foreach ($list as $key => $row) {
        if($row['arhiv_id']== NULL){
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

    if($_COOKIE['login']=='genplan'){
        $logo1=2;
        $logo2=2;
        $logo3=2;
    }elseif($_COOKIE['login']=='amelko'){
        $logo1=3;
        $logo2=3;
        $logo3=3;
    }elseif($_COOKIE['login']=='gurianov'){
        $logo1=3;
        $logo2=3;
        $logo3=3;
    }elseif($_COOKIE['login']=='verstunina'){
        $logo1=3;
        $logo2=3;
        $logo3=3;
    }elseif($_COOKIE['login']=='soloviova'){
        $logo1=3;
        $logo2=3;
        $logo3=3;
    }elseif($_COOKIE['login']=='zukova'){
        $logo1=4;
        $logo2=4;
        $logo3=4;
    }elseif($_COOKIE['login']=='glazkov'){
        $logo1=4;
        $logo2=4;
        $logo3=4;
    }elseif($_COOKIE['login']=='eom'){
        $logo1=5;
        $logo2=6;
        $logo3=5;
    }elseif($_COOKIE['login']=='vk'){
        $logo1=7;
        $logo2=8;
        $logo3=9;
    }elseif($_COOKIE['login']=='semenova'){
        $logo1=10;
        $logo2=10;
        $logo3=10;
    }elseif($_COOKIE['login']=='belakov'){
        $logo1=10;
        $logo2=10;
        $logo3=10;
    }elseif($_COOKIE['login']=='ot'){
        $logo1=11;
        $logo2=11;
        $logo3=11;
    }elseif($_COOKIE['login']=='hs'){
        $logo1=12;
        $logo2=12;
        $logo3=12;
    }elseif($_COOKIE['login']=='ts'){
        $logo1=13;
        $logo2=13;
        $logo3=13;
    }elseif($_COOKIE['login']=='itp'){
        $logo1=14;
        $logo2=14;
        $logo3=14;
    }elseif($_COOKIE['login']=='ss'){
        $logo1=15;
        $logo2=16;
        $logo3=16;
    }elseif($_COOKIE['login']=='mg'){
        $logo1=17;
        $logo2=18;
        $logo3=18;
    }elseif($_COOKIE['login']=='th'){
        $logo1=19;
        $logo2=19;
        $logo3=20;
    }elseif($_COOKIE['login']=='avtom'){
        $logo1=21;
        $logo2=21;
        $logo3=21;
    }elseif($_COOKIE['login']=='pos'){
        $logo1=22;
        $logo2=22;
        $logo3=22;
    }elseif($_COOKIE['login']=='atz'){
        $logo1=23;
        $logo2=23;
        $logo3=23;
    }elseif($_COOKIE['login']=='oos'){
        $logo1=24;
        $logo2=24;
        $logo3=24;
    }elseif($_COOKIE['login']=='ppm'){
        $logo1=25;
        $logo2=25;
        $logo3=25;
    }elseif($_COOKIE['login']=='gocs'){
        $logo1=26;
        $logo2=26;
        $logo3=26;
    }elseif($_COOKIE['login']=='odi'){
        $logo1=27;
        $logo2=27;
        $logo3=27;
    }elseif($_COOKIE['login']=='ee'){
        $logo1=28;
        $logo2=28;
        $logo3=28;
    }elseif($_COOKIE['login']=='smeti'){
        $logo1=29;
        $logo2=29;
        $logo3=29;
    }elseif($_COOKIE['login']=='beo'){
        $logo1=30;
        $logo2=30;
        $logo3=30;
    }elseif($_COOKIE['login']=='ozds'){
        $logo1=31;
        $logo2=31;
        $logo3=31;
    }elseif($_COOKIE['login']=='Arcenii'){
        $logo1=22;
        $logo2=23;
        $logo3=30;
    }else{

    }

    foreach ($pos_num as $key_m => $col) {
        if(isset($row['task'][$key_m]) && $row['task'][$key_m]['notuse']==1){
            echo '<td><a 
            href="#" class="openformtask">Не исп.
            </a> </td>';
        }elseif(isset($row['task'][$key_m])){
            if($row['task'][$key_m]['fullfuck']==1){
                if($key_m==$logo1 || $key_m==$logo2 || $key_m==$logo3){
                    if($key_m==5 || $key_m==6){
                        echo '<td alt="' . $row['task'][$key_m]['id'] . '" bgcolor="#e8d532"><a 
                        href="/?modal=updatetasknum&pos_num='.$key_m.'&task_id='.$row['task'][$key_m]['id'].'&object_id='.$row['id'].'&object_name='.$row['name'].'&fullfuckis='.$row['task'][$key_m]['fullfuck'].'" class="modal-a openformtask"
                        >'. $row['task'][$key_m]['progress'] .' %
                        </a></td>';
                    }else{
                        echo '<td alt="' . $row['task'][$key_m]['id'] . '" bgcolor="#e8d532"><a 
                        href="/?modal=updatetask&pos_num='.$key_m.'&task_id='.$row['task'][$key_m]['id'].'&object_id='.$row['id'].'&object_name='.$row['name'].'&fullfuckis='.$row['task'][$key_m]['fullfuck'].'" class="modal-a openformtask"
                        >'. $row['task'][$key_m]['progress'] .' %
                        </a></td>';
                    }
                }else {                   
                    echo '<td><a 
                    href="#" class="openformtask" " bgcolor="#e8d532"
                    >'. $row['task'][$key_m]['progress'] .' %</a></td>';
                }
            }else{
                if($key_m==$logo1 || $key_m==$logo2 || $key_m==$logo3){
                    if($key_m==5 || $key_m==6){
                        echo '<td alt="' . $row['task'][$key_m]['id'] . '"><a 
                        href="/?modal=updatetasknum&pos_num='.$key_m.'&task_id='.$row['task'][$key_m]['id'].'&object_id='.$row['id'].'&object_name='.$row['name'].'&fullfuckis='.$row['task'][$key_m]['fullfuck'].'" class="modal-a openformtask"
                        >'. $row['task'][$key_m]['progress'] .' %
                        </a></td>';
                    }else{
                        echo '<td alt="' . $row['task'][$key_m]['id'] . '"><a 
                        href="/?modal=updatetask&pos_num='.$key_m.'&task_id='.$row['task'][$key_m]['id'].'&object_id='.$row['id'].'&object_name='.$row['name'].'&fullfuckis='.$row['task'][$key_m]['fullfuck'].'" class="modal-a openformtask"
                        >'. $row['task'][$key_m]['progress'] .' %
                        </a></td>';
                    }
                }else {
                    echo '<td><a 
                    href="#" class="openformtask"
                    >'. $row['task'][$key_m]['progress'] .' %</a></td>';
                }
            }
        }else{
            if($key_m==$logo1 || $key_m==$logo2 || $key_m==$logo3){
                if($key_m==5 || $key_m==6){
                    echo '<td><a 
                    href="/?modal=updatetasknum&pos_num='.$key_m.'&task_id=new&object_id='.$row['id'].'&object_name='.$row['name'].'" class="modal-a openformtask hideFuck">+
                    </a> </td>';
                }else{
                echo '<td><a 
                href="/?modal=updatetask&pos_num='.$key_m.'&task_id=new&object_id='.$row['id'].'&object_name='.$row['name'].'" class="modal-a openformtask hideFuck">+
                </a> </td>';
                }
            }else {                
                echo '<td><a 
                href="#" class=" openformtask hideFuck">+
                </a> </td>';
            }
        }
    }
    echo '</tr>';
}else{}
    $pp++;
}
   
    echo "</table>";

}elseif($_COOKIE['role']=='gip' ){
    include(__DIR__.'/../template/plancontrol-users.php');
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
                if($key_m==1){
                echo '<td alt="' . $row['task'][$key_m]['id'] . '" bgcolor="#e8d532"><a 
                href="/?modal=updatetask&pos_num='.$key_m.'&task_id='.$row['task'][$key_m]['id'].'&object_id='.$row['id'].'&object_name='.$row['name'].'&fullfuckis='.$row['task'][$key_m]['fullfuck'].'" class="modal-a openformtask"
                >'. $row['task'][$key_m]['progress'] .' %
                </a></td>';
                }else{
                    echo '<td><a 
                    href="#" class="openformtask" " bgcolor="#e8d532"
                    >'. $row['task'][$key_m]['progress'] .' %</a></td>';
                }
            }else{
                if($key_m==1){
                    echo '<td alt="' . $row['task'][$key_m]['id'] . '"><a 
                href="/?modal=updatetask&pos_num='.$key_m.'&task_id='.$row['task'][$key_m]['id'].'&object_id='.$row['id'].'&object_name='.$row['name'].'" class="modal-a openformtask"
                >'. $row['task'][$key_m]['progress'] .' %
                </a></td>';
                
                }else {
                    echo '<td><a 
                    href="#" class="openformtask"
                    >'. $row['task'][$key_m]['progress'] .' %</a></td>';
                }
            }
        }else{
            if($key_m==1){
                echo '<td><a 
            href="/?modal=updatetask&pos_num='.$key_m.'&task_id=new&object_id='.$row['id'].'&object_name='.$row['name'].'" class="modal-a openformtask hideFuck">+
            </a> </td>';
            }else {
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
}elseif($_COOKIE['role']=='arhiv'){
    include(__DIR__.'/../template/plancontrol-users.php');

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
                if($row['task'][$key_m]['progress']<94){
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
                    href="/?modal=arhiv&pos_num='.$key_m.'&task_id='.$row['task'][$key_m]['id'].'&object_id='.$row['id'].'&object_name='.$row['name'].'" class="modal-a openformtask">'. $row['task'][$key_m]['progress'] .'%
                    </a> </td>';
                    }else{
                    echo '<td><a 
                    href="/?modal=arhiv&pos_num='.$key_m.'&task_id='.$row['task'][$key_m]['id'].'&object_id='.$row['id'].'&object_name='.$row['name'].'" class="modal-a openformtask">'. $row['task'][$key_m]['progress'] .'%
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
    include(__DIR__.'/../template/plancontrol-users.php');


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
                    href="/?modal=expertP&pos_num='.$key_m.'&task_id='.$row['task'][$key_m]['id'].'&object_id='.$row['id'].'&object_name='.$row['name'].'" class="modal-a openformtask">'. $row['task'][$key_m]['progress'] .'%
                    </a> </td>';
                    }else{
                    echo '<td><a 
                    href="/?modal=expertP&pos_num='.$key_m.'&task_id='.$row['task'][$key_m]['id'].'&object_id='.$row['id'].'&object_name='.$row['name'].'" class="modal-a openformtask">'. $row['task'][$key_m]['progress'] .'%
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
    
}else{
      echo '<h1>Ошибка в правах доступа!</h1>';
}




?>
    
<!-- import jQuery -->
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
    
<!-- write script to toggle class on scroll -->
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

$(function(){
  $('.side-menu-bar').click(function() {
    $('.side-menu-wrap').toggleClass('active');
  });
});


</script>