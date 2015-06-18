<?
session_start();
require("config.php");
require("./lang/lang.admin." . LANGUAGE_CODE . ".php");
require("functions.php");

$flag = $HTTP_GET_VARS['flag'];
$auth = auth();

if ( $auth == 2 ) {
	switch ( $flag ) {
		case "add":
			editUserForm("Adicionar");
			break;
		case "edit":
			$id = (int) $HTTP_GET_VARS['id'];
			if (!empty($id))
				editUserForm("Editar", $id);
			else
				$lang['accesswarning'];
			break;
		case "insert":
			insertNewUser();
			break;
		case "update":
			updateExistingUser();
			break;
		case "delete":
			$id = (int) $HTTP_GET_VARS['id'];
			if (!empty($id))
				deleteUser($id);
			else
				$lang['accesswarning'];
			break;
		default:
			userList();
	}
} elseif ( $auth == 1 ) {
	switch ( $flag ) {
		case "changepw":
			changePW($flag);
			break;
		case "updatepw":
			updatePassword();
			changePW($flag);
			break;
		default:
			header("location:index.php");
	}
} else {
	echo $lang['accessdenied'];
}

/***************************************
******** user admin functions **********
***************************************/

function editUserForm($mode, $id="", $error="")
{
	global $lang, $HTTP_SESSION_VARS, $HTTP_POST_VARS;
	
	$editorstr = "<option value=\"1\">" . $lang['editoroption'] . "</option>\n";
	
	if ($mode=="Edit") {
		mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
		mysql_select_db(DB_NAME) or die(mysql_error());
		
		$sql = "SELECT username, password, fname, lname, userlevel, email ";
		$sql .= "FROM " . DB_TABLE_PREFIX . "users WHERE uid=" . $id;
		
		$result = mysql_query($sql) or die(mysql_error());
		$row = mysql_fetch_row($result);
		
		$username	= $row[0];
		$password	= $row[1];
		$fname		= $row[2];
		$lname		= $row[3];
		$userlevel	= $row[4];
		$email		= $row[5];
		
		if ($userlevel == 2)
			$admin = "selected";
		else
			$admin = "";
			
		$header 	= $lang['edituser'];
		$formaction = "update";
		$unameinput = "<span class=\"edit_user_label\">" . $username . "</span><input type=\"hidden\" name=\"username\" value=\"" . $username . "\">\n";
		
		if ($username == $HTTP_SESSION_VARS['authdata']['login']) { $editorstr = ""; }
		
	} else {
		if (is_array($HTTP_POST_VARS)) {
			$username 	= "";
			$password 	= $HTTP_POST_VARS['pw'];
			$fname 		= $HTTP_POST_VARS['fname'];
			$lname 		= $HTTP_POST_VARS['lname'];
			$userlevel 	= $HTTP_POST_VARS['userlevel'];
			$email		= $HTTP_POST_VARS['email'];
		} else {
			$username=$password=$fname=$lname=$userlevel=$email="";
		}
		
		$header 	= $lang['adduser'];
		$formaction = "insert";
		$unameinput = "<input type=\"text\" name=\"username\" size=\"29\" maxlength=\"20\" value=\"" . $username . "\">";
	}
?>
	<html><head>
	<title><?=$mode?> Usuário do Calendário</title>
	<link rel="stylesheet" type="text/css" href="css/adminpgs.css">
	
	<script language="JavaScript">
	
		function validate(f) {
			var regex = /\W+/;
			var un = f.username.value;
			var pw = f.pw.value;
			
			var str = "";
			if (f.fname.value == "") { str += "\n<?=$lang['fnameblank']?>"; }
			if (f.lname.value == "") { str += "\n<?=$lang['lnameblank']?>"; }
			if (f.email.value == "") { str += "\n<?=$lang['emailblank']?>"; }
			if (un == "") { str += "\n<?=$lang['unameblank']?>"; }
			if (un.length < 4) { str += "\n<?=$lang['unamelength']?>"; }
			if (regex.test(un)) { str += "\n<?=$lang['unameillegal']?>"; }
			if (pw == "") { str += "\n<?=$lang['passblank']?>"; }
			if (pw != f.pwconfirm.value) { str += "\n<?=$lang['passmatch']?>"; }
			if (pw.length < 4) { str += "\n<?=$lang['passlength']?>"; }
			if (regex.test(pw)) { str += "\n<?=$lang['passillegal']?>"; }
			
			if (str == "") {
				f.method = "post";
				f.action = "useradmin.php?flag=<?= $formaction ?>";
				f.submit();
			} else {
				alert(str);
				return false;
			}
		}
	
	</script>
	</head><body>
	
<?
	if ( !empty($error) ) {
		echo "<p><span class=\"bad_user_name\">" . $lang['unameinuse'] . "</span></p>";
	}
?>
	<form onSubmit="return validate(this);">
	<table cellpadding="2" cellspacing="2" border="0">
	<tr>
		<td colspan="2"><span class="edit_user_header"><?=$header?>:</span></td>
	</tr>
	<tr><td><img src="images/clear.gif" width="1" height="3"></td></tr>
	<tr>
		<td align="right"><span class="edit_user_label"><?=$lang['username']?>:</span></td>
		<td><?=$unameinput?></td>
	</tr>
	<tr>
		<td align="right"><span class="edit_user_label"><?=$lang['password']?>:</span></td>
		<td><input type="password" name="pw" size="29" maxlength="20" value="<?=$password?>"></td>
	</tr>
	<tr>
		<td align="right"><span class="edit_user_label"><?=$lang['pwconfirm']?>:</span></td>
		<td><input type="password" name="pwconfirm" size="29" maxlength="20" value="<?=$password?>"></td>
	</tr>
	<tr>
		<td align="right"><span class="edit_user_label"><?=$lang['userlevel']?>:</span></td>
		<td><select name="userlevel">
				<?=$editorstr?>
				<option value="2" <?=$admin?>><?=$lang['adminoption']?></option>
			</select>
		</td>
	</tr>
	<tr>
		<td align="right"><span class="edit_user_label"><?=$lang['fname']?>:</span></td>
		<td><input type="text" name="fname" size="29" maxlength="20" value="<?=$fname?>"></td>
	</tr>
	<tr>
		<td align="right"><span class="edit_user_label"><?=$lang['lname']?>:</span></td>
		<td><input disable type="text" name="lname" size="29" maxlength="30" value="<?=$lname?>"></td>
	</tr>
	<tr>
		<td align="right"><span class="edit_user_label"><?=$lang['email']?>:</span></td>
		<td><input type="text" name="email" size="29" maxlength="40" value="<?=$email?>"></td>
	</tr>

	<tr><td><img src="images/clear.gif" width="1" height="7"></td></tr>
	<tr>
		<td colspan="2" align="right"><input type="submit" value="<?=$mode?> Usuário">
		&nbsp;	<input type="button" value="Cancelar" onClick="location.replace('useradmin.php');">
		</td>
	</tr>
	</table>
	</form>

	</body></html>
<?
}

