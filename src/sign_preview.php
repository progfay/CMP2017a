<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="apple-touch-icon" sizes="180x180" href="favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicons/favicon-16x16.png">
  <link rel="manifest" href="favicons/manifest.json">
  <link rel="mask-icon" href="favicons/safari-pinned-tab.svg" color="#5bbad5">
  <title>Sign Preview</title>
  <style>
  img {
    border: solid 3px black;
  }
  </style>
</head>
<body>
  <center>
    <img id="sign" src=
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