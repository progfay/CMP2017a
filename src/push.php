
<?php

function h($str) {return htmlspecialchars($str, ENT_QUOTES, "UTF-8");}
$db = new PDO("sqlite:costomer.sqlite");
        $db->query("UPDATE trade SET sign='base64' WHERE id=" . $_POST['deal_id']);
?>