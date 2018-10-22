<?php
function currdata(){
        $currentDate = date('m-Y'); //может быть присвоена из другой переменной
        //список месяцев с названиями для замены
        $_monthsList = array(
            "01-" => "январь",
            "02-" => "февраль",
            "03-" => "март",
            "04-" => "апрель",
            "05-" => "май",
            "06-" => "июнь",
            "07-" => "июль",
            "08-" => "август",
            "09-" => "сентябрь",
            "10-" => "октябрь",
            "11-" => "ноябрь",
            "12-" => "декабрь"
        );
        //Наша задача - вывод русской даты, 
        //поэтому заменяем число месяца на название:
            $_mD = date("m-"); //для замены
            $currentDate = str_replace($_mD, " ".$_monthsList[$_mD]." ", $currentDate);
    return $currentDate;
}

//функция обработки mysql запросов
function load_page(){
    if(isset($_GET['page']) && !empty($_GET['page'])){
        $page = $_GET['page'];
    }else{
    //Грузим страницу по умолчанию. Без админских прав.
        $page = 'planforyear-guest.php';
        switch ($_SESSION['mode']) {
            case 'spec':
            $page = 'main.php'; break;
            // $page = 'main-update.php'; break;
            case 'gip':
            $page = 'main.php'; break;
            // $page = 'main-update.php'; break;
            case 'arhiv':
            $page = 'main.php'; break;
            // $page = 'main-update.php'; break;
            case 'admin':
            $page = 'main.php'; break;
            case 'expert':
            $page = 'main.php'; break;
            // $page = 'main-update.php'; break;
            default:
            // $page = 'main-update.php';
            $page = 'planforyear-guest.php';
            break;
        }
    }
    include(__DIR__.'/../pages/'.$page);
}

function plancalc($data1, $data2){
        $date1= date_create ($data1);
        $date2= date_create ($data2);

        $diffP= date_diff($date1, $date2);
        $daysPplan = (int)$diffP->format('%a');

        $datenow1 = date("Y-m-d");
        $today = date_create($datenow1);

        $diffnow= date_diff($date1, $today);
        $daysPnow = (int)$diffnow->format('%a');

        $daysPnow= $daysPnow * 100;

        if($daysPplan==0){
        }else{
        $percentcalc= $daysPnow/ $daysPplan;
        }

        $percentcalc=round($percentcalc, 0);
        
        if($percentcalc>100){
        $percentcalc=100;
        }else{}

    return $percentcalc;
}

function daydiff($data1, $data2){
        $date1= date_create ($data1);
        $date2= date_create ($data2);

        $diffP= date_diff($date1, $date2);
        $daysPplan = (int)$diffP->format('%a');

    return $daysPplan;
}

function load_modal(){
    $modal_name = $_GET['modal'];
    include(__DIR__.'/../template/modals/'.$modal_name.'.php');
}

//ФОРМИРОВАНИЕ МОДАЛЬНЫХ ОКОН В СТАДИИ П ДЛЯ СПЕЦИАЛИСТОВ<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
function plan_list($pos_num=false){
    $plan_list=array();
    $plan_list[1]=array(
        'title'=>'ГИП',
        'tasks'=>array(
            'pz'=>array('title'=>'ОПЗ','percent'=>30),
            'gh'=>array('title'=>'ИРД','percent'=>30),
            'ved'=>array('title'=>'ТУ','percent'=>30)
        )
    );
    $plan_list[2]=array(
        'title'=>'Генплан',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'ved'=>array('title'=>'Ведомость Объемов','percent'=>30)
        )
    );
    $plan_list[3]=array(
        'title'=>'Архитектура',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>10),
            'pl'=>array('title'=>'Планы','percent'=>30),
            'fs'=>array('title'=>'Фасады','percent'=>10),
            '3d'=>array('title'=>'3D-Визуализация','percent'=>10),
            'veddecor'=>array('title'=>'Ведомость отделки','percent'=>20),
            'sp'=>array('title'=>'Спецификация','percent'=>10)
        )
    );
    $plan_list[4]=array(
        'title'=>'Конструкции',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>10),
            'gh'=>array('title'=>'Графическая часть','percent'=>40),
            'calckr'=>array('title'=>'Расчетная часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>10)
        )
    );
    $plan_list[5]=array(
        'title'=>'ЭОМ',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $plan_list[6]=array(
        'title'=>'НЭС',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $plan_list[7]=array(
        'title'=>'ВК',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $plan_list[8]=array(
        'title'=>'НВК',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $plan_list[9]=array(
        'title'=>'АПТ',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $plan_list[10]=array(
        'title'=>'ОВ',
        'tasks'=>array(
            'calcovnag'=>array('title'=>'Расчет нагрузок','percent'=>2),
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>8),
            'ovairbalance'=>array('title'=>'Таб. воздушных балансов','percent'=>14),
            'ovchar'=>array('title'=>'Характеристика','percent'=>8),
            'ovairvak'=>array('title'=>'Таб. местных отсосов','percent'=>4),
            'ovdypp'=>array('title'=>'Планы ДУ и ПП','percent'=>9),
            'ovonelinepl'=>array('title'=>'Планы "в одну линию"','percent'=>27),
            'ovpltp'=>array('title'=>'Планы теплоснабжения','percent'=>8),
            'ovspvent'=>array('title'=>'Спецификация - вентиляция','percent'=>5),
            'ovsptp'=>array('title'=>'Спецификация - теплоснабжение','percent'=>3),
            'release'=>array('title'=>'Выпуск','percent'=>2)
        )
    );
    $plan_list[11]=array(
        'title'=>'ОТ',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>10),
            'otcalc'=>array('title'=>'Расчет теплопотерь','percent'=>15),
            'otplans'=>array('title'=>'Планы','percent'=>45),
            'otscheme'=>array('title'=>'Принудит. схема','percent'=>5),
            'sp'=>array('title'=>'Спецификация','percent'=>15)
        )
    );
    $plan_list[12]=array(
        'title'=>'ХС',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $plan_list[13]=array(
        'title'=>'ТС',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $plan_list[14]=array(
        'title'=>'Тепловой Пункт',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $plan_list[15]=array(
        'title'=>'СС',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $plan_list[16]=array(
        'title'=>'НСС',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $plan_list[17]=array(
        'title'=>'МГ',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $plan_list[18]=array(
        'title'=>'КГС',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $plan_list[19]=array(
        'title'=>'ТХ',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $plan_list[20]=array(
        'title'=>'Рад. Без.',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $plan_list[21]=array(
        'title'=>'Автоматика',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $plan_list[22]=array(
        'title'=>'ПОС-ПОД',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $plan_list[23]=array(
        'title'=>'АТЗ',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $plan_list[24]=array(
        'title'=>'ООС',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>35),
            'attach'=>array('title'=>'Приложения','percent'=>15),
            'calcnoise'=>array('title'=>'Расчет Шума','percent'=>30),
            'ved'=>array('title'=>'Ведомость Объемов','percent'=>10)
        )
    );
    $plan_list[25]=array(
        'title'=>'ППМ',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'ved'=>array('title'=>'Ведомость Объемов','percent'=>30),
            'calcppm'=>array('title'=>'Расчет Рисков','percent'=>30)
        )
    );
    $plan_list[26]=array(
        'title'=>'ГОЧС',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>40),
            'gh'=>array('title'=>'Графическая часть','percent'=>50),
        )
    );
    $plan_list[27]=array(
        'title'=>'ОДИ',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $plan_list[28]=array(
        'title'=>'Энергоэффективность',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>45),
            'gh'=>array('title'=>'Графическая часть','percent'=>45),
        )
    );
    $plan_list[29]=array(
        'title'=>'Сметы',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'sm'=>array('title'=>'Сметы','percent'=>30),
            'prices'=>array('title'=>'Прайс-листы','percent'=>30)
        )
    );
    $plan_list[30]=array(
        'title'=>'БЭО',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>45),
            'gh'=>array('title'=>'Графическая часть','percent'=>45),
        )
    );
    $plan_list[31]=array(
        'title'=>'ОЗДС',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>45),
            'gh'=>array('title'=>'Графическая часть','percent'=>45),
        )
    );
    if(isset($pos_num) && !empty($pos_num)){
        return $plan_list[$pos_num];
    }
    return $plan_list;
}

//ФОРМИРОВАНИЕ МОДАЛЬНЫХ ОКОН В СТАДИИ П ДЛЯ АРХИВА<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
function arhiv_list($pos_num=false){
    $arhiv_list=array();
    $arhiv_list[1]=array(
        'title'=>'ГИП',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5)
        )
    );
    $arhiv_list[2]=array(
        'title'=>'Генплан',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5)
        )
    );
    $arhiv_list[3]=array(
        'title'=>'Архитектура',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5)
        )
    );
    $arhiv_list[4]=array(
        'title'=>'Конструкции',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5)
        )
    );
    $arhiv_list[5]=array(
        'title'=>'ЭОМ',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5)
        )
    );
    $arhiv_list[6]=array(
        'title'=>'НЭС',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5)
        )
    );
    $arhiv_list[7]=array(
        'title'=>'ВК',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5)
        )
    );
    $arhiv_list[8]=array(
        'title'=>'НВК',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5)
        )
    );
    $arhiv_list[9]=array(
        'title'=>'АПТ',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5)
        )
    );
    $arhiv_list[10]=array(
        'title'=>'ОВ',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5)
        )
    );
    $arhiv_list[11]=array(
        'title'=>'ОТ',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5)
        )
    );
    $arhiv_list[12]=array(
        'title'=>'ХС',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5)
        )
    );
    $arhiv_list[13]=array(
        'title'=>'ТС',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5)
        )
    );
    $arhiv_list[14]=array(
        'title'=>'Тепловой Пункт',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5)
        )
    );
    $arhiv_list[15]=array(
        'title'=>'СС',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5)
        )
    );
    $arhiv_list[16]=array(
        'title'=>'НСС',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5)
        )
    );
    $arhiv_list[17]=array(
        'title'=>'МГ',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5)
        )
    );
    $arhiv_list[18]=array(
        'title'=>'КГС',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5)
        )
    );
    $arhiv_list[19]=array(
        'title'=>'ТХ',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5)
        )
    );
    $arhiv_list[20]=array(
        'title'=>'Рад. Без.',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5)
        )
    );
    $arhiv_list[21]=array(
        'title'=>'Автоматика',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5)
        )
    );
    $arhiv_list[22]=array(
        'title'=>'ПОС-ПОД',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5)
        )
    );
    $arhiv_list[23]=array(
        'title'=>'АТЗ',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5)
        )
    );
    $arhiv_list[24]=array(
        'title'=>'ООС',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5)
        )
    );
    $arhiv_list[25]=array(
        'title'=>'ППМ',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5)
        )
    );
    $arhiv_list[26]=array(
        'title'=>'ГОЧС',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5)
        )
    );
    $arhiv_list[27]=array(
        'title'=>'ОДИ',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5)
        )
    );
    $arhiv_list[28]=array(
        'title'=>'Энергоэффективность',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5)
        )
    );
    $arhiv_list[29]=array(
        'title'=>'БЭО',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5)
        )
    );
    $arhiv_list[30]=array(
        'title'=>'Сметы',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5)
        )
    );
    $arhiv_list[31]=array(
        'title'=>'ОЗДС',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5)
        )
    );
    if(isset($pos_num) && !empty($pos_num)){
        return $arhiv_list[$pos_num];
    }
    return $arhiv_list;
}

