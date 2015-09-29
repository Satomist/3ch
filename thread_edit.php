<?php
	require_once "authenticate.php";
	require_once "thread_get_by_id.php";
	require_once "correct_user.php";
	get_info($_GET['id']);
	correct_user($result['user_id']);

	function get_info($thread_id){
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

		$stmt = $dbh->prepare("UPDATE threads SET name = :name where id = :id"):
		$stmt->bindParam(':id', $thread_id, PDO::PARAM_STR);
		$stmt->bindParam(':name', $name, PDO::PARAM_STR);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		if($result){
			echo "Title changed to" . $name;
			header("Location: /3ch/threads/" . $thread_id);
		}else{
			echo "Error occured" . $name;
			header("Location: /3ch/threads/" . $thread_id . "edit");
		}
	}