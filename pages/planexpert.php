<div class="buttnons">
<a href="/?page=main.php" class="btn btn-gipro">План работ по договорам</a>
<a href="/?page=plancontrol.php" class="btn btn-gipro">Таблица контроля</a>
<a href="/?page=planforyear.php" class="btn btn-gipro">План работ на год</a>
<br>
<br>
<a href="/?page=plancontrol.php" class="btn btn-gipro">План работ стадия Проект</a>
<a href="/?page=plancontrolR.php" class="btn btn-gipro">План работ стадия Рабочка</a>
<a href="/?page=planexpert.php" class="btn btn-gipro">Замечания Экспертизы</a>
</div>
<div class="title-pc" >
<h3>Замечания экспертизы</h3>
</div>

<?php
// формируем первоначальный массив с месяцами
$pos_num =array(
           1=>'1',
           '2',
           '3',
           '4',
           '5',
           '6',
           '7',
           '8',
           '9',
           '10',
           '11',
           '12',
           '13',
           '14',
           '15',
           '16',
           '17',
           '18',
           '19'
           );
//задаем переменную для проставки порядковых номеров
           $pp= 1;

$list = array();
$result = query("SELECT id, name FROM objects");
/*Тут после первого запроса, перебираем полученный массив с
объектами, и на кажду итерацию цикла делаем еще один запрос в таблицу с задачами,
где по id объекта ищем задачи относящиеся к данному объекту.
*/
while($data = mysqli_fetch_assoc($result)){ 

    $result2 = query("SELECT id, pos_num, exp_num FROM planexpert WHERE object_id=".$data['id']);
    $planarr=array();
    while($plan = mysqli_fetch_assoc($result2)){ 
        $planarr[$plan['pos_num']]=array(
              'id'=>$plan['id'],
              'position_num'=>$plan['pos_num'],
              'exp_num'=>$plan['exp_num']
          );
    }
    $list[]=array(
        'id'=>$data['id'],
        'name'=>$data['name'],
        'task'=>$planarr
    );
}

//формируем таблицу с полученным вложенным массивом
echo "   <div class='div-table'>";
   echo "
   <table class='table table-bordered table-hover table-condensed list-object'>
        <tr>
            <th>П.П.</th>
            <th>Договор</th>
            <th>Генплан</th>
            <th>АР</th>
            <th>КР</th>
            <th>ЭОМ</th>
            <th>ВК</th>
            <th>ОВ</th>
            <th>ОТ</th>
            <th>ХС</th>
            <th>ТС</th>
            <th>ИТП</th>
            <th>СС</th>
            <th>МГ</th>
            <th>ТХ</th>
            <th>Авт.</th>
            <th>ПОС\ПОД</th>
            <th>ООС</th>
            <th>ППМ</th>
            <th>ОДИ</th>
            <th>Сметы</th>
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
   
        foreach ($pos_num as $key_m => $col) {
            if(isset($row['task'][$key_m])){
                  echo '<td alt="' . $row['task'][$key_m]['id'] . '"><a 
                    href="#"';
                    echo 'data-toggle="modal" data-target="#updatetaskexp" 
                    class="openformtaskexp"';
                    echo'data-id="'.$row['task'][$key_m]['id'].'"
                    data-progress="'.$row['task'][$key_m]['exp_num'].'"
                    data-pos="'.$key_m.'"
                    data-object-id="'.$row['id'].'"
                    > Э- '. $row['task'][$key_m]['exp_num'] .'</a></td>';
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
                    <input name='name' type='text' value="" placeholder="Имя" id="obname" class="form-control">
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
         <link href="/uploader-master/jquery.dm-uploader.min.css" rel="stylesheet" type="text/css" />
        <link href="/uploader-master/uploader.default.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="/uploader-master/jquery.dm-uploader.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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