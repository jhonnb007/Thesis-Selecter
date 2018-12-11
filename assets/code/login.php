<?php
	include_once 'include/db_functions.php';
	session_start();

	if (empty($_POST['email'])) {
		$_SESSION['empty_email_msg'] = "Ingrese su correo electrónico";
		header("Location: index.php");
	} else if (empty($_POST['password'])) {
		$_SESSION['empty_pass_msg'] = "Ingrese su contraseña";
		header("Location: index.php");
	} else {
		$email = $_POST['email'];
		$password = $_POST['password'];
		$researcher = login($email, $password);

		if ($researcher != false) {
			$_SESSION['researcher'] = $researcher;
			header("Location: home.php");
		} else {
			$_SESSION['error'] = "Correo electrónico o contraseña incorrectos";
			header("Location: index.php");
		}
	}
?>