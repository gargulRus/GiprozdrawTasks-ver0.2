<div class="buttnons">
<a href="/?page=main-arhiv.php" class="btn btn-gipro">План работ по договорам</a>
<a href="/?page=plancontrol-arhiv.php" class="btn btn-gipro">Таблица контроля</a>
<a href="/?page=planforyear-arhiv.php" class="btn btn-gipro">План работ на год</a>
<br>
<br>
<a href="/?page=plancontrol-arhiv.php" class="btn btn-gipro">План работ стадия Проект</a>
<a href="/?page=plancontrolR-arhiv.php" class="btn btn-gipro">План работ стадия Рабочка</a>
<a href="/?page=planexpert-arhiv.php" class="btn btn-gipro">Замечания Экспертизы</a>
</div>
<div class="title-pc" >
<h3>Проектная документация</h3>
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

    $result2 = query("SELECT id, progress, pos_num, pz, gh, sp, arch FROM plancontrol WHERE object_id=".$data['id']);
    $planarr=array();
    while($plan = mysqli_fetch_assoc($result2)){ 
        $planarr[$plan['pos_num']]=array(
              'id'=>$plan['id'],
              'progress'=>$plan['progress'],
              'position_num'=>$plan['pos_num'],
              'pzcheck'=>$plan['pz'],
              'ghcheck'=>$plan['gh'],
              'spcheck'=>$plan['sp'],
              'archcheck'=>$plan['arch']
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
            <th>Сеты</th>
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
                    /* проверяем каждый элемент в массиве на наличие записи в ячейках pz, gh и sp.
                    и в разных случаях выводим ссылки на разные модальные окна */
                    if($row['task'][$key_m]['pzcheck']==1){
                        if($row['task'][$key_m]['ghcheck']==1){
                            if($row['task'][$key_m]['spcheck']==1){
                                if($row['task'][$key_m]['archcheck']==1){
                                    echo 'data-toggle="modal" data-target="#updatetask" 
                                    class="openformtaskpzgh"' ;
                                }else{
                                    echo 'data-toggle="modal" data-target="#updatetaskfull" 
                                    class="openformtaskpzghsp"' ;
                                }

                                /* если во всех ячейках есть '1' то 
                                выводим окно со всеми заблокированными чекбоксами */
                                echo 'data-toggle="modal" data-target="#updatetaskfull" 
                                class="openformtaskpzghsp"' ;
                            }else{
                                /* если в ячейки sp нет '1', а в pz и gh есть,  то 
                                    выводим окно с заблокированными ПЗ и ГЧ чекбоксами */
                                echo 'data-toggle="modal" data-target="#updatetask" 
                                class="openformtaskpzgh"' ;
                            }
                        }/* если в ячейки gh нет '1', а в pz и sp есть,  то 
                        выводим окно с заблокированными ПЗ и СП чекбоксами */
                        elseif($row['task'][$key_m]['spcheck']==1){
                            echo 'data-toggle="modal" data-target="#updatetask" 
                            class="openformtaskpzsp"' ;
                        }else{
                            echo 'data-toggle="modal" data-target="#updatetask" 
                            class="openformtaskpz"' ;
                        }
                    }/* Далее аналогичная логика */
                    elseif($row['task'][$key_m]['ghcheck']==1){
                        if($row['task'][$key_m]['spcheck']==1){
                            echo 'data-toggle="modal" data-target="#updatetask" 
                            class="openformtaskghsp"' ;
                        }else{
                            echo 'data-toggle="modal" data-target="#updatetask" 
                            class="openformtaskgh"' ;
                        }
                    }elseif($row['task'][$key_m]['spcheck']==1){
                        echo 'data-toggle="modal" data-target="#updatetask" 
                        class="openformtasksp"' ;
                    }else{
                    echo 'data-toggle="modal" data-target="#updatetask" 
                    class="openformtask"';
                    } 
                    echo'data-id="'.$row['task'][$key_m]['id'].'"
                    data-progress="'.$row['task'][$key_m]['progress'].'"
                    data-pos="'.$key_m.'"
                    data-object-id="'.$row['id'].'"
                    >'. $row['task'][$key_m]['progress'] .'</a></td>';
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

<!-- Модальное окно принятия в архив неактивное -->
<div id="updatetask" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Принять документацию</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetask-arhiv" id="updatetaskform">
                    <div class="form-group">
                    <input type="checkbox"  disabled name="pz" id="tspz" class="taskpz" value=1>
                     <label for="tspz">Подтвердить сдачу в Архив</label>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsid">
                     <input name='object-id' type='hidden' value="" id="tsobjectid">
                     <input name='pos' type='hidden' value="" id="tspos">         
                     <input name='progress' type='hidden' value="" id="tsprog">    
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>

<!-- Модальное окно принятия в архив активное -->
<div id="updatetaskfull" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Принять документацию</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetask-arhiv" id="updatetaskformfull">
                    <div class="form-group">
                    <input type="checkbox"  name="pz" id="tspz" class="taskpz" value=1>
                     <label for="tspz">Подтвердить сдачу в Архив</label>
                     <br>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsidpzghsp">
                     <input name='object-id' type='hidden' value="" id="tsobjectidpzghsp">
                     <input name='pos' type='hidden' value="" id="tspospzghsp">         
                     <input name='progress' type='hidden' value="" id="tsprogpzghsp">    
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

       // скрипт для модального окна переименования задачи
    $('.openformtask').click(function(){
        $('#tsprog').val( $(this).attr('data-progress'));
        $('#tsid').val( $(this).attr('data-id') );
        $('#tspos').val( $(this).attr('data-pos') );
        $('#tsobjectid').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskform').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskform').html( data );
            });
        return false;
    });


               // скрипт для модального окна pzghsp
        $('.openformtaskpzghsp').click(function(){
        $('#tsprogpzghsp').val( $(this).attr('data-progress'));
        $('#tsidpzghsp').val( $(this).attr('data-id') );
        $('#tspospzghsp').val( $(this).attr('data-pos') );
        $('#tsobjectidpzghsp').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskformfull').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformfull').html( data );
            });
        return false;
    });
   
});
</script>