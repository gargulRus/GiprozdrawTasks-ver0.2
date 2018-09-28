<div class="buttnons">
</div>

<!-- <div class="fixed-box">
    <div class="fixed-div">
    <div class='div-table'>
    <table class='table table-bordered table-hover table-condensed list-object1'>
        <tr>
            <th width="20" >П.П.</th>
            <th width="191">Договор</th>
            <th width="66">Генплан</th>
            <th width="65">АР</th>
            <th width="61">КР</th>
            <th width="61">ЭОМ</th>
            <th width="61">НЭС</th>
            <th width="61">ВК</th>
            <th width="61">НВК</th>
            <th width="61">АПТ</th>
            <th width="45">ОВ</th>
            <th width="45">ОТ</th>
            <th width="61">ХС</th>
            <th width="61">ТС</th>
            <th width="80">Тепл. пункт</th>
            <th width="60">СС</th>
            <th width="45">НСС</th>
            <th width="45">МГ</th>
            <th width="60">КГС</th>
            <th width="46">ТХ</th>
            <th width="66">Рад. Без.</th>
            <th width="45">Автом.</th>
            <th width="46">ПОС\ПОД</th>
            <th width="46">АТЗ</th>
            <th width="45">ООС</th>
            <th width="45">ППМ</th>
            <th width="45">ГОЧС</th>
            <th width="45">ОДИ</th>
            <th width="45">Энергоэфф.</th>
            <th width="45">Сметы</th>
            <th width="45">БЭО</th>
            <th width="45">ОЗДС</th>
        </tr>
</table>
</div>
</div>
</div> -->
<?php
include(__DIR__.'/../template/plancontrol-users.php');
include(__DIR__.'/../template/plancontrol-edit.php');



//     foreach ($list as $key => $row) {
//         echo '<tr>';
//         echo '<td>' . $pp . '</td>';
//         // echo '<td><a 
//         //     href="/?modal=renameobject&id='.$row['id'].'"
//         //     class="openform modal-a" 
//         //     >'. $row['name'] .'</a></td>';
//         echo '<td><a 
//         href="#" 
//         data-toggle="modal" data-target="#renameobject" 
//         class="openform" 
//         data-id="'.$row['id'].'"
//         data-name="'.$row['name'].'"
//         >'. $row['name'] .'</a></td>';
   
//         foreach ($pos_num as $key_m => $col) {
//             if(isset($row['task'][$key_m]) && $row['task'][$key_m]['notuse']==1){
//                 echo '<td><a 
//                 href="#" class="openformtask">Не исп.
//                 </a> </td>';
//             }elseif(isset($row['task'][$key_m])){
//                 if($row['task'][$key_m]['fullfuck']==1){
//                     echo '<td alt="' . $row['task'][$key_m]['id'] . '" bgcolor="#e8d532"><a 
//                     href="/?modal=updatetask&pos_num='.$key_m.'&task_id='.$row['task'][$key_m]['id'].'&object_id='.$row['id'].'&object_name='.$row['name'].'&fullfuckis='.$row['task'][$key_m]['fullfuck'].'" class="modal-a openformtask"
//                     >'. $row['task'][$key_m]['progress'] .' %
//                     </a></td>';
//                 }else{
//                     echo '<td alt="' . $row['task'][$key_m]['id'] . '"><a 
//                     href="/?modal=updatetask&pos_num='.$key_m.'&task_id='.$row['task'][$key_m]['id'].'&object_id='.$row['id'].'&object_name='.$row['name'].'" class="modal-a openformtask"
//                     >'. $row['task'][$key_m]['progress'] .' %
//                     </a></td>';
//                 }
//             }else{
//                 echo '<td><a 
//                 href="/?modal=updatetask&pos_num='.$key_m.'&task_id=new&object_id='.$row['id'].'&object_name='.$row['name'].'" class="modal-a openformtask hideFuck">+
//                 </a> </td>';
//             }
//         }
//         echo '</tr>';
//     $pp++;
//   }
//        echo "</table>";
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
</script>