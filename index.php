<?php include("db.php"); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>UniCentre DSN Data Entry</title>
<link href="http://www.uow.edu.au/content/groups/webasset/@web/documents/siteelement/css_uow_font.css" rel="stylesheet" type="text/css" media="screen">
<link href="http://www.uow.edu.au/content/groups/webasset/@web/documents/siteelement/css_uow_responsive.css" rel="stylesheet" type="text/css" media="screen">
<script language="javascript" type="text/javascript">
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
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
<form id="" action="<?php echo $me; ?>" method="post" enctype="multipart/form-data">
    <div class="flabel">DSN</div>
	<select name="type" class="text-input" id="type">
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
<div id="chkin" class="fbutton"><a href='#'>Add</a></div>
<div id="chkout" class="button"><a href='#'>Check Out</a></div>
<div id="showall" class="button"><a href='#' onClick="showAllItems();">All Events</a></div>
<div style="clear:both"></div>
<div id="datatab"></div>
<div id="repf" style="display: none;"></div>
</div>
</form> 
</body>
</html>
