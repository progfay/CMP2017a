<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="format-detection" content="telephone=no">
	<link rel="apple-touch-icon" sizes="180x180" href="favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicons/favicon-16x16.png">
  <link rel="manifest" href="favicons/manifest.json">
  <link rel="mask-icon" href="favicons/safari-pinned-tab.svg" color="#5bbad5">
	<title>Trade</title>
	<link rel="stylesheet" href="../dist/bootstrap.min.css">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
	<style>
		th, td {
			text-align: center;
		}

		.highlight {
			background: rgb(255, 215, 220);
		}
	</style>
</head>

<body>
    <h1> Trade </h1>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead class="thead-default">
						<tr>
								<th scope="col">ID</th>
								<th scope="col">依頼人</th>
								<th scope="col">届け先</th>
								<th scope="col">オプション</th>
								<th scope="col">配達済み</th>
								<th scope="col">サイン</th>
						</tr>
				</thead>

				<tbody>
							<?php
								$highlight = (isset($_GET['highlight']) ? $_GET['highlight'] : "");
								$db = new PDO("sqlite:../SQL/customer.sqlite");
								$result = $db -> query("SELECT * FROM trade");
								$yet  = "<i class=\"fa fa-square-o\" aria-hidden=\"true\" style=\"color: #AAAAAA;\"></i>";
								$done = "<i class=\"fa fa-check-square-o\" aria-hidden=\"true\" style=\"color: #30CD52;\"></i>";
								for($i = 0; $row = $result -> fetch(); ++$i) {
									echo "<tr valign=center " . ($highlight == $row['id'] ? "class=\"highlight\""  : "") . ">";
											echo "<th scope=\"row\">" . $row['id'] . "</td>";
											echo "<td><a href=\"user.php?user_id=" . $row['client']   . "\">" . $row['client']   . "</td>";
											echo "<td><a href=\"user.php?user_id=" . $row['receiver']  . "\">" . $row['receiver'] . "</td>";
											echo "<td>" . ($row['option'] == "0" ? "なし" : "あり") . "</td>";
											echo "<td>" . ($row['done']   == "0" ? $yet   : $done ) . "</td>";
											echo "<td>" . ($row['sign'] == NULL ? $yet : "<a href=\"sign_preview.php?deal_id=" . $row['id'] . "\"" . $done ."</a>") . "</td>";
									echo "</tr>";
								}
							?>
				</tbody>
			</table>
		</div>
</body>

</html>