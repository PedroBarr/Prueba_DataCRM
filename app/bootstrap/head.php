<!-- Shared project header -->
<?php

  // Build the environment file path
  $root = $_SERVER['DOCUMENT_ROOT'];
  $env_path = "$root/prueba/app/.env";


  // If env file exists, sets title from there
  if (is_file($env_path)) {
    $env = parse_ini_file($env_path);
    $app_name = $env["APP_NAME"];

    echo '<title>'.$app_name.'</title>';
  }

  // Sets the favicon and the main stylesheet
  echo '<link rel="icon" type="image/x-icon" href="./favicon.ico">';
  echo '<link href="./assets/styles/main.css" rel="stylesheet">';

?>