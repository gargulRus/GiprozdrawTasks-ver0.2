<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset = UTF-8">
</head>
<?php
//функция отправки сообщения боту
function sendMessage($chatID, $messaggio, $token) {

    //формируем запрос на сервер общего вида - 
    // "https://api.telegram.org/bot<Токен бота>/sendMessage?chat_id=<ID беседы>a&text=<Наше сообщение>"

    $url = "https://api.telegram.org/" . $token . "/sendMessage?chat_id=" . $chatID;
    $url = $url . "&text=Привет!, " . urlencode($messaggio);

    // тут дальше непонятная магия
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
   
  //проверяем отправку. в $result записывается длинная строка. Ищем в ней
  //true или false.  
  if(stristr($result, 'true') == TRUE) {
    echo 'отправленно';
  } else {
    echo 'ошибка';
  }

}

// 1. токен - идентификатор бота.
// 2. charid - идентификатор чат-беседы.
// Отсылаем эти два параметра + то что пришло из формы form.php в функцию.
$token = "bot518649481:AAH7d6O_IVseetZ-bzNexVdPkdVUXI6jo5Y";
$chatid = "416641360";
sendMessage($chatid, $_POST['name'], $token);

?>
</form>
</html>