
<?php
foreach ($list as $key => $row) {
    if($row['arhiv_id']== NULL){
    echo '<tr>';
    echo '<td>' . $pp . '</td>';
    echo '<td><a 
    href="/?page=period.php&object_id='.$row['id'].'&name='.$row['name'].'"
    class="openform" 
    >'. $row['name'] .'</a></td>';
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
        if(isset($row['plan'][$key_m])){

            if($row['plan'][$key_m]['data_2']!=NULL){

                $daydiff =  daydiff($row['plan'][$key_m]['data'], $row['plan'][$key_m]['data_2']);

                if($row['plan'][$key_m]['data'] > $row['plan'][$key_m]['data_2']){
                    $daysdiff = '<font color="green"> + '.$daydiff.' дней</font>';
                }else{ 
                    $daysdiff =  '<font color="red"> + '.$daydiff.' дней</font>';
                }
            //полученную дату из массива переворачиваем в удобный вид.
            $newdate=date('d-m-Y', strtotime($row['plan'][$key_m]['data_2']));
              echo '<td alt="' . $row['plan'][$key_m]['id'] . '">'. $newdate .' '.$daysdiff.'</td>';
           
            }else{

            //полученную дату из массива переворачиваем в удобный вид.
            $newdate=date('d-m-Y', strtotime($row['plan'][$key_m]['data']));
            echo '<td alt="' . $row['plan'][$key_m]['id'] . '">'. $newdate .'</td>';
            }

        }else{
            echo '<td></td>';
        }
    }
    echo '</tr>';
$pp++;
    }else{}
}
   echo "</table>";

?>