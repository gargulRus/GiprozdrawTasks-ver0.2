<div class="title-pc" >
<h3>Проектная документация</h3>
</div>
<?php
// формируем первоначальный массив с месяцами
$pos_num =array(
           1=>'1', //Генплан
           '2', //АР
           '3', //КР
           '4', //ЭОМ
           '5', //НЭС
           '6', //ВК
           '7', //НВК
           '8', //АПТ
           '9', //ОВ
           '10', //ОТ
           '11', //ХС
           '12', //ТС
           '13', //ИТП
           '14', //СС
           '15', //НСС
           '16', //МГ
           '17', //КГС
           '18', //ТХ
           '19', //Автом
           '20', //ПОС-ПОД
           '21', //ООС
           '22', //ППМ
           '23', //ОДИ
           '24', //ЭЭ
           '25' //Сметы
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

    $result2 = query("SELECT id, progress, pos_num, notuse, pz, gh, sp FROM plancontrol WHERE object_id=".$data['id']);
    $planarr=array();
    while($plan = mysqli_fetch_assoc($result2)){ 
        $planarr[$plan['pos_num']]=array(
              'id'=>$plan['id'],
              'progress'=>$plan['progress'],
              'position_num'=>$plan['pos_num'],
              'notuse'=>$plan['notuse'],
              'pzcheck'=>$plan['pz'],
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
            <th>ЭОМ</th>
            <th>НЭС</th>
            <th>ВК</th>
            <th>НВК</th>
            <th>АПТ</th>
            <th>ОВ</th>
            <th>ОТ</th>
            <th>ХС</th>
            <th>ТС</th>
            <th>Тепл. пункт</th>
            <th>СС</th>
            <th>НСС</th>
            <th>МГ</th>
            <th>КГС</th>
            <th>ТХ</th>
            <th>Автом.</th>
            <th>ПОС\ПОД</th>
            <th>ООС</th>
            <th>ППМ</th>
            <th>ОДИ</th>
            <th>Энергоэфф.</th>
            <th>Сметы</th>
        </tr>";
?>
