<div class="buttnons">
<a href="/?page=main.php" class="btn btn-gipro">План работ по договорам</a>
<a href="/?page=plancontrol.php" class="btn btn-gipro">Таблица контроля</a>
<a href="/?page=planforyear.php" class="btn btn-gipro">План работ на год</a>
<br><br>
<a href="#" data-toggle="modal" data-target="#write" class="openformcreate btn btn-gipro">Новый Объект</a>
<a href="#" data-toggle="modal" data-target="#newgip" class="openformcreate btn btn-gipro">ГИПы</a>
<a href="#" data-toggle="modal" data-target="#newcur" class="openformcreate btn btn-gipro">Кураторы</a> 
<a href="#" data-toggle="modal" data-target="#newexp" class="openformcreate btn btn-gipro">Отв за Эксперт.</a>  
</div>

<?php

include(__DIR__.'/../template/main-users.php');

    foreach ($list as $key => $row) {
        echo '<tr>';
        echo '<td>' . $pp . '</td>';
        echo '<td><a 
            href="/?modal=renameobject&id='.$row['id'].'"
            class="openform modal-a" 
            >'. $row['name'] .'</a></td>';
            //проверяем наличие ГИПа в массиве
            if(isset($row['gip'][$keygip]['gipname'])){
                echo '<td class="gips"><a  id="openformgip"
            href="#" 
            data-toggle="modal" data-target="#changegip" 
            class="openformgip" 
            data-id="'.$row['id'].'"
            data-gip_id="'.$row['gip_id'].'"
            >'. $row['gip'][$keygip]['gipname'] .'</a></td>';
            }else {
                echo '<td><a id="openformgip"
                href="#" 
                data-toggle="modal" data-target="#changegip" 
                class="openformgip" 
                data-id="'.$row['id'].'"
                data-gip_id="'.$row['gip_id'].'"
                >+</a></td>';
            }
             //проверяем наличие Куратора в массиве
            if(isset($row['cur'][$keygip]['cur_name'])){
                echo '<td><a 
            href="#" 
            data-toggle="modal" data-target="#changecur" 
            class="openformcur" 
            data-id="'.$row['id'].'"
            data-cur_id="'.$row['cur_id'].'"
            >'. $row['cur'][$keygip]['cur_name'] .'</a></td>';
            }else {
                echo '<td><a 
                href="#" 
                data-toggle="modal" data-target="#changecur" 
                class="openformcur" 
                data-id="'.$row['id'].'"
                data-cur_id="'.$row['cur_id'].'"
                >+</a></td>';
            }
             //проверяем наличие Эксперта в массиве
            if(isset($row['exp'][$keygip]['exp_name'])){
                echo '<td><a 
            href="#" 
            data-toggle="modal" data-target="#changeexp" 
            class="openformexp" 
            data-id="'.$row['id'].'"
            data-exp_id="'.$row['exp_id'].'"
            >'. $row['exp'][$keygip]['exp_name'] .'</a></td>';
            }else {
                echo '<td><a 
                href="#" 
                data-toggle="modal" data-target="#changeexp" 
                class="openformexp" 
                data-id="'.$row['id'].'"
                data-exp_id="'.$row['exp_id'].'"
                >+</a></td>';
            }
        foreach ($main_pos as $key_m => $col) {
            if(isset($row['plan'][$key_m])){
                //полученную дату из массива переворачиваем в удобный вид.
                $newdate=date('d-m-Y', strtotime($row['plan'][$key_m]['data']));
                  echo '<td alt="' . $row['plan'][$key_m]['id'] . '"><a 
                    href="#" 
                    data-toggle="modal" data-target="#changedate" 
                    class="openformplan" 
                    data-id="'.$row['plan'][$key_m]['id'].'"
                    data-data="'.$row['plan'][$key_m]['data'].'"
                    data-pos="'.$key_m.'"
                    data-object-id="'.$row['id'].'"
                    >'. $newdate .'</a></td>';
            }else{
                echo '<td><a 
                    href="#" 
                    data-toggle="modal" data-target="#changedate" 
                    data-pos="'.$key_m.'"
                    data-object-id="'.$row['id'].'"
                    class="openformplan hideFuck" >+
                    </a> </td>';
            }
        }
        echo '</tr>';
    $pp++;
  }
       echo "</table>";
       echo "</div>";
