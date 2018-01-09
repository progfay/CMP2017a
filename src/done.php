<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title> Done </title>
</head>
<body>
  <?php
    function h($str) {return htmlspecialchars($str, ENT_QUOTES, "UTF-8");}
    if(isset($_GET['deal_id'])) {
      $db = new PDO("sqlite:SQL/customer.sqlite");
      $db -> query("UPDATE trade SET done=1 WHERE id=" . h($_GET['deal_id']));
      echo "配達完了！！";
    } else {
      echo "ERROR: not found \"deal_id\" query for GET paramater";
    }
  ?>
</body>
</html>