//ФОРМИРОВАНИЕ МОДАЛЬНЫХ ОКОН В СТАДИИ П ДЛЯ ЭКСПЕРТОВ<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
function expertP_list($pos_num=false){
    $expertP_list=array();
    $expertP_list[1]=array(
        'title'=>'ГИП',
        'tasks'=>array(
            'expertpdf'=>array('title'=>'Принять файлы для экспертизы','percent'=>5)
        )
    );
    $expertP_list[2]=array(
        'title'=>'Генплан',
        'tasks'=>array(
            'expertpdf'=>array('title'=>'Принять файлы для экспертизы','percent'=>5)
        )
    );
    $expertP_list[3]=array(
        'title'=>'Архитектура',
        'tasks'=>array(
            'expertpdf'=>array('title'=>'Принять файлы для экспертизы','percent'=>5)
        )
    );
    $expertP_list[4]=array(
        'title'=>'Конструкции',
        'tasks'=>array(
            'expertpdf'=>array('title'=>'Принять файлы для экспертизы','percent'=>5)
        )
    );
    $expertP_list[5]=array(
        'title'=>'ЭОМ',
        'tasks'=>array(
            'expertpdf'=>array('title'=>'Принять файлы для экспертизы','percent'=>5)
        )
    );
    $expertP_list[6]=array(
        'title'=>'НЭС',
        'tasks'=>array(
            'expertpdf'=>array('title'=>'Принять файлы для экспертизы','percent'=>5)
        )
    );
    $expertP_list[7]=array(
        'title'=>'ВК',
        'tasks'=>array(
            'expertpdf'=>array('title'=>'Принять файлы для экспертизы','percent'=>5)
        )
    );
    $expertP_list[8]=array(
        'title'=>'НВК',
        'tasks'=>array(
            'expertpdf'=>array('title'=>'Принять файлы для экспертизы','percent'=>5)
        )
    );
    $expertP_list[9]=array(
        'title'=>'АПТ',
        'tasks'=>array(
            'expertpdf'=>array('title'=>'Принять файлы для экспертизы','percent'=>5)
        )
    );
    $expertP_list[10]=array(
        'title'=>'ОВ',
        'tasks'=>array(
            'expertpdf'=>array('title'=>'Принять файлы для экспертизы','percent'=>5)
        )
    );
    $expertP_list[11]=array(
        'title'=>'ОТ',
        'tasks'=>array(
            'expertpdf'=>array('title'=>'Принять файлы для экспертизы','percent'=>5)
        )
    );
    $expertP_list[12]=array(
        'title'=>'ХС',
        'tasks'=>array(
            'expertpdf'=>array('title'=>'Принять файлы для экспертизы','percent'=>5)
        )
    );
    $expertP_list[13]=array(
        'title'=>'ТС',
        'tasks'=>array(
            'expertpdf'=>array('title'=>'Принять файлы для экспертизы','percent'=>5)
        )
    );
    $expertP_list[14]=array(
        'title'=>'Тепловой Пункт',
        'tasks'=>array(
            'expertpdf'=>array('title'=>'Принять файлы для экспертизы','percent'=>5)
        )
    );
    $expertP_list[15]=array(
        'title'=>'СС',
        'tasks'=>array(
            'expertpdf'=>array('title'=>'Принять файлы для экспертизы','percent'=>5)
        )
    );
    $expertP_list[16]=array(
        'title'=>'НСС',
        'tasks'=>array(
            'expertpdf'=>array('title'=>'Принять файлы для экспертизы','percent'=>5)
        )
    );
    $expertP_list[17]=array(
        'title'=>'МГ',
        'tasks'=>array(
            'expertpdf'=>array('title'=>'Принять файлы для экспертизы','percent'=>5)
        )
    );
    $expertP_list[18]=array(
        'title'=>'КГС',
        'tasks'=>array(
            'expertpdf'=>array('title'=>'Принять файлы для экспертизы','percent'=>5)
        )
    );
    $expertP_list[19]=array(
        'title'=>'ТХ',
        'tasks'=>array(
            'expertpdf'=>array('title'=>'Принять файлы для экспертизы','percent'=>5)
        )
    );
    $expertP_list[20]=array(
        'title'=>'Рад. Без.',
        'tasks'=>array(
            'expertpdf'=>array('title'=>'Принять файлы для экспертизы','percent'=>5)
        )
    );
    $expertP_list[21]=array(
        'title'=>'Автоматика',
        'tasks'=>array(
            'expertpdf'=>array('title'=>'Принять файлы для экспертизы','percent'=>5)
        )
    );
    $expertP_list[22]=array(
        'title'=>'ПОС-ПОД',
        'tasks'=>array(
            'expertpdf'=>array('title'=>'Принять файлы для экспертизы','percent'=>5)
        )
    );
    $expertP_list[23]=array(
        'title'=>'АТЗ',
        'tasks'=>array(
            'expertpdf'=>array('title'=>'Принять файлы для экспертизы','percent'=>5)
        )
    );
    $expertP_list[24]=array(
        'title'=>'ООС',
        'tasks'=>array(
            'expertpdf'=>array('title'=>'Принять файлы для экспертизы','percent'=>5)
        )
    );
    $expertP_list[25]=array(
        'title'=>'ППМ',
        'tasks'=>array(
            'expertpdf'=>array('title'=>'Принять файлы для экспертизы','percent'=>5)
        )
    );
    $expertP_list[26]=array(
        'title'=>'ГОЧС',
        'tasks'=>array(
            'expertpdf'=>array('title'=>'Принять файлы для экспертизы','percent'=>5)
        )
    );
    $expertP_list[27]=array(
        'title'=>'ОДИ',
        'tasks'=>array(
            'expertpdf'=>array('title'=>'Принять файлы для экспертизы','percent'=>5)
        )
    );
    $expertP_list[28]=array(
        'title'=>'Энергоэффективность',
        'tasks'=>array(
            'expertpdf'=>array('title'=>'Принять файлы для экспертизы','percent'=>5)
        )
    );
    $expertP_list[29]=array(
        'title'=>'БЭО',
        'tasks'=>array(
            'expertpdf'=>array('title'=>'Принять файлы для экспертизы','percent'=>5)
        )
    );
    $expertP_list[30]=array(
        'title'=>'Сметы',
        'tasks'=>array(
            'expertpdf'=>array('title'=>'Принять файлы для экспертизы','percent'=>5)
        )
    );
    $expertP_list[31]=array(
        'title'=>'ОЗДС',
        'tasks'=>array(
            'expertpdf'=>array('title'=>'Принять файлы для экспертизы','percent'=>5)
        )
    );
    if(isset($pos_num) && !empty($pos_num)){
        return $expertP_list[$pos_num];
    }
    return $expertP_list;
}

