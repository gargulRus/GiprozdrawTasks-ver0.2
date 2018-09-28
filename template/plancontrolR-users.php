<div class="title-pc" >
<h3>Рабочая документация</h3>
</div>
<div class="fixed-box">
    <div class="fixed-div">
    <div class='div-table'>
    <table class='table table-bordered table-hover table-condensed list-object'>
        <tr>
            <th id="thup">П.П.</th>
            <th id="thupq">Договор</th>
            <th id="thupw">Генплан</th>
            <th id="thupe">АР</th>
            <th id="thupr">КР</th>
            <th id="thupt">ЭО</th>
            <th id="thupy">ЭМ</th>
            <th id="thupu">НЭС</th>
            <th id="thupi">ВК</th>
            <th id="thupo">НВК</th>
            <th id="thupp">ДС</th>
            <th id="thupa">АПТ</th>
            <th id="thups">ОВ</th>
            <th id="thupd">ОТ</th>
            <th id="thupf">ХС</th>
            <th id="thupg">ТС</th>
            <th id="thuph">Тепл. пункт</th>
            <th id="thupj">СС</th>
            <th id="thupk">МГ</th>
            <th id="thupl">КГС</th>
            <th id="thupz">ТХ</th>
            <th id="thupx">Автом.</th>
            <th id="thupc">Сметы</th>
       </tr>
</table>
</div>
</div>
</div>
<?php
/*В этом документе логика аналогичка plancontrol.php
за исключением:
1.подключаемся к таблице plancontrolR
2.отсутствует чекбокс с ПЗ (т.к. в Рабочке ПЗ не предусмотрено) */

// формируем первоначальный массив с порядковыми номерами
$pos_num =array(
    1=>'1',  //Генплан
    '2', //АР
    '3', //КР
    '4', //ЭО
    '5', //ЭМ
    '6', //НЭС
    '7', //ВК
    '8', //НВК
    '9', //ДС
    '10', //АПТ
    '11', //ОВ
    '12', //ОТ
    '13', //ХС
    '14', //ТС
    '15', //Тепл.Пункт
    '16', //СС
    '17', //МГ
    '18', //КГС
    '19', //ТХ
    '20', //Автом
    '21' //Сметы
    );
//задаем переменную для проставки порядковых номеров
           $pp= 1;

$list=getontrolRobj($_COOKIE['role'], $_COOKIE['au_id']);

//формируем таблицу с полученным вложенным массивом
echo "   <div class='div-table'>";
   echo "
   <table class='table table-bordered table-hover table-condensed list-object'>
        <tr>
            <th id='thid'>П.П.</th>
            <th id='thidq'>Договор</th>
            <th id='thidw'><a  class='openform tooltip1' title='План работ отдела Генплан'
            href='/?page=periodotdelR.php&title=Генплан&posnum=1'>Генплан</a></th>
            <th id='thide'><a  class='openform tooltip1' title='План работ отдела АР'
            href='/?page=periodotdelR.php&title=АР&posnum=2'>АР</a></th>
            <th id='thidr'><a  class='openform tooltip1' title='План работ отдела КР'
            href='/?page=periodotdelR.php&title=КР&posnum=3'>КР</a></th>
            <th id='thidt'><a  class='openform tooltip1' title='План работ отдела ЭОМ'
            href='/?page=periodotdelR.php&title=ЭО&posnum=4'>ЭО</a></th>
            <th id='thidy'><a  class='openform tooltip1' title='План работ отдела ЭОМ'
            href='/?page=periodotdelR.php&title=ЭМ&posnum=5'>ЭМ</a></th>
            <th id='thidu'><a  class='openform tooltip1' title='План работ отдела ЭОМ'
            href='/?page=periodotdelR.php&title=НЭС&posnum=6'>НЭС</a></th>
            <th id='thidi'><a  class='openform tooltip1' title='План работ отдела ВК'
            href='/?page=periodotdelR.php&title=ВК&posnum=7'>ВК</a></th>
            <th id='thido'><a  class='openform tooltip1' title='План работ отдела ВК'
            href='/?page=periodotdelR.php&title=НВК&posnum=8'>НВК</a></th>
            <th id='thidp'><a  class='openform tooltip1' title='План работ отдела ВК'
            href='/?page=periodotdelR.php&title=ДС&posnum=9'>ДС</a></th>
            <th id='thida'><a  class='openform tooltip1' title='План работ отдела ВК'
            href='/?page=periodotdelR.php&title=АПТ&posnum=10'>АПТ</a></th>
            <th id='thids'><a  class='openform tooltip1' title='План работ отдела ОВ'
            href='/?page=periodotdelR.php&title=ОВ&posnum=11'>ОВ</a></th>
            <th id='thidd'><a  class='openform tooltip1' title='План работ отдела ОТ'
            href='/?page=periodotdelR.php&title=ОТ&posnum=12'>ОТ</a></th>
            <th id='thidf'><a  class='openform tooltip1' title='План работ отдела ХС'
            href='/?page=periodotdelR.php&title=ХС&posnum=13'>ХС</a></th>
            <th id='thidg'><a  class='openform tooltip1' title='План работ отдела ТС'
            href='/?page=periodotdelR.php&title=ТС&posnum=14'>ТС</a></th>
            <th id='thidh'><a  class='openform tooltip1' title='План работ отдела ИТП'
            href='/?page=periodotdelR.php&title=Тепл.пункт&posnum=15'>Тепл.пункт</a></th>
            <th id='thidj'><a  class='openform tooltip1' title='План работ отдела СС'
            href='/?page=periodotdelR.php&title=СС&posnum=16'>СС</a></th>
            <th id='thidk'><a  class='openform tooltip1' title='План работ отдела МГ'
            href='/?page=periodotdelR.php&title=МГ&posnum=17'>МГ</a></th>
            <th id='thidl'><a  class='openform tooltip1' title='План работ отдела МГ'
            href='/?page=periodotdelR.php&title=КГС&posnum=18'>КГС</a></th>
            <th id='thidz'><a  class='openform tooltip1' title='План работ отдела ТХ'
            href='/?page=periodotdelR.php&title=ТХ&posnum=19'>ТХ</a></th>
            <th id='thidx'><a  class='openform tooltip1' title='План работ отдела Автом'
            href='/?page=periodotdelR.php&title=Автом&posnum=20'>Автом.</a></th>
            <th id='thidc'><a  class='openform tooltip1' title='План работ отдела Сметы'
            href='/?page=periodotdelR.php&title=Сметы&posnum=21'>Сметы</a></th>
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