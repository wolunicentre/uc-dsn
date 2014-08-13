<?php
// ****************************************************
// Wollongong UniCentre Ltd
// UOW DSN Integration
// dsnfunc.php - Database functions for DSN integration
//
// Source: https://github.com/wolunicentre/uc-dsn
// Author: Glenn Harris (gharris@uow.edu.au)
// ****************************************************

include("db.php");


// This function displays events for a given DSN type
function viewEvents($dsnType) {
	global $confeed;
	$row = 0;
	
	$sql = 'select * from ma_dates';

	
	$sqlp = ociparse($confeed, $sql);
	
	if (ociexecute($sqlp, OCI_DEFAULT)) {
		while (ocifetchinto($sqlp, $data, OCI_BOTH)) {
			if ($row % 2 == 1) {
				echo "<div style='background-color: #eee; padding: 2px; overflow: auto;'><div id=r".$row." style='float:left;'>". $data['MADATE'] . "</div></div>";
			} 
			else {
				echo "<div style='background-color: #fff; padding: 2px; overflow: auto;'><div id=r".$row." style='float:left;'>". $data['MADATE'] . "</div></div>";
			}
			$row++;
		}	
	}
	else {
		$e = ocierror($sqlp);
		printf ($e['message']);
		return false;
	}
}

?>	