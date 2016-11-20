<?php
require_once("MyDatabase.php");

$NICK = $_COOKIE['NICK'];


$Tekst = <<<EOT
<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="utf-8"/>
</head>
<body>
<span>Historia przelewów: </span><br>
<table id="result">
<tr>
<th>Wysyłający</th>
<th>odbiorca</th>
<th>kwota</th>
</tr>
{{ELEM}}
</table>
</body>
</html>
EOT;

$db = myDB();
		$q  = "SELECT ID,NICK,NUMER,VALUE FROM (SELECT ID,NICK,NUMER,VALUE FROM historia WHERE NICK = \"" . $NICK . "\" ORDER BY ID DESC LIMIT 10) sub ORDER BY ID ASC ";
		//report("PYTANIE: " . $q);
		$result = $db -> query($q);
		while ($row = $result->fetch_assoc()) {
			$Tekst = (string) str_replace("{{ELEM}}", "<tr><th>".$row['NICK']."</th><th>".$row['NUMER']."</th><th>".$row['VALUE']."</th></tr>{{ELEM}}",  $Tekst);
		}
		$db->close();


$Tekst = (string) str_replace("{{ELEM}}", "",  $Tekst);


echo($Tekst);

	


?>