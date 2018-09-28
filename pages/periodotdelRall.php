<div class="buttnons">
<a href="/?page=main.php" class="btn btn-gipro">План работ по договорам</a>
<a href="/?page=plancontrol.php" class="btn btn-gipro">Таблица контроля</a>
<a href="/?page=planforyear.php" class="btn btn-gipro">План работ Факт</a>
<a href="/?page=planforyear-plan.php" class="btn btn-gipro">План работ План</a>
<?php 
if($_COOKIE['role']=='admin'){
    echo '<a href="/?page=arhiv.php" class="btn btn-gipro">Архив</a>';
}else{}
?>
<br>
<br>
<a href="/?page=plancontrol.php" class="btn btn-gipro">План работ стадия Проект</a>
<a href="/?page=planexpert.php" class="btn btn-gipro">Замечания Экспертизы</a>
<a href="/?page=plancontrolR.php" class="btn btn-gipro">План работ стадия Рабочка</a>
</div>

<?php

$curdata = currdata();

$title = $_GET['title'];
$posnum = $_GET['posnum'];
echo '
<div class="title-pc" >
<h2>План работ Стадии Р отдела '.$title.' по всем объектам</h2>
</div>
<br>
<div class="periodBtn">
<a href="/?page=periodotdelR.php&title='.$title.'&posnum='.$posnum.'" class="btn btn-gipro sendtest">На сегодня</a>
<a href="/?page=periodotdelRall.php&title='.$title.'&posnum='.$posnum.'" class="btn btn-gipro sendtest">На все времся</a>
</div>
</div>';
 $pp =1;

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
 
    $list = getobjectsR($posnum, $_COOKIE['role'], $_COOKIE['au_id']);

 //var_export($list);

echo "   <div class='div-table'>";
   echo "
   <table class='table table-bordered table-condensed list-object'>
   
        <tr>
            <th class='pp' id='thid' rowspan='2'>П.П.</th>
            <th class='obname' id='thida' rowspan='2'>Объект</th>
            <th class='pro' id='thidh' colspan='3'> Стадия Р </th>
            </tr>
        ";
        echo "  <tr>
        <th class='paintrows pstart'>Начало</th>
        <th class='paintrows pend'>Конец</th>
        <th class='paintrows pend'>Выполнение</th>
       </tr>
    ";
  
    foreach ($list as $key => $row) {
        if($row['planarr'][0]['notuse']==1){
            #ничего не делать
        }else{
        echo '<tr>';
        echo '<td>' . $pp . '</td>';
        echo '<td>'. $row['name'] .'</td>';

    $toPeriodR = query("SELECT id, object_id, datastart, data_p1, data_p2, data_p3 FROM periodR WHERE object_id=".$row['id']);

        while($datat = mysqli_fetch_assoc($toPeriodR)){ 
        $timearr[]=array(
            'id'=>$datat['id'],
            'object_id'=>$datat['object_id'],
            'datastart'=>$datat['datastart'],
            'data_p1'=>$datat['data_p1'],
            'data_p2'=>$datat['data_p2'],
            'data_p3'=>$datat['data_p3']
        );
    }
    
if(empty($timearr)){
    $datastart="Даты не определены";
    $makedate1="Даты не определены";
    $makedate2="Даты не определены";
    $makedate3="Даты не определены";
}else{
    foreach ($timearr as $key => $value) {
        $datastart=$value['datastart'];
        $makedate1=$value['data_p1'];
        $makedate2=$value['data_p2'];
        $makedate3=$value['data_p3'];
        $datastart= date('d-m-Y', strtotime($datastart));
        $makedate1= date('d-m-Y', strtotime($makedate1));
        $makedate2= date('d-m-Y', strtotime($makedate2));
        $makedate3= date('d-m-Y', strtotime($makedate3));
    }
}
        if($row['radzdelParr'][0]['stage']==1){
            echo '<td>'.$datastart.'</td>';
            echo '<td>'.$makedate1.'</td>';
            echo '<td>'.$row['planarr'][0]['progress'].'</td>';
        }
        if($row['radzdelParr'][0]['stage']==2){
            echo '<td>'.$makedate1.'</td>';
            echo '<td>'.$makedate2.'</td>';
            echo '<td>'.$row['planarr'][0]['progress'].'</td>';
        }
        if($row['radzdelParr'][0]['stage']==3){
            echo '<td>'.$makedate2.'</td>';
            echo '<td>'.$makedate3.'</td>';
            echo '<td>'.$row['planarr'][0]['progress'].'</td>';
        }

        echo '</tr>';
        $pp =$pp +1;
        unset($timearr);
    }
    }

echo "</table>";
echo "</div>";


?>

