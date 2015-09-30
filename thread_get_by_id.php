<?php
	function get_info($thread_id){
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

		$stmt_get_info = $dbh->prepare("SELECT * FROM threads where id = :id");
		$stmt_get_info->bindParam(':id', $thread_id, PDO::PARAM_STR);
		$stmt_get_info->execute();
		$result = $stmt_get_info->fetch(PDO::FETCH_ASSOC);

		return $result;
	}
