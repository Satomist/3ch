<?php
	function correct_user($userid) {
		if ($_SESSION['USERID']!=$userid) {
		  echo "You do not have the permission to access this page";
		  header("Location: /3ch/index.php");
		  exit;
		}
	}
