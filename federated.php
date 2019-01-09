<?php
  require_once("config.php");

  $saml ->requireAuth(); //Se asegura que un usuario est� autenticado. Si no lo est�, inicia el proceso de autenticaci�n.
  //NOTA: El flujo no continuar� hasta que el usuario este correctamente autenticado por el IDP
?>
