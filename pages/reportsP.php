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
<a href="/?page=reportsP.php" class="btn btn-gipro">Действия по Стадии П</a>
<a href="/?page=reportsR.php" class="btn btn-gipro">Действия по Стадии Р</a>
<a href="/?page=reportsE.php" class="btn btn-gipro">Действия по Экспертизе</a>
</div>
<?php

// $list = array();
// $result = query("SELECT id, name, arhiv_id FROM objects");
/*Тут после первого запроса, перебираем полученный массив с
объектами, и на кажду итерацию цикла делаем еще один запрос в таблицу с задачами,
где по id объекта ищем задачи относящиеся к данному объекту.
*/
// while($data = mysqli_fetch_assoc($result)){ 

//     $result2 = query("SELECT id, pos_num, timeP, user  FROM plancontrol WHERE object_id=".$data['id']." ORDER BY timeP DESC");
//     $planarr=array();
//     while($plan = mysqli_fetch_assoc($result2)){ 
//         $planarr[]=array(
//               'id'=>$plan['id'],
//               'pos_num'=>$plan['pos_num'],
//               'timeP'=>$plan['timeP'],
//               'user'=>$plan['user'],
//           );
//     }
//     $list[]=array(
//         'id'=>$data['id'],
//         'name'=>$data['name'],
//         'arhiv_id'=>$data['arhiv_id'],
//         'task'=>$planarr
//     );
// }

$list = array();
$result = query("SELECT id, object_id, pos_num, timeP, user  FROM plancontrol WHERE user!='NULL' ORDER BY timeP DESC");
while($data = mysqli_fetch_assoc($result)){ 

    $result2 = query("SELECT id, name FROM objects WHERE id=".$data['object_id']);
    $planarr=array();
    while($plan = mysqli_fetch_assoc($result2)){ 
        $planarr[]=array(
              'id'=>$plan['id'],
              'name'=>$plan['name']
          );
    }

    $toRazdelP = query("SELECT id, title FROM razdelP WHERE pos_num=".$data['pos_num']);
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
        'timeP'=>$data['timeP'],
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
        <td >'.$row['timeP'].'</td>
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