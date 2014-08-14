<?php

include ("dsnfunc.php");

$q = $_GET["q"];
$date = $_GET["d"];
$performer = $_GET["p"];
$time = $_GET["t"];

switch ($q) {
	case 1:
		insertLunchOnLawn($date, $performer);
		break;
	case 2:
		insertMarketAlley($date);
		break;
	case 3:
		insertAcousticSessions($date, $performer, $time);
		break;
}
?>