<?php
  // Includes config and utils namespaces
  include "app/config/config.php";
  include "app/config/auth.php";

  include "app/utils/api.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <?php
      // Includes the shared project header
      include "app/bootstrap/head.php";
    ?>

  </head>

  <body>
    <?php
      // Due to the test requirements, not router was implemented
      include "app/mvc/views/pages/contactos.php"
    ?>
  </body>
</html>