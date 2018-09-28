<div class="fixed-box">
    <div class="fixed-div">
    <div class='div-table'>
    <table class='table table-bordered table-hover table-condensed list-object'>
        <tr>
            <th class="pp" id="thup" rowspan='2'>П.П.</th>
            <th class="obname" id="thupa" rowspan='2'>Договор</th>
            <th class='gipname' id="thupb" rowspan='2'>ГИП</th>
            <th class='gapname' id="thupc" rowspan='2'>ГАП.</th>
            <th class='ovname' id="thupd" rowspan='2'>ОВ</th>
            <th class='krname' id="thupe" rowspan='2'>КР</th>
            <th class='kurname' id="thupf" rowspan='2'>Куратор</th>
            <th class='expname' id="thupg" rowspan='2'>Отв. Эксперт.</th>
            <th class='pro' id="thuph" colspan='2'> Проект </th>
            <th class='exp' id="thupi" colspan='2'> Экспертиза </th>
            <th class='rab' id="thupj" colspan='2'> Рабочка </th>
        </tr>
        <tr>
        <th class='paintrows pstart'>Начало</th>
        <th class='paintrows pend'>Конец</th>
        <th class='paintrows expstart'>Начало</th>
        <th class='paintrows expend'>Конец</th>
        <th class='paintrows rstart'>Начало</th>
        <th class='paintrows rend'>Конец</th>
       </tr>
</table>
</div>
</div>
</div>

<?php
//Делаем запрос в таблицу с Объектами и формируем выпадающий список
$resob = query("SELECT id, name FROM `objects`");
if(!$resob) exit("Ошибка запроса: ".mysqli_error());
    if(mysqli_num_rows($resob)>0){ 
        $selectob = '<select name="idob"  class="form-control input-sm" id="obsel">'; 
        while($row = mysqli_fetch_assoc($resob)){ 
            $selectob.= "<option value=".$row['id'].">".$row['name']."</option>";
        } 
        $selectob.="</select>";
    }
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
//Делаем запрос в таблицу с ГАПами и формируем выпадающий список
$resgap = query("SELECT id, gapname FROM `gaps`");
if(!$resgap) exit("Ошибка запроса: ".mysqli_error());
    if(mysqli_num_rows($resgap)>0){ 
        $selectgap = '<select name="idgap"  class="form-control input-sm" id="gapsel">'; 
        while($row = mysqli_fetch_assoc($resgap)){ 
            $selectgap.= "<option value=".$row['id'].">".$row['gapname']."</option>";
        } 
        $selectgap.="</select>";
    }
//Делаем запрос в таблицу с ОВ и формируем выпадающий список
$resov = query("SELECT id, ovname FROM `ov`");
if(!$resov) exit("Ошибка запроса: ".mysqli_error());
    if(mysqli_num_rows($resov)>0){ 
        $selectov = '<select name="idov"  class="form-control input-sm" id="ovsel">'; 
        while($row = mysqli_fetch_assoc($resov)){ 
            $selectov.= "<option value=".$row['id'].">".$row['ovname']."</option>";
        } 
        $selectov.="</select>";
    }
