<?
function auth($login = '', $passwd = '')
{
	session_start();
	global $HTTP_SESSION_VARS;
	$authdata = $HTTP_SESSION_VARS['authdata'];
	
	if (!empty($login)) {
		$username = $login;
		$pw = $passwd;
		$register = true;
	} elseif (!empty($authdata['login'])) {
		$username = $authdata['login'];
		$pw = $authdata['password'];
		$register = false;
	} else {
		$auth = 0;
	}
	
	if (!empty($username)) {
		mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
		mysql_select_db(DB_NAME) or die(mysql_error());
		
		$sql = "SELECT * FROM " . DB_TABLE_PREFIX . "users WHERE username = '" . $username . "'";
		$result = mysql_query($sql) or die(mysql_error());
		$row = mysql_fetch_assoc($result);
		
		if ( $row["password"] == $pw ) {
			if ($register) {
				$HTTP_SESSION_VARS['authdata'] = array('login'=>$row['username'], 'password'=>$row['password'], 'userlevel'=>$row['user_level'], 'uid'=>$row['uid']);
			}
			$auth = $row['userlevel'];
		} else {
			unset($HTTP_SESSION_VARS['authdata']);
			$auth = 0;
		}
	}
	
   	return $auth;
}

function monthPullDown($month, $montharray)
{
	echo "\n<select name=\"month\">\n";

	for($i=0;$i < 12; $i++) {
		if ($i != ($month - 1))
			echo "	<option value=\"" . ($i + 1) . "\">$montharray[$i]</option>\n";
		else
			echo "	<option value=\"" . ($i + 1) . "\" selected>$montharray[$i]</option>\n";
	}

	echo "</select>\n\n";
}

function yearPullDown($year)
{
	echo "<select name=\"year\">\n";

	$z = 3;
	for($i=1;$i < 8; $i++) {
		if ($z == 0)
			echo "	<option value=\"" . ($year - $z) . "\" selected>" . ($year - $z) . "</option>\n";
		else
			echo "	<option value=\"" . ($year - $z) . "\">" . ($year - $z) . "</option>\n";
		
		$z--;
	}

	echo "</select>\n\n";
}

function dayPullDown($day)
{
	echo "<select name=\"day\">\n";

	for($i=1;$i <= 31; $i++) {
		if ($i == $day)
			echo "	<option value=\"$i\" selected>$i</option>\n";
		else
			echo "	<option value=\"$i\">$i</option>\n";
	}

	echo "</select>\n\n";
}

function hourPullDown($hour, $namepre)
{
	echo "\n<select name=\"" . $namepre . "_hour\">\n";

	for($i=0;$i <= 12; $i++) {
		if ($i == $hour)
			echo "	<option value=\"$i\" selected>$i</option>\n";
		else
			echo "	<option value=\"$i\">$i</option>\n";
	}

	echo "</select>\n\n";
}

function minPullDown($min, $namepre)
{
	echo "\n<select name=\"" . $namepre . "_min\">\n";

	for($i=0;$i <= 55; $i+=5) {
		
		if ($i < 10)
			$disp = "0" . $i;
		else
			$disp = $i;
		
		if ($i == $min)
			echo "	<option value=\"$i\" selected>$disp</option>\n";
		else
			echo "	<option value=\"$i\">$disp</option>\n";
	}

	echo "</select>\n\n";
}

function amPmPullDown($pm, $namepre)
{
	if ($pm) { $pm = " selected"; } else { $am = " selected"; }

	echo "\n<select name=\"" . $namepre . "_am_pm\">\n";
	echo "	<option value=\"0\"$am>am</option>\n";
	echo "	<option value=\"1\"$pm>pm</option>\n";
	echo "</select>\n\n";
}

