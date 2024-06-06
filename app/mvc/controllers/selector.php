<?php
  /**
   * Package Select Controller
   */
  namespace controllers;

  include_once('app/mvc/controllers/controller.php');
  include_once('app/mvc/controllers/controller_contacts.php');

  define("CONTACTS", "ContactsController");

  function select_controller(string $controller_key): Controller {
    switch ($controller_key) {
      case CONTACTS:
        return new ControllerContacts();
      default:
        return new ControllerContacts();
    }
  }
?>
