<?php
require_once("MyDatabase.php");



if (!(isset($_POST['numer']) and isset($_POST['cash']))){
	header("location: http://" . $_SERVER['HTTP_HOST'] . "/Krypto/index.html");
}



$numer = (string)$_POST['numer'];
$cash = (string)$_POST['cash'];

$odp = array();
$db = myDB();

$db   = myDB();
 		$NICK = $_COOKIE['NICK'];
		$q    = "INSERT INTO historia(NICK,NUMER,VALUE) VALUES(?,?,?)";
		$stmt = $db->prepare($q);
		$stmt-> bind_param("sss", $NICK, $numer, $cash);
		if ($stmt -> execute()){
			//report("INSERT OK");
			header("location: http://" . $_SERVER['HTTP_HOST'] ."/Krypto/History.php");
		} else{
			//report("INSERT BŁAD");
			$db->close();
		$odp['stan'] = "1";
			header("location: http://" . $_SERVER['HTTP_HOST'] ."/Krypto/index.html");
		};
		




	
?>