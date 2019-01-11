<?php
    $saml_lib_path = '/SAML/lib/_autoload.php';  //La ruta donde se encuentra la librer�a principal de simplesamlphp
    require_once($saml_lib_path);
    $SP_URL = 'http://'.$_SERVER['SERVER_NAME'].":8081/cenedic4";  // url de nuestro servidor.
    $SP_ORIGEN= 'cenedic4';   // Fuente de autenticaci�n definida en el authsources del SP
    $saml = new SimpleSAML_Auth_Simple($SP_ORIGEN);   // Se crea la instancia del saml, pasando como parametro la fuente de autenticaci�n.
?>
