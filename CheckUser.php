<?php
require_once("MyDatabase.php");



if (!(isset($_POST['NICK']) and isset($_POST['pass']))){
	header("location: http://" . $_SERVER['HTTP_HOST'] . "/Krypto/index.html");
}

/*
$db   = myDB();
		$log  = "USER";
		$psw  = password_hash("pass", PASSWORD_DEFAULT);
		$q    = "INSERT INTO login(NICK,PASS) VALUES(?,?)";
		$stmt = $db->prepare($q);
		$stmt-> bind_param("ss", $log, $psw);
		if ($stmt -> execute()){
			//report("INSERT OK");
		} else{
			//report("INSERT BŁAD");
		};
		$db->close();
		$odp['stan'] = "1";
*/

$NICK = (string)$_POST['NICK'];
$PASS = (string)$_POST['pass'];

$odp = array();
$db = myDB();
	$q  = "SELECT PASS FROM login where NICK = \"". $NICK ."\" LIMIT 1";
	$result = $db->query($q) or die($db->error);
	if ($row = $result->fetch_row()){
			$odp['stan'] =  $row[0];
		} else {
			$odp['stan'] =  0;
		}
		$db->close();

if (password_verify($PASS, $odp['stan'])) {
    setcookie('NICK',    $NICK);
		header("location: http://" . $_SERVER['HTTP_HOST'] . "/Krypto/Form.html");
		exit;
} else {
    echo 'Invalid password.';
}



header("location: http://" . $_SERVER['HTTP_HOST'] ."/Krypto/index.html");
	
?>