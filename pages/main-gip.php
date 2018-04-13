<div class="buttnons">
    <a href="/?page=main-gip.php" class="btn btn-gipro">План работ по договорам</a>
    <a href="/?page=plancontrol-gip.php" class="btn btn-gipro">Таблица контроля</a>
    <a href="/?page=planforyear-gip.php" class="btn btn-gipro">План работ на год</a>   
</div>

<?php
// формируем первоначальный массив порядковыми номерами
$main_pos=array(
           1=>'1',
           '2',
           '3',
           '4',
           '5',
           '6'
           );
//задаем переменную для проставки порядковых номеров
           $pp= 1;

$list = array();
$keygip=0; /*Переменная для работы с массивом giparr в массиле $list. порядковый номер всегда будет 0 
так что задаем его раньше чем цикл обработки для таблицы*/
$result = query("SELECT id, name, gip_id, cur_id, exp_id FROM objects");
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
   $result2 = query("SELECT id, cur_name FROM curators WHERE id=".$data['cur_id']);
   $curarr=array();
   //промеряем наличие записи в objects записи о ГИПе, если есть формируем запрос
   if($data['cur_id']!=NULL){
   while($cur = mysqli_fetch_assoc($result2)){ 
           //тут какая-то магия
       $curarr[]=array(
             'id'=>$cur['id'],
             'cur_name'=>$cur['cur_name'],
         );
   }
  }
  $result2 = query("SELECT id, exp_name FROM experts WHERE id=".$data['exp_id']);
  $exparr=array();
  //промеряем наличие записи в objects записи о ГИПе, если есть формируем запрос
  if($data['exp_id']!=NULL){
  while($exp = mysqli_fetch_assoc($result2)){ 
          //тут какая-то магия
      $exparr[]=array(
            'id'=>$exp['id'],
            'exp_name'=>$exp['exp_name'],
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
        'cur_id'=>$data['cur_id'],
        'exp_id'=>$data['exp_id'],
        'gip'=>$giparr,
        'cur'=>$curarr,
        'exp'=>$exparr,
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
            <th rowspan='2'>Куратор</th>
            <th rowspan='2'>Отв. Эксперт.</th>
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
        echo '<td>'. $row['name'] .'</td>';
            //проверяем наличие ГИПа в массиве
            if(isset($row['gip'][$keygip]['gipname'])){
                echo '<td>'. $row['gip'][$keygip]['gipname'] .'</td>';
            }else {
                echo '<td></td>';
            }
             //проверяем наличие Куратора в массиве
            if(isset($row['cur'][$keygip]['cur_name'])){
                echo '<td>'. $row['cur'][$keygip]['cur_name'] .'</td>';
            }else {
                echo '<td></td>';
            }
             //проверяем наличие Эксперта в массиве
            if(isset($row['exp'][$keygip]['exp_name'])){
                echo '<td>'. $row['exp'][$keygip]['exp_name'] .'</td>';
            }else {
                echo '<td></td>';
            }
        foreach ($main_pos as $key_m => $col) {
            if(isset($row['plan'][$key_m])){
                //полученную дату из массива переворачиваем в удобный вид.
                $newdate=date('d-m-Y', strtotime($row['plan'][$key_m]['data']));
                  echo '<td alt="' . $row['plan'][$key_m]['id'] . '">'. $newdate .'</td>';
            }else{
                echo '<td></td>';
            }
        }
        echo '</tr>';
    $pp++;
  }
       echo "</table>";
?>