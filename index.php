<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Log in</title>
	<link href="/3ch/stylesheets/reset.css" rel="stylesheet">
	<link href="/3ch/stylesheets/common.css" rel="stylesheet">
</head>
<body>
	<div class="header">
		<button type="button" onclick="location.href='/3ch/login.html'">Log in</button>
		<button type="button" onclick="location.href='/3ch/sign_up.html'">Sign up</button>
		</br>
		++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++</br>
	</div>

	<div class="content">
		<?php
			require_once "threads_get.php";

			foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $thread){
				echo $thread['name'] . "       " . $thread['updated'] . "   made by ";

				$stmt2->bindParam(':id', $thread['user_id'], PDO::PARAM_INT);
				$stmt2->execute();
				$result = $stmt2->fetch(PDO::FETCH_ASSOC);
				$owner = $result['nickname'];
				echo $owner;
		?>
					</br>
					--------------------------------------------------------------------</br>
		<?php
			}
		?>
	</div>
</body>
</html>