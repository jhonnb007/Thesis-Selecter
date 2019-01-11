<?php
   require_once("federated.php"); //Se asegura que el usuario este autenticado
   $atributos = $saml->getAttributes();
   global $correo; //Obtiene sus atributos
   $correo = $atributos["uCorreo"][0];
   $name = $atributos["givenName"][0];
   $ap = $atributos["sn"][0];
   if($saml->isAuthenticated()){ //Si hay sesi�n iniciada, hacer logout del IDP
		$saml->logout("http://".$_SERVER['SERVER_NAME']."/Thesis-Selecter/request.php?mail=$correo&name=$name&ap=$ap");  	// Se puede pasar como parametro a donde redireccionar tras el logout
  }else{
		header("Location:".$SP_URL);
  }
?>
