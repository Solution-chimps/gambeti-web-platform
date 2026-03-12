<?php
	ob_start();
	session_start();
	$server = $_SERVER['SERVER_NAME']; 
	$endereco = $_SERVER ['REQUEST_URI'];

if ($_SESSION['validacaoad'] != "val-lav-session-pio-pws2016"){
echo "<script>window.location='login.php?erro=2'</script>";
exit;
}

?>

