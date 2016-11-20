<?php



if (!(isset($_POST['numer']) and isset($_POST['cash']))){
	header("location: http://" . $_SERVER['HTTP_HOST'] . "/Krypto/Form.html");
}




$NUM = (string)$_POST['numer'];
$CASH = (string)$_POST['cash'];

$Tekst = <<<EOT
<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="utf-8"/>
</head>
<body>
<span>Potwierdź dane</span><br>
<span>Numer Konta: {{NUMER}}</span><br>
<span>Kwota: {{CASH}}</span><br>
<form id="myForm" action="Send.php" method="post">
{{ENTITY1}}
{{ENTITY2}}
<input type="submit"  class="button" value="Wyślij przelew"><br>
</form>
</body>
</html>
EOT;

$S = (string) str_replace("{{NUMER}}", $NUM,  $Tekst);
$S = (string) str_replace("{{ENTITY1}}", "<input id=\"n\" type=\"hidden\" name=\"numer\" value=\"" . $NUM . "\">",  $S);
$S = (string) str_replace("{{ENTITY2}}", "<input id=\"c\" type=\"hidden\" name=\"cash\" value=\"" . $CASH . "\">",  $S);
$S = (string) str_replace("{{CASH}}", $CASH,  $S);

echo($S);

	
?>