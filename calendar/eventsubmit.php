<?
require("config.php");
require("./lang/lang.admin." . LANGUAGE_CODE . ".php");
require("functions.php");

if (auth()) {
	switch ($HTTP_GET_VARS['flag']) {
		case "add" :
			submitEventData();
			break;
		case "edit":
			$id = (int) $HTTP_GET_VARS['id'];
			
			if (!empty($id))
				submitEventData($id);
			else
				$lang['accesswarning'];
			break;
		case "delete":
			$month 	= (int) $HTTP_GET_VARS['month'];
			$year	= (int) $HTTP_GET_VARS['year'];
			$id 	= (int) $HTTP_GET_VARS['id'];
			
			if (!(empty($id) && empty($month) && empty($year)))
				deleteEvent($id, $month, $year);
			else
				$lang['accesswarning'];
			break;
		default:
			$lang['accesswarning'];
	}
} else {
	echo $lang['accessdenied'];
}


function submitEventData ($id="")
{
	global $lang, $HTTP_POST_VARS;
	
	$uid 		= $HTTP_POST_VARS['uid'];
	$title 		= addslashes($HTTP_POST_VARS['title']);
	$text 		= addslashes($HTTP_POST_VARS['text']);
	$month 		= $HTTP_POST_VARS['month'];
	$day 		= $HTTP_POST_VARS['day'];
	$year 		= $HTTP_POST_VARS['year'];
	$shour 		= $HTTP_POST_VARS['start_hour'];
	$sminute 	= $HTTP_POST_VARS['start_min'];
	$s_ampm 	= $HTTP_POST_VARS['start_am_pm'];
	$ehour 		= $HTTP_POST_VARS['end_hour'];
	$eminute 	= $HTTP_POST_VARS['end_min'];
	$e_ampm 	= $HTTP_POST_VARS['end_am_pm'];
	
	if ($shour == 0 && $sminute == 0 && $s_ampm == 0) {
		$starttime = "55:55:55";
	} else {
		if ($s_ampm == 1 && $shour != 12) $shour = $shour + 12;
		if ($s_ampm == 0 && $shour == 12) $shour = 0;
		$starttime = "$shour:$sminute:00";
	}
	
	if ($ehour == 0 && $eminute == 0 && $e_ampm == 0) {
		$endtime = "55:55:55";
	} else {
		if ($e_ampm == 1 && $ehour != 12) $ehour = $ehour + 12;
		if ($e_ampm == 0 && $ehour == 12) $ehour = 0;
		$endtime = "$ehour:$eminute:00";
	}
	
	if ($id) {
		$sql = "UPDATE " . DB_TABLE_PREFIX . "mssgs SET uid='$uid', m='$month', d='$day', y='$year', ";
		$sql .= "start_time='$starttime', end_time='$endtime', title='$title', text='$text' ";
		$sql .= "WHERE id=$id";
		$result = $lang['updated'];
	} else {
		$sql = "INSERT INTO " . DB_TABLE_PREFIX . "mssgs SET uid=$uid, m=$month, d=$day, y=$year, ";
		$sql .= "start_time='$starttime', end_time='$endtime', title='$title', text='$text'";
		$result = $lang['added'];
	}
	
	mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
	mysql_select_db(DB_NAME) or die(mysql_error());
	
	mysql_query($sql) or die(mysql_error());
?>
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
	<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/popwin.css">
		<script language="JavaScript">
			opener.location = "index.php?month=<?= $month ?>&year=<?= $year ?>";
			window.setTimeout('window.close()', 1000);
		</script>
	</head>
	<body>
	
	<div align=\"center\" class=\"display_txt\"><?= stripslashes($title) ?> <?= $result ?></div>
	
	</body>
	</html>
<?	
}

function deleteEvent($id, $m, $y)
{
	mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
	mysql_select_db(DB_NAME) or die(mysql_error());
	
	$sql = "DELETE FROM " . DB_TABLE_PREFIX . "mssgs WHERE id = $id";
	$result = mysql_query($sql) or die(mysql_error());
	
	header("Location: index.php?month=$m&year=$y");
}
?>
