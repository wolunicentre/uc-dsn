<?php
// **********************************************
// Wollongong UniCentre Ltd
// UOW DSN Integration
// view.php - Displays current events
//
// Source: https://github.com/wolunicentre/uc-dsn
// Author: Glenn Harris (gharris@uow.edu.au)
// **********************************************

include("db.php");

function viewAllEvents($dsnType) {
	$row = 0;
	global $confeed;
	
	$sql = "<PUT SCRIPT HERE>";
	$sqlp = ociparse($confeed, $sql);
	if (ociexecute($sqlp, OCI_DEFAULT)) {
		while (ocifetchinto($sqlp, $data, OCI_BOTH)) {
			echo "<INSERT FORMATTING AND DATA>";
			row++;
		}
	}
	else {
		$e = ocierror($sqlp);
		printf ($e'[message']);
		return false;
	}
}
?>	