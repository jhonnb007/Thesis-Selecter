<?php
   require_once("federated.php"); //Se asegura que el usuario este autenticado
   if($saml->isAuthenticated()){ //Si hay sesi�n iniciada, hacer logout del IDP
		$saml->logout("http://".$_SERVER['SERVER_NAME']."/Thesis-Selecter/");
  }else{
		header("Location:".$SP_URL);
  }

?>
