<!DOCTYPE html>
<html>
  <head>
    <?php
      // Se incluye la cabecera compartida para el proyecto
      // --
      // Includes the shared project header
      include "app/bootstrap/head.php";
    ?>
  </head>

  <body>
    <?php
      // No se implementó un sistema de enrutado debido al alcance de la prueba
      // --
      // Due to the test requirements, not router was implemented
      include "app/mvc/views/pages/contactos.php"
    ?>
  </body>
</html>