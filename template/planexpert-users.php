<div class="title-pc" >
<h3>Замечания экспертизы</h3>
</div>
<div class="fixed-box">
    <div class="fixed-div">
    <div class='div-table'>
    <table class='table table-bordered table-hover table-condensed list-object'>
        <tr>
        <th id="thup">П.П.</th>
        <th id="thupq">Договор</th>
        <th id="thupw">ГИПы</th>
        <th id="thupe">Генплан</th>
        <th id="thupr">АР</th>
        <th id="thupt">КР</th>
        <th id="thupy">ЭОМ</th>
        <th id="thupu">НЭС</th>
        <th id="thupi">ВК</th>
        <th id="thupo">НВК</th>
        <th id="thupp">АПТ</th>
        <th id="thupa">ОВ</th>
        <th id="thups">ОТ</th>
        <th id="thupd">ХС</th>
        <th id="thupf">ТС</th>
        <th id="thupg">Тепл. пункт</th>
        <th id="thuph">СС</th>
        <th id="thupj">НСС</th>
        <th id="thupk">МГ</th>
        <th id="thupl">КГС</th>
        <th id="thupz">ТХ</th>
        <th id="thupx">Рад. Без.</th>
        <th id="thupc">Автом.</th>
        <th id="thupv">ПОС\ПОД</th>
        <th id="thupb">АТЗ</th>
        <th id="thupn">ООС</th>
        <th id="thupm">ППМ</th>
        <th id="thupqq">ГОЧС</th>
        <th id="thupww">ОДИ</th>
        <th id="thupee">Энергоэфф.</th>
        <th id="thuprr">Сметы</th>
        <th id="thuptt">СЭС</th>
       </tr>
</table>
</div>
</div>
</div>
<?php
// формируем первоначальный массив с месяцами
$pos_num =array(
    1=>'1', //ГИПы
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
    '30' //СЭС
    );
//задаем переменную для проставки порядковых номеров
           $pp= 1;

           $list=getepxPobj($_COOKIE['role'], $_COOKIE['au_id']);

//формируем таблицу с полученным вложенным массивом
echo "   <div class='div-table'>";
   echo "
   <table class='table table-bordered table-hover table-condensed list-object'>
        <tr>
        <th id='thid'>П.П.</th>
        <th id='thidq'>Договор</th>
        <th id='thidw'>ГИПы</th>
        <th id='thide'>Генплан</th>
        <th id='thidr'>АР</th>
        <th id='thidt'>КР</th>
        <th id='thidy'>ЭОМ</th>
        <th id='thidu'>НЭС</th>
        <th id='thidi'>ВК</th>
        <th id='thido'>НВК</th>
        <th id='thidp'>АПТ</th>
        <th id='thida'>ОВ</th>
        <th id='thids'>ОТ</th>
        <th id='thidd'>ХС</th>
        <th id='thidf'>ТС</th>
        <th id='thidg'>Тепл. пункт</th>
        <th id='thidh'>СС</th>
        <th id='thidj'>НСС</th>
        <th id='thidk'>МГ</th>
        <th id='thidl'>КГС</th>
        <th id='thidz'>ТХ</th>
        <th id='thidx'>Рад. Без.</th>
        <th id='thidc'>Автом.</th>
        <th id='thidv'>ПОС\ПОД</th>
        <th id='thidb'>АТЗ</th>
        <th id='thidn'>ООС</th>
        <th id='thidm'>ППМ</th>
        <th id='thidqq'>ГОЧС</th>
        <th id='thidww'>ОДИ</th>
        <th id='thidee'>Энергоэфф.</th>
        <th id='thidrr'>Сметы</th>
        <th id='thidtt'>СЭС</th>
        </tr>";
//     foreach ($list as $key => $row) {
//         echo '<tr>';
//         echo '<td>' . $pp . '</td>';
//         echo '<td><a 
//             href="#" 
//             data-toggle="modal" data-target="#renameobject" 
//             class="openform" 
//             data-id="'.$row['id'].'"
//             data-name="'.$row['name'].'"
//             >'. $row['name'] .'</a></td>';
   
