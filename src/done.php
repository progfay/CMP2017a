
<?php
  function h($str) {return htmlspecialchars($str, ENT_QUOTES, "UTF-8");}
  if(isset($_GET['deal_id'])) {
    $db = new PDO("sqlite:SQL/customer.sqlite");
    $db -> query("UPDATE trade SET done=1 WHERE id=" . h($_GET['deal_id']));
  }
?>