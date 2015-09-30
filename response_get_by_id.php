<?php
	function get_info_res($response_id){
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

		$stmt_get_info = $dbh->prepare("SELECT * FROM responses where id = :id");
		$stmt_get_info->bindParam(':id', $response_id, PDO::PARAM_INT);
		$stmt_get_info->execute();
		$result = $stmt_get_info->fetch(PDO::FETCH_ASSOC);

		return $result;
	}