//ФОРМИРОВАНИЕ МОДАЛЬНЫХ ОКОН В ЗАМЕЧАНИЯХ ДЛЯ ЭКСПЕРТОВ<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
function expert_list($pos_num=false){
    $expert_list=array();
    $expert_list[1]=array(
        'title'=>'ГИПы',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'ved'=>array('title'=>'Ведомость Объемов','percent'=>30)
        )
    );
    $expert_list[2]=array(
        'title'=>'Генплан',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'ved'=>array('title'=>'Ведомость Объемов','percent'=>30)
        )
    );
    $expert_list[3]=array(
        'title'=>'Архитектура',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>10),
            'pl'=>array('title'=>'Планы','percent'=>30),
            'fs'=>array('title'=>'Фасады','percent'=>10),
            '3d'=>array('title'=>'3D-Визуализация','percent'=>10),
            'veddecor'=>array('title'=>'Ведомость отделки','percent'=>20),
            'sp'=>array('title'=>'Спецификация','percent'=>10)
        )
    );
    $expert_list[4]=array(
        'title'=>'Конструкции',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>10),
            'gh'=>array('title'=>'Графическая часть','percent'=>40),
            'calckr'=>array('title'=>'Расчетная часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>10)
        )
    );
    $expert_list[5]=array(
        'title'=>'ЭОМ',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $expert_list[6]=array(
        'title'=>'НЭС',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $expert_list[7]=array(
        'title'=>'ВК',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $expert_list[8]=array(
        'title'=>'НВК',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $expert_list[9]=array(
        'title'=>'АПТ',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $expert_list[10]=array(
        'title'=>'ОВ',
        'tasks'=>array(
            'calcovnag'=>array('title'=>'Расчет нагрузок','percent'=>2),
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>8),
            'ovairbalance'=>array('title'=>'Таб. воздушных балансов','percent'=>14),
            'ovchar'=>array('title'=>'Характеристика','percent'=>8),
            'ovairvak'=>array('title'=>'Таб. местных отсосов','percent'=>4),
            'ovdypp'=>array('title'=>'Планы ДУ и ПП','percent'=>9),
            'ovonelinepl'=>array('title'=>'Планы "в одну линию"','percent'=>27),
            'ovpltp'=>array('title'=>'Планы теплоснабжения','percent'=>8),
            'ovspvent'=>array('title'=>'Спецификация - вентиляция','percent'=>5),
            'ovsptp'=>array('title'=>'Спецификация - теплоснабжение','percent'=>3),
            'release'=>array('title'=>'Выпуск','percent'=>2)
        )
    );
    $expert_list[11]=array(
        'title'=>'ОТ',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>10),
            'otcalc'=>array('title'=>'Расчет теплопотерь','percent'=>15),
            'otplans'=>array('title'=>'Планы','percent'=>45),
            'otscheme'=>array('title'=>'Принудит. схема','percent'=>5),
            'sp'=>array('title'=>'Спецификация','percent'=>15)
        )
    );
    $expert_list[12]=array(
        'title'=>'ХС',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $expert_list[13]=array(
        'title'=>'ТС',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $expert_list[14]=array(
        'title'=>'Тепловой Пункт',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $expert_list[15]=array(
        'title'=>'СС',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $expert_list[16]=array(
        'title'=>'НСС',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $expert_list[17]=array(
        'title'=>'МГ',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $expert_list[18]=array(
        'title'=>'КГС',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $expert_list[19]=array(
        'title'=>'ТХ',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $expert_list[20]=array(
        'title'=>'Рад. Без.',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $expert_list[21]=array(
        'title'=>'Автоматика',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $expert_list[22]=array(
        'title'=>'ПОС-ПОД',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $expert_list[23]=array(
        'title'=>'АТЗ',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $expert_list[24]=array(
        'title'=>'ООС',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>35),
            'attach'=>array('title'=>'Приложения','percent'=>15),
            'calcnoise'=>array('title'=>'Расчет Шума','percent'=>30),
            'ved'=>array('title'=>'Ведомость Объемов','percent'=>10)
        )
    );
    $expert_list[25]=array(
        'title'=>'ППМ',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'ved'=>array('title'=>'Ведомость Объемов','percent'=>30),
            'calcppm'=>array('title'=>'Расчет Рисков','percent'=>30)
        )
    );
    $expert_list[26]=array(
        'title'=>'ГОЧС',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>40),
            'gh'=>array('title'=>'Графическая часть','percent'=>50),
        )
    );
    $expert_list[27]=array(
        'title'=>'ОДИ',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $expert_list[28]=array(
        'title'=>'Энергоэффективность',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>45),
            'gh'=>array('title'=>'Графическая часть','percent'=>45),
        )
    );
    $expert_list[29]=array(
        'title'=>'Сметы',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'sm'=>array('title'=>'Сметы','percent'=>30),
            'prices'=>array('title'=>'Прайс-листы','percent'=>30)
        )
    );
    $expert_list[30]=array(
        'title'=>'СЭС',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>45),
            'gh'=>array('title'=>'Графическая часть','percent'=>45),
        )
    );
    if(isset($pos_num) && !empty($pos_num)){
        return $expert_list[$pos_num];
    }
    return $expert_list;
}

//ФОРМИРОВАНИЕ МОДАЛЬНЫХ ОКОН В СТАДИИ Р ДЛЯ СПЕЦИАЛИСТОВ<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
function plan_listR($pos_num=false){
    $plan_listR=array();
    $plan_listR[1]=array(
        'title'=>'Генплан',
        'tasks'=>array(
            'gh'=>array('title'=>'Графическая часть','percent'=>50),
            'ved'=>array('title'=>'Ведомость Объемов','percent'=>40)
        )
    );
    $plan_listR[2]=array(
        'title'=>'Архитектура',
        'tasks'=>array(
            'pl'=>array('title'=>'Планы','percent'=>30),
            'fs'=>array('title'=>'Фасады','percent'=>20),
            'veddecor'=>array('title'=>'Ведомость отделки','percent'=>20),
            'sp'=>array('title'=>'Спецификация','percent'=>20)
        )
    );
    $plan_listR[3]=array(
        'title'=>'Конструкции',
        'tasks'=>array(
            'gh'=>array('title'=>'Графическая часть','percent'=>50),
            'sp'=>array('title'=>'Спецификация','percent'=>40)
        )
    );
    $plan_listR[4]=array(
        'title'=>'ЭО',
        'tasks'=>array(
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $plan_listR[5]=array(
        'title'=>'ЭМ',
        'tasks'=>array(
            'gh'=>array('title'=>'Графическая часть','percent'=>50),
            'sp'=>array('title'=>'Спецификация','percent'=>40)
        )
    );
    $plan_listR[6]=array(
        'title'=>'НЭС',
        'tasks'=>array(
            'gh'=>array('title'=>'Графическая часть','percent'=>50),
            'sp'=>array('title'=>'Спецификация','percent'=>40)
        )
    );
    $plan_listR[7]=array(
        'title'=>'ВК',
        'tasks'=>array(
            'vkod'=>array('title'=>'ОД','percent'=>5),
            'vkplans'=>array('title'=>'Планы','percent'=>20),
            'vkprfv'=>array('title'=>'Схемы В','percent'=>20),
            'vkprfk'=>array('title'=>'Схемы К','percent'=>20),
            'vkpump'=>array('title'=>'Насосная, Водомерный узел','percent'=>20),
            'sp'=>array('title'=>'Спецификация','percent'=>5)
        )
    );
    $plan_listR[8]=array(
        'title'=>'НВК',
        'tasks'=>array(
            'nvkod'=>array('title'=>'ОД','percent'=>10),
            'nvkplans'=>array('title'=>'Планы','percent'=>30),
            'nvkprfv'=>array('title'=>'Профили В','percent'=>20),
            'nvkprfk'=>array('title'=>'Профили К','percent'=>20),
            'sp'=>array('title'=>'Спецификация','percent'=>10)
        )
    );
    $plan_listR[9]=array(
        'title'=>'ДС',
        'tasks'=>array(
            'dskod'=>array('title'=>'ОД','percent'=>10),
            'dsplans'=>array('title'=>'Планы','percent'=>35),
            'dsprf'=>array('title'=>'Профили','percent'=>35),
            'sp'=>array('title'=>'Спецификация','percent'=>10)
        )
    );
    $plan_listR[10]=array(
        'title'=>'АПТ',
        'tasks'=>array(
            'aptod'=>array('title'=>'ОД','percent'=>10),
            'aptplans'=>array('title'=>'Планы','percent'=>25),
            'aptscheme'=>array('title'=>'Схемы','percent'=>25),
            'aptpump'=>array('title'=>'Насосная','percent'=>20),
            'sp'=>array('title'=>'Спецификация','percent'=>10)
        )
    );
    $plan_listR[11]=array(
        'title'=>'ОВ',
        'tasks'=>array(
            'ovttlinfo'=>array('title'=>'Общие данные','percent'=>2),
            'ovairbalance'=>array('title'=>'Таб. воздушных балансов','percent'=>14),
            'ovchar'=>array('title'=>'Характеристика','percent'=>8),
            'ovairvak'=>array('title'=>'Таб. местных отсосов','percent'=>4),
            'ovplvent'=>array('title'=>'Планы - вентиляция','percent'=>9),
            'ovschemevent'=>array('title'=>'Схемы - вентиляция','percent'=>27),
            'ovspvent'=>array('title'=>'Спецификация - вентиляция','percent'=>5),
            'ovpltp'=>array('title'=>'Планы теплоснабжение','percent'=>8),
            'ovschemetp'=>array('title'=>'Схемы теплоснабжение','percent'=>8),
            'ovsptp'=>array('title'=>'Спецификация - теплоснабжение','percent'=>3),
            'release'=>array('title'=>'Выпуск','percent'=>2)
        )
    );
    $plan_listR[12]=array(
        'title'=>'ОТ',
        'tasks'=>array(
            'otcalc'=>array('title'=>'Расчет теплопотерь','percent'=>15),
            'otplans'=>array('title'=>'Планы','percent'=>25),
            'otscheme'=>array('title'=>'Схемы','percent'=>20),
            'otgidro'=>array('title'=>'Гидрав. рассчет','percent'=>20),
            'otall'=>array('title'=>'Общие данные','percent'=>10)
        )
    );
    $plan_listR[13]=array(
        'title'=>'ХС',
        'tasks'=>array(
            'gh'=>array('title'=>'Графическая часть','percent'=>50),
            'sp'=>array('title'=>'Спецификация','percent'=>40)
        )
    );
    $plan_listR[14]=array(
        'title'=>'ТС',
        'tasks'=>array(
            'gh'=>array('title'=>'Графическая часть','percent'=>50),
            'sp'=>array('title'=>'Спецификация','percent'=>40)
        )
    );
    $plan_listR[15]=array(
        'title'=>'Тепл.Пункт',
        'tasks'=>array(
            'itptm'=>array('title'=>'ТМ','percent'=>30),
            'itpatm'=>array('title'=>'АТМ','percent'=>20),
            'itpeom'=>array('title'=>'ЭОМ','percent'=>20),
            'itpatmy'=>array('title'=>'АТМУ','percent'=>20)
        )
    );
    $plan_listR[16]=array(
        'title'=>'СС',
        'tasks'=>array(
            'gh'=>array('title'=>'Графическая часть','percent'=>50),
            'sp'=>array('title'=>'Спецификация','percent'=>40)
        )
    );
    $plan_listR[17]=array(
        'title'=>'МГ',
        'tasks'=>array(
            'gh'=>array('title'=>'Графическая часть','percent'=>50),
            'sp'=>array('title'=>'Спецификация','percent'=>40)
        )
    );
    $plan_listR[18]=array(
        'title'=>'КГС',
        'tasks'=>array(
            'gh'=>array('title'=>'Графическая часть','percent'=>50),
            'sp'=>array('title'=>'Спецификация','percent'=>40)
        )
    );
    $plan_listR[19]=array(
        'title'=>'Технология',
        'tasks'=>array(
            'gh'=>array('title'=>'Графическая часть','percent'=>50),
            'sp'=>array('title'=>'Спецификация','percent'=>40)
        )
    );
    $plan_listR[20]=array(
        'title'=>'Атоматика',
        'tasks'=>array(
            'avta'=>array('title'=>'Автоматика','percent'=>30),
            'avtapz'=>array('title'=>'АПЗ','percent'=>20),
            'avtapv'=>array('title'=>'АПВ','percent'=>20),
            'avtadl'=>array('title'=>'АДЛ','percent'=>20)
        )
    );
    $plan_listR[21]=array(
        'title'=>'Сметы',
        'tasks'=>array(
            'sm'=>array('title'=>'Сметы','percent'=>50),
            'prices'=>array('title'=>'Прайс-листы','percent'=>40)
        )
    );

    if(isset($pos_num) && !empty($pos_num)){
        return $plan_listR[$pos_num];
    }
    return $plan_listR;
}

//ФОРМИРОВАНИЕ МОДАЛЬНЫХ ОКОН В СТАДИИ Р ДЛЯ АРХИВА<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
function arhiv_listR($pos_num=false){
    $arhiv_listR=array();
    $arhiv_listR[1]=array(
        'title'=>'Генплан',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>10)
        )
    );
    $arhiv_listR[2]=array(
        'title'=>'Архитектура',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>10)
        )
    );
    $arhiv_listR[3]=array(
        'title'=>'Конструкции',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>10)
        )
    );
    $arhiv_listR[4]=array(
        'title'=>'ЭО',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>10)
        )
    );
    $arhiv_listR[5]=array(
        'title'=>'ЭМ',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>10)
        )
    );
    $arhiv_listR[6]=array(
        'title'=>'НЭС',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>10)
        )
    );
    $arhiv_listR[7]=array(
        'title'=>'ВК',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>10)
        )
    );
    $arhiv_listR[8]=array(
        'title'=>'НВК',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>10)
        )
    );
    $arhiv_listR[9]=array(
        'title'=>'ДС',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>10)
        )
    );
    $arhiv_listR[10]=array(
        'title'=>'АПТ',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>10)
        )
    );
    $arhiv_listR[11]=array(
        'title'=>'ОВ',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>10),
        )
    );
    $arhiv_listR[12]=array(
        'title'=>'ОТ',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>10)
        )
    );
    $arhiv_listR[13]=array(
        'title'=>'ХС',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>10)
        )
    );
    $arhiv_listR[14]=array(
        'title'=>'ТС',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>10)
        )
    );
    $arhiv_listR[15]=array(
        'title'=>'Тепл.Пункт',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>10)
        )
    );
    $arhiv_listR[16]=array(
        'title'=>'СС',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>10)
        )
    );
    $arhiv_listR[17]=array(
        'title'=>'МГ',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>10)
        )
    );
    $arhiv_listR[18]=array(
        'title'=>'КГС',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>10)
        )
    );
    $arhiv_listR[19]=array(
        'title'=>'Технология',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>10)
        )
    );
    $arhiv_listR[20]=array(
        'title'=>'Атоматика',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>10)
        )
    );
    $arhiv_listR[21]=array(
        'title'=>'Сметы',
        'tasks'=>array(
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>10)
        )
    );

    if(isset($pos_num) && !empty($pos_num)){
        return $arhiv_listR[$pos_num];
    }
    return $arhiv_listR;
}


