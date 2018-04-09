<?php
//проверка получения 
foreach ($list as $key => $row) {
    $count=0;
    echo $row['id']. "- Ид Объекта";
    echo "<br>";
    echo $row['name'] . "- Имя Объекта";
    echo "<br>";
    foreach ($pos_num as $key_m => $col) {
        if(isset($row['task'][$key_m]['id'])){
              echo $row['task'][$key_m]['id'] . "- Ид Раздела";
              echo "  ";
                echo $row['task'][$key_m]['progress'] . "- Процент выполнения";
                if(isset($row['task'][$key_m]['progress'])){
                    $count=$count+$row['task'][$key_m]['progress'];
                }
                echo "  ";
                echo $key_m . "- номер позиции";
                echo "<br>";
        }else{}
        }
        $count=$count / 10;
        echo $count . "- Общий процент выполнения стадии П";
          echo "<br>";
foreach ($job_num as $key_m => $col) {
        if(isset($row['job'][$key_m]['id'])){
            echo $row['job'][$key_m]['id'] . "- Ид Раздела";
            echo "  ";
              echo $row['job'][$key_m]['data'] . "- Дата";
              list($day, $month1, $year) = explode("-", $row['job'][$key_m]['data']);
              $month1 = (int)$month1;
              echo "  ";
              echo $month1. "- Номер месяца";
              echo "  ";
              echo $row['job'][$key_m]['pos_num'] . "- номер позиции ПЭР";
              echo "  ";
              echo $key_m . "- номер позиции";
              echo "<br>";
        }else{}
        }

    //Проверяем даты в стоблцах проекта
    if(isset($row['job'][1]['data'])){
        list($day, $month1, $year) = explode("-", $row['job'][1]['data']);
        $month1 = (int)$month1;
        echo $month1 . "- Стадия П начало. номер месяца";
        echo "<br>";
    }else{}
    if(isset($row['job'][1]['data'])){
        list($day, $month2, $year) = explode("-", $row['job'][2]['data']);
        $month2 = (int)$month2;
        echo $month2 . "- Стадия П конец. номер месяца";
        echo "<br>";
    }else{}
        if(isset($month1)){
        while($month1<=$month2){
            echo "П " .$count."%";
            $month1=$month1+1;
        }
    }else{}
        echo "<br>";
        //Проверяем даты в стоблцах экспертизы
        if(isset($row['job'][3]['data'])){
            list($day, $month3, $year) = explode("-", $row['job'][3]['data']);
            $month3 = (int)$month3;
            echo $month3 . "- Экспериза начало. номер месяца";
            echo "<br>";
        }else{}
        if(isset($row['job'][3]['data'])){
            list($day, $month4, $year) = explode("-", $row['job'][4]['data']);
            $month4 = (int)$month4;
            echo $month4 . "- Экспериза конец. номер месяца";
            echo "<br>";
        }else{}
            if(isset($month3)){
            while($month3<=$month4){
                echo "Э";
                $month3=$month3+1;
            }
        }else{}
            echo "<br>";
            //Проверяем даты в стоблцах рабочки
            if(isset($row['job'][5]['data'])){
                list($day, $month5, $year) = explode("-", $row['job'][5]['data']);
                $month5 = (int)$month5;
                echo $month5 . "- Рабочка начало. номер месяца";
                echo "<br>";
            }else{}
            if(isset($row['job'][5]['data'])){
                list($day, $month6, $year) = explode("-", $row['job'][6]['data']);
                $month6 = (int)$month6;
                echo $month6 . "- Рабочка конец. номер месяца";
                echo "<br>";
            }else{}
                if(isset($month5)){
                while($month5<=$month6){
                    echo "Р";
                    $month5=$month5+1;
                }
            }else{}
                echo "<br>";
}


// $data1=1;

// $keyd=0;
// $keyd2=1;
// var_export($list[$data1]['job'][0]);
// var_export($list[$data1]['job'][0]['data']);
// var_export($list[$data1]['job'][1]['data']);
// list($day, $month2, $year) = explode("-", $list[$data1]['job'][1]['data']);

