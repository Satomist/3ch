<?php
	function get_responses($thread_id){
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

		$stmt = $dbh->prepare("SELECT * FROM responses WHERE thread_id = :thread_id ORDER BY date DESC LIMIT 50");
		$stmt->bindParam(':thread_id', $thread_id, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt;
 	}

/*
		$stmt = get_responses(3);
		echo "dobe";
		$stmt->execute();
		var_dump($stmt);*/