//Делаем запрос в таблицу с КР и формируем выпадающий список
$reskr = query("SELECT id, krname FROM `kr`");
if(!$reskr) exit("Ошибка запроса: ".mysqli_error());
    if(mysqli_num_rows($reskr)>0){ 
        $selectkr = '<select name="idkr"  class="form-control input-sm" id="krsel">'; 
        while($row = mysqli_fetch_assoc($reskr)){ 
            $selectkr.= "<option value=".$row['id'].">".$row['krname']."</option>";
        } 
        $selectkr.="</select>";
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
$result = query("SELECT id, name, gip_id, gap_id, ov_id, kr_id, cur_id, exp_id, arhiv_id FROM objects");
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
    $result2 = query("SELECT id, gapname FROM gaps WHERE id=".$data['gap_id']);
    $gaparr=array();
    //промеряем наличие записи в objects записи о ГАПе, если есть формируем запрос
    if($data['gap_id']!=NULL){
    while($gap = mysqli_fetch_assoc($result2)){ 
            //тут какая-то магия
        $gaparr[]=array(
              'id'=>$gap['id'],
              'gapname'=>$gap['gapname'],
          );
    }
   }
    $result2 = query("SELECT id, ovname FROM ov WHERE id=".$data['ov_id']);
    $ovarr=array();
    //промеряем наличие записи в objects записи о ОВ, если есть формируем запрос
    if($data['ov_id']!=NULL){
    while($ov = mysqli_fetch_assoc($result2)){ 
            //тут какая-то магия
        $ovarr[]=array(
              'id'=>$ov['id'],
              'ovname'=>$ov['ovname'],
          );
    }
   }
    $result2 = query("SELECT id, krname FROM kr WHERE id=".$data['kr_id']);
    $krarr=array();
    //промеряем наличие записи в objects записи о КР, если есть формируем запрос
    if($data['kr_id']!=NULL){
    while($kr = mysqli_fetch_assoc($result2)){ 
            //тут какая-то магия
        $krarr[]=array(
              'id'=>$kr['id'],
              'krname'=>$kr['krname'],
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
    $result3 = query("SELECT id, data, data_2, pos_num FROM jobplan WHERE object_id=".$data['id']);
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
        'gip_id'=>$data['gip_id'],
        'gap_id'=>$data['gap_id'],
        'ov_id'=>$data['ov_id'],
        'kr_id'=>$data['kr_id'],
        'cur_id'=>$data['cur_id'],
        'exp_id'=>$data['exp_id'],
        'arhiv_id'=>$data['arhiv_id'],
        'gip'=>$giparr,
        'gap'=>$gaparr,
        'ov'=>$ovarr,
        'kr'=>$krarr,
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
            <th class='pp' id='thid' rowspan='2'>П.П.</th>
            <th class='obname' id='thida' rowspan='2'>Договор</th>
            <th class='gipname' id='thidb' rowspan='2'>ГИП</th>
            <th class='gapname' id='thidc' rowspan='2'>ГАП</th>
            <th class='ovname' id='thidd' rowspan='2'>ОВ</th>
            <th class='krname' id='thide' rowspan='2'>КР</th>
            <th class='kurname' id='thidf' rowspan='2'>Куратор</th>
            <th class='expname' id='thidg' rowspan='2'>Отв. Эксперт.</th>
            <th class='pro' id='thidh' colspan='2'> Проект </th>
            <th class='exp' id='thidi' colspan='2'> Экспертиза </th>
            <th class='rab' id='thidj' colspan='2'> Рабочка </th>
            </tr>
        ";
        echo "  <tr>
        <th class='paintrows pstart'>Начало</th>
        <th class='paintrows pend'>Конец</th>
        <th class='paintrows expstart'>Начало</th>
        <th class='paintrows expend'>Конец</th>
        <th class='paintrows rstart'>Начало</th>
        <th class='paintrows rend'>Конец</th>
       </tr>
    ";
?>

<script>
$(document).ready(function($) {

// alert(getStyle( document.getElementById('thid'),'width'));

// $('thup'){
// $(this).attr('width', getStyle( document.getElementById('thid'),'width'))
// });
$('th#thup').attr('width', getStyle( document.getElementById('thid'),'width'));
$('th#thupa').attr('width', getStyle( document.getElementById('thida'),'width'));
$('th#thupb').attr('width', getStyle( document.getElementById('thidb'),'width'));
$('th#thupc').attr('width', getStyle( document.getElementById('thidc'),'width'));
$('th#thupd').attr('width', getStyle( document.getElementById('thidd'),'width'));
$('th#thupe').attr('width', getStyle( document.getElementById('thide'),'width'));
$('th#thupf').attr('width', getStyle( document.getElementById('thidf'),'width'));
$('th#thupg').attr('width', getStyle( document.getElementById('thidg'),'width'));
$('th#thuph').attr('width', getStyle( document.getElementById('thidh'),'width'));
$('th#thupi').attr('width', getStyle( document.getElementById('thidi'),'width'));
$('th#thupj').attr('width', getStyle( document.getElementById('thidj'),'width'));

// alert(getStyle( document.getElementById('thup'),'width'));
// alert( getRealSize(document.getElementById('thid1')).width );
// alert( getRealSize(document.getElementById('thid2')).width );

    $nav = $('.fixed-div');
    $nav.css('width', $nav.outerWidth());
    $window = $(window);
    $h = $nav.offset().top;
    $window.scroll(function() {
        if ($window.scrollTop() > $h) {
            $nav.addClass('fixed');
        } else {
            $nav.removeClass('fixed');
        }
    });
});

 function getStyle(b, a) {
    if (document.defaultView && document.defaultView.getComputedStyle) {
        return document.defaultView.getComputedStyle(b, "")[a]
    } else if (b.currentStyle) {
        return b.currentStyle[a]
    }
};



</script>