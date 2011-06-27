<?php
include("connect.php");

function login($username, $password) {
	$username = addslashes($username);
	$password = md5($password);
	$query = mysql_query("SELECT * FROM user_accounts WHERE username='$username' AND password='$password'");
	if(mysql_num_rows($query) == 1) {
		$info = mysql_fetch_array($query);
		$userid=$info[userid];
		$sessionid=md5($userid.time());
		$time=time();
		@setcookie ('test_account',$sessionid,$time+3600,'/','');
		mysql_query("DELETE FROM user_sessions WHERE userid='$userid'");
		mysql_query("INSERT INTO user_sessions (sessionid,userid,timestamp) VALUES('$sessionid','$userid','$time')");
		return $userid;
	}
	else {
		return 0;
	}
}

function status(){
	$sessionid=$_COOKIE[test_account];
	$oldtime =time() - 3600;
	$query = mysql_query("SELECT * FROM user_sessions WHERE sessionid='$sessionid' AND timestamp >$oldtime");
	if(mysql_num_rows($query) == 1) {
		$info = mysql_fetch_array($query);
		return $info [userid];
	}
	return 0;
}

function logout() {
	$sessionid = $_COOKIE[test_account];
	@setcookie ("test_account",'', time() -99999,'/','');
	mysql_query("DELETE FROM user_sessions WHERE sessionid='$sessionid'");
}


if($_POST[username]!=''||$_POST[password]!=''){
$login_status=login($_POST[username],$_POST[password]);
}
else if($_GET[logout]){
logout();
}
$userid = status();

if($userid > 0) {
	echo "Welcome to ELMSbee, #$userid (<a href='?logout'>Click here to logout</a>)"; }
else if ($login_status != '' $login_status ==0) {
echo "Invalid username/password combo.<br>";}
?>

<form method=POST action=index.php>
<input type=text name=username>
<input type=password name=password>
<input type=submit value="Log In">
</form>
<?php } ?>

