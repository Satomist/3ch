<?php
	require_once "authenticate.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Board</title>
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
			try {
		    $dbh = new PDO(
		    	'mysql:host=localhost;
		    	dbname=textboard',
		    	'admin',
		    	'CCJYzgrbN0qsIsOa'
		  );
			} catch (PDOException $e) {
			    var_dump($e->getMessage());
			    exit;
			}

			$stmt = $dbh->prepare("SELECT * FROM responses WHERE thread_id = :thread_id ORDER BY date DESC LIMIT 50");
			$stmt->bindParam(':thread_id', $_GET['id'], PDO::PARAM_INT);
			$stmt->execute();

			$stmt2 = $dbh->prepare("SELECT * FROM users where id = :id");

			foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $response){
				echo $response['text'] . "         " . $response['date'] . "   made by ";

				$stmt2->bindParam(':id', $response['user_id'], PDO::PARAM_INT);
				$stmt2->execute();
				$result = $stmt2->fetch(PDO::FETCH_ASSOC);
				$author = $result['nickname'];
				echo $author;

				if($response['user_id']==$_SESSION["USERID"]){
					$url1 = "location.href='/3ch/response_edit.php?id=". $response['id'] . "'";
					$url2 = "location.href='/3ch/response_delete.php?id=". $response['id'] . "'";
		?>
					<button type="button" onclick=<?php echo $url1 ?> >Edit</button>
					<button type="button" onclick=<?php echo $url2 ?> >Delete</button>
					</br>
		<?php
				}
				echo "</br>";
			}
		?>
		<form action="response_post.php" method="post">
		  <input type="text" name="text" size=80 value="" /></br>
		  <input type="hidden" name="thread_id" value=<?php echo $_GET['id'] ?> />
		  <input type="hidden" name="user_id" value=<?php echo $_SESSION['USERID'] ?> />
		  <input type="submit" value="送信" />
		</form>
	</div>
</body>
</html>