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
//Делаем запрос в таблицу с Кураторами и формируем выпадающий список
$rescur = query("SELECT id, cur_name FROM `curators`");
if(!$rescur) exit("Ошибка запроса: ".mysqli_error());
    if(mysqli_num_rows($rescur)>0){ 
        $selectcur = '<select name="idcur"  class="form-control input-sm" id="cursel">'; 
            while($row = mysqli_fetch_assoc($rescur)){ 
                $selectcur.= "<option value=".$row['id'].">".$row['cur_name']."</option>";
            } 
        $selectcur.="</select>";
    }

//Делаем запрос в таблицу с Отв.Эксп. и формируем выпадающий список
$resexp = query("SELECT id, exp_name FROM `experts`");
if(!$resexp) exit("Ошибка запроса: ".mysqli_error());
    if(mysqli_num_rows($resexp)>0){ 
        $selectexp = '<select name="idexp"  class="form-control input-sm" id="expsel">'; 
        while($row = mysqli_fetch_assoc($resexp)){ 
            $selectexp.= "<option value=".$row['id'].">".$row['exp_name']."</option>";
        } 
        $selectexp.="</select>";
    }

?>
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
            <th rowspan='2' class='gipth'>ГИП</th>
            <th rowspan='2'>Куратор</th>
            <th rowspan='2'>Отв. Эксперт.</th>
            <th colspan='2'> Проект </th>
            <th colspan='2'> Экспертиза </th>
            <th colspan='2'> Рабочка </th>
        </tr>";
        echo "  <tr>
        <th class='paintrows'>Начало</th>
        <th class='paintrows'>Конец</th>
        <th class='paintrows'>Начало</th>
        <th class='paintrows'>Конец</th>
        <th class='paintrows'>Начало</th>
        <th class='paintrows'>Конец</th>
       </tr>";
?>