<?php
	try {
    $dbh = new PDO(
    	'mysql:host=localhost;
    	dbname=textboard',
    	'training',
    	'test'
  );
	} catch (PDOException $e) {
	    var_dump($e->getMessage());
	    exit;
	}

	$stmt = $dbh->prepare("select * from engineers");
	$stmt->execute();


	$stmt = $dbh->prepare("SELECT * FROM engineers where name = :name");
	if ($stmt->execute(array(":name"=>"Nanno"))) {
	  while ($row = $stmt->fetch()) {
	    print_r($row);
	  }
	}