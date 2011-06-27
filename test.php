<html>
<head></head>
<body>
test
</br>
<?php
$db = mysql_connect("cse.unl.edu","jcox","4wmbBS");
mysql_select_db("jcox",$db);
$test = mysql_query( "SELECT * FROM words" , $db);
while ($row = mysql_fetch_array($test, MYSQL_NUM)){
	$word=$row[0]."\n";
	echo nl2br($row[0]."\n");
}
?>
</body>
</html>	
