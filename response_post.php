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

	session_start();

	$stmt = $dbh->prepare("INSERT INTO responses (user_id,text,date,thread_id) VALUES (:user_id,:text,:date,:thread_id)")
	;
	$stmt->bindParam(':user_id', $_SESSION['USERID'], PDO::PARAM_INT);
	$stmt->bindParam(':text', $_POST['text'], PDO::PARAM_STR);
	$stmt->bindParam(':date', date('Y-m-d'), PDO::PARAM_STR);
	$stmt->bindParam(':thread_id', $_POST['thread_id'], PDO::PARAM_INT);
	$result = $stmt->execute();

	if($result){
		$url = "/3ch/board.php?id=". $_POST['thread_id'];
	}else{
		echo "failed";
	}
	header("location: " . $url);

