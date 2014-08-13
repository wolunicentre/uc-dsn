<?php
// ****************************************************
// Wollongong UniCentre Ltd
// UOW DSN Database Source Integration
// index.php - Main input and display page
//
// Source: https://github.com/wolunicentre/uc-dsn
// Author: Glenn Harris (gharris@uow.edu.au)
// ****************************************************

include ("dsnfunc.php"); 

?>

<!DOCTYPE HTML>
<html>
<head>
<title>UniCentre DSN Data Entry</title>
<link href="http://www.uow.edu.au/content/groups/webasset/@web/documents/siteelement/css_uow_font.css" rel="stylesheet" type="text/css" media="screen">
<link href="http://www.uow.edu.au/content/groups/webasset/@web/documents/siteelement/css_uow_responsive.css" rel="stylesheet" type="text/css" media="screen">
<link href="ucdsn.css" rel="stylesheet" type="text/css" media="screen" />
<script language="javascript" type="text/javascript">
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
  }
</script>
<script language="javascript" type="text/javascript">

function showCurrentEvents(str) {
	var dt = document.getElementById("datatab");
	
	dt.innerHTML = "";
	setStyle(dt, 'nor');
	
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			dt.innerHTML = xmlhttp.responseText;
		}
	}
	
	xmlhttp.open("GET", "view.php?q="+str, true);
	xmlhttp.send();
}

function setStyle(str, type) {
	if (type == 'nor') {
		str.style.border = '1px solid #000';
		str.style.background = '#fff';
	} else if (type == 'ok') {
		str.style.border = '1px solid #8cac5e';
		str.style.background = '#e5ffbf';
	} else if (type == 'err') {
		str.style.border = '1px solid #ff0000';
		str.style.background = '#ffcccc';
	} else if (type == 'bla') {
		str.style.background = '#fff';
		str.style.border = '0';
	}
}

function addEvent(str) {
	var dt = document.getElementById("datatab");
	dt.innerHTML = "";
	setStyle(dt, 'nor');
	
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			dt.innerHTML = xmlhttp.responseText;
			if (xmlhttp.responseText == "Error adding event") {
				setStyle(dt, 'err');
			}
		}
	}
	
	//xmlhttp.open("GET", "addevent.php
}
</script>
		



</head>
<body>
<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
	$me = $_SERVER['PHP_SELF'];
}

?>
<div id="container">
<div style="margin-bottom: 10px;"><h1>UniCentre DSN Data Entry</h1></div>
<div id="mform">
<form id="dsnf" action="<?php echo $me; ?>" method="post" enctype="multipart/form-data">
    <div class="flabel">DSN</div>
	<select name="dtype" class="text-input" id="dtype">
		<option value="1">Lunch on the Lawn</option>
		<option value="2">Market Alley</option>
		<option value="3">Acoustic Sessions</option>
	</select>
	<div class="flabel">Date</div>
	<input type="date" class="text-input" name="d" id="d"/>
	<div id="stuDetails" class="infobox"></div>
	<div class="flabel">Artist / Event Name</div>
	<input type="text" class="text-input" name="ae" id="ae" />
	<div id="itemDetails" class="infobox"></div>
</div>
<div style="clear:both"></div>
<div style="height: 20px;"></div>
<div id="addevent" class="fbutton"><a href='#'>Add</a></div>
<div id="showall" class="button"><a href='#' onClick="showCurrentEvents(dsnf.dtype.value);">Show DSN Events</a></div>
<div style="clear:both"></div>
<div id="datatab"></div>
<div id="repf" style="display: none;"></div>
</div>
</form> 
</body>
</html>
