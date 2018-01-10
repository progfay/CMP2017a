<?php
  // function h($str) {return htmlspecialchars($str, ENT_QUOTES, "UTF-8");}
  // $POST = explode('&', str_replace(array('deal_id=', 'base64=', '<br />'), '', file_get_contents('php://input')));
  // $db = new PDO("sqlite:SQL/customer.sqlite");
  // $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  // $st = $db -> prepare('UPDATE trade SET sign=? WHERE id=?');
  // if(isset($POST[0]) and isset($POST[1])) {
  // $st -> execute(array($POST[1], "123412340007"));
  // $db -> query('UPDATE trade SET sign=? WHERE id=123412340007');
  // echo '/sign_ok.html';
  // } else {
  //   echo '/error.html';
  // }
?>

<?php
  function h($str) {return htmlspecialchars($str, ENT_QUOTES, "UTF-8");}
  $POST = explode('&', str_replace(array('deal_id=', 'base64=', '<br />'), '', file_get_contents('php://input')));
  $db = new PDO("sqlite:SQL/customer.sqlite");
  $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  $st = $db -> prepare('UPDATE trade SET sign=? WHERE id=?');
  $st -> execute(array($POST[1], $POST[0]));
?>