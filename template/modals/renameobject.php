<?php
$object_id = $_GET['id'];
$object = mysqli_fetch_assoc(query("SELECT id, name, arhiv_id FROM objects WHERE `id` = '".$object_id."' LIMIT 1"));
?>
<!-- Модальное окно переименования объекта -->
<div class="">

    <div class="modal-header">
        <h4 class="modal-title">Редактирование объекта &laquo;<?php echo $object['name'];?>&raquo;</h4>
    </div>
    <div class="modal-body">
        <form method="POST" action="/?save=renameobject" class="form-ajax">
            <div class="form-group">
                <input name='name' type='text' value="<?php echo $object['name'];?>" placeholder="Имя" id="obname" class="form-control">
            </div>
            <div class="form-group">
            <?php  if($object['arhiv_id']==1){
                        echo "<input type='checkbox' name='towork' id='obtowork' class='objecttowork' value=1>
                        <label for='obtowork'>В работу</label>";
                    }else{
                        echo "<input type='checkbox' name='toarhiv' id='obtoarhiv' class='objecttoarhiv' value=1>
                        <label for='obtorhiv'>В архив</label>";
                    }
                    ?>

                    <input type="checkbox" name="deleteobject" id="obdelete" class="objectdelete" value=1>
                    <label for="obdelete">Удалить объект</label>
            </div>
            <input name='id' type='hidden' value="<?php echo $object['id'];?>" id="obid">
            
            <div class="form-group text-right">
                <input type="submit" class="btn btn-success" value="Сохранить"/>
            </div>
        </form>
    </div>

</div>