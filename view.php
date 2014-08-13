<?php
// **********************************************
// Wollongong UniCentre Ltd
// UOW DSN Integration
// view.php - Displays current events
//
// Source: https://github.com/wolunicentre/uc-dsn
// Author: Glenn Harris (gharris@uow.edu.au)
// **********************************************

include ("dsnfunc.php");

$q = $_GET["q"];

switch ($q) {
	case 1:
		viewLunchOnLawnEvents();
		break;
	case 2:
		viewMarketAlleyEvents();
		break;
	case 3:
		viewAcousticSessionsEvents();
		break;
}
?>