function diffdatebymonth ($diffdata1, $diffdata2) {  
        $diffminmax = abs(strtotime($diffdata1) - strtotime($diffdata2)); 
        $minmaxresult = ceil($diffminmax / (30*60*60*24));
    return $minmaxresult;
}

function getobjectsP ($posnum, $role, $au_id) {

    $list = array();

    if($role=='gap'){

        $toObjects = query("SELECT id, name, arhiv_id, gip_id, gap_id, ov_id, kr_id FROM objects WHERE arhiv_id IS NULL AND gap_id =".$au_id);

        while($data = mysqli_fetch_assoc($toObjects)){
            $toPlancontrol= query("SELECT id, object_id, pos_num, notuse, progress  FROM plancontrol WHERE object_id=".$data['id']." AND pos_num=".$posnum." ORDER BY object_id ASC");
            $planarr=array();
            while($plan = mysqli_fetch_assoc($toPlancontrol)){ 
                $planarr[]=array(
                    'id'=>$plan['id'],
                    'object_id'=>$plan['object_id'],
                    'pos_num'=>$plan['pos_num'],
                    'notuse'=>$plan['notuse'],
                    'progress'=>$plan['progress']
                );
            }
            $toRazdelP = query("SELECT id, stage FROM razdelP WHERE pos_num=".$posnum);
            $radzdelParr=array();
            while($razdelP = mysqli_fetch_assoc($toRazdelP)){ 
                $radzdelParr[]=array(
                    'id'=>$razdelP['id'],
                    'stage'=>$razdelP['stage']
                );
            }
            $list[]=array(
                'id'=>$data['id'],
                'name'=>$data['name'],
                'arhiv_id'=>$data['arhiv_id'],
                'gip_id'=>$data['gip_id'],
                'gap_id'=>$data['gap_id'],
                'ov_id'=>$data['ov_id'],
                'kr_id'=>$data['kr_id'],
                'planarr'=>$planarr,
                'radzdelParr'=>$radzdelParr,
            );
        }
    }elseif($role=='kr'){

        $toObjects = query("SELECT id, name, arhiv_id, gip_id, gap_id, ov_id, kr_id FROM objects WHERE arhiv_id IS NULL AND kr_id =".$au_id);

        while($data = mysqli_fetch_assoc($toObjects)){
            $toPlancontrol= query("SELECT id, object_id, pos_num, notuse, progress  FROM plancontrol WHERE object_id=".$data['id']." AND pos_num=".$posnum." ORDER BY object_id ASC");
            $planarr=array();
            while($plan = mysqli_fetch_assoc($toPlancontrol)){ 
                $planarr[]=array(
                    'id'=>$plan['id'],
                    'object_id'=>$plan['object_id'],
                    'pos_num'=>$plan['pos_num'],
                    'notuse'=>$plan['notuse'],
                    'progress'=>$plan['progress']
                );
            }
            $toRazdelP = query("SELECT id, stage FROM razdelP WHERE pos_num=".$posnum);
            $radzdelParr=array();
            while($razdelP = mysqli_fetch_assoc($toRazdelP)){ 
                $radzdelParr[]=array(
                    'id'=>$razdelP['id'],
                    'stage'=>$razdelP['stage']
                );
            }
            $list[]=array(
                'id'=>$data['id'],
                'name'=>$data['name'],
                'arhiv_id'=>$data['arhiv_id'],
                'gip_id'=>$data['gip_id'],
                'gap_id'=>$data['gap_id'],
                'ov_id'=>$data['ov_id'],
                'kr_id'=>$data['kr_id'],
                'planarr'=>$planarr,
                'radzdelParr'=>$radzdelParr,
            );
        }
    }elseif($role=='gip'){

        $toObjects = query("SELECT id, name, arhiv_id, gip_id, gap_id, ov_id, kr_id FROM objects WHERE arhiv_id IS NULL AND gip_id =".$au_id);

        while($data = mysqli_fetch_assoc($toObjects)){
            $toPlancontrol= query("SELECT id, object_id, pos_num, notuse, progress  FROM plancontrol WHERE object_id=".$data['id']." AND pos_num=".$posnum." ORDER BY object_id ASC");
            $planarr=array();
            while($plan = mysqli_fetch_assoc($toPlancontrol)){ 
                $planarr[]=array(
                    'id'=>$plan['id'],
                    'object_id'=>$plan['object_id'],
                    'pos_num'=>$plan['pos_num'],
                    'notuse'=>$plan['notuse'],
                    'progress'=>$plan['progress']
                );
            }
            $toRazdelP = query("SELECT id, stage FROM razdelP WHERE pos_num=".$posnum);
            $radzdelParr=array();
            while($razdelP = mysqli_fetch_assoc($toRazdelP)){ 
                $radzdelParr[]=array(
                    'id'=>$razdelP['id'],
                    'stage'=>$razdelP['stage']
                );
            }
            $list[]=array(
                'id'=>$data['id'],
                'name'=>$data['name'],
                'arhiv_id'=>$data['arhiv_id'],
                'gip_id'=>$data['gip_id'],
                'gap_id'=>$data['gap_id'],
                'ov_id'=>$data['ov_id'],
                'kr_id'=>$data['kr_id'],
                'planarr'=>$planarr,
                'radzdelParr'=>$radzdelParr,
            );
        }
    }elseif($role=='ov'){

        $toObjects = query("SELECT id, name, arhiv_id, gip_id, gap_id, ov_id, kr_id FROM objects WHERE arhiv_id IS NULL AND ov_id =".$au_id);

        while($data = mysqli_fetch_assoc($toObjects)){
            $toPlancontrol= query("SELECT id, object_id, pos_num, notuse, progress  FROM plancontrol WHERE object_id=".$data['id']." AND pos_num=".$posnum." ORDER BY object_id ASC");
            $planarr=array();
            while($plan = mysqli_fetch_assoc($toPlancontrol)){ 
                $planarr[]=array(
                    'id'=>$plan['id'],
                    'object_id'=>$plan['object_id'],
                    'pos_num'=>$plan['pos_num'],
                    'notuse'=>$plan['notuse'],
                    'progress'=>$plan['progress']
                );
            }
            $toRazdelP = query("SELECT id, stage FROM razdelP WHERE pos_num=".$posnum);
            $radzdelParr=array();
            while($razdelP = mysqli_fetch_assoc($toRazdelP)){ 
                $radzdelParr[]=array(
                    'id'=>$razdelP['id'],
                    'stage'=>$razdelP['stage']
                );
            }
            $list[]=array(
                'id'=>$data['id'],
                'name'=>$data['name'],
                'arhiv_id'=>$data['arhiv_id'],
                'gip_id'=>$data['gip_id'],
                'gap_id'=>$data['gap_id'],
                'ov_id'=>$data['ov_id'],
                'kr_id'=>$data['kr_id'],
                'planarr'=>$planarr,
                'radzdelParr'=>$radzdelParr,
            );
        }
    }else{

        $toObjects = query("SELECT id, name, arhiv_id, gip_id, gap_id, ov_id, kr_id FROM objects WHERE arhiv_id IS NULL ");

        while($data = mysqli_fetch_assoc($toObjects)){
            $toPlancontrol= query("SELECT id, object_id, pos_num, notuse, progress  FROM plancontrol WHERE object_id=".$data['id']." AND pos_num=".$posnum." ORDER BY object_id ASC");
            $planarr=array();
            while($plan = mysqli_fetch_assoc($toPlancontrol)){ 
                $planarr[]=array(
                    'id'=>$plan['id'],
                    'object_id'=>$plan['object_id'],
                    'pos_num'=>$plan['pos_num'],
                    'notuse'=>$plan['notuse'],
                    'progress'=>$plan['progress']
                );
            }
            $toRazdelP = query("SELECT id, stage FROM razdelP WHERE pos_num=".$posnum);
            $radzdelParr=array();
            while($razdelP = mysqli_fetch_assoc($toRazdelP)){ 
                $radzdelParr[]=array(
                    'id'=>$razdelP['id'],
                    'stage'=>$razdelP['stage']
                );
            }
            $list[]=array(
                'id'=>$data['id'],
                'name'=>$data['name'],
                'arhiv_id'=>$data['arhiv_id'],
                'gip_id'=>$data['gip_id'],
                'gap_id'=>$data['gap_id'],
                'ov_id'=>$data['ov_id'],
                'kr_id'=>$data['kr_id'],
                'planarr'=>$planarr,
                'radzdelParr'=>$radzdelParr,
            );
        }
    }
    return $list;
}


