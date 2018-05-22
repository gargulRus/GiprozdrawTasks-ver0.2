<div class="buttnons">
<a href="/?page=main.php" class="btn btn-gipro">План работ по договорам</a>
<a href="/?page=plancontrol.php" class="btn btn-gipro">Таблица контроля</a>
<a href="/?page=planforyear.php" class="btn btn-gipro">План работ на год факт</a>
<a href="/?page=planforyear-plan.php" class="btn btn-gipro">План работ на год план</a>
<br>
<br>
<a href="/?page=plancontrol.php" class="btn btn-gipro">План работ стадия Проект</a>
<a href="/?page=planexpert.php" class="btn btn-gipro">Замечания Экспертизы</a>
<a href="/?page=plancontrolR.php" class="btn btn-gipro">План работ стадия Рабочка</a>
</div>

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
    
