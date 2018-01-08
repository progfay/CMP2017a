<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Trade</title>
	<link rel="stylesheet" href="dist/bootstrap.min.css">
	<style>
		th, td {
			text-align: center;
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
								$db = new PDO("sqlite:SQL/customer.sqlite");
								$result = $db -> query("SELECT * FROM trade");
								$yet  = "<input type=\"checkbox\" name=\"\" readonly=\"readonly\" />";
								$done = "<input type=\"checkbox\" name=\"\" readonly=\"readonly\" checked=\"checked\" />";

								for($i = 0; $row = $result -> fetch(); ++$i) {
									echo "<tr valign=center>";
											echo "<th scope=\"row\">" . $row['id'] . "</td>";
											echo "<td><a href=\"/user.php?user_id=" . $row['client']   . "\">" . $row['client']   . "</td>";
											echo "<td><a href=\"/user.php?user_id=" . $row['receiver']  . "\">" . $row['receiver'] . "</td>";
											echo "<td>" . ($row['option'] == "0"  ? "なし" : "あり") . "</td>";
											echo "<td>" . ($row['done']   == "0"  ? $yet : $done) . "</td>";
											echo "<td>" . ($row['sign']   == NULL ? $yet : $done) . "</td>";
									echo "</tr>";
								}
							?>
				</tbody>
			</table>
		</div>
</body>

</html>