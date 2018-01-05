<?php
  if (!isset(_GET['id'])) {
    echo 'ERROR';
  } else {
    $db = new PDO("sqlite:customer.sqlite");
    $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    echo $db -> query('SELECT receiver FROM deal WHERE id = ' . $_GET['id']) -> fetch();
  }
?>