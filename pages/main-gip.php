<div class="buttnons">
    <a href="/?page=main-gip.php" class="btn btn-gipro">План работ по договорам</a>
    <a href="/?page=plancontrol-gip.php" class="btn btn-gipro">Таблица контроля</a>
    <a href="/?page=planforyear-gip.php" class="btn btn-gipro">План работ на год</a>   
</div>

<?php
include(__DIR__.'/../template/main-users.php');

foreach ($list as $key => $row) {
    echo '<tr>';
    echo '<td>' . $pp . '</td>';
    echo '<td>'. $row['name'] .'</td>';
        //проверяем наличие ГИПа в массиве
        if(isset($row['gip'][$keygip]['gipname'])){
            echo '<td>'. $row['gip'][$keygip]['gipname'] .'</td>';
        }else {
            echo '<td></td>';
        }
         //проверяем наличие Куратора в массиве
        if(isset($row['cur'][$keygip]['cur_name'])){
            echo '<td>'. $row['cur'][$keygip]['cur_name'] .'</td>';
        }else {
            echo '<td></td>';
        }
         //проверяем наличие Эксперта в массиве
        if(isset($row['exp'][$keygip]['exp_name'])){
            echo '<td>'. $row['exp'][$keygip]['exp_name'] .'</td>';
        }else {
            echo '<td></td>';
        }
    foreach ($main_pos as $key_m => $col) {
        if(isset($row['plan'][$key_m])){
            //полученную дату из массива переворачиваем в удобный вид.
            $newdate=date('d-m-Y', strtotime($row['plan'][$key_m]['data']));
              echo '<td alt="' . $row['plan'][$key_m]['id'] . '">'. $newdate .'</td>';
        }else{
            echo '<td></td>';
        }
    }
    echo '</tr>';
$pp++;
}
   echo "</table>";

?>