function getobjectsR ($posnum, $role, $au_id) {

    $list = array();

    if($role=='gip'){

        $toObjects = query("SELECT id, name, arhiv_id, gip_id, gap_id, ov_id, kr_id FROM objects WHERE arhiv_id IS NULL AND gip_id =".$au_id);

        while($data = mysqli_fetch_assoc($toObjects)){
            $toPlancontrolR= query("SELECT id, object_id, pos_num, notuse, progress FROM plancontrolR WHERE object_id=".$data['id']." AND pos_num=".$posnum." ORDER BY object_id ASC");
            $planarr=array();
            while($plan = mysqli_fetch_assoc($toPlancontrolR)){ 
                $planarr[]=array(
                    'id'=>$plan['id'],
                    'object_id'=>$plan['object_id'],
                    'pos_num'=>$plan['pos_num'],
                    'notuse'=>$plan['notuse'],
                    'progress'=>$plan['progress']
                );
            }
            $toRazdelR = query("SELECT id, stage FROM razdelR WHERE pos_num=".$posnum);
            $radzdelarr=array();
            while($razdelP = mysqli_fetch_assoc($toRazdelR)){ 
                $radzdelParr[]=array(
                    'id'=>$razdelP['id'],
                    'stage'=>$razdelP['stage']
                );
            }
            $list[]=array(
                'id'=>$data['id'],
                'name'=>$data['name'],
                'arhiv_id'=>$data['arhiv_id'],
                'gip_id'=>$data['gip_id'],
                'gap_id'=>$data['gap_id'],
                'ov_id'=>$data['ov_id'],
                'kr_id'=>$data['kr_id'],
                'planarr'=>$planarr,
                'radzdelParr'=>$radzdelParr,
            );
        }
    }elseif($role=='gap'){

    $toObjects = query("SELECT id, name, arhiv_id, gip_id, gap_id, ov_id, kr_id FROM objects WHERE arhiv_id IS NULL AND gap_id =".$au_id);

    while($data = mysqli_fetch_assoc($toObjects)){
        $toPlancontrolR= query("SELECT id, object_id, pos_num, notuse, progress FROM plancontrolR WHERE object_id=".$data['id']." AND pos_num=".$posnum." ORDER BY object_id ASC");
        $planarr=array();
        while($plan = mysqli_fetch_assoc($toPlancontrolR)){ 
            $planarr[]=array(
                'id'=>$plan['id'],
                'object_id'=>$plan['object_id'],
                'pos_num'=>$plan['pos_num'],
                'notuse'=>$plan['notuse'],
                'progress'=>$plan['progress']
            );
        }
        $toRazdelR = query("SELECT id, stage FROM razdelR WHERE pos_num=".$posnum);
        $radzdelarr=array();
        while($razdelP = mysqli_fetch_assoc($toRazdelR)){ 
            $radzdelParr[]=array(
                'id'=>$razdelP['id'],
                'stage'=>$razdelP['stage']
            );
        }
        $list[]=array(
            'id'=>$data['id'],
            'name'=>$data['name'],
            'arhiv_id'=>$data['arhiv_id'],
            'gip_id'=>$data['gip_id'],
            'gap_id'=>$data['gap_id'],
            'ov_id'=>$data['ov_id'],
            'kr_id'=>$data['kr_id'],
            'planarr'=>$planarr,
            'radzdelParr'=>$radzdelParr,
        );
    }
    }elseif($role=='ov'){

        $toObjects = query("SELECT id, name, arhiv_id, gip_id, gap_id, ov_id, kr_id FROM objects WHERE arhiv_id IS NULL AND ov_id =".$au_id);

        while($data = mysqli_fetch_assoc($toObjects)){
        $toPlancontrolR= query("SELECT id, object_id, pos_num, notuse, progress FROM plancontrolR WHERE object_id=".$data['id']." AND pos_num=".$posnum." ORDER BY object_id ASC");
        $planarr=array();
        while($plan = mysqli_fetch_assoc($toPlancontrolR)){ 
            $planarr[]=array(
                'id'=>$plan['id'],
                'object_id'=>$plan['object_id'],
                'pos_num'=>$plan['pos_num'],
                'notuse'=>$plan['notuse'],
                'progress'=>$plan['progress']
            );
        }
        $toRazdelR = query("SELECT id, stage FROM razdelR WHERE pos_num=".$posnum);
        $radzdelarr=array();
        while($razdelP = mysqli_fetch_assoc($toRazdelR)){ 
            $radzdelParr[]=array(
                'id'=>$razdelP['id'],
                'stage'=>$razdelP['stage']
            );
        }
        $list[]=array(
            'id'=>$data['id'],
            'name'=>$data['name'],
            'arhiv_id'=>$data['arhiv_id'],
            'gip_id'=>$data['gip_id'],
            'gap_id'=>$data['gap_id'],
            'ov_id'=>$data['ov_id'],
            'kr_id'=>$data['kr_id'],
            'planarr'=>$planarr,
            'radzdelParr'=>$radzdelParr,
        );
        }
    }elseif($role=='kr'){

        $toObjects = query("SELECT id, name, arhiv_id, gip_id, gap_id, ov_id, kr_id FROM objects WHERE arhiv_id IS NULL AND kr_id =".$au_id);

        while($data = mysqli_fetch_assoc($toObjects)){
            $toPlancontrolR= query("SELECT id, object_id, pos_num, notuse, progress FROM plancontrolR WHERE object_id=".$data['id']." AND pos_num=".$posnum." ORDER BY object_id ASC");
            $planarr=array();
            while($plan = mysqli_fetch_assoc($toPlancontrolR)){ 
                $planarr[]=array(
                    'id'=>$plan['id'],
                    'object_id'=>$plan['object_id'],
                    'pos_num'=>$plan['pos_num'],
                    'notuse'=>$plan['notuse'],
                    'progress'=>$plan['progress']
                );
            }
            $toRazdelR = query("SELECT id, stage FROM razdelR WHERE pos_num=".$posnum);
            $radzdelarr=array();
            while($razdelP = mysqli_fetch_assoc($toRazdelR)){ 
                $radzdelParr[]=array(
                    'id'=>$razdelP['id'],
                    'stage'=>$razdelP['stage']
                );
            }
            $list[]=array(
                'id'=>$data['id'],
                'name'=>$data['name'],
                'arhiv_id'=>$data['arhiv_id'],
                'gip_id'=>$data['gip_id'],
                'gap_id'=>$data['gap_id'],
                'ov_id'=>$data['ov_id'],
                'kr_id'=>$data['kr_id'],
                'planarr'=>$planarr,
                'radzdelParr'=>$radzdelParr,
            );
        }
    }else{

        $toObjectsR = query("SELECT id, name, arhiv_id, gip_id, gap_id, ov_id, kr_id FROM objects WHERE arhiv_id IS NULL ");

        while($data = mysqli_fetch_assoc($toObjectsR)){

            $toPlancontrolR= query("SELECT id, object_id, pos_num, notuse, progress FROM plancontrolR WHERE object_id=".$data['id']." AND pos_num=".$posnum." ORDER BY object_id ASC");
            $planarr=array();
            while($plan = mysqli_fetch_assoc($toPlancontrolR)){ 
                $planarr[]=array(
                    'id'=>$plan['id'],
                    'object_id'=>$plan['object_id'],
                    'pos_num'=>$plan['pos_num'],
                    'notuse'=>$plan['notuse'],
                    'progress'=>$plan['progress']
                );
            }
            $toRazdelR = query("SELECT id, stage FROM razdelR WHERE pos_num=".$posnum);
            $radzdelarr=array();
            while($razdelP = mysqli_fetch_assoc($toRazdelR)){ 
                $radzdelParr[]=array(
                    'id'=>$razdelP['id'],
                    'stage'=>$razdelP['stage']
                );
            }
            $list[]=array(
                'id'=>$data['id'],
                'name'=>$data['name'],
                'arhiv_id'=>$data['arhiv_id'],
                'gip_id'=>$data['gip_id'],
                'gap_id'=>$data['gap_id'],
                'ov_id'=>$data['ov_id'],
                'kr_id'=>$data['kr_id'],
                'planarr'=>$planarr,
                'radzdelParr'=>$radzdelParr,
            );
        }
    }
    return $list;
}