?>
<!-- Модальное окно создания объекта -->
<div id="write" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Создать объект</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=write" id="createobj">
                    <div class="form-group">
                    <input name='name' type='text' value="" placeholder="Имя" id="obname1" class="form-control">
                </div>
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>
<!-- Модальное окно ГИПа -->
<div id="newgip" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">ГИПы</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=newgip" id="creategip">
                 <div class="form-group">
                    <label for="compsel">Добавить нового ГИПа в базу</label>
                    <input name='name' type='text' value="" placeholder="Фамилия ГИПа" id="" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="compsel">Изменить ГИПа в базе</label>
                    <?=$select;?>
                    </div>
                    <div class="form-group">
                    <label for="obdelete">Удалить</label>
                    <input type="checkbox"  name="deletegip" id="gipdelete" class="gipdelet" value=1>
                    <label for="obrename">Переименовать</label>
                    <input type="checkbox"  name="renamegip" id="giprename" class="giprenam" value=1>
                    <input name='rename' type='text' value="" placeholder="Фамилия ГИПа" id="" class="form-control">
                </div>
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>
<!-- Модальное окно Куратора -->
<div id="newcur" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Кураторы</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=newcur" id="createcur">
                 <div class="form-group">
                    <label for="compsel">Добавить нового Куратора в базу</label>
                    <input name='name' type='text' value="" placeholder="Фамилия Куратора" id="" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="compsel">Изменить Куратора в базе</label>
                    <?=$selectcur;?>
                    </div>
                    <div class="form-group">
                    <label for="obdelete">Удалить</label>
                    <input type="checkbox"  name="deletecur" id="curdelete" class="curdelet" value=1>
                    <label for="obrename">Переименовать</label>
                    <input type="checkbox"  name="renamecur" id="currename" class="currenam" value=1>
                    <input name='rename' type='text' value="" placeholder="Фамилия Куратора" id="" class="form-control">
                </div>
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>
<!-- Модальное окно Отв.Эксп. -->
<div id="newexp" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Ответственный по экспертизе</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=newexp" id="createexp">
                 <div class="form-group">
                    <label for="compsel">Добавить нового Ответственного в базу</label>
                    <input name='name' type='text' value="" placeholder="Фамилия Ответств." id="" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="compsel">Изменить Ответственного в базе</label>
                    <?=$selectexp;?>
                    </div>
                    <div class="form-group">
                    <label for="obdelete">Удалить</label>
                    <input type="checkbox"  name="deleteexp" id="expdelete" class="expdelet" value=1>
                    <label for="obrename">Переименовать</label>
                    <input type="checkbox"  name="renameexp" id="exprename" class="exprenam" value=1>
                    <input name='rename' type='text' value="" placeholder="Фамилия Ответств." id="" class="form-control">
                </div>
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>
<!-- Модальное окно переименования объекта -->
<div id="renameobject" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Переименовать объект</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=renameobject" id="renameobj">
                    <div class="form-group">
                    <input name='name' type='text' value="" placeholder="Имя" id="obname" class="form-control">
                </div>
                <div class="form-group">
                     <input type="checkbox"  name="deleteobject" id="obdelete" class="objectdelete" value=1>
                     <label for="obdelete">Удалить объект</label>
                </div>
                     <input name='id' type='hidden' value="" id="obid">
            
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>

<!-- Модальное окно смены гипа -->
<div id="changegip" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Сменить ГИПа</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=changegip" id="changegipid">
                    <div class="form-group">
                    <?=$select;?>
                </div>
                <div class="form-group">
                     <input type="checkbox"  name="deleteobject" id="obdelete" class="objectdelete" value=1>
                     <label for="obdelete">Снять ГИПа</label>
                </div>
                     <input name='id' type='hidden' value="" id="gipobid">
            
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>

