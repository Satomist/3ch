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

	$stmt = $dbh->prepare("SELECT * FROM users where email = :email and password = :password");

	$stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
	$stmt->bindParam(':password', $_POST['password'], PDO::PARAM_STR);

	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);

	var_dump($result);

	session_start();


	if($result){
		echo "success";
		session_start();
		$_SESSION['USERID'] = $result['id'];
		$url = "/3ch/threads.php";
	}else{
		echo "log in failed";
		$url = "/3ch/index.php";
	}
	header("location: " . $url);