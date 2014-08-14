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

// This function displays the Acoustic Sessions events
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

// This function inserts Lunch on Lawn events
function insertLunchOnLawn($date, $performer) {
	global $concon;
	$sql = "select dsn_lol_info.nextval as lol_id from dual";
	$sqlp = ociparse($concon, $sql);
	
	if (ociexecute($sqlp, OCI_DEFAULT)) {
		if (ocifetchinto($sqlp, $data, OCI_BOTH)) {
			$lol_id = $data['LOL_ID'];
		}
	}
	else {
		$e = ocierror($sqlp);
		printf ($e['message']);
	}
	
	$sql = "insert into dsn_lol_info (lol_id, lol_date, performer) values (:lol_id, :lol_date, :performer)";
	$sqlp = ociparse($concon, $sql);
	ocibindbyname($sqlp, ":lol_id", $lol_id);
	ocibindbyname($sqlp, ":lol_date", $date);
	ocibindbyname($sqlp, ":performer", $performer);
	
	if (ociexecute($sqlp, OCI_DEFAULT)) {
		ocicommit($concon);
		echo "Event added";
	}
	else {
		$e = ocierror($sqlp);
		printf ($e['message']);
	}
}

// This function inserts Market Alley events
function insertMarketAlley($date) {
	global $confeed;
	$sql = "select ma_info.nextval as date_id from dual";
	$sqlp = ociparse($confeed, $sql);
	
	if (ociexecute($sqlp, OCI_DEFAULT)) {
		if (ocifetchinto($sqlp, $data, OCI_BOTH)) {
			$date_id = $data['DATE_ID'];
			echo $date_id;
		}
	}
	else {
		$e = ocierror($sqlp);
		printf ($e['message']);
	}
	
	$sql = "insert into ma_dates (date_id, madate, active) values (:date_id, to_date(:madate, 'dd-mon-yyyy'), 1)";
	$sqlp = ociparse($confeed, $sql);
	ocibindbyname($sqlp, "date_id", $date_id);
	ocibindbyname($sqlp, ":madate", $date);
	
	if (ociexecute($sqlp, OCI_DEFAULT)) {
		ocicommit($confeed);
		echo "Event added";
	}
	else {
		$e = ocierror($sqlp);
		printf ($e['message']);
	}
}

// This function inserts Acoustic Sessions events
function insertAcousticSessions($date, $performer, $time) {
	global $concon;
	$sql = "select dsn_as_id.nextval as as_id from dual";
	$sqlp = ociparse($concon, $sql);
	
	if (ociexecute($sqlp, OCI_DEFAULT)) {
		if (ocifetchinto($sqlp, $data, OCI_BOTH)) {
			$as_id = $data['AS_ID'];
		}
	}
	else {
		$e = ocierror($sqlp);
		printf ($e['message']);
	}
	
	$sql = "insert into dsn_as_info (as_id, as_date, performer, as_time) values (:as_id, :as_date, :performer, :as_time)";
	$sqlp = ociparse($concon, $sql);
	ocibindbyname($sqlp, ":as_id", $as_id);
	ocibindbyname($sqlp, ":as_date", $date);
	ocibindbyname($sqlp, ":performer", $performer);
	ocibindbyname($sqlp, ":as_time", $as_time);
	
	if (ociexecute($sqlp, OCI_DEFAULT)) {
		ocicommit($concon);
		echo "Event added";
	}
	else {
		$e = ocierror($sqlp);
		printf ($e['message']);
	}
}
?>	