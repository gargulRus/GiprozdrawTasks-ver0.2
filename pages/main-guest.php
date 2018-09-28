<div class="buttnons">
</div>
<?php
include(__DIR__.'/../template/main-source.php');

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
        //проверяем наличие ГАПа в массиве
        if(isset($row['gap'][$keygip]['gapname'])){
            echo '<td>'. $row['gap'][$keygip]['gapname'] .'</td>';
        }else {
            echo '<td></td>';
        }
        //проверяем наличие ОВ в массиве
        if(isset($row['ov'][$keygip]['ovname'])){
            echo '<td>'. $row['ov'][$keygip]['ovname'] .'</td>';
        }else {
            echo '<td></td>';
        }
        //проверяем наличие КР в массиве
        if(isset($row['kr'][$keygip]['krname'])){
            echo '<td>'. $row['kr'][$keygip]['krname'] .'</td>';
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
        $cellcolor="";
        $nowdate =date("Y-m-d");;
        if(isset($row['plan'][$key_m])){
            //полученную дату из массива переворачиваем в удобный вид.
            if($key_m==2 && $row['plan'][$key_m]['data']>$nowdate){
                $newdate=date('d-m-Y', strtotime($row['plan'][$key_m]['data']));
                $newdate1 = date_create($newdate);
                $datetoday = date("d-m-Y");
                $datetoday = date_create($datetoday);
                $diffnow= date_diff($newdate1, $datetoday);
                $daysnow = (int)$diffnow->format('%a');
                if($daysnow<=10){
                    $cellcolor="red";
                }elseif($daysnow<=20){
                    $cellcolor="Yellow";
                }else{
                    $cellcolor="#70DE83";
                }
                echo '<td bgcolor="'.$cellcolor.'" alt="' . $row['plan'][$key_m]['id'] . '">'. $newdate .'</td>';
            }elseif($key_m==4 && $row['plan'][$key_m]['data']>$nowdate){
                $newdate=date('d-m-Y', strtotime($row['plan'][$key_m]['data']));
                $newdate1 = date_create($newdate);
                $datetoday = date("d-m-Y");
                $datetoday = date_create($datetoday);
                $diffnow= date_diff($newdate1, $datetoday);
                $daysnow = (int)$diffnow->format('%a');
                if($daysnow<=10){
                    $cellcolor="red";
                }elseif($daysnow<=20){
                    $cellcolor="Yellow";
                }else{
                    $cellcolor="#70DE83";
                }
                echo '<td bgcolor="'.$cellcolor.'" alt="' . $row['plan'][$key_m]['id'] . '">'. $newdate .'</td>';
            }elseif($key_m==6 && $row['plan'][$key_m]['data']>$nowdate){
                $newdate=date('d-m-Y', strtotime($row['plan'][$key_m]['data']));
                $newdate1 = date_create($newdate);
                $datetoday = date("d-m-Y");
                $datetoday = date_create($datetoday);
                $diffnow= date_diff($newdate1, $datetoday);
                $daysnow = (int)$diffnow->format('%a');
                if($daysnow<=10){
                    $cellcolor="red";
                }elseif($daysnow<=20){
                    $cellcolor="Yellow";
                }else{
                    $cellcolor="#70DE83";
                }
                echo '<td bgcolor="'.$cellcolor.'" alt="' . $row['plan'][$key_m]['id'] . '">'. $newdate .'</td>';
            }else{
                $newdate=date('d-m-Y', strtotime($row['plan'][$key_m]['data']));
                  echo '<td alt="' . $row['plan'][$key_m]['id'] . '">'. $newdate .'</td>';

            }


        }else{
            echo '<td></td>';
        }
    }
    echo '</tr>';
$pp++;
}
   echo "</table>";

?>