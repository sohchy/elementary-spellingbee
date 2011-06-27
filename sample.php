<?php
if($_POST[username] != '' || $_POST[password] != ''){
	$login_status = login($_POST[username],$_POST[password]);
}
else if($_GET[logout]){
	logout();
}
$userid=status();
?>

<?php
fuction login($username, $password){
	$username=addslashes($username);
	$password = md5($password);
	$query = mysql_query("SELECT * FROM user_accounts WHERE username='$username' AND password='$password'");
	if(mysql_num_rows($query) ==1){
		$info = mysql_fetch_array($query);
		$userid = $info[userid];
		$sessionid = md5($userid . time());
		$time = time();
		@setcookie('test_account', $sessionid, $time+3600,'/','');
		mysql_query("DELETE FROM user_sessions WHERE userid='$userid'");
		mysql_query("INSERT INTO user_sessions(sessionid,userid,timestamp) VALUES('$sessionid','$userid','$time')");
		return $userid;
	}
	else{
		return 0;
	}
}
?>
