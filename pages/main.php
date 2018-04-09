<?php
    //Делаем запрос в таблицу с ГИПами и формируем выпадающий список
    $res = query("SELECT id, gipname FROM `gips`");
if(!$res) exit("Ошибка запроса: ".mysqli_error());
if(mysqli_num_rows($res)>0){ 
    $select = '<select name="idgp"  class="form-control input-sm" id="gipsel">'; 
    while($row = mysqli_fetch_assoc($res)){ 
        $select.= "<option value=".$row['id'].">".$row['gipname']."</option>";
    } 
    $select.="</select>";
}
?>

<div class="buttnons">
        <a href="#" data-toggle="modal" data-target="#write" class="openformcreate btn btn-gipro">Новый Объект</a>   
</div>

<?php
// формируем первоначальный массив порядковыми номерами
$main_pos=array(
           1=>'1',
           '2',
           '3',
           '4',
           '5',
           '6',
           );
//задаем переменную для проставки порядковых номеров
           $pp= 1;

$list = array();
$keygip=0; /*Переменная для работы с массивом giparr в массиле $list. порядковый номер всегда будет 0 
так что задаем его раньше чем цикл обработки для таблицы*/
$result = query("SELECT id, name, gip_id FROM objects");
/*Тут после первого запроса, перебираем полученный массив с
объектами, и на кажду итерацию цикла делаем еще один запрос в таблицу с задачами,
где по id объекта ищем задачи относящиеся к данному объекту.
*/
while($data = mysqli_fetch_assoc($result)){ 


    $result2 = query("SELECT id, gipname FROM gips WHERE id=".$data['gip_id']);
    $giparr=array();
    //промеряем наличие записи в objects записи о ГИПе, если есть формируем запрос
    if($data['gip_id']!=NULL){
    while($gip = mysqli_fetch_assoc($result2)){ 
            //тут какая-то магия
        $giparr[]=array(
              'id'=>$gip['id'],
              'gipname'=>$gip['gipname'],
          );
    }
   }
    $result3 = query("SELECT id, data, pos_num FROM jobplan WHERE object_id=".$data['id']);
    $planarr=array();
    while($plan = mysqli_fetch_assoc($result3)){ 
            //тут какая-то магия
        $planarr[$plan['pos_num']]=array(
              'id'=>$plan['id'],
              'data'=>$plan['data'],
              'pos_num'=>$plan['pos_num']
          );
    }
    $list[]=array(
        'id'=>$data['id'],
        'name'=>$data['name'],
        'gip_id'=>$data['gip_id'],
        'gip'=>$giparr,
        'plan'=>$planarr
    );

}
//формируем таблицу с полученным вложенным массивом

echo "   <div class='div-table'>";
   echo "
   <table class='table table-bordered table-hover table-condensed list-object'>
        <tr>
            <th rowspan='2'>П.П.</th>
            <th rowspan='2'>Договор</th>
            <th rowspan='2'>ГИП</th>
            <th colspan='2'> П </th>
            <th colspan='2'> Э </th>
            <th colspan='2'> Р </th>
        </tr>";
        echo "  <tr>
        <th class='paintrows'>Начало</th>
        <th class='paintrows'>Конец</th>
        <th class='paintrows'>Начало</th>
        <th class='paintrows'>Конец</th>
        <th class='paintrows'>Начало</th>
        <th class='paintrows'>Конец</th>
       </tr>";
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
            //проверяем наличие ГИПа в массиве
            if(isset($row['gip'][$keygip]['gipname'])){
                echo '<td><a 
            href="#" 
            data-toggle="modal" data-target="#changegip" 
            class="openformgip" 
            data-id="'.$row['id'].'"
            data-gip_id="'.$row['gip_id'].'"
            >'. $row['gip'][$keygip]['gipname'] .'</a></td>';
            }else {
                echo '<td><a 
                href="#" 
                data-toggle="modal" data-target="#changegip" 
                class="openformgip" 
                data-id="'.$row['id'].'"
                data-gip_id="'.$row['gip_id'].'"
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
     
});
</script>