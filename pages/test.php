<?php
//echo file_get_contents ('http://giprotable2/?page=planforyear-guest.php');
//--orientation Landscape
$path=$_SERVER['DOCUMENT_ROOT']."/wkpdf/wkhtmltox/bin/wkhtmltoimage";
$path=$path.''.'http://giprotable2/?page=planforyear-guest.php form1.jpg';
exec($path);
//exec('F://wktopdf//bin//wkhtmltoimage http://giprotable2/?page=planforyear-guest.php form1.jpg' );

echo "JPG Created Successfully";
?>