function javaScript()
{
?>
	<script language="JavaScript">
	function submitMonthYear() {
		document.monthYear.method = "post";
		document.monthYear.action = "index.php?month=" + document.monthYear.month.value + "&year=" + document.monthYear.year.value;
		document.monthYear.submit();
	}

	function postMessage(day, month, year) {
		eval("page" + day + " = window.open('eventform.php?d=" + day + "&m=" + month + "&y=" + year + "', 'postScreen', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=340,height=400');");
	}

	function openPosting(pId) {
		eval("page" + pId + " = window.open('eventdisplay.php?id=" + pId + "', 'mssgDisplay', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=340,height=400');");
	}
	
	function loginPop(month, year) {
		eval("logpage = window.open('login.php?month=" + month + "&year=" + year + "', 'mssgDisplay', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=340,height=400');");
	}
	</script>
<?
}


function footprint($auth, $m, $y) 
{
	global $lang;
	
	echo "<br><br><span class=\"footprint\">\n";
	echo "<br>\n[ ";
	
	if ( $auth == 2 ) {
		echo "<a href=\"useradmin.php\">" . $lang['adminlnk'] . "</a> | ";
		echo " <a href=\"login.php?action=logout&month=$m&year=$y\">" . $lang['logout'] . "</a>";
	} elseif ( $auth == 1 ) {
		echo "<a href=\"useradmin.php?flag=changepw\">" . $lang['changepw'] . "</a> | ";
		echo "<a href=\"login.php?action=logout&month=$m&year=$y\">" . $lang['logout'] . " </a>";
	} else {
		echo "<a href=\"javascript:loginPop($m, $y)\">" . $lang['login'] . "</a>";
	}
	
	echo " ]</span>";
}


function scrollArrows($m, $y)
{
	// set variables for month scrolling
	$nextyear = ($m != 12) ? $y : $y + 1;
	$prevyear = ($m != 1) ? $y : $y - 1;
	$prevmonth = ($m == 1) ? 12 : $m - 1;
	$nextmonth = ($m == 12) ? 1 : $m + 1;

	$s = "<a href=\"index.php?month=" . $prevmonth . "&year=" . $prevyear . "\">\n";
	$s .= "<img src=\"images/leftArrow.gif\" border=\"0\"></a> ";
	$s .= "<a href=\"index.php?month=" . $nextmonth . "&year=" . $nextyear . "\">";
	$s .= "<img src=\"images/rightArrow.gif\" border=\"0\"></a>";
	
	return $s;
}

function writeCalendar($month, $year)
{
	$str = getDayNameHeader();
	$eventdata = getEventDataArray($month, $year);
	// get week position of first day of month.
	$weekpos = getFirstDayOfMonthPosition($month, $year);
	// get user permission level
	$auth = auth();
	// get number of days in month
	$days = 31-((($month-(($month<8)?1:0))%2)+(($month==2)?((!($year%((!($year%100))?400:4)))?1:2):0));
	
	// initialize day variable to zero, unless $weekpos is zero
	if ($weekpos == 0) $day = 1; else $day = 0;
	
	// initialize today's date variables for color change
	$timestamp = mktime() + CURR_TIME_OFFSET * 3600;
	$d = date(j, $timestamp); $m = date(n, $timestamp); $y = date(Y, $timestamp);
	
	// loop writes empty cells until it reaches position of 1st day of month ($wPos)
	// it writes the days, then fills the last row with empty cells after last day
	while($day <= $days) {
		
		$str .="<tr>\n";

		for($i=0;$i < 7; $i++) {
			
			if($day > 0 && $day <= $days) {
				
				$str .= "	<td class=\"";
				
				if (($day == $d) && ($month == $m) && ($year == $y))
					$str .= "today";
				else
					$str .= "day";
				
				$str .= "_cell\" valign=\"top\"><span class=\"day_number\">";
				
				if ($auth)
					$str .= "<a href=\"javascript: postMessage($day, $month, $year)\">$day</a>";
				else
					$str .= "$day";
				
				$str .= "</span><br>";
				
				// enforce title limit
				$eventcount = count($eventdata[$day]["title"]);
				if (MAX_TITLES_DISPLAYED < $eventcount) $eventcount = MAX_TITLES_DISPLAYED;
				
				// write title link if posting exists for day
				for($j=0;$j < $eventcount;$j++) {
					$str .= "<span class=\"title_txt\">-";
					$str .= "<a href=\"javascript:openPosting(" . $eventdata[$day]["id"][$j] . ")\">";
					$str .= $eventdata[$day]["title"][$j] . "</a></span>" . $eventdata[$day]["timestr"][$j];
				}

				$str .= "</td>\n";
				$day++;
			} elseif($day == 0)  {
     			$str .= "	<td class=\"empty_day_cell\" valign=\"top\">&nbsp;</td>\n";
				$weekpos--;
				if ($weekpos == 0) $day++;
     		} else {
				$str .= "	<td class=\"empty_day_cell\" valign=\"top\">&nbsp;</td>\n";
			}
     	}
		$str .= "</tr>\n\n";
	}
	
	$str .= "</table>\n\n";
	return $str;
}

