<?php
  /**
   * Concrete class Controller: Contacts
   */
  namespace controllers;

  include_once('app/mvc/controllers/controller.php');
  include_once('app/mvc/models/connREST/conn_rest_contacts.php');
  include_once('app/mvc/views/components/list_boxes/list_box_contacts.php');

  use models\conn_rest\ConectionRestfulContacts as ORM;
  use views\components\list_boxes\ListBoxContacts as ListComponent;

  /**
   * This class controls the contacts model through contacts view
   */
  class ControllerContacts extends Controller {

    protected $orm;
    protected $list_component;

    public function __construct() {
      $this->orm = new ORM();
      $this->list_component = new ListComponent();
    }

    protected function get_headers_fields(): Array {
      return array(
        "id",
        "contact_no",
        'lastname',
        'createdtime',
      );
    }

    public function get_list(): Array {
      return $this->orm->get_list();
    }

    public function get_list_as_view(): string {
      return $this->list_component::build_table(
        $this->get_headers_fields(), // headers
        $this->get_list() // entity_list
      );
    }

  }
?>
