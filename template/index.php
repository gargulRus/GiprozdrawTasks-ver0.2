<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>План работ АО "Гипроздорав"</title>
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/modals.css">
  <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="shortcut icon" href="/image/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="/plugins/fontawesome/css/fontawesome-all.min.css">
   
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="/scripts/clock.js"></script>

    <!-- Magnific Popup-->
    <link rel="stylesheet" href="/template/plugins/magnific/magnific-popup.css">
    <script src="/template/plugins/magnific/jquery.magnific-popup.min.js"></script>

    <script src="/template/plugins/jq_core.js"></script>

</head>
<body>

  <div class="one">
      <div class="two1">
          <img src="/image/logo.png" class="logoimg">
      </div>
      <div class="two2">
          <h1>ПЛАН РАБОТ АО ГИПРОЗДРАВ В 2018 Г.</h1>
      </div>
      <div class="clock">
        <span id="doc_time"></span>
        <script type="text/javascript">
            clock();
        </script>
        <?php if($_SESSION['mode']=='admin'){
                $priveleg = 'Вы зашли как Администратор.';
              }elseif($_SESSION['mode']=='spec'){
                $priveleg = 'Вы зашли как Специалист.';
              }elseif($_SESSION['mode']=='gip'){
                $priveleg = 'Вы зашли как Главный Инженер.';
              }elseif($_SESSION['mode']=='arhiv'){
                $priveleg = 'Вы зашли как Архив.';
              }elseif($_SESSION['mode']=='expert'){
                $priveleg = 'Вы зашли как Эксперт.';
              }else{$priveleg="";}
        ?>
        <h4><?php echo $priveleg;?></h4>
       <?php echo '<a 
                href="/?modal=updatenews" class="modal-a btn btn-info">Обновление 10.05.2018
                </a>';
                ?>
      </div>
  </div>
        
  <div class="content">

    <?php
    //Если открыта сессия админа - выдаем главную страницу с редактируемой таблицей
    load_page();
    ?>    

  </div>

  <!-- Site footer -->
  <div class="footer">
    <p>© АО &quot;Гипроздрав&quot; <?=date('Y');?></p>
  </div> <!-- /Site footer -->

</body>
</html>