function getDayNameHeader()
{
	global $lang;
	
	// adjust day name order if weekstart not Sunday
	if (WEEK_START != 0) {
		for($i=0; $i < WEEK_START; $i++) {
			$tempday = array_shift($lang['abrvdays']);
			array_push($lang['abrvdays'], $tempday);
		}
	}
	
	$s = "<table cellpadding=\"1\" cellspacing=\"1\" border=\"0\">\n<tr>\n";
	
	foreach($lang['abrvdays'] as $day) {
		$s .= "\t<td class=\"column_header\">&nbsp;$day</td>\n";
	}

	$s .= "</tr>\n\n";
	return $s;
}

function getEventDataArray($month, $year)
{
	mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
	mysql_select_db(DB_NAME) or die(mysql_error());
	
	$sql = "SELECT id, d, title, start_time, end_time, ";
	
	if (TIME_DISPLAY_FORMAT == "12hr") {
		$sql .= "TIME_FORMAT(start_time, '%l:%i%p') AS stime, ";
		$sql .= "TIME_FORMAT(end_time, '%l:%i%p') AS etime ";
	} elseif (TIME_DISPLAY_FORMAT == "24hr") {
		$sql .= "TIME_FORMAT(start_time, '%H:%i') AS stime, ";
		$sql .= "TIME_FORMAT(end_time, '%H:%i') AS etime ";
	} else {
		echo "Bad time display format, check your configuration file.";
	}
	
	$sql .= "FROM " . DB_TABLE_PREFIX . "mssgs WHERE m = $month AND y = $year ";
	$sql .= "ORDER BY start_time";
	
	$result = mysql_query($sql) or die(mysql_error());
	
	while($row = mysql_fetch_assoc($result)) {
		$eventdata[$row["d"]]["id"][] = $row["id"];

		if (strlen($row["title"]) > TITLE_CHAR_LIMIT)
			$eventdata[$row["d"]]["title"][] = substr(stripslashes($row["title"]), 0, TITLE_CHAR_LIMIT) . "...";
		else
			$eventdata[$row["d"]]["title"][] = stripslashes($row["title"]);
		
		if (!($row["start_time"] == "55:55:55" && $row["end_time"] == "55:55:55")) {
			if ($row["start_time"] == "55:55:55")
				$starttime = "- -";
			else
				$starttime = $row["stime"];
				
			if ($row["end_time"] == "55:55:55")
				$endtime = "- -";
			else
				$endtime = $row["etime"];
			
			$timestr = "<div align=\"right\" class=\"time_str\">($starttime - $endtime)&nbsp;</div>";
		} else {
			$timestr = "<br>";
		}

		$eventdata[$row["d"]]["timestr"][] = $timestr;
	}
	return $eventdata;
}

function getFirstDayOfMonthPosition($month, $year)
{
	$weekpos = date("w",mktime(0,0,0,$month,1,$year));
	
	// adjust position if weekstart not Sunday
	if (WEEK_START != 0)
		if ($weekpos < WEEK_START)
			$weekpos = $weekpos + 7 - WEEK_START;
		else
			$weekpos = $weekpos - WEEK_START;
	
	return $weekpos;
}
?>
