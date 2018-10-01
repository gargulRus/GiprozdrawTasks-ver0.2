<div class="fixed-box">
    <div class="fixed-div">
    <div class='div-table'>
    <table class='table table-bordered table-hover table-condensed list-object'>
        <tr>
        <th id="thup">П.П.</th>
        <th id="thupq">Договор</th>
        <th id="thupw">Январь</th>
        <th id="thupe">Февраль</th>
        <th id="thupr">Март</th>
        <th id="thupt">Апрель</th>
        <th id="thupy">Май</th>
        <th id="thupu">Июнь</th>
        <th id="thupi">Июль</th>
        <th id="thupo">Август</th>
        <th id="thupp">Сентябрь</th>
        <th id="thupa">Октябрь</th>
        <th id="thups">Ноябрь</th>
        <th id="thupd">Декабрь</th>
       </tr>
</table>
</div>
</div>
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
    '19', //Рад.Без.
    '20', //Автом
    '21', //ПОС-ПОД
    '22', //АТЗ
    '23', //ООС
    '24', //ППМ
    '25', //ГОЧС
    '26', //ОДИ
    '27', //ЭЭ
    '28', //Сметы
    '29', //БЭО
    '30', //ОЗДС
    '31', //ОЗДС
    );

$pos_numR =array(
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
$job_num=array(
    1=>'1',
    '2',
    '3',
    '4',
    '5',
    '6'
);

$month=array(
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
);


/*
Делаем запрос в базу и ищем самые маленькие и самые большие даты.
Они буду участвовать в формировании таблицы и создании шапки с месяцами.

т.к. в базе jobplan ячеек с датами две data и data_2, делаем два массива и два запроса,
после чего ищем в этих двух массива самые маленькие даты и записываем эти даты в переменные

После ищем разницу между самой маленькой датой и самой большой, находим разницу в месяцах.

После формируем массив. Ключи массива формируем в цикле от 1 до значения разницы в месяцах.
Значения массива формируем в цикле от 1 до 12, и так каждую итерацию. 
В итоге получим массив в котором будет необходимое кол-во месяцев, полученых из разниц в датах,
с числовыми значениями месяцев, и ключи с правильной нумерацией для таблицы.
*/

//Запросы и массивы на максимальную дату
$maxarr1 = array();
$request= query("SELECT max(data) FROM jobplan");
while($maxarr1data = mysqli_fetch_assoc($request)){ 
    array_push($maxarr1, $maxarr1data);
}

$maxarr2 = array();
$request= query("SELECT max(data_2) FROM jobplan");
while($maxarr2data = mysqli_fetch_assoc($request)){ 
    array_push($maxarr2, $maxarr2data);
}
//Запросы и массивы на минимальную дату
$minarr1 = array();
$request= query("SELECT min(data) FROM jobplan");
while($minarr1data = mysqli_fetch_assoc($request)){ 
    array_push($minarr1, $minarr1data);
}

$minarr2 = array();
$request= query("SELECT min(data_2) FROM jobplan");
while($minarr2data = mysqli_fetch_assoc($request)){ 
    array_push($minarr2, $minarr2data);
}
//Определяем самые максимальные и самые минимальные даты из двух столбцов.
if($maxarr1[0]['max(data)']>$maxarr2[0]['max(data_2)']){
    $maxdate=$maxarr1[0]['max(data)'];
}else{
    $maxdate=$maxarr2[0]['max(data_2)'];
}

if($minarr1[0]['min(data)']<$minarr2[0]['min(data_2)']){
    $mindate =$minarr1[0]['min(data)'];
}else{
    $mindate =$minarr2[0]['min(data_2)'];
}

//Ищем разницу между датами и получаем эту разницу в месяцах
// $diffminmax = abs(strtotime($maxdate) - strtotime($mindate)); 
$monthsminmax = diffdatebymonth($maxdate, $mindate);

//Формируем массив с ключами и датами
$minmaxarray = array();
$i = 0;
$b=1;
$с=1;
for($i;$i<$monthsminmax;$i++){
    $minmaxarray[$с] = $b;
    $b=$b+1;
    if($b>12){
     $b=1;
    }
    $с=$с+1;
}

//задаем переменную для проставки порядковых номеров
$pp= 1;
/*создаем общий массив в который собираем данные с таблиц 
objects - спиок объектов
jobplan - расписание работ
plancontrol - данные по стадии Проект
plancontrolR - данные по стадии Рабочка 
*/
$list = array();
$result = query("SELECT id, name, arhiv_id FROM objects");
while($data = mysqli_fetch_assoc($result)){ 

    $result2 = query("SELECT id, progress, pos_num, notuse, pz, gh, sp, fullfuck FROM plancontrol WHERE object_id=".$data['id']);
    $planarr=array();
    while($plan = mysqli_fetch_assoc($result2)){ 
        $planarr[$plan['pos_num']]=array(
        'id'=>$plan['id'],
        'progress'=>$plan['progress'],
        'position_num'=>$plan['pos_num'],
        'notuse'=>$plan['notuse'],
        'fullfuck'=>$plan['fullfuck'],
        'pzcheck'=>$plan['pz'],
        'ghcheck'=>$plan['gh'],
        'spcheck'=>$plan['sp']
        );
    }

    $result4 = query("SELECT id, progress, pos_num, notuse, gh, sp, fullfuck FROM plancontrolR WHERE object_id=".$data['id']);
    $planarrR=array();
    while($planR = mysqli_fetch_assoc($result4)){ 
        $planarrR[$planR['pos_num']]=array(
        'id'=>$planR['id'],
        'progress'=>$planR['progress'],
        'position_num'=>$planR['pos_num'],
        'notuse'=>$planR['notuse'],
        'fullfuck'=>$planR['fullfuck'],
        'ghcheck'=>$planR['gh'],
        'spcheck'=>$planR['sp']
        );
    }

    $result5 = query("SELECT id, pos_num, exp_num FROM planexpert WHERE object_id=".$data['id']);
    $planexpert=array();
    while($planE = mysqli_fetch_assoc($result5)){ 
        $planexpert[$planE['pos_num']]=array(
        'id'=>$planE['id'],
        'position_num'=>$planE['pos_num'],
        'exp_num'=>$planE['exp_num'],
        );
    }

    $result3 = query("SELECT id, pos_num, data, data_2 FROM jobplan WHERE object_id=".$data['id']);
    $jobarr=array();
    while($job = mysqli_fetch_assoc($result3)){ 
        $jobarr[$job['pos_num']]=array(
        'id'=>$job['id'],
        'data'=>$job['data'],
        'data_2'=>$job['data_2'],
        'pos_num'=>$job['pos_num']
        );
    }

    //итоговый массив
    $list[]=array(
        'id'=>$data['id'],
        'name'=>$data['name'],
        'arhiv_id'=>$data['arhiv_id'],
        'task'=>$planarr,
        'job'=>$jobarr,
        'taskR'=>$planarrR,
        'taskE'=>$planexpert
    );
}

//получаем сегодняшнее число и выделяем из него номер месяца.
$datenow = date("Y-m-d");
list($day, $monthnow, $year) = explode("-", $datenow);
$monthnow = (int)$monthnow;
/*Получаем разницу в месяцах между самой первой датой и текущей,
что бы получить разницу между датами и получить ключ массива,
в которой будет проставлен процент стадии, или кол-во замечаний.
*/
$nowdate = diffdatebymonth($mindate, $datenow);

//формируем таблицу с полученным вложенным массивом
echo "<div class='div-table'>";
echo "
<table class='table table-bordered table-hover table-condensed list-object'>
    <tr>
    <th id='thid'>П.П.</th>
    <th id='thidq'>Договор</th>";
    foreach ($minmaxarray as $keyt => $rowt) {   
        switch ($rowt) {
            case '1':
                $mounthname = 'Январь'; break;
            case '2':
                $mounthname = 'Февраль'; break;
            case '3':
                $mounthname = 'Март'; break;
            case '4':
                $mounthname = 'Апрель'; break;
            case '5':
                $mounthname = 'Май'; break;
            case '6':
                $mounthname = 'Июнь'; break;
            case '7':
                $mounthname = 'Июль'; break;
            case '8':
                $mounthname = 'Август'; break;
            case '9':
                $mounthname = 'Сентябрь'; break;
            case '10':
                $mounthname = 'Октябрь'; break;
            case '11':
                $mounthname = 'Ноябрь'; break;
            case '12':
                $mounthname = 'Декабрь'; break;
            default:
                $mounthname = 'Не определен'; break;
                break;
        }

        
    echo "<th id='thidw'>".$mounthname."</th>";
    "</tr>";
    }
foreach ($list as $key => $row) {
    if($row['arhiv_id']== NULL){
    echo '<tr>';
            echo '<td>' . $pp . '</td>';
            echo '<td><a 
            href="#" 
            data-toggle="modal" data-target="#renameobject" 
            class="openform" 
            data-id="'.$row['id'].'"
            data-name="'.$row['name'].'"
            >'. $row['name'] .'</a></td>';
            $pp=$pp+1;
            
            //переменные для сортировки дат и процента выполненных работ
            $count=0;
            $numPrazd=0;
            $numRrazd=0;
            $monthRstart = 0;
            $monthRend = 0;     
            $countR=0;
            $countE=0;

            //считаем процент полученный из Стадии П
            //сначала считаем процент по всем разделам
            foreach ($pos_num as $key_m => $col) {
                if(isset($row['task'][$key_m]['id'])){
                    if(isset($row['task'][$key_m]['progress'])){
                    $count=$count+$row['task'][$key_m]['progress'];
                    }
                }else{}
            }
            //затем считаем сколько разделов присутствует в объекте
            foreach ($pos_num as $key_m => $col) {
                    if($row['task'][$key_m]['notuse']!=1){
                    $numPrazd=$numPrazd+1;
                    }else{}
            }
           
            //Получаем общее значение и округляем
            $count=$count / $numPrazd;
            $count=round($count, 0);

            //считаем процент полученный из Стадии Р
            foreach ($pos_numR as $key_m => $col) {
                if(isset($row['taskR'][$key_m]['id'])){
                    if(isset($row['taskR'][$key_m]['progress'])){
                        if($row['taskR'][$key_m]['fullfuck']==1){
                            $fuckcount=$row['taskR'][$key_m]['progress'] / 2;
                            $countR=$countR+$fuckcount;
                        }else{
                            $countR=$countR+$row['taskR'][$key_m]['progress'];
                        }
                     }
                }else{}
            }
            //затем считаем сколько разделов присутствует в объекте
            foreach ($pos_numR as $key_m => $col) {
                if($row['taskR'][$key_m]['notuse']!=1){
                $numRrazd=$numRrazd+1;
                }else{}
        }
            //Получаем общее значение и округляем
            $countR=$countR / $numRrazd;
            $countR=round($countR, 0);

            //считаем сумму кол-ва замечаний по всем объектам
            foreach ($pos_num as $key_m => $col) {
                if(isset($row['taskE'][$key_m]['id'])){
                    if(isset($row['taskE'][$key_m]['exp_num'])){
                    $countE=$countE+$row['taskE'][$key_m]['exp_num'];
                    }
                }else{}
            }
           
            foreach ($minmaxarray as $key_month => $col) {
                //проверяем наличие дат в таблце jobplan и если они там есть, то выделяем числа месяцев.

                //Проверяем даты начала и конца стадии П
                if(isset($row['job'][1]['data_2'])){
                    $pdateStart=$row['job'][1]['data_2'];
                }else{
                    $pdateStart=$row['job'][1]['data'];
                }

                if(isset($row['job'][2]['data_2'])){
                    $pdateEnd=$row['job'][2]['data_2'];
                }else{
                    $pdateEnd=$row['job'][2]['data'];
                }

                //Проверяем даты начала и конца Экспертизы
                if(isset($row['job'][3]['data_2'])){
                    $edateStart=$row['job'][3]['data_2'];
                }else{
                    $edateStart=$row['job'][3]['data'];
                }
                if(isset($row['job'][4]['data_2'])){
                    $edateEnd=$row['job'][4]['data_2'];
                }else{
                    $edateEnd=$row['job'][4]['data'];
                }

                
                //Проверяем даты начала и конца стадии Р
                //пробуем сделать подсчет даты для новой схемы.
                /*
                Суть - берем первую дату из базы. От нее начинаем отсчет. 
                Берем вторую дату - выделяем 
                */
                if(isset($row['job'][5]['data_2'])){
                    $rdateStart=$row['job'][5]['data_2'];
                }else{
                    $rdateStart=$row['job'][5]['data'];
                }

                if(isset($row['job'][6]['data_2'])){
                    $rdateEnd=$row['job'][6]['data_2'];
                }else{
                    $rdateEnd=$row['job'][6]['data'];
                }




                //стадия П
                $monthsPStart = diffdatebymonth($mindate, $pdateStart);
                $monthsPEnd = diffdatebymonth($mindate, $pdateEnd);
                //Экспертиза
                $monthsEStart = diffdatebymonth($mindate, $edateStart);
                $monthsEEnd = diffdatebymonth($mindate, $edateEnd);
                //стадия Р
                $monthsRStart = diffdatebymonth($mindate, $rdateStart);
                $monthsREnd = diffdatebymonth($mindate, $rdateEnd);


                $percentcalcP =  plancalc($pdateStart, $pdateEnd);
                $percentcalcR =  plancalc($rdateStart, $rdateEnd);


                /*После получения чисел месяцев: 
                Проверяем что номер месяца попадает в диапазон дат начала и конца работ
                указанных в main.php.Дальше получаем сегодняшнюю дату и сравниваем ее с номера месяца.
                Если есть совпадение - выводим стадию с %-выполнения. Если нет - делаем проверку, что номер месяца
                равен дату конца работ и выводим стадию с %-выполнения. Если совпадений небыло то выводим только стадию.
                Логика - выводить стадию на всем диапазоне дат, но процент выполения - только на сегодняшний месяц, либо 
                если работы по стадии закончены.
                Ячейку формируем путем добавления элементов в переменную  $string.
                */
                $string="";
                $cellcolor=" ";

                $calcraznica= $percentcalcP - $count;           
                $calcraznicaR= $percentcalcR - $countR;  

                if($calcraznica>15){
                    $percolor="#fe8a8a";
                }elseif($calcraznica<=14){
                    $percolor="#fffea0";
                }elseif($calcraznica<=3){
                    $percolor="#aefcb7";
                }else{
                    $percolor="";
                }

                if($calcraznicaR>15){
                    $percolorR="#fe8a8a";
                }elseif($calcraznicaR<=14){
                    $percolorR="#fffea0";
                }elseif($calcraznicaR<=3){
                    $percolorR="#aefcb7";
                }else{
                    $percolorR="";
                }

                //Проверяем Стадию П
                if($pdateStart!=NULL & $pdateEnd!=NULL){
                if($key_month>=$monthsPStart && $key_month<=$monthsPEnd){
                    if($key_month==$nowdate){
                        $string=  "<span style='background: #aefcb7;'>П-план-".$percentcalcP."%</span> <span style='background:".$percolor."'>П-факт-" .$count ."%</span> ";
                    }elseif($nowdate>$key_month && $key_month==$monthsPEnd){
                        $string=  "<span style='background: #aefcb7;'>П-план-".$percentcalcP."%</span> <span style='background:".$percolor."'>П-факт-" .$count ."%</span> ";
                    }else{
                        $string=$string. "П ";
                    }
                }else{}
                }else{}

                //Проверяем Экспертизу
                if($edateStart!=NULL & $edateEnd!=NULL){
                if($key_month>=$monthsEStart && $key_month<=$monthsEEnd){
                    if($key_month==$nowdate){
                        $string=$string. "Э-". $count ."% ";
                    }elseif($nowdate>$key_month && $key_month==$monthsEEnd){
                        $string=$string. "Э-". $count ."% ";
                    }else{
                        $string=$string. "Э ";
                    }
                }else{}
                }else{}
                //Проверяем Стадию Р    
                if($rdateStart!=NULL & $rdateEnd!=NULL){ 
                if($key_month>=$monthsRStart && $key_month<=$monthsREnd){
                    if($key_month==$nowdate){
                        $string=$string."<span style='background: #aefcb7;'>Р-план-".$percentcalcR."%</span> <span style='background:".$percolorR."'>Р-факт-" .$countR ."%</span>";
                    }elseif($nowdate>$key_month && $key_month==$monthsREnd){
                        $string=$string."<span style='background: #aefcb7;'>Р-план-".$percentcalcR."%</span> <span style='background:".$percolorR."'>Р-факт-" .$countR ."%</span>";
                    }else{
                        $string=$string. "Р ";
                    }
                }else{}
                }else{}
                //Пример окрашивания ячеек. (на данный момент не нужен)
                // if($key_month>=$monthRstart && $key_month<$monthRend){
                //     $string=$string. "Р ";
                //     // if($countR<=45){
                //     //     $cellcolor='   ';
                //     // }elseif($countR>=46 && $countR<=75){
                //     //     $cellcolor='   ';
                //     // }elseif($countR>=76){
                //     //     $cellcolor='   ';
                //     // }else{$cellcolor='  ';}
                // }else{}

                // if($key_month==$monthRend){
                //     $string=$string. "Р-". $countR ."% ";
                // }else{}


                if($key_month>=$monthsPStart && $key_month<=$monthsPEnd){
                    // if($count<=45){
                    //     $cellcolor='   ';
                    // }elseif($count>=46 && $count<=75){
                    //     $cellcolor='   ';
                    // }elseif($count>=76){
                    //     $cellcolor='   ';
                    // }else{$cellcolor='   ';}
                    echo '<td'.$cellcolor.'class="letspacing">';
                    echo $string ;
                    echo '</td>';
                }elseif($key_month>=$monthsEStart && $key_month<=$monthsEEnd){                    
                    echo '<td'.$cellcolor.'class="letspacing">';
                    echo $string;
                    echo '</td>';
                }elseif($key_month>=$monthsRStart && $key_month<=$monthsREnd){
                    echo '<td'.$cellcolor.'class="letspacing">';
                    echo $string;
                    echo '</td>';
                }else{
                    echo '<td>';
                    echo '</td>';
                } 
            }   
        }else{}
}

    echo '</tr>';
echo "</table>";
?>

<script>
$(document).ready(function($) {

// alert(getStyle( document.getElementById('thid'),'width'));
// alert(getStyle( document.getElementById('thidq'),'width'));

// $('thup'){
// $(this).attr('width', getStyle( document.getElementById('thid'),'width'))
// });
$('th#thup').attr('width', getStyle( document.getElementById('thid'),'width'));
$('th#thupq').attr('width', getStyle( document.getElementById('thidq'),'width'));
$('th#thupw').attr('width', getStyle( document.getElementById('thidw'),'width'));
$('th#thupe').attr('width', getStyle( document.getElementById('thide'),'width'));
$('th#thupr').attr('width', getStyle( document.getElementById('thidr'),'width'));
$('th#thupt').attr('width', getStyle( document.getElementById('thidt'),'width'));
$('th#thupy').attr('width', getStyle( document.getElementById('thidy'),'width'));
$('th#thupu').attr('width', getStyle( document.getElementById('thidu'),'width'));
$('th#thupi').attr('width', getStyle( document.getElementById('thidi'),'width'));
$('th#thupo').attr('width', getStyle( document.getElementById('thido'),'width'));
$('th#thupp').attr('width', getStyle( document.getElementById('thidp'),'width'));
$('th#thupa').attr('width', getStyle( document.getElementById('thida'),'width'));
$('th#thups').attr('width', getStyle( document.getElementById('thids'),'width'));
$('th#thupd').attr('width', getStyle( document.getElementById('thidd'),'width'));


// alert(getStyle( document.getElementById('thup'),'width'));
// alert(getStyle( document.getElementById('thupq'),'width'));
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