function getontrolPobj($role, $au_id){

    $list = array();

    if($role=='gip'){
        $result = query("SELECT id, name, arhiv_id, gip_id, gap_id, ov_id, kr_id FROM objects WHERE arhiv_id IS NULL AND gip_id =".$au_id);
        /*Тут после первого запроса, перебираем полученный массив с
        объектами, и на кажду итерацию цикла делаем еще один запрос в таблицу с задачами,
        где по id объекта ищем задачи относящиеся к данному объекту.
        */
        while($data = mysqli_fetch_assoc($result)){ 

            $result2 = query("SELECT id, progress, pos_num, notuse, pz, gh, sp, fullfuck FROM plancontrol WHERE object_id=".$data['id']);
            $planarr=array();
            while($plan = mysqli_fetch_assoc($result2)){ 
                $planarr[$plan['pos_num']]=array(
                    'id'=>$plan['id'],
                    'progress'=>$plan['progress'],
                    'position_num'=>$plan['pos_num'],
                    'notuse'=>$plan['notuse'],
                    'fullfuck'=>$plan['fullfuck'],
                    'pzcheck'=>$plan['pz'],
                    'ghcheck'=>$plan['gh'],
                    'spcheck'=>$plan['sp']
                );
            }
            $list[]=array(
                'id'=>$data['id'],
                'name'=>$data['name'],
                'arhiv_id'=>$data['arhiv_id'],
                'gip_id'=>$data['gip_id'],
                'gap_id'=>$data['gap_id'],
                'ov_id'=>$data['ov_id'],
                'kr_id'=>$data['kr_id'],
                'task'=>$planarr
            );
        }
    }elseif($role=='gap'){

        $result = query("SELECT id, name, arhiv_id, gip_id, gap_id, ov_id, kr_id FROM objects WHERE arhiv_id IS NULL AND gap_id =".$au_id);

        while($data = mysqli_fetch_assoc($result)){

            $result2 = query("SELECT id, progress, pos_num, notuse, pz, gh, sp, fullfuck FROM plancontrol WHERE object_id=".$data['id']);
            $planarr=array();
            while($plan = mysqli_fetch_assoc($result2)){ 
                $planarr[$plan['pos_num']]=array(
                    'id'=>$plan['id'],
                    'progress'=>$plan['progress'],
                    'position_num'=>$plan['pos_num'],
                    'notuse'=>$plan['notuse'],
                    'fullfuck'=>$plan['fullfuck'],
                    'pzcheck'=>$plan['pz'],
                    'ghcheck'=>$plan['gh'],
                    'spcheck'=>$plan['sp']
                );
            }
            $list[]=array(
                'id'=>$data['id'],
                'name'=>$data['name'],
                'arhiv_id'=>$data['arhiv_id'],
                'gip_id'=>$data['gip_id'],
                'gap_id'=>$data['gap_id'],
                'ov_id'=>$data['ov_id'],
                'kr_id'=>$data['kr_id'],
                'task'=>$planarr
            );
        }
    }elseif($role=='ov'){

        $result = query("SELECT id, name, arhiv_id, gip_id, gap_id, ov_id, kr_id FROM objects WHERE arhiv_id IS NULL AND ov_id =".$au_id);

        while($data = mysqli_fetch_assoc($result)){

            $result2 = query("SELECT id, progress, pos_num, notuse, pz, gh, sp, fullfuck FROM plancontrol WHERE object_id=".$data['id']);
            $planarr=array();
            while($plan = mysqli_fetch_assoc($result2)){ 
                $planarr[$plan['pos_num']]=array(
                    'id'=>$plan['id'],
                    'progress'=>$plan['progress'],
                    'position_num'=>$plan['pos_num'],
                    'notuse'=>$plan['notuse'],
                    'fullfuck'=>$plan['fullfuck'],
                    'pzcheck'=>$plan['pz'],
                    'ghcheck'=>$plan['gh'],
                    'spcheck'=>$plan['sp']
                );
            }
            $list[]=array(
                'id'=>$data['id'],
                'name'=>$data['name'],
                'arhiv_id'=>$data['arhiv_id'],
                'gip_id'=>$data['gip_id'],
                'gap_id'=>$data['gap_id'],
                'ov_id'=>$data['ov_id'],
                'kr_id'=>$data['kr_id'],
                'task'=>$planarr
            );
        }
    }elseif($role=='kr'){
        $result = query("SELECT id, name, arhiv_id, gip_id, gap_id, ov_id, kr_id FROM objects WHERE arhiv_id IS NULL AND kr_id =".$au_id);

        while($data = mysqli_fetch_assoc($result)){

            $result2 = query("SELECT id, progress, pos_num, notuse, pz, gh, sp, fullfuck FROM plancontrol WHERE object_id=".$data['id']);
            $planarr=array();
            while($plan = mysqli_fetch_assoc($result2)){ 
                $planarr[$plan['pos_num']]=array(
                    'id'=>$plan['id'],
                    'progress'=>$plan['progress'],
                    'position_num'=>$plan['pos_num'],
                    'notuse'=>$plan['notuse'],
                    'fullfuck'=>$plan['fullfuck'],
                    'pzcheck'=>$plan['pz'],
                    'ghcheck'=>$plan['gh'],
                    'spcheck'=>$plan['sp']
                );
            }
            $list[]=array(
                'id'=>$data['id'],
                'name'=>$data['name'],
                'arhiv_id'=>$data['arhiv_id'],
                'gip_id'=>$data['gip_id'],
                'gap_id'=>$data['gap_id'],
                'ov_id'=>$data['ov_id'],
                'kr_id'=>$data['kr_id'],
                'task'=>$planarr
            );
        }
    }else{
        $result = query("SELECT id, name, arhiv_id FROM objects WHERE arhiv_id IS NULL ");

        while($data = mysqli_fetch_assoc($result)){ 

            $result2 = query("SELECT id, progress, pos_num, notuse, pz, gh, sp, fullfuck FROM plancontrol WHERE object_id=".$data['id']);
            $planarr=array();
            while($plan = mysqli_fetch_assoc($result2)){ 
                $planarr[$plan['pos_num']]=array(
                    'id'=>$plan['id'],
                    'progress'=>$plan['progress'],
                    'position_num'=>$plan['pos_num'],
                    'notuse'=>$plan['notuse'],
                    'fullfuck'=>$plan['fullfuck'],
                    'pzcheck'=>$plan['pz'],
                    'ghcheck'=>$plan['gh'],
                    'spcheck'=>$plan['sp']
                );
            }
            $list[]=array(
                'id'=>$data['id'],
                'name'=>$data['name'],
                'arhiv_id'=>$data['arhiv_id'],
                'task'=>$planarr
            );
        }
    }

    return $list;
}

