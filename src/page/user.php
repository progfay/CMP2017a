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
<meta name="theme-color" content="#ffffff">
  <title>User Information</title>
  <link rel="stylesheet" href="../lib/bootstrap.min.css">
</head>

<body>
  <h1> User Information </h1>
  <?php
    if(!isset($_GET['user_id'])) {
      echo "ERROR: Query \"user_id\" is not set.";
    } else {
      $db = new PDO("sqlite:../SQL/customer.sqlite");
      $row = ($db -> query("SELECT * FROM user WHERE id=" . htmlspecialchars($_GET['user_id']))) -> fetch();

      echo '<div class="table-responsive">';
      echo   '<table class="table table-striped">';
      echo     '<tbody>';

      echo       '<tr>';
      echo         '<td><b> ID </b></td>';
      echo         '<td>' . $row['id'] . '</td>';
      echo       '</tr>';

      echo       '<tr>';
      echo         '<td><b> 名前 </b></td>';
      echo         '<td>' . $row['name'] . '</td>';
      echo       '</tr>';

      $postal = (string) $row['postal'];
      echo       '<tr>';
      echo         '<td><b> 郵便番号 </b></td>';
      echo         '<td> 〒' . substr($postal, 0, 3) . '-' . substr($postal, 3) . '</td>';
      echo       '</tr>';

      echo       '<tr>';
      echo         '<td><b> 住所 </b></td>';
      echo         '<td>' . $row['address'] . '</td>';
      echo       '</tr>';

      echo       '<tr>';
      echo         '<td><b> 電話番号 </b></td>';
      echo         '<td><a href="tel:' . $row['phone'] . '">' . $row['phone'] . '</a></td>';
      echo       '</tr>';

      echo     '</tbody>';
      echo   '</table>';
      echo '</div>';
    }
  ?>
</body>
</html>