
<?php
  function h($str) {return htmlspecialchars($str, ENT_QUOTES, "UTF-8");}
  if(isset($_POST['deal_id'])) {
    $db = new PDO("sqlite:SQL/customer.sqlite");
    $db -> query("UPDATE trade SET sign=" . h(_POST['base64']) . " WHERE id=" . h($_POST['deal_id']));
  }
?>