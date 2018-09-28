<?php
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

    if($_COOKIE['login']=='arhc'){
        foreach ($pos_num as $key_m => $col) {
            if(isset($row['task'][$key_m]) && $row['task'][$key_m]['notuse']==1){
                echo '<td><a 
                href="#" class="openformtask">Не исп.
                </a> </td>';
            }elseif(isset($row['task'][$key_m])){
                if($row['task'][$key_m]['fullfuck']==1){
                    if($key_m==3){
                        echo '<td alt="' . $row['task'][$key_m]['id'] . '" bgcolor="#e8d532"><a 
                        href="/?modal=updatetask&pos_num='.$key_m.'&task_id='.$row['task'][$key_m]['id'].'&object_id='.$row['id'].'&object_name='.$row['name'].'&fullfuckis='.$row['task'][$key_m]['fullfuck'].'" class="modal-a openformtask"
                        >'. $row['task'][$key_m]['progress'] .' %
                        </a></td>';
                    }else {                   
                        echo '<td><a 
                        href="#" class="openformtask" " bgcolor="#e8d532"
                        >'. $row['task'][$key_m]['progress'] .' %</a></td>';
                    }
                }else{
                    if($key_m==3){
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
                if($key_m==3){
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

    }else{
    foreach ($pos_num as $key_m => $col) {
        if(isset($row['task'][$key_m]) && $row['task'][$key_m]['notuse']==1){
            echo '<td><a 
            href="#" class="openformtask">Не исп.
            </a> </td>';
        }elseif(isset($row['task'][$key_m])){
            if($row['task'][$key_m]['fullfuck']==1){
                if($key_m==5 || $key_m==6){
                    echo '<td alt="' . $row['task'][$key_m]['id'] . '" bgcolor="#e8d532"><a 
                    href="/?modal=updatetasknum&pos_num='.$key_m.'&task_id='.$row['task'][$key_m]['id'].'&object_id='.$row['id'].'&object_name='.$row['name'].'&fullfuckis='.$row['task'][$key_m]['fullfuck'].'" class="modal-a openformtask"
                    >'. $row['task'][$key_m]['progress'] .' %
                    </a></td>';
                }else {echo '<td alt="' . $row['task'][$key_m]['id'] . '" bgcolor="#e8d532"><a 
                href="/?modal=updatetask&pos_num='.$key_m.'&task_id='.$row['task'][$key_m]['id'].'&object_id='.$row['id'].'&object_name='.$row['name'].'&fullfuckis='.$row['task'][$key_m]['fullfuck'].'" class="modal-a openformtask"
                >'. $row['task'][$key_m]['progress'] .' %
                </a></td>';
                }
            }else{
                if($key_m==5 || $key_m==6){
                    echo '<td alt="' . $row['task'][$key_m]['id'] . '"><a 
                href="/?modal=updatetasknum&pos_num='.$key_m.'&task_id='.$row['task'][$key_m]['id'].'&object_id='.$row['id'].'&object_name='.$row['name'].'" class="modal-a openformtask"
                >'. $row['task'][$key_m]['progress'] .' %
                </a></td>';
                
                }else {
                    echo '<td alt="' . $row['task'][$key_m]['id'] . '"><a 
                href="/?modal=updatetask&pos_num='.$key_m.'&task_id='.$row['task'][$key_m]['id'].'&object_id='.$row['id'].'&object_name='.$row['name'].'" class="modal-a openformtask"
                >'. $row['task'][$key_m]['progress'] .' %
                </a></td>';
                }
            }
        }else{
            if($key_m==5 || $key_m==6){
                echo '<td><a 
                href="/?modal=updatetasknum&pos_num='.$key_m.'&task_id=new&object_id='.$row['id'].'&object_name='.$row['name'].'" class="modal-a openformtask hideFuck">+
                </a> </td>';
            }else {echo '<td><a 
            href="/?modal=updatetask&pos_num='.$key_m.'&task_id=new&object_id='.$row['id'].'&object_name='.$row['name'].'" class="modal-a openformtask hideFuck">+
            </a> </td>';
            }
        }
    }
}
    echo '</tr>';
$pp++;
    }else{}
}
   echo "</table>";
?>
