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

	if($result){
		session_regenerate_id(true);
		$_SESSION("USERID") = array(
															id => $result['id'],
															name => $result['nickname']);
		echo "Welcome back " . $result['nickname'];
		sleep(3);
		$url = "/3ch/threads/new";
	}else{
		echo "login failed";
		$url = "/3ch/login.html";
	}
	header("location: " . $url);