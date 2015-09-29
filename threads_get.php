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

	$stmt = $dbh->prepare("SELECT * FROM threads ORDER BY updated DESC LIMIT 15");
	$stmt2 = $dbh->prepare("SELECT * FROM users where id = :id");
	$stmt->execute();
