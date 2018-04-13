<?php


  if(isset($_POST['name'])){
        $name = $_POST['name'];
        $result = query ("INSERT INTO objects (name) VALUES ('$name')");
        if ($result = 'true'){
            echo "Информация занесена в базу данных";
        }else{
            echo "Информация не занесена в базу данных";
        }
}


?>
<div class="fomrobject">
<h4>Объект создается    <i class="fas fa-sync fa-spin"></i></h4>
<script type="text/javascript">
$( document ).ready(function() {
	setTimeout(function(){ location.reload(); }, 1500);
 

});
</script>
</div>