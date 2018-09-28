<?php
$id = $_POST['id'];
$obid = $_POST['object-id'];
$date = $_POST['date'];
$pos_num = $_POST['pos_num'];
$newdate = $_POST['calendar'];
echo $pos_num;
if(isset($_POST['deletedate'])){
  $del=1;
}else{
   $del=2;
}

if ($del==2){
    if(strlen($date)>1){
        if(strlen($newdate)>1){
            if($pos_num==1 || $pos_num==3){
                $result = query ("UPDATE jobplan SET data = '$newdate' WHERE id='$id'");
                $action="Меняем дату ";
            }else{
            $result = query ("UPDATE jobplan SET data_2 = '$newdate' WHERE id='$id'");
            $action="Меняем дату ";
            }
        }else{
            $action="Вы не указали дату! ";
        }      
    }else{
        if(strlen($newdate)>1){
            $result = query ("INSERT INTO `jobplan` (`object_id`, `pos_num`, `data`)
            VALUES ('".$obid."', '".$pos_num."', '".$newdate."')");
            $action="Меняем дату ";
        }else{
            $action="Вы не указали дату! ";
        }
    }
}else {
    if(strlen($date)>1){
	$result2 = query ("DELETE FROM jobplan WHERE id='$id'");
	$result13 = query ("DELETE FROM periodP WHERE object_id='$obid'");
    $action="Снимаем дату";
    }else{
        $action="Даты нет!";
    }
}

//Делаем запрос, что бы получить даты по объекту
$list = array();

$result = query("SELECT id, name FROM objects WHERE id=".$obid);

while($data = mysqli_fetch_assoc($result)){ 

   $result3 = query("SELECT id, data, data_2, pos_num FROM jobplan WHERE object_id=".$obid);
    $planarr=array();
    while($plan = mysqli_fetch_assoc($result3)){ 
            //тут какая-то магия
        $planarr[$plan['pos_num']]=array(
              'id'=>$plan['id'],
              'data'=>$plan['data'],
              'data_2'=>$plan['data_2'],
              'pos_num'=>$plan['pos_num']
          );
    }

    $list[]=array(
        'id'=>$data['id'],
        'name'=>$data['name'],
        'plan'=>$planarr
    );

}
// echo '<pre>';
// print_r($list);
// echo '</pre>';
//Объявляем переменные, для записи в них дат
$datastart="";
$makedate1="";
$makedate2="";
$makedate3="";

//разбираем полученный массив, выделяем нужные нам даты. 
foreach ($list as $key => $row) {
     foreach ($main_pos as $key_m => $col) {
     }
     //Если нету даты начала или конца - ничего не делаем
    if($row['plan'][1]['data']==NULL || $row['plan'][2]['data']==NULL){
    }else{
     if($row['plan'][1]['data_2']!=NULL){
         //бесполезная проверка!
        $datastart = $row['plan'][1]['data_2'];
    }else{
        $datastart = $row['plan'][1]['data'];
    }
    // проверяем есть ли data_2
     if($row['plan'][2]['data_2']!=NULL){
        $dataend = $row['plan'][2]['data_2'];
    }else{
        $dataend = $row['plan'][2]['data'];
    }

    //ищем разницу в днях между началом и концом
    $daydata = daydiff($datastart, $dataend);
    //Просчитываем дни для периодов
    $firstperiod = intval($daydata*0.75);
    $secondperiod = intval($daydata*0.13);
    $thirdperiod = intval($daydata*0.12);

    //полученные проценты прибавляем к начальной дате, и далее рассчитываем периоды
    $makedate1 = strtotime($datastart);
    $makedate1 = strtotime('+'.$firstperiod.' day', $makedate1);
    $makedate1 = date('Y-m-d', $makedate1);

    $makedate2 = strtotime($makedate1);
    $makedate2 = strtotime('+'.$secondperiod.' day', $makedate2);
    $makedate2 = date('Y-m-d', $makedate2);

    $makedate3 = strtotime($makedate2);
    $makedate3 = strtotime('+'.$thirdperiod.' day', $makedate3);
    $makedate3 = date('Y-m-d', $makedate3);
   
    $datastart= date('Y-m-d', strtotime($datastart));

    }

    }
//проверяем наличие даты в таблице Периодов
$result11 = query("SELECT id, datastart, data_p1, data_p2, data_p3 FROM periodP WHERE object_id=".$obid);

$count = mysqli_num_rows($result11);

if( $count > 0 ) {
    //если есть запись обновляем
  $result10 = query ("UPDATE periodP SET datastart = '$datastart', data_p1 = '$makedate1', data_p2 = '$makedate2', data_p3 = '$makedate3' WHERE object_id='$obid'");
} else {
    //если нет - создаем
    $result12 = query ("INSERT INTO `periodP` (`object_id`, `datastart`, `data_p1`, `data_p2`, `data_p3`)
    VALUES ('".$obid."', '".$datastart."', '".$makedate1."', '".$makedate2."', '".$makedate3."')");
}

?>

<div class="fomrobject">
<h4><?php echo $action; ?> <i class="fas fa-sync fa-spin"></i></h4>
<script type="text/javascript">
$( document ).ready(function() {
	setTimeout(function(){ location.reload(); }, 1500);
 

});
</script>
</div>