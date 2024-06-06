<?php
  // Includes config, utils and controllers namespaces
  include "app/config/config.php";
  include "app/config/auth.php";

  include "app/utils/api.php";
  include "app/utils/auth.php";

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
      // Due to the test requirements, not router is implemented
      include "app/mvc/views/pages/contacts.php"
    ?>
  </body>
</html>