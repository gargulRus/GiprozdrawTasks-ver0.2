<div class="buttnons">
</div>

<!-- <div class="fixed-box">
    <div class="fixed-div">
    <div class='div-table'>

   <table class='table table-bordered table-hover table-condensed list-object1'>
        <tr>
        <th width="20" >П.П.</th>
            <th width="257">Договор</th>
            <th width="95">Генплан</th>
            <th width="95">АР</th>
            <th width="97">КР</th>
            <th width="96">ЭО</th>
            <th width="96">ЭМ</th>
            <th width="60">НЭС</th>
            <th width="71">ВК</th>
            <th width="71">НВК</th>
            <th width="71">ДС</th>
            <th width="60">АПТ</th>
            <th width="45">ОВ</th>
            <th width="45">ОТ</th>
            <th width="71">ХС</th>
            <th width="43">ТС</th>
            <th width="125">Тепл. пункт</th>
            <th width="97">СС</th>
            <th width="45">МГ</th>
            <th width="96">КГС</th>
            <th>ТХ</th>
            <th>Автом.</th>
            <th>Сметы</th>
        </tr>
</table>

    </div>
</div>
</div> -->

<?php
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