function getontrolRobj($role, $au_id){

    $list = array();

    if($role=='gip'){

        $result = query("SELECT id, name, arhiv_id, gip_id, gap_id, ov_id, kr_id FROM objects WHERE arhiv_id IS NULL AND gip_id =".$au_id);
        /*Тут после первого запроса, перебираем полученный массив с
        объектами, и на кажду итерацию цикла делаем еще один запрос в таблицу с задачами,
        где по id объекта ищем задачи относящиеся к данному объекту.
        */
        while($data = mysqli_fetch_assoc($result)){ 

            $result2 = query("SELECT id, progress, pos_num, notuse, gh, sp, fullfuck FROM plancontrolR WHERE object_id=".$data['id']);
            $planarr=array();
            while($plan = mysqli_fetch_assoc($result2)){ 
                $planarr[$plan['pos_num']]=array(
                    'id'=>$plan['id'],
                    'progress'=>$plan['progress'],
                    'position_num'=>$plan['pos_num'],
                    'notuse'=>$plan['notuse'],
                    'fullfuck'=>$plan['fullfuck'],
                    'ghcheck'=>$plan['gh'],
                    'spcheck'=>$plan['sp']
                );
            }
            $list[]=array(
                'id'=>$data['id'],
                'name'=>$data['name'],
                'arhiv_id'=>$data['arhiv_id'],
                'gip_id'=>$data['gip_id'],
                'gap_id'=>$data['gap_id'],
                'ov_id'=>$data['ov_id'],
                'kr_id'=>$data['kr_id'],
                'task'=>$planarr
            );
        }

    }elseif($role=='gap'){

    $result = query("SELECT id, name, arhiv_id, gip_id, gap_id, ov_id, kr_id FROM objects WHERE arhiv_id IS NULL AND gap_id =".$au_id);

    while($data = mysqli_fetch_assoc($result)){ 

        $result2 = query("SELECT id, progress, pos_num, notuse, gh, sp, fullfuck FROM plancontrolR WHERE object_id=".$data['id']);
        $planarr=array();
        while($plan = mysqli_fetch_assoc($result2)){ 
            $planarr[$plan['pos_num']]=array(
                'id'=>$plan['id'],
                'progress'=>$plan['progress'],
                'position_num'=>$plan['pos_num'],
                'notuse'=>$plan['notuse'],
                'fullfuck'=>$plan['fullfuck'],
                'ghcheck'=>$plan['gh'],
                'spcheck'=>$plan['sp']
            );
        }
        $list[]=array(
            'id'=>$data['id'],
            'name'=>$data['name'],
            'arhiv_id'=>$data['arhiv_id'],
            'gip_id'=>$data['gip_id'],
            'gap_id'=>$data['gap_id'],
            'ov_id'=>$data['ov_id'],
            'kr_id'=>$data['kr_id'],
            'task'=>$planarr
        );
    }

    }elseif($role=='ov'){

        $result = query("SELECT id, name, arhiv_id, gip_id, gap_id, ov_id, kr_id FROM objects WHERE arhiv_id IS NULL AND ov_id =".$au_id);

        while($data = mysqli_fetch_assoc($result)){ 

            $result2 = query("SELECT id, progress, pos_num, notuse, gh, sp, fullfuck FROM plancontrolR WHERE object_id=".$data['id']);
            $planarr=array();
            while($plan = mysqli_fetch_assoc($result2)){ 
                $planarr[$plan['pos_num']]=array(
                    'id'=>$plan['id'],
                    'progress'=>$plan['progress'],
                    'position_num'=>$plan['pos_num'],
                    'notuse'=>$plan['notuse'],
                    'fullfuck'=>$plan['fullfuck'],
                    'ghcheck'=>$plan['gh'],
                    'spcheck'=>$plan['sp']
                );
            }
            $list[]=array(
                'id'=>$data['id'],
                'name'=>$data['name'],
                'arhiv_id'=>$data['arhiv_id'],
                'gip_id'=>$data['gip_id'],
                'gap_id'=>$data['gap_id'],
                'ov_id'=>$data['ov_id'],
                'kr_id'=>$data['kr_id'],
                'task'=>$planarr
            );
        }

    }elseif($role=='kr'){

        $result = query("SELECT id, name, arhiv_id, gip_id, gap_id, ov_id, kr_id FROM objects WHERE arhiv_id IS NULL AND kr_id =".$au_id);

        while($data = mysqli_fetch_assoc($result)){ 

            $result2 = query("SELECT id, progress, pos_num, notuse, gh, sp, fullfuck FROM plancontrolR WHERE object_id=".$data['id']);
            $planarr=array();
            while($plan = mysqli_fetch_assoc($result2)){ 
            $planarr[$plan['pos_num']]=array(
                'id'=>$plan['id'],
                'progress'=>$plan['progress'],
                'position_num'=>$plan['pos_num'],
                'notuse'=>$plan['notuse'],
                'fullfuck'=>$plan['fullfuck'],
                'ghcheck'=>$plan['gh'],
                'spcheck'=>$plan['sp']
                );
            }
            $list[]=array(
                'id'=>$data['id'],
                'name'=>$data['name'],
                'arhiv_id'=>$data['arhiv_id'],
                'gip_id'=>$data['gip_id'],
                'gap_id'=>$data['gap_id'],
                'ov_id'=>$data['ov_id'],
                'kr_id'=>$data['kr_id'],
                'task'=>$planarr
            );
        }

    }else{

        $result = query("SELECT id, name, arhiv_id FROM objects WHERE arhiv_id IS NULL ");

        while($data = mysqli_fetch_assoc($result)){ 

            $result2 = query("SELECT id, progress, pos_num, notuse, gh, sp, fullfuck FROM plancontrolR WHERE object_id=".$data['id']);
            $planarr=array();
            while($plan = mysqli_fetch_assoc($result2)){ 
                $planarr[$plan['pos_num']]=array(
                    'id'=>$plan['id'],
                    'progress'=>$plan['progress'],
                    'position_num'=>$plan['pos_num'],
                    'notuse'=>$plan['notuse'],
                    'fullfuck'=>$plan['fullfuck'],
                    'ghcheck'=>$plan['gh'],
                    'spcheck'=>$plan['sp']
                );
            }
            $list[]=array(
                'id'=>$data['id'],
                'name'=>$data['name'],
                'arhiv_id'=>$data['arhiv_id'],
                'task'=>$planarr
            );
        }
    }

    return $list;
}