// $month1 = (int)$month1;
// echo $month1;
// $month2 = (int)$month2;
// echo $month2;

// while($month1<=$month2){
//     echo "P";
//     $month1= $month1+1;
// }

        //Проверяем даты в стоблцах экспертизы
//         if(isset($row['job'][3]['data'])){
//             list($day, $month3, $year) = explode("-", $row['job'][3]['data']);
//             $month3 = (int)$month3;
//             echo $month3 . "- Экспериза начало. номер месяца";
//             echo "<br>";
//         }else{}
//         if(isset($row['job'][3]['data'])){
//             list($day, $month4, $year) = explode("-", $row['job'][4]['data']);
//             $month4 = (int)$month4;
//             echo $month4 . "- Экспериза конец. номер месяца";
//             echo "<br>";
//         }else{}
//             if(isset($month3)){
//             while($month3<=$month4){
//                 echo "Э";
//                 $month3=$month3+1;
//             }
//         }else{}
//             echo "<br>";
//             //Проверяем даты в стоблцах рабочки
//             if(isset($row['job'][5]['data'])){
//                 list($day, $month5, $year) = explode("-", $row['job'][5]['data']);
//                 $month5 = (int)$month5;
//                 echo $month5 . "- Рабочка начало. номер месяца";
//                 echo "<br>";
//             }else{}
//             if(isset($row['job'][5]['data'])){
//                 list($day, $month6, $year) = explode("-", $row['job'][6]['data']);
//                 $month6 = (int)$month6;
//                 echo $month6 . "- Рабочка конец. номер месяца";
//                 echo "<br>";
//             }else{}
//                 if(isset($month5)){
//                 while($month5<=$month6){
//                     echo "Р";
//                     $month5=$month5+1;
//                 }
//             }else{}
//                 echo "<br>";
// }


            //     foreach ($list as $key => $row) {

            //         foreach ($pos_num as $key_m => $col) {
            //             /*
            //             Проверяем данные из таблицы с Разделами.
            //             Проверяем каждую строку из таблицы plancontrol на то что она существует
            //             Проверяем наличие данных в ячейке progress и если true
            //             записываем его в счетчик $count
            //             Затем высчитываем среднее арифмитическое $count
            //             */
            //             if(isset($row['task'][$key_m]['id'])){
            //                 if(isset($row['task'][$key_m]['progress'])){
            //                 $count=$count+$row['task'][$key_m]['progress'];
            //                 }
            //                 }else{}
            //                 }
            //         $count=$count / 10;
            //         //Проверяем даты в стоблцах проекта
            //         if(isset($row['job'][1]['data'])){
            //             list($day, $month1, $year) = explode("-", $row['job'][1]['data']);
            //             $monthPstart = (int)$month1;
            //         }else{}
            //         if(isset($row['job'][1]['data'])){
            //             list($day, $month2, $year) = explode("-", $row['job'][2]['data']);
            //             $monthPend = (int)$month2;
            //         }else{}
            //             if(isset($monthPstart)){
            //                 while($monthPstart<=$monthPend){
            //                     echo '<td>';
            //                 echo "П " .$count."%";
            //                 echo '<td>';
            //                 $monthPstart=$monthPstart+1;
            //                 }
            //             }else{}
            //         }

            // }
    // foreach ($list as $key => $row) {
    //     echo '<tr>';
    //     echo '<td>' . $pp . '</td>';
    //     echo '<td><a 
    //         href="#" 
    //         data-toggle="modal" data-target="#renameobject" 
    //         class="openform" 
    //         data-id="'.$row['id'].'"
    //         data-name="'.$row['name'].'"
    //         >'. $row['name'] .'</a></td>';
   
   

                  
            // }else{
            //     echo '<td><a 
            //         href="#" 
            //         data-toggle="modal" data-target="#renameplan" 
            //         data-month="'.$key_m.'"
            //         data-object-id="'.$row['id'].'"
            //         class="openformplan hideFuck" >+
            //         </a> </td>';
            // }
      //  }

      ?>