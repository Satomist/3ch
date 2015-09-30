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


	$stmt = $dbh->prepare("INSERT INTO users (nickname,email,password) VALUES (:nickname,:email,:password)");
	$stmt->bindParam(':nickname', $_POST['name'], PDO::PARAM_STR);
	$stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
	$stmt->bindParam(':password', $_POST['password'], PDO::PARAM_STR);
	$stmt->execute();

	$stmt2 = $dbh->prepare("SELECT * FROM users WHERE nickname = :nickname LIMIT 1");
	$stmt2->bindParam(':nickname', $_POST['name'], PDO::PARAM_STR);
	$stmt2->execute();
	$result = $stmt2->fetch(PDO::FETCH_ASSOC);

	session_start();

	if($result){
		session_start();
		$_SESSION['USERID'] = $result['id'];
		$url = "/3ch/threads.php";
	}else{
		echo "log in failed";
		$url = "/3ch/index.php";
	}
	header("location: " . $url);