<!-- Модальное окно смены Куратора -->
<div id="changecur" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Сменить Куратора</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=changecur" id="changecurid">
                    <div class="form-group">
                    <?=$selectcur;?>
                </div>
                <div class="form-group">
                     <input type="checkbox"  name="deleteobject" id="obdelete" class="objectdelete" value=1>
                     <label for="obdelete">Снять Куратора</label>
                </div>
                     <input name='id' type='hidden' value="" id="curobid">
            
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>

<!-- Модальное окно смены Отв.Эксп -->
<div id="changeexp" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Сменить Отв.Экпс.</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=changeexp" id="changeexpid">
                    <div class="form-group">
                    <?=$selectexp;?>
                </div>
                <div class="form-group">
                     <input type="checkbox"  name="deleteobject" id="obdelete" class="objectdelete" value=1>
                     <label for="obdelete">Снять Отв.Эксп.</label>
                </div>
                     <input name='id' type='hidden' value="" id="expobid">
            
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>
<!-- Модальное окно смены даты -->
<div id="changedate" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Сменить дату</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=changedate" id="changedateform">
                    <div class="form-group">
                    <input type="date" name="calendar">
                </div>
                <div class="form-group">
                     <input type="checkbox"  name="deletedate" id="pldelete" class="plandelete" value=1>
                     <label for="pldelete">Убрать дату</label>
                </div>
                     <input name='id' type='hidden' value="" id="chngid">
                     <input name='object-id' type='hidden' value="" id="chngobjectid">
                     <input name='date' type='hidden' value="" id="chngdate"> 
                     <input name='pos_num' type='hidden' value="" id="chngpos">               
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

    // скрипт для модального окна переименования объекта
    $('.openform').click(function(){
        $('#obname').val( $(this).attr('data-name'));
        $('#obid').val( $(this).attr('data-id') );
        
    });

    $('#renameobj').submit(function(){
            $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#renameobj').html( data );
            });
        return false;
    });

        // скрипт для модального окна смены гипа
        $('.openformgip').click(function(){
        $('#gipobid').val( $(this).attr('data-id') );
        
    });

    $('#changegipid').submit(function(){
            $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#changegipid').html( data );
            });
        return false;
    });

        // скрипт для модального окна смены Куратора
        $('.openformcur').click(function(){
        $('#curobid').val( $(this).attr('data-id') );
        
    });

    $('#changecurid').submit(function(){
            $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#changecurid').html( data );
            });
        return false;
    });

        // скрипт для модального окна смены Отв.Эксп
        $('.openformexp').click(function(){
        $('#expobid').val( $(this).attr('data-id') );
        
    });

    $('#changeexpid').submit(function(){
            $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#changeexpid').html( data );
            });
        return false;
    });

       // скрипт для модального окна смены даты
    $('.openformplan').click(function(){
        $('#chngid').val( $(this).attr('data-id'));
        $('#chngdate').val( $(this).attr('data-data') );
        $('#chngpos').val( $(this).attr('data-pos') );
        $('#chngobjectid').val( $(this).attr('data-object-id') );
    });

        $('#changedateform').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#changedateform').html( data );
            });
        return false;
    });
     // скрипт для модального окна создания объекта
        $('.openformcreate').click(function(){
    });
    
    $('#createobj').submit(function(){
            $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#createobj').html( data );
            });
        return false;
    });
     // скрипт для модального окна кнопки ГИПов
        $('#creategip').submit(function(){
            $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#creategip').html( data );
            });
        return false;
    });
    // скрипт для модального окна кнопки Кураторов
    $('#createcur').submit(function(){
        $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
            $('#createcur').html( data );
        });
    return false;
    });
    // скрипт для модального окна кнопки Ответственных
    $('#createexp').submit(function(){
        $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
            $('#createexp').html( data );
        });
    return false;
    });    
});
</script>