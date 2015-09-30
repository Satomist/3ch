<?php
	require_once "authenticate.php";
	require_once "thread_get_by_id.php";
	require_once "correct_user.php";
	$result = get_info($_GET['id']);
	correct_user($result['user_id']);

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

	$stmt = $dbh->prepare("DELETE FROM threads WHERE id = :id");
	$stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
	$result = $stmt->execute();

	if($result){
		$url = "/3ch/threads.php";
		header("location: " . $url);
	}else{
		echo "failed";
	}