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
    '19',
    '20',
    '21',
    '22',
    '23',
    '24',
    '25'
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
    $result3 = query("SELECT id, progress, pos_num, notuse, pz, gh, sp FROM plancontrol WHERE object_id=".$data['id']);
    $planP=array();
    while($plan = mysqli_fetch_assoc($result3)){ 
        $planP[$plan['pos_num']]=array(
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
        'task'=>$planarr,
        'taskP'=>$planP
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
//     foreach ($list as $key => $row) {
//         echo '<tr>';
//         echo '<td>' . $pp . '</td>';
//         echo '<td><a 
//             href="#" 
//             data-toggle="modal" data-target="#renameobject" 
//             class="openform" 
//             data-id="'.$row['id'].'"
//             data-name="'.$row['name'].'"
//             >'. $row['name'] .'</a></td>';
   
//         foreach ($pos_num as $key_m => $col) {
//             if(isset($row['task'][$key_m])){
//                   echo '<td alt="' . $row['task'][$key_m]['id'] . '">  '. $row['task'][$key_m]['exp_num'] .'</td>';
//             }else{
//                 echo '<td>
//                     </td>';
//             }
//         }
//         echo '</tr>';
//     $pp++;
//   }
//        echo "</table>";
       
?>