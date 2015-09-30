<?php
	require_once "authenticate.php";
	require_once "response_get_by_id.php";
	require_once "correct_user.php";
	$info = get_info_res($_GET['id']);
	correct_user($info['user_id']);

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

	$stmt = $dbh->prepare("DELETE FROM responses WHERE id = :id");
	$stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
	$result = $stmt->execute();

	if($result){
		$url = "/3ch/board.php?id=" . $info['thread_id'];
		header("Location: " . $url);
	}else{
		echo "Error occured";
	}