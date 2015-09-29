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


	$stmt = $dbh->prepare("INSERT INTO users (nickname,email,password) VALUES (:nickname,:email,:password)")
	;
	$stmt->bindParam(':nickname', $_POST['name'], PDO::PARAM_STR);
	$stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
	$stmt->bindParam(':password', $_POST['password'], PDO::PARAM_STR);
	$result = $stmt->execute();


	if($result){
		echo "Completed Sign in as " . $name;
		$url = "/3ch/home.html";
	}else{
		echo "Sign up failed </br>";
		echo "Please try again";
		$url = "/3ch/index.html";
	}
	header("location: " . $url);

