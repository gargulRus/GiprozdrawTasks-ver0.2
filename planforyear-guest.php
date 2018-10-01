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
  <div class="buttnons">
</div>

    <?php
    include_once(__DIR__."/core/connect.php");
include_once(__DIR__."/core/functions.php");

include(__DIR__.'/template/planforyear-users.php');
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
