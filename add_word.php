<html>
<body>
<?php
include("connect.php");
$w = strtoupper($_POST[word]);
$query= "INSERT INTO words(spelling) VALUES('".$w."');";
mysql_query($query,$db);
echo "The word ".$w." was added to the database!";
?>

<br>
<br>
<form method=post action=add_word.php>
Enter another word you would like to add to the database: <input type=text name=word size=10>
<input type=submit></form>
</body></html>

