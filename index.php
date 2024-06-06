<?php
  // Includes config, utils and controllers namespaces
  // CONFIG
  include_once("app/config/config.php");
  include_once("app/config/auth.php");

  // UTILS
  include_once("app/utils/api.php");
  include_once("app/utils/auth.php");

  // CONTROLLERS
  include_once('app/mvc/controllers/selector.php');
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
      // Due to the test requirements, not complex router is implemented
      include "app/mvc/views/pages/contacts.php"
    ?>
  </body>
</html>