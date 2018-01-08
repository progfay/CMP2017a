<?php
  if (!isset($_GET['id'])) {
    echo 'ERROR';
  } else {
    $db = new PDO("sqlite:SQL/customer.sqlite");
    $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $row = ($db -> query('SELECT receiver FROM trade WHERE id = ' . htmlspecialchars($_GET['id']))) -> fetch();
    echo $row['receiver'];
  }
?>