function insertNewUser()
{
	global $HTTP_POST_VARS;
	$uname	= $HTTP_POST_VARS['username'];
	$pw 	= $HTTP_POST_VARS['pw'];
	$ulevel = $HTTP_POST_VARS['userlevel'];
	$fname 	= $HTTP_POST_VARS['fname'];
	$lname 	= $HTTP_POST_VARS['lname'];
	$email 	= $HTTP_POST_VARS['email'];
	
	mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
	mysql_select_db(DB_NAME) or die(mysql_error());
	
	$sql = "SELECT * FROM " . DB_TABLE_PREFIX . "users WHERE username='$uname'";
	
	$result = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_row($result);
	
	if ( is_array($row) ) {
		editUserForm("Adicionar", "", $uname);
	} else {
		$sql = "INSERT INTO " . DB_TABLE_PREFIX . "users SET ";
		$sql .= "username='$uname', password='$pw', fname='$fname', lname='$lname', ";
		$sql .= "userlevel='$ulevel', email='$email'";
		mysql_query($sql) or die(mysql_error());
		
		header("location:useradmin.php");
	}
}

function updateExistingUser()
{
	global $HTTP_SESSION_VARS, $HTTP_POST_VARS;
	$uname	= $HTTP_POST_VARS['username'];
	$pw 	= $HTTP_POST_VARS['pw'];
	$ulevel	= $HTTP_POST_VARS['userlevel'];
	$fname 	= $HTTP_POST_VARS['fname'];
	$lname	= $HTTP_POST_VARS['lname'];
	$email	= $HTTP_POST_VARS['email'];
	
	mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
	mysql_select_db(DB_NAME) or die(mysql_error());
	
	$sql = "UPDATE " . DB_TABLE_PREFIX . "users SET password='$pw', fname='$fname', ";
	$sql .= "lname='$lname', userlevel='$ulevel', email='$email' WHERE username='$uname'";
	mysql_query($sql) or die(mysql_error());
	
	if ( $uname==$HTTP_SESSION_VARS['authdata']['login'] )
		$HTTP_SESSION_VARS['authdata']['password'] = $pw;
	
	header("location:useradmin.php");
}

