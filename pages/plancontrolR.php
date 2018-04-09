
<div class="buttnons">
<a href="/?page=plancontrol.php" class="btn btn-gipro">План работ стадия Проект</a>
<a href="/?page=plancontrolR.php" class="btn btn-gipro">План работ стадия Рабочка</a>
</div>

<?php
/*В этом документе логика аналогичка plancontrol.php
за исключением:
1.подключаемся к таблице plancontrolR
2.отсутствует чекбокс с ПЗ (т.к. в Рабочке ПЗ не предусмотрено) */

// формируем первоначальный массив с порядковыми номерами
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
           '10'
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

    $result2 = query("SELECT id, progress, pos_num, gh, sp FROM plancontrolR WHERE object_id=".$data['id']);
    $planarr=array();
    while($plan = mysqli_fetch_assoc($result2)){ 
        $planarr[$plan['pos_num']]=array(
              'id'=>$plan['id'],
              'progress'=>$plan['progress'],
              'position_num'=>$plan['pos_num'],
              'ghcheck'=>$plan['gh'],
              'spcheck'=>$plan['sp']
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
            <th>ППМ</th>
            <th>СС</th>
            <th>ВК</th>
            <th>ЭОМ</th>
            <th>А</th>
            <th>ОВ</th>
            <th>ОТ</th>
            <th>КР</th>
            <th>АР</th>
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
                        if($row['task'][$key_m]['ghcheck']==1){
                        if($row['task'][$key_m]['spcheck']==1){
                            echo 'data-toggle="modal" data-target="#updatetaskghsp" 
                            class="openformtaskghsp"' ;
                        }else{
                            echo 'data-toggle="modal" data-target="#updatetaskgh" 
                            class="openformtaskgh"' ;
                        }
                    }elseif($row['task'][$key_m]['spcheck']==1){
                        echo 'data-toggle="modal" data-target="#updatetasksp" 
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

<!-- Модальное окно изменения прогресса выполнения -->
<div id="updatetask" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу пустое</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetaskR" id="updatetaskform">
                    <div class="form-group">
                     <input type="checkbox"  name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Графическая часть</label>
                     <br>
                     <input type="checkbox"  name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Спецификация</label>
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

<div id="updatetaskpz" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetaskR" id="updatetaskformpz">
                    <div class="form-group">
                     <input type="checkbox"  name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Графическая часть</label>
                     <br>
                     <input type="checkbox"  name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Спецификация</label>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsidpz">
                     <input name='object-id' type='hidden' value="" id="tsobjectidpz">
                     <input name='pos' type='hidden' value="" id="tspospz">         
                     <input name='progress' type='hidden' value="" id="tsprogpz">    
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>

<div id="updatetaskpzgh" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetaskR" id="updatetaskformpzgh">
                    <div class="form-group">
                     <input type="checkbox" disabled name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Графическая часть</label>
                     <br>
                     <input type="checkbox"  name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Спецификация</label>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsidpzgh">
                     <input name='object-id' type='hidden' value="" id="tsobjectidpzgh">
                     <input name='pos' type='hidden' value="" id="tspospzgh">         
                     <input name='progress' type='hidden' value="" id="tsprogpzgh">    
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>

<div id="updatetaskpzsp" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetaskR" id="updatetaskformpzsp">
                    <div class="form-group">
                     <input type="checkbox"  name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Графическая часть</label>
                     <br>
                     <input type="checkbox" disabled name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Спецификация</label>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsidpzsp">
                     <input name='object-id' type='hidden' value="" id="tsobjectidpzsp">
                     <input name='pos' type='hidden' value="" id="tspospzsp">         
                     <input name='progress' type='hidden' value="" id="tsprogpzsp">    
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>

<div id="updatetaskpzghsp" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetaskR" id="updatetaskformpzghsp">
                    <div class="form-group">
                     <input type="checkbox" disabled name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Графическая часть</label>
                     <br>
                     <input type="checkbox" disabled name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Спецификация</label>
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

<div id="updatetaskghsp" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetaskR" id="updatetaskformghsp">
                    <div class="form-group">
                     <input type="checkbox" disabled name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Графическая часть</label>
                     <br>
                     <input type="checkbox" disabled name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Спецификация</label>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsidghsp">
                     <input name='object-id' type='hidden' value="" id="tsobjectidghsp">
                     <input name='pos' type='hidden' value="" id="tsposghsp">         
                     <input name='progress' type='hidden' value="" id="tsprogghsp">    
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>

<div id="updatetaskgh" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetaskR" id="updatetaskformgh">
                    <div class="form-group">
                     <input type="checkbox" disabled name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Графическая часть</label>
                     <br>
                     <input type="checkbox" name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Спецификация</label>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsidgh">
                     <input name='object-id' type='hidden' value="" id="tsobjectidgh">
                     <input name='pos' type='hidden' value="" id="tsposgh">         
                     <input name='progress' type='hidden' value="" id="tsproggh">    
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>

<div id="updatetasksp" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetaskR" id="updatetaskformsp">
                    <div class="form-group">
                     <input type="checkbox"  name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Графическая часть</label>
                     <br>
                     <input type="checkbox" disabled name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Спецификация</label>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsidsp">
                     <input name='object-id' type='hidden' value="" id="tsobjectidsp">
                     <input name='pos' type='hidden' value="" id="tspossp">         
                     <input name='progress' type='hidden' value="" id="tsprogsp">    
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
           // скрипт для модального окна pz
           $('.openformtaskpz').click(function(){
        $('#tsprogpz').val( $(this).attr('data-progress'));
        $('#tsidpz').val( $(this).attr('data-id') );
        $('#tspospz').val( $(this).attr('data-pos') );
        $('#tsobjectidpz').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskformpz').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformpz').html( data );
            });
        return false;
    });
               // скрипт для модального окна pzgh
               $('.openformtaskpzgh').click(function(){
        $('#tsprogpzgh').val( $(this).attr('data-progress'));
        $('#tsidpzgh').val( $(this).attr('data-id') );
        $('#tspospzgh').val( $(this).attr('data-pos') );
        $('#tsobjectidpzgh').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskformpzgh').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformpzgh').html( data );
            });
        return false;
    });

                   // скрипт для модального окна pzsp
                   $('.openformtaskpzsp').click(function(){
        $('#tsprogpzsp').val( $(this).attr('data-progress'));
        $('#tsidpzsp').val( $(this).attr('data-id') );
        $('#tspospzsp').val( $(this).attr('data-pos') );
        $('#tsobjectidpzsp').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskformpzsp').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformpzsp').html( data );
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

        $('#updatetaskformpzghsp').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformpzghsp').html( data );
            });
        return false;
    });
     // скрипт для модального окна создания объекта
        $('.openformcreate').click(function(){
    });

        // скрипт для модального окна ghsp
        $('.openformtaskghsp').click(function(){
        $('#tsprogghsp').val( $(this).attr('data-progress'));
        $('#tsidghsp').val( $(this).attr('data-id') );
        $('#tsposghsp').val( $(this).attr('data-pos') );
        $('#tsobjectidghsp').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskformghsp').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformghsp').html( data );
            });
        return false;
    });

        // скрипт для модального окна gh
        $('.openformtaskgh').click(function(){
        $('#tsproggh').val( $(this).attr('data-progress'));
        $('#tsidgh').val( $(this).attr('data-id') );
        $('#tsposgh').val( $(this).attr('data-pos') );
        $('#tsobjectidgh').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskformgh').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformgh').html( data );
            });
        return false;
    });

        // скрипт для модального окна sp
        $('.openformtasksp').click(function(){
        $('#tsprogsp').val( $(this).attr('data-progress'));
        $('#tsidsp').val( $(this).attr('data-id') );
        $('#tspossp').val( $(this).attr('data-pos') );
        $('#tsobjectidsp').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskformsp').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformsp').html( data );
            });
        return false;
    });
    
    $('#createobj').submit(function(){
            $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#createobj').html( data );
            });
        return false;
    });
     
});
</script>