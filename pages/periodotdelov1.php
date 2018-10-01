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

if($posnum==10){
    echo '
    <div class="title-pc" >
    <h2>План работ Стадии П отдела ОВ-Семенова по всем объектам</h2>
    </div>
    <br>
    <div class="periodBtn">
    <a href="/?page=periodotdelov1.php&title='.$title.'&posnum='.$posnum.'" class="btn btn-gipro sendtest">ОВ-Семенова</a>
    <a href="/?page=periodotdelov2.php&title='.$title.'&posnum='.$posnum.'" class="btn btn-gipro sendtest">ОВ-Беляков</a>
    </div>
    <br>
    <div class="periodBtn">
    <a href="/?page=periodotdelov1.php&title='.$title.'&posnum='.$posnum.'" class="btn btn-gipro sendtest">На сегодня</a>
    <a href="/?page=periodotdelallov1.php&title='.$title.'&posnum='.$posnum.'" class="btn btn-gipro sendtest">На все времся</a>
    </div>
    </div>';
}else{
echo '
<div class="title-pc" >
<h2>План работ Стадии П отдела '.$title.' по всем объектам</h2>
</div>
<br>
<div class="periodBtn">
<a href="/?page=periodotdel.php&title='.$title.'&posnum='.$posnum.'" class="btn btn-gipro sendtest">На сегодня</a>
<a href="/?page=periodotdelall.php&title='.$title.'&posnum='.$posnum.'" class="btn btn-gipro sendtest">На все времся</a>
</div>
</div>';
}

 $pp =1;


 $pos_num =array(
    1=>'1', //ГИП
    '2', //Генплан
    '3', //АР
    '4', //КР
    '5', //ЭОМ
    '6', //НЭС
    '7', //ВК
    '8', //НВК
    '9', //АПТ
    '10', //ОВ
    '11', //ОТ
    '12', //ХС
    '13', //ТС
    '14', //ИТП
    '15', //СС
    '16', //НСС
    '17', //МГ
    '18', //КГС
    '19', //ТХ
    '20', //Рад.Без.
    '21', //Автом
    '22', //ПОС-ПОД
    '23', //АТЗ
    '24', //ООС
    '25', //ППМ
    '26', //ГОЧС
    '27', //ОДИ
    '28', //ЭЭ
    '29', //Сметы
    '30', //БЭО
    '31', //ОЗДС
    );

    $list = getobjectsP($posnum, ov, 8);

echo "   <div class='div-table'>";
   echo "
   <table class='table table-bordered table-condensed list-object'>
   
        <tr>
            <th class='pp' id='thid' rowspan='2'>П.П.</th>
            <th class='obname' id='thida' rowspan='2'>Объект</th>
            <th class='pro' id='thidh' colspan='3'> Стадия П </th>
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

            $toPeriodP = query("SELECT id, object_id, datastart, data_p1, data_p2, data_p3 FROM periodP WHERE object_id=".$row['id']);

        while($datat = mysqli_fetch_assoc($toPeriodP)){ 
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
        $datenow= date('d-m-Y');

        if(!strtotime($datastart)){
        }else{
            $data1 = date_diff(new DateTime($datenow), new DateTime($datastart))->days;
        }
        if(!strtotime($makedate1)){
        }else{
            $data2 = date_diff(new DateTime($datenow), new DateTime($makedate1))->days;
        }

        if(!strtotime($makedate2)){
        }else{
            $data3 = date_diff(new DateTime($datenow), new DateTime($makedate2))->days;
        }

        if(!strtotime($makedate3)){
        }else{
            $data4 = date_diff(new DateTime($datenow), new DateTime($makedate3))->days;
        }

        if(strtotime($datastart) || strtotime($makedate1) || strtotime($makedate2) || strtotime($makedate3)){
        if($row['radzdelParr'][0]['stage']==1 && $data2<=32){
            echo '<tr>';
            echo '<td>' . $pp . '</td>';
            echo '<td>'. $row['name'] .'</td>';
            echo '<td>'.$datastart.'</td>';
            echo '<td>'.$makedate1.'</td>';
            echo '<td>'.$row['planarr'][0]['progress'].'</td>';
            $pp =$pp +1;
        }
        if($row['radzdelParr'][0]['stage']==2  && $data3<=32){
            echo '<tr>';
            echo '<td>' . $pp . '</td>';
            echo '<td>'. $row['name'] .'</td>';
            echo '<td>'.$makedate1.'</td>';
            echo '<td>'.$makedate2.'</td>';
            echo '<td>'.$row['planarr'][0]['progress'].'</td>';
            $pp =$pp +1;
        }
        if($row['radzdelParr'][0]['stage']==3  && $data4<=32){
            echo '<tr>';
            echo '<td>' . $pp . '</td>';
            echo '<td>'. $row['name'] .'</td>';
            echo '<td>'.$makedate2.'</td>';
            echo '<td>'.$makedate3.'</td>';
            echo '<td>'.$row['planarr'][0]['progress'].'</td>';
            $pp =$pp +1;
        }
        }else{}
        echo '</tr>';
       
        unset($timearr);
        unset($data1);
        unset($data2);
        unset($data3);
        unset($data4);
    }
    }
echo "</table>";
echo "</div>";


?>