function deleteUser($id)
{
	global $authdata;
	
	if ($authdata['uid'] != $id) {
		mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
		mysql_select_db(DB_NAME) or die(mysql_error());
		
		$sql = "DELETE FROM " . DB_TABLE_PREFIX . "users WHERE uid='$id'";
		mysql_query($sql) or die(mysql_error());
	}
	
	header("location:useradmin.php");
}

function userList()
{
	global $lang, $HTTP_SESSION_VARS;
?>
	<html><head><title>Lista de Usuários</title>
	<link rel="stylesheet" type="text/css" href="css/adminpgs.css">
	
	<script language="JavaScript">
		function deleteConfirm(user, uid) {
			var msg = "<?=$lang['deleteconf']?>: \"" + user + "\"?";
			
			if (user == "<?= $HTTP_SESSION_VARS['authdata']['login'] ?>") {
				alert("<?=$lang['deleteown']?>");
				return;
			} else if (confirm(msg)) {
				location.replace("useradmin.php?flag=delete&id=" + uid);
			} else {
				return;
			}
		}
	</script>
	</head>
	
	<body>
	<table cellpadding="0" cellspacing="0" border="0" width="600">
	<tr>
		<td><span class="user_list_header"><?=$lang['ulistheader']?></span></td>
		<td align="right" valign="bottom"><span class="user_list_options">[ <a href="useradmin.php?flag=add"><?=$lang['adduser']?></a> | <a href="index.php"><?=$lang['return']?></a> ]</span></td>
	</tr>
	<tr><td><img src="images/clear.gif" width="1" height="5"></td></tr>
	</table>
	
	<table cellpadding="0" cellspacing="0" border="0" width="600" bgcolor="#000000">
	<tr><td>

	<table cellspacing="1" cellpadding="3" border="0" width="100%">
	<tr bgcolor="#666666">
		<td><span class="user_table_col_label"><?=$lang['username']?></span></td>
		<td><span class="user_table_col_label"><?=$lang['name']?></span></td>
		<td><span class="user_table_col_label"><?=$lang['email']?></span></td>
		<td><span class="user_table_col_label"><?=$lang['userlevel']?></span></td>
		<td><span class="user_table_col_label"><?=$lang['edit']?></span></td>
		<td><span class="user_table_col_label"><?=$lang['delete']?></span></td>
	</tr>

<?
	mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
	mysql_select_db(DB_NAME) or die(mysql_error());
	
	$sql = "SELECT * FROM " . DB_TABLE_PREFIX . "users";
	$result = mysql_query($sql) or die(mysql_error());
	
	$bgcolor = "#ffffff";
	
	while( $row = mysql_fetch_array($result) ) {
		$userlevel = ($row[5] == 2) ? $lang['admin'] : $lang['editor'];
	
		echo "<tr bgcolor=\"$bgcolor\">\n";
		echo "	<td><span class=\"user_table_txt\">" . $row[1] . "</span></td>\n";
		echo "	<td><span class=\"user_table_txt\">" . $row[3] . " " . $row[4] . "</span></td>\n";
		echo "	<td><span class=\"user_table_txt\">" . $row[6] . "</span></td>\n";
		echo "	<td><span class=\"user_table_txt\">" . $userlevel . "</span></td>\n";
		echo "	<td><span class=\"user_table_txt\"><a href=\"useradmin.php?flag=edit&id=" . $row[0] . "\">" . $lang['edit'] . "</a></span></td>\n";
		echo "	<td><span class=\"user_table_txt\"><a href=\"#\" onClick=\"deleteConfirm('" . $row[1] . "', '" . $row[0] . "');\">" . $lang['delete'] . "</a></span></td>\n";
		echo "</tr>\n";
	
	if ( $bgcolor == "#ffffff" )
		$bgcolor = "#dddddd";
	else
		$bgcolor = "#ffffff";
	}

	echo "</table></td></tr></table>";
}

