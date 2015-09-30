<?php
	require_once "authenticate.php";
	require_once "response_get_by_id.php";
	require_once "correct_user.php";
	$info = get_info_res($_POST['response_id']);
	correct_user($info['user_id']);

  var_dump($info['user_id']);

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

	$stmt = $dbh->prepare("UPDATE responses SET text = :text WHERE id = :id");
	$stmt->bindParam(':id', $_POST['response_id'], PDO::PARAM_INT);
	$stmt->bindParam(':text', $_POST['text'], PDO::PARAM_STR);
	$result = $stmt->execute();


	if($result){
		$url = "/3ch/board.php?id=" . $info['thread_id'];
		header("Location: " . $url);
	}else{
		echo "Error occured";
	}

