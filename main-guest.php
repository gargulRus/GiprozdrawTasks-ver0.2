<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>АО "Гипроздорав"</title>
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/modals.css">
  <link rel="stylesheet" href="css/switch.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/tooltipster.bundle.min.css">
    <link rel="shortcut icon" href="/image/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="/plugins/fontawesome/css/fontawesome-all.min.css">
   
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="/scripts/clock.js"></script>
    <script src="/scripts/tooltipster.bundle.min.js"></script>

    <!-- Magnific Popup-->
    <link rel="stylesheet" href="/template/plugins/magnific/magnific-popup.css">
    <script src="/template/plugins/magnific/jquery.magnific-popup.min.js"></script>

    <script src="/template/plugins/jq_core.js"></script>
    <script>
        $(document).ready(function() {
            $('.tooltip1').tooltipster();
        });
    </script>

</head>
<body>

  <div class="one">
      <div class="two1">
          <img src="/image/logo.png" class="logoimg">
      </div>
      <div class="two2">
          <!-- <h1>Сайт закрыт на реконструкцию.</h1> -->
          <h1>ПЛАН РАБОТ АО ГИПРОЗДРАВ В 2018 Г.</h1>
      </div>
      <div class="clock">
        <span id="doc_time"></span>
        <script type="text/javascript">
            clock();
        </script>
</div>
</div>
        
  <div class="content">
 
    <?php
    include_once(__DIR__."/core/connect.php");
include_once(__DIR__."/core/functions.php");
include(__DIR__.'/template/main-source.php');

foreach ($list as $key => $row) {
    if($row['arhiv_id']== NULL){
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
    }else{}
}
   echo "</table>";

?>

  </div>

  <!-- Site footer -->
  <div class="footer">
    <p>© АО &quot;Гипроздрав&quot; <?=date('Y');?></p>
  </div> <!-- /Site footer -->

</body>
</html>
<div class="buttnons">
</div>
