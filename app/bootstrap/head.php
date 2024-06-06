<!-- Cabecera compartida del proyecto -->
<?php

  // Construye la ruta del archivo de entorno
  // --
  // Build the environment file path
  $raiz = $_SERVER['DOCUMENT_ROOT'];
  $ruta_env = "$raiz/prueba/app/.env";


  // Si el archivo de entorno existe asigna el titulo de la página de allí
  // --
  // If env file exist, sets title from there
  if (is_file($ruta_env)) {
    $entorno = parse_ini_file($ruta_env);
    $nombre = $entorno["APP_NAME"];

    echo '<title>'.$nombre.'</title>';
  }

  // Asignar el ícono y la hoja de estilos principal
  // --
  // Sets the favicon and the main stylesheet
  echo '<link rel="icon" type="image/x-icon" href="./favicon.ico">';
  echo '<link href="./assets/styles/main.css" rel="stylesheet">';

?>