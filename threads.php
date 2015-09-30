<?php
	require_once "authenticate.php";
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
		<?php
			require_once "threads_get.php";

			foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $thread){
				echo "<a href=\"/3ch/board.php?id=" .$thread['id'] . "\">";
				echo $thread['name'] . "</a>       " . $thread['updated'] . "   made by ";

				$stmt2->bindParam(':id', $thread['user_id'], PDO::PARAM_INT);
				$stmt2->execute();
				$result = $stmt2->fetch(PDO::FETCH_ASSOC);
				$owner = $result['nickname'];
				echo $owner;

				if($thread['user_id']==$_SESSION["USERID"]){
					$url1 = "location.href='/3ch/thread_edit.php?id=". $thread['id'] . "'";
					$url2 = "location.href='/3ch/thread_delete.php?id=". $thread['id'] . "'";
		?>
					<button type="button" onclick=<?php echo $url1 ?> >Edit</button>
					<button type="button" onclick=<?php echo $url2 ?> >Delete</button>
		<?php
				}
		?>
					</br>
					--------------------------------------------------------------------</br>
		<?php
			}
		?>
		<form action="thread_new.php" method="post">
		  <input type="name" name="name" size=50 value="" /></br>
		  <input type="submit" value="スレッド作成" />
		</form>
	</div>
</body>
</html>