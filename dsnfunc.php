<?php
// ****************************************************
// Wollongong UniCentre Ltd
// UOW DSN Database Source Integration
// dsnfunc.php - Database functions for DSN integration
//
// Source: https://github.com/wolunicentre/uc-dsn
// Author: Glenn Harris (gharris@uow.edu.au)
// ****************************************************

include("db.php");

// This function displays the Market Alley events
function viewMarketAlleyEvents() {
	global $confeed;
	$row = 0;
	$sql = 'select * from ma_dates';
	$sqlp = ociparse($confeed, $sql);
	
	echo "<div style='padding: 2px; overflow: auto;'><div style='float: left; width: 30%'><h4>Market Alley</h4></div></div>";
	
	if (ociexecute($sqlp, OCI_DEFAULT)) {
		echo "<div style='padding: 2px; border-bottom: 1px solid black; overflow: auto;'><div style='float: left; width: 30%'><h5>Date</h5></div></div>";
		while (ocifetchinto($sqlp, $data, OCI_BOTH)) {
			if ($row % 2 == 1) {
				echo "<div style='background-color: #eee; padding: 2px; overflow: auto;'><div id=r".$row." style='float:left; width:30%;'>". $data['MADATE'] . "</div></div>";
			} 
			else {
				echo "<div style='background-color: #fff; padding: 2px; overflow: auto;'><div id=r".$row." style='float:left; width:30%;'>". $data['MADATE'] . "</div></div>";
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

// This function displays the Lunch on the Lawn events
function viewLunchOnLawnEvents() {
	global $concon;
	$row = 0;
	$sql = "select * from dsn_lol_info";
	$sqlp = ociparse($concon, $sql);
	
	echo "<div style='padding: 2px; overflow: auto;'><div style='float: left; width: 30%'><h4>Lunch on the Lawn</h4></div></div>";
	
	if (ociexecute($sqlp, OCI_DEFAULT)) {
		echo "<div style='padding: 2px; border-bottom: 1px solid black; overflow: auto;'><div style='float: left; width: 30%'><h5>Date</h5></div><div style='width: 30%;float:left;'><h5>Artist / Event</h5></div></div>";
		while (ocifetchinto($sqlp, $data, OCI_BOTH)) {
			if ($row % 2 == 1) {
				echo "<div style='background-color: #eee; padding: 2px; overflow: auto;'><div id=r".$row." style='float:left; width: 30%'>". $data['LOL_DATE'] . "</div><div style='width: 30%;float:left;'>" . $data['PERFORMER'] . "</div></div>";	
			} 
			else {
				echo "<div style='background-color: #fff; padding: 2px; overflow: auto;'><div id=r".$row." style='float:left; width: 30%'>". $data['LOL_DATE'] . "</div><div style='width: 30%;float:left;'>" . $data['PERFORMER'] . "</div></div>";	
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

function viewAcousticSessionsEvents() {
	global $concon;
	$row = 0;
	$sql = "select * from dsn_as_info";
	$sqlp = ociparse($concon, $sql);
	
	echo "<div style='padding: 2px; overflow: auto;'><div style='float: left; width: 30%'><h4>Acoustic Sessions</h4></div></div>";
	
	if (ociexecute($sqlp, OCI_DEFAULT)) {
		echo "<div style='padding: 2px; border-bottom: 1px solid black; overflow: auto;'><div style='float: left; width: 30%'><h5>Date</h5></div><div style='width: 30%;float:left;'><h5>Time</h5></div><div style='width: 30%;float:left;'><h5>Artist / Event</h5></div></div>";
		while (ocifetchinto($sqlp, $data, OCI_BOTH)) {
			if ($row % 2 == 1) {
				echo "<div style='background-color: #eee; padding: 2px; overflow: auto;'><div id=r".$row." style='float:left; width: 30%'>". $data['AS_DATE'] . "</div><div style='width: 30%;float:left;'>" . $data['AS_TIME'] . "</div><div style='width: 30%;float:left;'>" . $data['PERFORMER'] . "</div></div>";				
			} 
			else {
				echo "<div style='background-color: #fff; padding: 2px; overflow: auto;'><div id=r".$row." style='float:left; width: 30%'>". $data['AS_DATE'] . "</div><div style='width: 30%;float:left;'>" . $data['AS_TIME'] . "</div><div style='width: 30%;float:left;'>" . $data['PERFORMER'] . "</div></div>";
			}
			$row++;
		}
	}
}
?>	