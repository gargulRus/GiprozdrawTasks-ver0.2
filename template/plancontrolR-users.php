<div class="title-pc" >
<h3>Рабочая документация</h3>
</div>

<?php
/*В этом документе логика аналогичка plancontrol.php
за исключением:
1.подключаемся к таблице plancontrolR
2.отсутствует чекбокс с ПЗ (т.к. в Рабочке ПЗ не предусмотрено) */

// формируем первоначальный массив с порядковыми номерами
$pos_num =array(
    1=>'1',  //Генплан
    '2', //АР
    '3', //КР
    '4', //ЭО
    '5', //ЭМ
    '6', //НЭС
    '7', //ВК
    '8', //НВК
    '9', //ДС
    '10', //АПТ
    '11', //ОВ
    '12', //ОТ
    '13', //ХС
    '14', //ТС
    '15', //Тепл.Пункт
    '16', //СС
    '17', //МГ
    '18', //КГС
    '19', //ТХ
    '20', //Автом
    '21' //Сметы
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

    $result2 = query("SELECT id, progress, pos_num, notuse, gh, sp, fullfuck FROM plancontrolR WHERE object_id=".$data['id']);
    $planarr=array();
    while($plan = mysqli_fetch_assoc($result2)){ 
        $planarr[$plan['pos_num']]=array(
              'id'=>$plan['id'],
              'progress'=>$plan['progress'],
              'position_num'=>$plan['pos_num'],
              'notuse'=>$plan['notuse'],
              'fullfuck'=>$plan['fullfuck'],
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
            <th>Генплан</th>
            <th>АР</th>
            <th>КР</th>
            <th>ЭО</th>
            <th>ЭМ</th>
            <th>НЭС</th>
            <th>ВК</th>
            <th>НВК</th>
            <th>ДС</th>
            <th>АПТ</th>
            <th>ОВ</th>
            <th>ОТ</th>
            <th>ХС</th>
            <th>ТС</th>
            <th>Тепл. пункт</th>
            <th>СС</th>
            <th>МГ</th>
            <th>КГС</th>
            <th>ТХ</th>
            <th>Автом.</th>
            <th>Сметы</th>
        </tr>";
   
?>