function changePW($flag)
{
	global $lang, $HTTP_SESSION_VARS;
	
	$username = $HTTP_SESSION_VARS['authdata']['login'];
	$id = $HTTP_SESSION_VARS['authdata']['uid'];
?>
	<html><head>
	<title><?=$lang['changepw']?></title>
	<link rel="stylesheet" type="text/css" href="css/adminpgs.css">
	<script language="JavaScript">
		function validate(f) {
			var regex = /\W+/;
			var pw = f.pw.value;
			var str = "";
			if (pw == "") { str += "\n<?=$lang['pwblank']?>"; }
			if (pw != f.pwconfirm.value) { str += "\n<?=$lang['pwmatch']?>"; }
			if (pw.length < 4) { str += "\n<?=$lang['pwlength']?>"; }
			if (regex.test(pw)) { str += "\n<?=$lang['pwchars']?>"; }
			
			if (str == "") {
				f.method = "post";
				f.action = "useradmin.php?flag=updatepw";
				f.submit();
			} else {
				alert(str);
				return false;
			}
		}
	</script>
	</head></body>

<?	if ( $flag=="changepw" ) { ?>

	<form onSubmit="return validate(this);">
	<input type="hidden" name="id" value="<?= $id ?>">
	<input type="hidden" name="un" value="<?= $username ?>">
	<table cellpadding="2" cellspacing="2" border="0">
	<tr>
		<td colspan="2"><span class="edit_user_header"><?=$lang['chpassheader']?></span></td>
	</tr>
	<tr><td><img src="images/clear.gif" width="1" height="3"></td></tr>
	<tr>
		<td align="right"><span class="edit_user_label"><?=$lang['username']?>:</span></td>
		<td><span class="edit_user_label"><?=$username?></span></td>
	</tr>
	<tr>
		<td align="right"><span class="edit_user_label"><?=$lang['password']?>:</span></td>
		<td><input type="password" name="pw" size="29" maxlength="25" value=""></td>
	</tr>
	<tr>
		<td align="right"><span class="edit_user_label"><?=$lang['pwconfirm']?>:</span></td>
		<td><input type="password" name="pwconfirm" size="29" maxlength="25" value=""></td>
	</tr>
	<tr><td><img src="images/clear.gif" width="1" height="7"></td></tr>
	<tr>
		<td colspan="2" align="right"><input type="submit" value="<?=$lang['changepw']?>">
		&nbsp;	<input type="button" value="<?=$lang['cancel']?>" onClick="location.replace('index.php');">
		</td>
	</tr>
	</table>
	</form>

<?	} elseif ( $flag=="updatepw" ) { ?>
	
	<span class="edit_user_label"><?=$lang['pwchanged']?> &nbsp;"<?=$username?>"</span>
	<p>
	<span class="user_list_options">[ <a href="index.php"><?=$lang['return']?></a> ]</span>
	
<?	} else {
		echo $lang['accessdenied'] . "<p>";
		echo "<span class=\"user_list_options\">[ <a href=\"index.php\">" . $lang['return'] . "</a> ]</span>";
	}
?>
	</body>
	</html>
<?
}

function updatePassword()
{
	global $HTTP_POST_VARS, $HTTP_SESSION_VARS;
	
	$pw = $HTTP_POST_VARS['pw'];
	$id = $HTTP_POST_VARS['id'];
	
	mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
	mysql_select_db(DB_NAME) or die(mysql_error());
	
	$sql = "UPDATE " . DB_TABLE_PREFIX . "users SET password='$pw' WHERE uid='$id'";
	$result = mysql_query($sql) or die(mysql_error());
	
	$HTTP_SESSION_VARS['authdata']['password'] = $pw;
}
?>