<html>
<body>
<?php

include("connect.php");
if ($_POST['word'] != null)
{
	addWord($_POST['word']);
}


function addWord($newWord)
{
	include("connect.php");
	$w = strtoupper($newWord);
	$query= "INSERT INTO words(spelling) VALUES('".$w."');";
	mysql_query($query,$db);
	echo "The word ".$w." was added to the database!";
}

$data = mysql_query("SELECT * FROM words;", $db);
Print "<table border cellpadding=3>";
Print "<tr>";
Print "<th>Word ID</th>";
Print "<th>Spelling</th>";
while ($info = mysql_fetch_array($data))
{
Print "<tr>";
Print "<td>".$info['wordID']."</td> ";
Print "<td>".$info['spelling']."</td> ";
}
Print "</table>";
?>
 


<form action=view_db.php method=post>
<input type=text name="word" />
<input type=submit value="Add Word!" />
</body>
</html>
