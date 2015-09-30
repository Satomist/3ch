<?php
	require_once "authenticate.php";
	require_once "thread_get_by_id.php";
	require_once "correct_user.php";
	$result = get_info($_GET['id']);
	correct_user($result['user_id']);
?>

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
		<button type="button" onclick="location.href='/3ch/logout.php'">Log out</button>
		</br>
		++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++</br>
	</div>

	<div class="content">
		<form action="thread_edit_do.php" method="post">
			Current Title:<?php echo $result['name']; ?></br>
		    New   Title:</br>
		  <input type="text" name="name" size="50" value="" /></br>
		  <input type="hidden" name="thread_id" value=<?php echo $_GET['id'] ?> />
		  <input type="submit" value="変更する" />
		</form>
	</div>
</body>
</html>