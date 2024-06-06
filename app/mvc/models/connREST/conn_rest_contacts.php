<?php
  /**
   * Concrete class Conection RESTful: Contacts
   */
  namespace models\conn_rest;

  include 'app/mvc/models/connREST/conn_rest.php';

  use utils\api as http_client;
  use config\auth\AuthService as Auth;

  /**
   * This RESTful class handles all REST requests for entity Contacts from api
   */
  class ConectionRestfulContacts extends ConectionRestful {

    protected $entity_name = 'Contacts';

    /**
     * Get list query
     *
     * Single responsability method that return the query to get the list
     *  of contacts
     */
    protected function get_list_query(): string {
      return "select * from $this->entity_name;";
    }

    /**
     * Get list request params
     *
     * Single responsability method that return required request params to
     *  get the list of contacts from api
     */
    protected function get_list_params(): Array {
      return array(
        "operation" => "query",
        "sessionName" => Auth::get_instance()->get_session_name(),
        "query" => $this->get_list_query(),
      );
    }

    /**
     * Get list request headers
     *
     * Single responsability method that return required request headers to
     *  get the list of contacts from api
     */
    protected function get_list_headers(): Array {
      return array();
    }

    /**
     * Get list from api
     */
    public function get_list(): Array {
      $result_list = http_client\api_get(
        $this->get_list_params() // params
      );

      return $result_list;
    }

  }

?>