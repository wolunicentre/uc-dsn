<?php include("db.php"); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>UniCentre DSN Data Entry</title>
<link href="http://www.uow.edu.au/content/groups/webasset/@web/documents/siteelement/css_uow_font.css" rel="stylesheet" type="text/css" media="screen">
<link href="http://www.uow.edu.au/content/groups/webasset/@web/documents/siteelement/css_uow_responsive.css" rel="stylesheet" type="text/css" media="screen">
<style>
	.infobox {
		float: left;
		font-size: small;
		margin-top: 2px;
		margin-left: 10px;
		padding: 2px;
		width: 30%;
	}
	
	.flabel {
		float: left;
		width: 22%;
	}
	
	input {
		float: left;
		width: 13%;

	}
	
	#container {
		width: 75%;
		margin-left:auto;
		margin-right:auto;
		margin-top: 20px;
		margin-bottom: 20px;
	}
	
	#mform {
		margin-top: 20px;
		margin-bottom: 20px;
	}
	
	.button {
		border: 1px solid black;
		width: 13%;
		border-collapse: collapse;
		padding: 5px;
		float: left;
		margin-left: -1px;
	}
	
	.fbutton {
		border: 1px solid black;
		width: 13%;
		border-collapse: collapse;
		padding: 5px;
		float: left;
	}
	
	#datatab {
		margin-top: -1px;
		padding: 5px;
	}
	
	body {
		overflow-y: scroll;
	}

</style>
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
    <div class="flabel">Student Number / Barcode</div>
	<input type="text" class="text-input" name="sbc" id="sbc" onkeyup="showStudent(this.value);" />
	<div id="stuDetails" class="infobox"></div><div style="clear:both"></div>
	<div class="flabel">Item Barcode</div>
	<input type="text" class="text-input" name="item" id="item" onkeyup="showItem(this.value);" />
	<div id="itemDetails" class="infobox"></div><div style="clear:both"></div>
</div>
<div style="clear:both"></div>
<div id="chkin" class="fbutton"><a href='#' onClick="showCheckedOutItems();">Check In</a></div>
<div id="chkout" class="button"><a href='#' onClick="checkOut(cse_ls.sbc.value, cse_ls.item.value);">Check Out</a></div>
<div id="showall" class="button"><a href='#' onClick="showAllItems();">All Items</a></div>
<div id="report" class="button"><a href='#' onClick="showReport();">Report</a></div>
<div style="clear:both"></div>
<div id="datatab"></div>
<div id="repf" style="display: none;"></div>
</div>
</form> 
</body>
</html>
