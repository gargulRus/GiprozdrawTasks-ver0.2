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

$pos_numR =array(
1=>'1',  //Генплан
'2', //АР
'3', //КР
'4', //ЭО
'5', //ЭМ
'6', //ВК
'7', //НВК
'8', //АПТ
'9', //ОВ
'10', //ОТ
'11', //ХС
'12', //ТС
'13', //Тепл.Пункт
'14', //СС
'15', //МГ
'16', //КГС
'17', //ТХ
'18', //АВТ
'19' //Сметы
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
    '12'
);

//задаем переменную для проставки порядковых номеров
$pp= 1;
/*создаем общий массив в который собираем данные с таблиц 
objects - спиок объектов
jobplan - расписание работ
plancontrol - данные по стадии Проект
plancontrolR - данные по стадии Рабочка 
*/
$list = array();
$result = query("SELECT id, name FROM objects");
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

    $result4 = query("SELECT id, progress, pos_num, notuse, gh, sp FROM plancontrolR WHERE object_id=".$data['id']);
    $planarrR=array();
    while($planR = mysqli_fetch_assoc($result4)){ 
        $planarrR[$planR['pos_num']]=array(
        'id'=>$planR['id'],
        'progress'=>$planR['progress'],
        'position_num'=>$planR['pos_num'],
        'notuse'=>$planR['notuse'],
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

    $result3 = query("SELECT id, pos_num, data FROM jobplan WHERE object_id=".$data['id']);
    $jobarr=array();
    while($job = mysqli_fetch_assoc($result3)){ 
        $jobarr[$job['pos_num']]=array(
        'id'=>$job['id'],
        'data'=>$job['data'],
        'pos_num'=>$job['pos_num']
        );
    }

    //итоговый массив
    $list[]=array(
        'id'=>$data['id'],
        'name'=>$data['name'],
        'task'=>$planarr,
        'job'=>$jobarr,
        'taskR'=>$planarrR,
        'taskE'=>$planexpert
    );
}

//получаем сегодняшнее число и выделяем из него номер месяца.
$datenow = date("d-m-Y");
list($day, $monthnow, $year) = explode("-", $datenow);
$monthnow = (int)$monthnow;
//формируем таблицу с полученным вложенным массивом
echo "<div class='div-table'>";
echo "
<table class='table table-bordered table-hover table-condensed list-object'>
    <tr>
        <th>П.П.</th>
        <th>Договор</th>
        <th>Январь</th>
        <th>Февраль</th>
        <th>Март</th>
        <th>Апрель</th>
        <th>Май</th>
        <th>Июнь</th>
        <th>Июль</th>
        <th>Август</th>
        <th>Сентябрь</th>
        <th>Октябрь</th>
        <th>Ноябрь</th>
        <th>Декабрь</th>
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
            $pp=$pp+1;
            
            //переменные для сортировки дат и процента выполненных работ
            $monthPstart = 0;
            $monthPend = 0;     
            $count=0;
            $numPrazd=0;
            $numRrazd=0;
            $monthEstart = 0;
            $monthEend = 0; 
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
            $count=round($count, 2);

            //считаем процент полученный из Стадии Р
            foreach ($pos_numR as $key_m => $col) {
                if(isset($row['taskR'][$key_m]['id'])){
                    if(isset($row['taskR'][$key_m]['progress'])){
                    $countR=$countR+$row['taskR'][$key_m]['progress'];
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
            $countR=round($countR, 2);

            //считаем сумму кол-ва замечаний по всем объектам
            foreach ($pos_num as $key_m => $col) {
                if(isset($row['taskE'][$key_m]['id'])){
                    if(isset($row['taskE'][$key_m]['exp_num'])){
                    $countE=$countE+$row['taskE'][$key_m]['exp_num'];
                    }
                }else{}
            }
           
            foreach ($month as $key_month => $col) {
                //проверяем наличие дат в таблце jobplan и если они там есть, то выделяем числа месяцев.

                //Проверяем даты начала и конца стадии П
                if(isset($row['job'][1]['data'])){
                    list($day, $month1, $year) = explode("-", $row['job'][1]['data']);
                    $monthPstart = (int)$month1;
                }else{}

                if(isset($row['job'][2]['data'])){
                    list($day, $month2, $year) = explode("-", $row['job'][2]['data']);
                    $monthPend = (int)$month2;
                }else{}

                //Проверяем даты начала и конца Экспертизы
                if(isset($row['job'][3]['data'])){
                    list($day, $month3, $year) = explode("-", $row['job'][3]['data']);
                    $monthEstart = (int)$month3;
                }else{}

                if(isset($row['job'][4]['data'])){
                    list($day, $month4, $year) = explode("-", $row['job'][4]['data']);
                    $monthEend = (int)$month4;
                }else{}
                
                //Проверяем даты начала и конца стадии Р
                if(isset($row['job'][5]['data'])){
                    list($day, $month5, $year) = explode("-", $row['job'][5]['data']);
                    $monthRstart = (int)$month5;
                }else{}

                if(isset($row['job'][6]['data'])){
                    list($day, $month6, $year) = explode("-", $row['job'][6]['data']);
                    $monthRend = (int)$month6;
                }else{}

                $string="";
                
                $cellcolor=" ";
                 
                /*После получения чисел месяцев: 
                Проверяем что номер месяца попадает в диапазон дат начала и конца работ
                указанных в main.php.Дальше получаем сегодняшнюю дату и сравниваем ее с номера месяца.
                Если есть совпадение - выводим стадию с %-выполнения. Если нет - делаем проверку, что номер месяца
                равен дату конца работ и выводим стадию с %-выполнения. Если совпадений небыло то выводим только стадию.
                Логика - выводить стадию на всем диапазоне дат, но процент выполения - только на сегодняшний месяц, либо 
                если работы по стадии закончены.
                Ячейку формируем путем добавления элементов в переменную  $string.
                */
                
                //Проверяем Стадию П
                if($key_month>=$monthPstart && $key_month<=$monthPend){
                    if($key_month==$monthnow){
                        $string= "П-" .$count ."% ";
                    }elseif ($monthnow>$key_month && $key_month==$monthPend) {
                        $string= "П-" .$count ."% ";
                    }else{$string= "П ";}
                }else{}
                
                //Проверяем Экспертизу
                if($key_month>=$monthEstart && $key_month<=$monthEend){
                    if($key_month==$monthnow){
                        $string=$string. "Э-".$countE." ";
                    }elseif ($monthnow>$key_month && $key_month==$monthEend) {
                        $string=$string. "Э-".$countE." ";
                    }else{$string=$string. "Э ";}
                }else{}
                
                //Проверяем Стадию Р    
                if($key_month>=$monthRstart && $key_month<=$monthRend){
                    if($key_month==$monthnow){
                        $string=$string. "Р-". $countR ."% ";
                    }elseif ($monthnow>$key_month && $key_month==$monthRend) {
                        $string=$string. "Р-". $countR ."% ";
                    }else{$string=$string. "Р ";}
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


                if($key_month>=$monthPstart && $key_month<=$monthPend){
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
                }elseif($key_month>=$monthEstart && $key_month<=$monthEend){                    
                    echo '<td'.$cellcolor.'class="letspacing">';
                    echo $string;
                    echo '</td>';
                }elseif($key_month>=$monthRstart && $key_month<=$monthRend){
                    echo '<td'.$cellcolor.'class="letspacing">';
                    echo $string;
                    echo '</td>';
                }else{
                    echo '<td>';
                    echo '</td>';
                } 
            }   
}
    echo '</tr>';
echo "</table>";
?>