<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="IMG/favicon.ico">
  <title>Sign Preview</title>
</head>
<body>
  <center>
    <img src=
      <?php
        if(isset($_GET['deal_id'])) {
          $db = new PDO("sqlite:SQL/customer.sqlite");
          $result = $db -> query("SELECT sign FROM trade WHERE id=" . $_GET['deal_id']);
          $row = $result -> fetch();
          echo '"' . $row['sign'] . '"';
        }
      ?>
    alt="Not Found">
   <center>
</body>
</html>