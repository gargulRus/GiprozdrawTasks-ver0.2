<div class="buttnons">
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
    '10'
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

    $result2 = query("SELECT id, progress, pos_num, pz, gh, sp FROM plancontrol WHERE object_id=".$data['id']);
    $planarr=array();
    while($plan = mysqli_fetch_assoc($result2)){ 
        $planarr[$plan['pos_num']]=array(
        'id'=>$plan['id'],
        'progress'=>$plan['progress'],
        'position_num'=>$plan['pos_num'],
        'pzcheck'=>$plan['pz'],
        'ghcheck'=>$plan['gh'],
        'spcheck'=>$plan['sp']
        );
    }

    $result4 = query("SELECT id, progress, pos_num, gh, sp FROM plancontrolR WHERE object_id=".$data['id']);
    $planarrR=array();
    while($planR = mysqli_fetch_assoc($result4)){ 
        $planarrR[$planR['pos_num']]=array(
        'id'=>$planR['id'],
        'progress'=>$planR['progress'],
        'position_num'=>$planR['pos_num'],
        'ghcheck'=>$planR['gh'],
        'spcheck'=>$planR['sp']
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
    );
}

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
            $monthEstart = 0;
            $monthEend = 0; 
            $monthRstart = 0;
            $monthRend = 0;     
            $countR=0;

            //считаем процент полученный из Стадии П
            foreach ($pos_num as $key_m => $col) {
                if(isset($row['task'][$key_m]['id'])){
                    if(isset($row['task'][$key_m]['progress'])){
                    $count=$count+$row['task'][$key_m]['progress'];
                    }
                }else{}
            }
            //Получаем общее значение
            $count=$count / 10;

            //считаем процент полученный из Стадии Р
            foreach ($pos_num as $key_m => $col) {
                if(isset($row['taskR'][$key_m]['id'])){
                    if(isset($row['taskR'][$key_m]['progress'])){
                    $countR=$countR+$row['taskR'][$key_m]['progress'];
                    }
                }else{}
            }
            //Получаем общее значение
            $countR=$countR / 10;
           
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

                /*после получения чисел месяцев, 
                сверяем их с порядковыми номерами месяцев в итоговой таблице
                и выводим, находя подходящий диапазон.
                Если есть совпадения добавляем в переменную string необходимую строку.
                Так же при наличии в ячейки П или Р закрашиваем их в раздичные цвета
                в зависимости от общего % готовности.
                */
                $string="";
                
                $cellcolor=" ";
                 
                if($key_month>=$monthPstart && $key_month<=$monthPend){
                     $string= "П " .$count ."% "; 
                }else{}

                if($key_month>=$monthEstart && $key_month<=$monthEend){
                    $string=$string. " Э ";
                }else{}

                if($key_month>=$monthRstart && $key_month<=$monthRend){
                    $string=$string. " Р ". $countR ."% ";
                    if($countR<=45){
                        $cellcolor=' bgcolor="#ff2a3a" ';
                    }elseif($countR>=46 && $countR<=75){
                        $cellcolor=' bgcolor="#e6e911" ';
                    }elseif($countR>=76){
                        $cellcolor=' bgcolor="#6ddd0a" ';
                    }else{$cellcolor=' bgcolor="#f455f6" ';}
                }else{}


                if($key_month>=$monthPstart && $key_month<=$monthPend){
                    if($count<=45){
                        $cellcolor=' bgcolor="#ff2a3a" ';
                    }elseif($count>=46 && $count<=75){
                        $cellcolor=' bgcolor="#e6e911" ';
                    }elseif($count>=76){
                        $cellcolor=' bgcolor="#6ddd0a" ';
                    }else{$cellcolor=' bgcolor="#f455f6" ';}
                    echo '<td'.$cellcolor.'>';
                    echo $string;
                    echo '</td>';
                }elseif($key_month>=$monthEstart && $key_month<=$monthEend){                    
                    echo '<td'.$cellcolor.'>';
                    echo $string;
                    echo '</td>';
                }elseif($key_month>=$monthRstart && $key_month<=$monthRend){
                    echo '<td'.$cellcolor.'>';
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