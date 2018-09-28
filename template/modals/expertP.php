<?php
$task_id = $_GET['task_id'];
$pos_num = $_GET['pos_num'];
$object_id = $_GET['object_id'];
$object_name = $_GET['object_name'];
$task=array();
if(!empty($task_id) && $task_id!='new'){
    $task = mysqli_fetch_assoc(query("SELECT * FROM plancontrol WHERE id=".$task_id));
}

$plan = expertP_list($pos_num);

?>
<!-- Модальное окно изменения задачи -->
<div class="">

    <div class="modal-header">
        <h4 class="modal-title">Редактирование раздела &laquo;<?php echo $plan['title'];?>&raquo; <?php echo $object_name; ?></h4>
    </div>
    <div class="modal-body">
        <form method="POST" action="/?save=expertP" class="form-ajax">
            <?php foreach($plan['tasks'] as $key=>$checkbox){ ?>
                <div class="form-group">
                    <input type="checkbox" name="<?php echo $key;?>" 
                        id="task_<?php echo $key;?>" value=1 
                        <?php echo (isset($task[$key]) && $task[$key]==1)
                        ?'checked'
                        :'' ?>
                        >
                        <label <?php echo (isset($task[$key]) && $task[$key]==1)
                        ?'class ="bg-success"'
                        :'' ?>
                         for="task_<?php echo $key;?>"><?php echo $checkbox['title'];?>
                        <?php echo (isset($task[$key]) && $task[$key]==1)
                        ?'<div class="btn btn-danger btn-sm" for="delpzid">Убрать раздел</div>'
                        :'' ?>
                        </label>
                </div>
            <?php } ?>

            <input name='task_id' type='hidden' value="<?php echo $task_id;?>">
            <input name='pos_num' type='hidden' value="<?php echo $pos_num;?>">
            <input name='object_id' type='hidden' value="<?php echo $object_id;?>">
            
            <div class="form-group text-right">
                <input type="submit" class="btn btn-success" value="Сохранить"/>
            </div>
        </form>
    </div>

</div>