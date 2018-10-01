<div class="title-pc" >
<h3>Проектная документация</h3>
</div>
<div class="fixed-box">
    <div class="fixed-div">
    <div class='div-table'>
    <table class='table table-bordered table-hover table-condensed list-object'>
        <tr>
            <th id="thup">П.П.</th>
            <th id="thupq">Договор</th>
            <th id="thupw">ГИП</th>
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
            <th id="thuptt">БЭО</th>
            <th id="thupyy">ОЗДС</th>
       </tr>
</table>
</div>
</div>
</div>
<?php
// формируем первоначальный массив с месяцами
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
//задаем переменную для проставки порядковых номеров
           $pp= 1;

$list=getontrolPobj($_COOKIE['role'], $_COOKIE['au_id']);


//формируем таблицу с полученным вложенным массивом
echo "   <div class='div-table'>";
   echo "
   <table class='table table-bordered table-hover table-condensed list-object'>
        <tr>
            <th id='thid'>П.П.</th>
            <th id='thidq'>Договор</th>";
            if($_COOKIE['role']=='admin'){
            echo "<th id='thidw'><a  class='openform tooltip1' title='План работ отдела ГИП'
            href='/?page=periodotdelgip1.php&title=ГИП&posnum=1'>ГИП</a></th>";
            }else{
            echo "<th id='thidw'><a  class='openform tooltip1' title='План работ отдела ГИП'
            href='/?page=periodotdel.php&title=ГИП&posnum=1'>ГИП</a></th>  ";
            }
            echo "<th id='thide'><a  class='openform tooltip1' title='План работ отдела Генплан'
            href='/?page=periodotdel.php&title=Генплан&posnum=2'>Генплан</a></th>";
            if($_COOKIE['role']=='admin'){
            echo "<th id='thidr'><a  class='openform tooltip1' title='План работ отдела АР'
            href='/?page=periodotdelar1.php&title=АР&posnum=3'>АР</a></th>";
            }else{
            echo "<th id='thidr'><a  class='openform tooltip1' title='План работ отдела АР'
            href='/?page=periodotdel.php&title=АР&posnum=3'>АР</a></th>";
            }
            if($_COOKIE['role']=='admin'){
            echo "<th id='thidt'><a  class='openform tooltip1' title='План работ отдела КР'
            href='/?page=periodotdelkr1.php&title=КР&posnum=4'>КР</a></th>";
            }else{
            echo "<th id='thidt'><a  class='openform tooltip1' title='План работ отдела КР'
            href='/?page=periodotdel.php&title=КР&posnum=4'>КР</a></th>";
            }
            echo "<th id='thidy'><a  class='openform tooltip1' title='План работ отдела ЭОМ'
            href='/?page=periodotdel.php&title=ЭОМ&posnum=5'>ЭОМ</a></th>
            <th id='thidu'><a  class='openform tooltip1' title='План работ отдела ЭОМ'
            href='/?page=periodotdel.php&title=НЭС&posnum=6'>НЭС</a></th>
            <th id='thidi'><a  class='openform tooltip1' title='План работ отдела ВК'
            href='/?page=periodotdel.php&title=ВК&posnum=7'>ВК</a></th>
            <th id='thido'><a class='openform tooltip1' title='План работ отдела ВК'
            href='/?page=periodotdel.php&title=НВК&posnum=8'>НВК</a></th>
            <th id='thidp'><a  class='openform tooltip1' title='План работ отдела ВК'
            href='/?page=periodotdel.php&title=АПТ&posnum=9'>АПТ</a></th>";
            if($_COOKIE['role']=='admin'){
            echo "<th id='thida'><a class='openform tooltip1' title='План работ отдела ОВ'
            href='/?page=periodotdelov1.php&title=ОВ&posnum=10'>ОВ</a></th>";
            }else{
            echo "<th id='thida'><a class='openform tooltip1' title='План работ отдела ОВ'
            href='/?page=periodotdel.php&title=ОВ&posnum=10'>ОВ</a></th>";
            }
            echo "<th id='thids'><a  class='openform tooltip1' title='План работ отдела ОТ'
            href='/?page=periodotdel.php&title=ОТ&posnum=11'>ОТ</a></th>
            <th id='thidd'><a  class='openform tooltip1' title='План работ отдела ХС'
            href='/?page=periodotdel.php&title=ХС&posnum=12'>ХС</a></th>
            <th id='thidf'><a  class='openform tooltip1' title='План работ отдела ТС'
            href='/?page=periodotdel.php&title=ТС&posnum=13'>ТС</a></th>
            <th id='thidg'><a  class='openform tooltip1' title='План работ отдела ИТП'
            href='/?page=periodotdel.php&title=Тепл. пункт&posnum=14'>Тепл. пункт</a></th>
            <th id='thidh'><a  class='openform tooltip1' title='План работ отдела СС'
            href='/?page=periodotdel.php&title=СС&posnum=15'>СС</a></th>
            <th id='thidj'><a  class='openform tooltip1' title='План работ отдела НСС'
            href='/?page=periodotdel.php&title=НСС&posnum=16'>НСС</a></th>
            <th id='thidk'><a class='openform tooltip1' title='План работ отдела МГ'
            href='/?page=periodotdel.php&title=МГ&posnum=17'>МГ</a></th>
            <th id='thidl'><a  class='openform tooltip1' title='План работ отдела КГС'
            href='/?page=periodotdel.php&title=КГС&posnum=18'>КГС</a></th>
            <th id='thidz'><a  class='openform tooltip1' title='План работ отдела ТХ'
            href='/?page=periodotdel.php&title=ТХ&posnum=19'>ТХ</a></th>
            <th id='thidx'><a  class='openform tooltip1' title='План работ отдела ТХ'
            href='/?page=periodotdel.php&title=Рад. Без.&posnum=20'>Рад. Без.</a></th>
            <th id='thidc'><a  class='openform tooltip1' title='План работ отдела Автом'
            href='/?page=periodotdel.php&title=Автом.&posnum=21'>Автом.</a></th>
            <th id='thidv'><a  class='openform tooltip1' title='План работ отдела ПОС'
            href='/?page=periodotdel.php&title=ПОС\ПОД&posnum=22'>ПОС\ПОД</a></th>
            <th id='thidb'><a  class='openform tooltip1' title='План работ отдела АТЗ'
            href='/?page=periodotdel.php&title=АТЗ&posnum=23'>АТЗ</a></th>
            <th id='thidn'><a  class='openform tooltip1' title='План работ отдела ООС'
            href='/?page=periodotdel.php&title=ООС&posnum=24'>ООС</a></th>
            <th id='thidm'><a  class='openform tooltip1' title='План работ отдела ППМ'
            href='/?page=periodotdel.php&title=ППМ&posnum=25'>ППМ</a></th>
            <th id='thidqq'><a  class='openform tooltip1' title='План работ отдела ГОЧС'
            href='/?page=periodotdel.php&title=ГОЧС&posnum=26'>ГОЧС</a></th>
            <th id='thidww'><a  class='openform tooltip1' title='План работ отдела ОДИ'
            href='/?page=periodotdel.php&title=ОДИ&posnum=27'>ОДИ</a></th>
            <th id='thidee'><a class='openform tooltip1' title='План работ отдела ЭЭ'
            href='/?page=periodotdel.php&title=Энергоэфф.&posnum=28'>Энергоэфф.</a></th>
            <th id='thidrr'><a class='openform tooltip1' title='План работ отдела Сметы'
            href='/?page=periodotdel.php&title=Сметы&posnum=29'>Сметы</a></th>
            <th id='thidtt'><a  class='openform tooltip1' title='План работ отдела БЭО'
            href='/?page=periodotdel.php&title=БЭО&posnum=30'>БЭО</a></th>
            <th id='thidyy'><a  class='openform tooltip1' title='План работ отдела ОЗДС'
            href='/?page=periodotdel.php&title=ОЗДС&posnum=31'>ОЗДС</a></th>
        </tr>";
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
$('th#thupyy').attr('width', getStyle( document.getElementById('thidyy'),'width'));

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