//         foreach ($pos_num as $key_m => $col) {
//             if(isset($row['task'][$key_m])){
//                   echo '<td alt="' . $row['task'][$key_m]['id'] . '">  '. $row['task'][$key_m]['exp_num'] .'</td>';
//             }else{
//                 echo '<td>
//                     </td>';
//             }
//         }
//         echo '</tr>';
//     $pp++;
//   }
//        echo "</table>";
       
?>

<script>
$(document).ready(function($) {

// alert(getStyle( document.getElementById('thid'),'width'));
// alert(getStyle( document.getElementById('thidq'),'width'));

// $('thup'){
// $(this).attr('width', getStyle( document.getElementById('thid'),'width'))
// });
$('th#thup').attr('width', getStyle( document.getElementById('thid'),'width'));
$('th#thupq').attr('width', getStyle( document.getElementById('thidq'),'width'));
$('th#thupw').attr('width', getStyle( document.getElementById('thidw'),'width'));
$('th#thupe').attr('width', getStyle( document.getElementById('thide'),'width'));
$('th#thupr').attr('width', getStyle( document.getElementById('thidr'),'width'));
$('th#thupt').attr('width', getStyle( document.getElementById('thidt'),'width'));
$('th#thupy').attr('width', getStyle( document.getElementById('thidy'),'width'));
$('th#thupu').attr('width', getStyle( document.getElementById('thidu'),'width'));
$('th#thupi').attr('width', getStyle( document.getElementById('thidi'),'width'));
$('th#thupo').attr('width', getStyle( document.getElementById('thido'),'width'));
$('th#thupp').attr('width', getStyle( document.getElementById('thidp'),'width'));
$('th#thupa').attr('width', getStyle( document.getElementById('thida'),'width'));
$('th#thups').attr('width', getStyle( document.getElementById('thids'),'width'));
$('th#thupd').attr('width', getStyle( document.getElementById('thidd'),'width'));
$('th#thupf').attr('width', getStyle( document.getElementById('thidf'),'width'));
$('th#thupg').attr('width', getStyle( document.getElementById('thidg'),'width'));
$('th#thuph').attr('width', getStyle( document.getElementById('thidh'),'width'));
$('th#thupj').attr('width', getStyle( document.getElementById('thidj'),'width'));
$('th#thupk').attr('width', getStyle( document.getElementById('thidk'),'width'));
$('th#thupl').attr('width', getStyle( document.getElementById('thidl'),'width'));
$('th#thupz').attr('width', getStyle( document.getElementById('thidz'),'width'));
$('th#thupx').attr('width', getStyle( document.getElementById('thidx'),'width'));
$('th#thupc').attr('width', getStyle( document.getElementById('thidc'),'width'));
$('th#thupv').attr('width', getStyle( document.getElementById('thidv'),'width'));
$('th#thupb').attr('width', getStyle( document.getElementById('thidb'),'width'));
$('th#thupn').attr('width', getStyle( document.getElementById('thidn'),'width'));
$('th#thupm').attr('width', getStyle( document.getElementById('thidm'),'width'));
$('th#thupqq').attr('width', getStyle( document.getElementById('thidqq'),'width'));
$('th#thupww').attr('width', getStyle( document.getElementById('thidww'),'width'));
$('th#thupee').attr('width', getStyle( document.getElementById('thidee'),'width'));
$('th#thuprr').attr('width', getStyle( document.getElementById('thidrr'),'width'));
$('th#thuptt').attr('width', getStyle( document.getElementById('thidtt'),'width'));

// alert(getStyle( document.getElementById('thup'),'width'));
// alert(getStyle( document.getElementById('thupq'),'width'));
// alert( getRealSize(document.getElementById('thid1')).width );
// alert( getRealSize(document.getElementById('thid2')).width );

    $nav = $('.fixed-div');
    $nav.css('width', $nav.outerWidth());
    $window = $(window);
    $h = $nav.offset().top;
    $window.scroll(function() {
        if ($window.scrollTop() > $h) {
            $nav.addClass('fixed');
        } else {
            $nav.removeClass('fixed');
        }
    });
});

 function getStyle(b, a) {
    if (document.defaultView && document.defaultView.getComputedStyle) {
        return document.defaultView.getComputedStyle(b, "")[a]
    } else if (b.currentStyle) {
        return b.currentStyle[a]
    }
};



</script>