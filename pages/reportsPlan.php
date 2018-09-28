<div class="buttnons">
<a href="/?page=main.php" class="btn btn-gipro">План работ по договорам</a>
<a href="/?page=plancontrol.php" class="btn btn-gipro">Таблица контроля</a>
<a href="/?page=planforyear.php" class="btn btn-gipro">План работ Факт</a>
<a href="/?page=planforyear-plan.php" class="btn btn-gipro">План работ План</a>
<a href="/?page=arhiv.php" class="btn btn-gipro">Архив</a>
<a href="/?page=reports.php" class="btn btn-gipro">Отчеты</a>
<br>
</div>

<div class="title-pc" >
<h3>Последние действия Пользователей</h3>
</div>
<div class="reportsBtn">
<a href="/?page=reportsPlan.php" class="btn btn-gipro">Действия по Плану работ</a>
<a href="/?page=reportsP.php" class="btn btn-gipro">Действия по Стадии П</a>
<a href="/?page=reportsR.php" class="btn btn-gipro">Действия по Стадии Р</a>
<a href="/?page=reportsE.php" class="btn btn-gipro">Действия по Экспертизе</a>
</div>
<?php

$list = array();
$result = query("SELECT id, object_id, pos_num, timeE, user  FROM planexpert WHERE user!='NULL' ORDER BY timeE DESC");
while($data = mysqli_fetch_assoc($result)){ 

    $result2 = query("SELECT id, name FROM objects WHERE id=".$data['object_id']);
    $planarr=array();
    while($plan = mysqli_fetch_assoc($result2)){ 
        $planarr[]=array(
              'id'=>$plan['id'],
              'name'=>$plan['name']
          );
    }

    $toRazdelP = query("SELECT id, title FROM razdelE WHERE pos_num=".$data['pos_num']);
    $radzdelParr=array();
    while($razdelP = mysqli_fetch_assoc($toRazdelP)){ 
        $radzdelParr[]=array(
              'id'=>$razdelP['id'],
              'title'=>$razdelP['title']
        );
    }


    $list[]=array(
        'id'=>$data['id'],
        'object_id'=>$data['object_id'],
        'pos_num'=>$data['pos_num'],
        'timeE'=>$data['timeE'],
        'user'=>$data['user'],
        'obarr'=>$planarr,
        'praz'=>$radzdelParr,

    );

}
// var_export($list);
echo "   <div class='div-table'>";
    echo "
    <table class='table table-bordered table-hover table-condensed list-object'>
         <tr>
         <th >П.П.</th>
         <th >Объект</th>
         <th >Раздел</th>
         <th >Пользователь</th>
         <th >Время</th>
         </tr>";
         $pp=1;
foreach ($list as $key => $row) {
    foreach ($planarr as $key_m => $col) {
        echo '<tr>
        <td >'.$pp.'</td>
        <td >'.$row['obarr'][$key_m]['name'].'</td>
        <td >'.$row['praz'][$key_m]['title'].'</td>
        <td >'.$row['user'].'</td>
        <td >'.$row['timeE'].'</td>
        </tr>';
        //     echo 'В объекте '.$row['obarr'][$key_m]['name'];
        //     echo ' В Разделе '.$row['praz'][$key_m]['title'].' внесены изменения пользователем '.$row['user'].' в '.$row['timeP'];
        //    echo '<br>';
        $pp=$pp+1;
    }
}
echo "</table>";
echo "</div>";

?>