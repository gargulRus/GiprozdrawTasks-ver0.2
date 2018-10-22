<?php
$countin="Кол-во";
$count="";
$task_id = $_GET['task_id'];
$pos_num = $_GET['pos_num'];
$object_id = $_GET['object_id'];
$object_name = $_GET['object_name'];
$tytfile=0;

if(!empty($_GET['count'])){
$count = $_GET['count'];
}else{}

$task=array();
if(!empty($task_id) && $task_id!='new'){
    $task = mysqli_fetch_assoc(query("SELECT * FROM plancontrol WHERE id=".$task_id));
}


$plan = expert_list($pos_num);

if(!empty($count)){
    $countin = $count;
}else{}
?>
<!-- Модальное окно изменения задачи -->
<div class="">

    <div class="modal-header">
    <h4 class="modal-title">Изменение замечаний &laquo;<?php echo $plan['title'];?>&raquo;  <?php echo $object_name; ?></h4>
    <div class="modal-body">
    <form  action="/?save=updatetaskexp" method="POST"  class="form-ajax">
        
            <!-- <input type="checkbox"  name="boxnotuse" id="notuseid" class="notuse" value=1>
            <label class="btn btn-danger btn-sm" for="notuseid">Том не нужен</label> -->

                    <?php
                    if($_COOKIE['role']=='admin'){
                        echo '
                        <br>
                        <input name="percent" type="text" value="" placeholder="'.$countin.'" id="obname" class="form-control">
                        <br>
                        ';
                        }elseif($_COOKIE['role']=='expert'){
                            echo '
                            <br>
                            <input name="percent" type="text" value="" placeholder="'.$countin.'" id="obname" class="form-control">
                            <br>
                            ';
                        }elseif($_COOKIE['role']=='spec' || $_COOKIE['role']=='gip' || $_COOKIE['role']=='gap' 
                                || $_COOKIE['role']=='kr' || $_COOKIE['role']=='ov' || $_COOKIE['role']=='arhiv'){

                        }
                    ?>
                  <input name='task_id' type='hidden' value="<?php echo $task_id;?>">
            <input name='pos_num' type='hidden' value="<?php echo $pos_num;?>">
            <input name='object_id' type='hidden' value="<?php echo $object_id;?>">
            <input name='object_name' type='hidden' value="<?php echo $object_name;?>">
            <input name='task_name' type='hidden' value="<?php echo $plan['title'];?>">
                <br>
                <br>
            <div class="form-group">
            <?php
                    if($_COOKIE['role']=='admin'){
                        echo '           <input type="checkbox"  name="deleteexp" id="deleteexpid" class="deleteexp" value=1>
                        <label for="deleteexpid">Убрать замечания</label>'; 
                    }elseif($_COOKIE['role']=='expert'){
                        echo '           <input type="checkbox"  name="deleteexp" id="deleteexpid" class="deleteexp" value=1>
                        <label for="deleteexpid">Убрать замечания</label>';
                    }else{}
                    ?>
            </div>
            
            <div class="form-group text-right">
            <?php
                    if($_COOKIE['role']=='admin'){
                        echo '<input type="submit" class="btn btn-success" value="Сохранить"/>'; 
                    }elseif($_COOKIE['role']=='expert'){
                        echo '<input type="submit" class="btn btn-success" value="Сохранить"/>'; 
                    }else{}
                    ?>
                
            </div>
        </form>
    </div>

</div>
