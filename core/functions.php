
<?php

//функция обработки mysql запросов
function load_page(){

    if(isset($_GET['page']) && !empty($_GET['page'])){
        $page = $_GET['page'];
    }else{
        //Грузим страницу по умолчанию. Без админских прав.
        $page = 'planforyear-guest.php';

        switch ($_SESSION['mode']) {
            case 'spec':
                $page = 'main-spec.php'; break;
                // $page = 'main-update.php'; break;
            case 'gip':
                $page = 'main-gip.php'; break;
                // $page = 'main-update.php'; break;
            case 'arhiv':
                $page = 'main-arhiv.php'; break;
                // $page = 'main-update.php'; break;
            case 'admin':
                $page = 'main.php'; break;
            case 'expert':
                $page = 'main-expert.php'; break;
                // $page = 'main-update.php'; break;
            default:
                // $page = 'main-update.php';
                $page = 'planforyear-guest.php';
                break;
        }
    }

    include(__DIR__.'/../pages/'.$page);

}

function load_modal(){
    $modal_name = $_GET['modal'];
    include(__DIR__.'/../template/modals/'.$modal_name.'.php');
}


function plan_list($pos_num=false){
    $plan_list=array();
    $plan_list[1]=array(
        'title'=>'Генплан',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'ved'=>array('title'=>'Ведомость Объемов','percent'=>30)
        )
    );
    $plan_list[2]=array(
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
    $plan_list[3]=array(
        'title'=>'Конструкции',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>10),
            'gh'=>array('title'=>'Графическая часть','percent'=>40),
            'calckr'=>array('title'=>'Расчетная часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>10)
        )
    );
    $plan_list[4]=array(
        'title'=>'"ЭОМ"',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $plan_list[5]=array(
        'title'=>'НЭС',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $plan_list[6]=array(
        'title'=>'ВК',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $plan_list[7]=array(
        'title'=>'НВК',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $plan_list[8]=array(
        'title'=>'АПТ',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $plan_list[9]=array(
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
    $plan_list[10]=array(
        'title'=>'ОТ',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $plan_list[11]=array(
        'title'=>'ХС',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $plan_list[12]=array(
        'title'=>'ТС',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $plan_list[13]=array(
        'title'=>'Тепловой Пункт',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $plan_list[14]=array(
        'title'=>'СС',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $plan_list[15]=array(
        'title'=>'НСС',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $plan_list[16]=array(
        'title'=>'МГ',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $plan_list[17]=array(
        'title'=>'КГС',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $plan_list[18]=array(
        'title'=>'ТХ',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $plan_list[19]=array(
        'title'=>'Автоматика',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $plan_list[20]=array(
        'title'=>'ПОС-ПОД',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $plan_list[21]=array(
        'title'=>'ООС',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>35),
            'attach'=>array('title'=>'Приложения','percent'=>15),
            'calcnoise'=>array('title'=>'Расчет Шума','percent'=>30),
            'ved'=>array('title'=>'Ведомость Объемов','percent'=>10)
        )
    );
    $plan_list[22]=array(
        'title'=>'ППМ',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'ved'=>array('title'=>'Ведомость Объемов','percent'=>30),
            'calcppm'=>array('title'=>'Расчет Рисков','percent'=>30)
        )
    );
    $plan_list[23]=array(
        'title'=>'ОДИ',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'gh'=>array('title'=>'Графическая часть','percent'=>30),
            'sp'=>array('title'=>'Спецификация','percent'=>30)
        )
    );
    $plan_list[24]=array(
        'title'=>'Энергоэффективность',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>45),
            'gh'=>array('title'=>'Графическая часть','percent'=>45),
        )
    );
    $plan_list[25]=array(
        'title'=>'Сметы',
        'tasks'=>array(
            'pz'=>array('title'=>'Пояснительная Записка','percent'=>30),
            'sm'=>array('title'=>'Сметы','percent'=>30),
            'prices'=>array('title'=>'Прайс-листы','percent'=>30)
        )
    );
    if(isset($pos_num) && !empty($pos_num)){
        return $plan_list[$pos_num];
    }
    return $plan_list;
}

function arhiv_list($pos_num=false){
    $arhiv_list=array();
    $arhiv_list[1]=array(
        'title'=>'Генплан',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_list[2]=array(
        'title'=>'Архитектура',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_list[3]=array(
        'title'=>'Конструкции',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_list[4]=array(
        'title'=>'"ЭОМ"',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_list[5]=array(
        'title'=>'НЭС',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_list[6]=array(
        'title'=>'ВК',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_list[7]=array(
        'title'=>'НВК',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_list[8]=array(
        'title'=>'АПТ',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_list[9]=array(
        'title'=>'ОВ',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_list[10]=array(
        'title'=>'ОТ',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_list[11]=array(
        'title'=>'ХС',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_list[12]=array(
        'title'=>'ТС',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_list[13]=array(
        'title'=>'Тепловой Пункт',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_list[14]=array(
        'title'=>'СС',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_list[15]=array(
        'title'=>'НСС',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_list[16]=array(
        'title'=>'МГ',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_list[17]=array(
        'title'=>'КГС',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_list[18]=array(
        'title'=>'ТХ',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_list[19]=array(
        'title'=>'Автоматика',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_list[20]=array(
        'title'=>'ПОС-ПОД',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_list[21]=array(
        'title'=>'ООС',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_list[22]=array(
        'title'=>'ППМ',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_list[23]=array(
        'title'=>'ОДИ',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_list[24]=array(
        'title'=>'Энергоэффективность',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_list[25]=array(
        'title'=>'Сметы',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    if(isset($pos_num) && !empty($pos_num)){
        return $arhiv_list[$pos_num];
    }
    return $arhiv_list;
}

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
        'title'=>'ВК',
        'tasks'=>array(
            'gh'=>array('title'=>'Графическая часть','percent'=>50),
            'sp'=>array('title'=>'Спецификация','percent'=>40)
        )
    );
    $plan_listR[7]=array(
        'title'=>'НВК',
        'tasks'=>array(
            'gh'=>array('title'=>'Графическая часть','percent'=>50),
            'sp'=>array('title'=>'Спецификация','percent'=>40)
        )
    );
    $plan_listR[8]=array(
        'title'=>'АПТ',
        'tasks'=>array(
            'gh'=>array('title'=>'Графическая часть','percent'=>50),
            'sp'=>array('title'=>'Спецификация','percent'=>40)
        )
    );
    $plan_listR[9]=array(
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
    $plan_listR[10]=array(
        'title'=>'ОТ',
        'tasks'=>array(
            'gh'=>array('title'=>'Графическая часть','percent'=>50),
            'sp'=>array('title'=>'Спецификация','percent'=>40)
        )
    );
    $plan_listR[11]=array(
        'title'=>'ХС',
        'tasks'=>array(
            'gh'=>array('title'=>'Графическая часть','percent'=>50),
            'sp'=>array('title'=>'Спецификация','percent'=>40)
        )
    );
    $plan_listR[12]=array(
        'title'=>'ТС',
        'tasks'=>array(
            'gh'=>array('title'=>'Графическая часть','percent'=>50),
            'sp'=>array('title'=>'Спецификация','percent'=>40)
        )
    );
    $plan_listR[13]=array(
        'title'=>'Тепл.Пункт',
        'tasks'=>array(
            'itptm'=>array('title'=>'ТМ','percent'=>30),
            'itpatm'=>array('title'=>'АТМ','percent'=>20),
            'itpeom'=>array('title'=>'ЭОМ','percent'=>20),
            'itpatmy'=>array('title'=>'АТМУ','percent'=>20)
        )
    );
    $plan_listR[14]=array(
        'title'=>'СС',
        'tasks'=>array(
            'gh'=>array('title'=>'Графическая часть','percent'=>50),
            'sp'=>array('title'=>'Спецификация','percent'=>40)
        )
    );
    $plan_listR[15]=array(
        'title'=>'МГ',
        'tasks'=>array(
            'gh'=>array('title'=>'Графическая часть','percent'=>50),
            'sp'=>array('title'=>'Спецификация','percent'=>40)
        )
    );
    $plan_listR[16]=array(
        'title'=>'КГС',
        'tasks'=>array(
            'gh'=>array('title'=>'Графическая часть','percent'=>50),
            'sp'=>array('title'=>'Спецификация','percent'=>40)
        )
    );
    $plan_listR[17]=array(
        'title'=>'Технология',
        'tasks'=>array(
            'gh'=>array('title'=>'Графическая часть','percent'=>50),
            'sp'=>array('title'=>'Спецификация','percent'=>40)
        )
    );
    $plan_listR[18]=array(
        'title'=>'Атоматика',
        'tasks'=>array(
            'avta'=>array('title'=>'Автоматика','percent'=>30),
            'avtapz'=>array('title'=>'АПЗ','percent'=>20),
            'avtapv'=>array('title'=>'АПВ','percent'=>20),
            'avtadl'=>array('title'=>'АДЛ','percent'=>20)
        )
    );
    $plan_listR[19]=array(
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

function arhiv_listR($pos_num=false){
    $arhiv_listR=array();
    $arhiv_listR[1]=array(
        'title'=>'Генплан',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_listR[2]=array(
        'title'=>'Архитектура',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_listR[3]=array(
        'title'=>'Конструкции',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_listR[4]=array(
        'title'=>'ЭО',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_listR[5]=array(
        'title'=>'ЭМ',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_listR[6]=array(
        'title'=>'ВК',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_listR[7]=array(
        'title'=>'НВК',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_listR[8]=array(
        'title'=>'АПТ',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_listR[9]=array(
        'title'=>'ОВ',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_listR[10]=array(
        'title'=>'ОТ',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_listR[11]=array(
        'title'=>'ХС',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_listR[12]=array(
        'title'=>'ТС',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_listR[13]=array(
        'title'=>'Тепл.Пункт',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_listR[14]=array(
        'title'=>'СС',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_listR[15]=array(
        'title'=>'МГ',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_listR[16]=array(
        'title'=>'КГС',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_listR[17]=array(
        'title'=>'Технология',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_listR[18]=array(
        'title'=>'Атоматика',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );
    $arhiv_listR[19]=array(
        'title'=>'Сметы',
        'tasks'=>array(
            'arhgh'=>array('title'=>'Принять чертежи в бумаге','percent'=>5),
            'arhpdf'=>array('title'=>'Принять чертежи в PDF','percent'=>5),
        )
    );

    if(isset($pos_num) && !empty($pos_num)){
        return $arhiv_listR[$pos_num];
    }
    return $arhiv_listR;
}

?>