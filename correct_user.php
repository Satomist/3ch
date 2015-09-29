<?php
	function correct_user($userid) {
		if ($_SESSION["USERID"][id]!=$userid) {
		  echo "You do not have the permission to access this page";
		  header("Location: /3ch/home.html");
		  exit;
		}
	}
