<div class="buttnons">
<a href="/?page=main-expert.php" class="btn btn-gipro">План работ по договорам</a>
<a href="/?page=plancontrol-expert.php" class="btn btn-gipro">Таблица контроля</a>
<a href="/?page=planforyear-expert.php" class="btn btn-gipro">План работ на год Факт</a>
<a href="/?page=planforyear-plan.php" class="btn btn-gipro">План работ на год План</a>
<br>
<br>
<a href="/?page=plancontrol-expert.php" class="btn btn-gipro">План работ стадия Проект</a>
<a href="/?page=planexpert-expert.php" class="btn btn-gipro">Замечания Экспертизы</a>
<a href="/?page=plancontrolR-expert.php" class="btn btn-gipro">План работ стадия Рабочка</a>

<?php
include(__DIR__.'/../template/planexpert-users.php');

foreach ($list as $key => $row) {
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
                href="#"';
                echo 'data-toggle="modal" data-target="#updatetaskexp" 
                class="openformtaskexp"';
                echo'data-id="'.$row['task'][$key_m]['id'].'"
                data-progress="'.$row['task'][$key_m]['exp_num'].'"
                data-pos="'.$key_m.'"
                data-object-id="'.$row['id'].'"
                >'. $row['task'][$key_m]['exp_num'] .'</a></td>';
        }else{
            echo '<td><a 
                href="#" 
                data-toggle="modal" data-target="#updatetask" 
                data-pos="'.$key_m.'"
                data-object-id="'.$row['id'].'"
                class="openformtask hideFuck" >+
                </a> </td>';
        }
    }
    echo '</tr>';
$pp++;
}
   echo "</table>";
   
?>

<!-- Модальное окно изменения прогресса выполнения -->
<div id="updatetask" class="modal fade">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button class="close" data-dismiss="modal">x</button>
        <h4 class="modal-title">Количество замечаний</h4>
        </div>
        <div class="modal-body">
             <form method="POST" action="/?save=updatetaskexp" id="updatetaskform">
                <div class="form-group">
                <input name='name' type='text' value="" placeholder="Кол-во" id="obname" class="form-control">
            </div>
            <br>
                 <input name='id' type='hidden' value="" id="expid">
                 <input name='object-id' type='hidden' value="" id="expobjectid">
                 <input name='pos' type='hidden' value="" id="exppos">         
                 <input name='progress' type='hidden' value="" id="expprog">    
             <div class="form-group text-right">
                 <input type="submit" class="btn btn-success" value="Сохранить"/>
            </div>
        </form>
    </div>
    </div>
</div>
</div>
<!-- Модальное окно изменения прогресса выполнения чекбокс ПЗ-не активен-->
<div id="updatetaskexp" class="modal fade">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button class="close" data-dismiss="modal">x</button>
        <h4 class="modal-title">Количество замечаний</h4>
        </div>
        <div class="modal-body">
             <form method="POST" action="/?save=updatetaskexp" id="updatetaskformexp">
             <div class="form-group">
                <input name='name' type='text' value="" placeholder="Кол-во" id="obname" class="form-control">
            </div>
            <div class="form-group">
                 <input type="checkbox"  name="deleteobject" id="obdelete" class="objectdelete" value=1>
                 <label for="obdelete">Убрать замечания</label>
            </div>
                 <input name='id' type='hidden' value="" id="obid">
            <br>
                 <input name='id' type='hidden' value="" id="expidpz">
                 <input name='object-id' type='hidden' value="" id="expobjectidpz">
                 <input name='pos' type='hidden' value="" id="exppospz">         
                 <input name='progress' type='hidden' value="" id="expprogpz">    
             <div class="form-group text-right">
                 <input type="submit" class="btn btn-success" value="Сохранить"/>
               </div>
        </form>
    </div>
    </div>
</div>
</div>

<script type="text/javascript">
$( document ).ready(function() {

   // скрипт для пустой ячейки
$('.openformtask').click(function(){
    $('#expprog').val( $(this).attr('data-progress'));
    $('#expid').val( $(this).attr('data-id') );
    $('#exppos').val( $(this).attr('data-pos') );
    $('#expobjectid').val( $(this).attr('data-object-id') );           
});

    $('#updatetaskform').submit(function(){
            $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
          $('#updatetaskform').html( data );
        });
    return false;
});
       // скрипт для ячейки с содержимым
       $('.openformtaskexp').click(function(){
    $('#expprogpz').val( $(this).attr('data-progress'));
    $('#expidpz').val( $(this).attr('data-id') );
    $('#exppospz').val( $(this).attr('data-pos') );
    $('#expobjectidpz').val( $(this).attr('data-object-id') );           
});

    $('#updatetaskformexp').submit(function(){
            $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
          $('#updatetaskformexp').html( data );
        });
    return false;
});
 
});
</script>

?>