function getepxPobj($role, $au_id){

    $list = array();

    if($role=='gip'){
        $result = query("SELECT id, name, arhiv_id, gip_id, gap_id, ov_id, kr_id FROM objects WHERE arhiv_id IS NULL AND gip_id =".$au_id);
        /*Тут после первого запроса, перебираем полученный массив с
        объектами, и на кажду итерацию цикла делаем еще один запрос в таблицу с задачами,
        где по id объекта ищем задачи относящиеся к данному объекту.
        */
        while($data = mysqli_fetch_assoc($result)){ 

            $result2 = query("SELECT id, pos_num, exp_num FROM planexpert WHERE object_id=".$data['id']);
            $planarr=array();
            while($plan = mysqli_fetch_assoc($result2)){ 
                $planarr[$plan['pos_num']]=array(
                    'id'=>$plan['id'],
                    'position_num'=>$plan['pos_num'],
                    'exp_num'=>$plan['exp_num']
                );
            }
            $result3 = query("SELECT id, progress, pos_num, notuse, pz, gh, sp FROM plancontrol WHERE object_id=".$data['id']);
            $planP=array();
            while($plan = mysqli_fetch_assoc($result3)){ 
                $planP[$plan['pos_num']]=array(
                    'id'=>$plan['id'],
                    'progress'=>$plan['progress'],
                    'position_num'=>$plan['pos_num'],
                    'notuse'=>$plan['notuse'],
                    'pzcheck'=>$plan['pz'],
                    'ghcheck'=>$plan['gh'],
                    'spcheck'=>$plan['sp']
                );
            }
            $list[]=array(
                'id'=>$data['id'],
                'name'=>$data['name'],
                'arhiv_id'=>$data['arhiv_id'],
                'gip_id'=>$data['gip_id'],
                'gap_id'=>$data['gap_id'],
                'ov_id'=>$data['ov_id'],
                'kr_id'=>$data['kr_id'],
                'task'=>$planarr,
                'taskP'=>$planP
            );
        }
    }elseif($role=='gap'){
        $result = query("SELECT id, name, arhiv_id, gip_id, gap_id, ov_id, kr_id FROM objects WHERE arhiv_id IS NULL AND gap_id =".$au_id);
        /*Тут после первого запроса, перебираем полученный массив с
        объектами, и на кажду итерацию цикла делаем еще один запрос в таблицу с задачами,
        где по id объекта ищем задачи относящиеся к данному объекту.
        */
        while($data = mysqli_fetch_assoc($result)){ 

            $result2 = query("SELECT id, pos_num, exp_num FROM planexpert WHERE object_id=".$data['id']);
            $planarr=array();
            while($plan = mysqli_fetch_assoc($result2)){ 
                $planarr[$plan['pos_num']]=array(
                    'id'=>$plan['id'],
                    'position_num'=>$plan['pos_num'],
                    'exp_num'=>$plan['exp_num']
                );
            }
            $result3 = query("SELECT id, progress, pos_num, notuse, pz, gh, sp FROM plancontrol WHERE object_id=".$data['id']);
            $planP=array();
            while($plan = mysqli_fetch_assoc($result3)){ 
                $planP[$plan['pos_num']]=array(
                    'id'=>$plan['id'],
                    'progress'=>$plan['progress'],
                    'position_num'=>$plan['pos_num'],
                    'notuse'=>$plan['notuse'],
                    'pzcheck'=>$plan['pz'],
                    'ghcheck'=>$plan['gh'],
                    'spcheck'=>$plan['sp']
                );
            }
            $list[]=array(
                'id'=>$data['id'],
                'name'=>$data['name'],
                'arhiv_id'=>$data['arhiv_id'],
                'gip_id'=>$data['gip_id'],
                'gap_id'=>$data['gap_id'],
                'ov_id'=>$data['ov_id'],
                'kr_id'=>$data['kr_id'],
                'task'=>$planarr,
                'taskP'=>$planP
            );
        }

    }elseif($role=='ov'){

        $result = query("SELECT id, name, arhiv_id, gip_id, gap_id, ov_id, kr_id FROM objects WHERE arhiv_id IS NULL AND ov_id =".$au_id);
        /*Тут после первого запроса, перебираем полученный массив с
        объектами, и на кажду итерацию цикла делаем еще один запрос в таблицу с задачами,
        где по id объекта ищем задачи относящиеся к данному объекту.
        */
        while($data = mysqli_fetch_assoc($result)){ 

            $result2 = query("SELECT id, pos_num, exp_num FROM planexpert WHERE object_id=".$data['id']);
            $planarr=array();
            while($plan = mysqli_fetch_assoc($result2)){ 
                $planarr[$plan['pos_num']]=array(
                    'id'=>$plan['id'],
                    'position_num'=>$plan['pos_num'],
                    'exp_num'=>$plan['exp_num']
                );
            }
            $result3 = query("SELECT id, progress, pos_num, notuse, pz, gh, sp FROM plancontrol WHERE object_id=".$data['id']);
            $planP=array();
            while($plan = mysqli_fetch_assoc($result3)){ 
                $planP[$plan['pos_num']]=array(
                    'id'=>$plan['id'],
                    'progress'=>$plan['progress'],
                    'position_num'=>$plan['pos_num'],
                    'notuse'=>$plan['notuse'],
                    'pzcheck'=>$plan['pz'],
                    'ghcheck'=>$plan['gh'],
                    'spcheck'=>$plan['sp']
                );
            }
            $list[]=array(
                'id'=>$data['id'],
                'name'=>$data['name'],
                'arhiv_id'=>$data['arhiv_id'],
                'gip_id'=>$data['gip_id'],
                'gap_id'=>$data['gap_id'],
                'ov_id'=>$data['ov_id'],
                'kr_id'=>$data['kr_id'],
                'task'=>$planarr,
                'taskP'=>$planP
            );
        }
    }elseif($role=='kr'){
        $result = query("SELECT id, name, arhiv_id, gip_id, gap_id, ov_id, kr_id FROM objects WHERE arhiv_id IS NULL AND kr_id =".$au_id);
        /*Тут после первого запроса, перебираем полученный массив с
        объектами, и на кажду итерацию цикла делаем еще один запрос в таблицу с задачами,
        где по id объекта ищем задачи относящиеся к данному объекту.
        */
        while($data = mysqli_fetch_assoc($result)){ 

            $result2 = query("SELECT id, pos_num, exp_num FROM planexpert WHERE object_id=".$data['id']);
            $planarr=array();
            while($plan = mysqli_fetch_assoc($result2)){ 
                $planarr[$plan['pos_num']]=array(
                    'id'=>$plan['id'],
                    'position_num'=>$plan['pos_num'],
                    'exp_num'=>$plan['exp_num']
                );
            }
            $result3 = query("SELECT id, progress, pos_num, notuse, pz, gh, sp FROM plancontrol WHERE object_id=".$data['id']);
            $planP=array();
            while($plan = mysqli_fetch_assoc($result3)){ 
                $planP[$plan['pos_num']]=array(
                    'id'=>$plan['id'],
                    'progress'=>$plan['progress'],
                    'position_num'=>$plan['pos_num'],
                    'notuse'=>$plan['notuse'],
                    'pzcheck'=>$plan['pz'],
                    'ghcheck'=>$plan['gh'],
                    'spcheck'=>$plan['sp']
                );
            }
            $list[]=array(
                'id'=>$data['id'],
                'name'=>$data['name'],
                'arhiv_id'=>$data['arhiv_id'],
                'gip_id'=>$data['gip_id'],
                'gap_id'=>$data['gap_id'],
                'ov_id'=>$data['ov_id'],
                'kr_id'=>$data['kr_id'],
                'task'=>$planarr,
                'taskP'=>$planP
            );
        }
    }else{
        $result = query("SELECT id, name, arhiv_id FROM objects");
        /*Тут после первого запроса, перебираем полученный массив с
        объектами, и на кажду итерацию цикла делаем еще один запрос в таблицу с задачами,
        где по id объекта ищем задачи относящиеся к данному объекту.
        */
        while($data = mysqli_fetch_assoc($result)){ 

            $result2 = query("SELECT id, pos_num, exp_num FROM planexpert WHERE object_id=".$data['id']);
            $planarr=array();
            while($plan = mysqli_fetch_assoc($result2)){ 
                $planarr[$plan['pos_num']]=array(
                    'id'=>$plan['id'],
                    'position_num'=>$plan['pos_num'],
                    'exp_num'=>$plan['exp_num']
                );
            }
            $result3 = query("SELECT id, progress, pos_num, notuse, pz, gh, sp FROM plancontrol WHERE object_id=".$data['id']);
            $planP=array();
            while($plan = mysqli_fetch_assoc($result3)){ 
                $planP[$plan['pos_num']]=array(
                    'id'=>$plan['id'],
                    'progress'=>$plan['progress'],
                    'position_num'=>$plan['pos_num'],
                    'notuse'=>$plan['notuse'],
                    'pzcheck'=>$plan['pz'],
                    'ghcheck'=>$plan['gh'],
                    'spcheck'=>$plan['sp']
                );
            }
            $list[]=array(
                'id'=>$data['id'],
                'name'=>$data['name'],
                'arhiv_id'=>$data['arhiv_id'],
                'task'=>$planarr,
                'taskP'=>$planP
            );
        }
    }

    return $list;
}
?>