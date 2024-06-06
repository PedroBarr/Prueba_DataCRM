<?php
  /**
   * Concrete class Conection RESTful: Contacts
   */
  namespace models\conn_rest;

  include_once('app/mvc/models/connREST/conn_rest.php');

  use utils\api as http_client;
  use config\auth\AuthService as Auth;

  /**
   * This RESTful class handles all REST requests for entity Contacts from api
   */
  class ConectionRestfulContacts extends ConectionRestful {

    protected $entity_name = 'Contacts';

    protected $fields = array(
      'account_id',
      'assigned_user_id',
      'assistant',
      'assistantphone',
      'birthday',
      'cf_1037',
      'cf_1039',
      'check_birthday',
      'contact_id',
      'contact_no',
      'createdby',
      'createdtime',
      'department',
      'description',
      'donotcall',
      'email',
      'emailoptout',
      'fax',
      'filter',
      'firstname',
      'homephone',
      'id',
      'isconvertedfromlead',
      'lastname',
      'leadsource',
      'mailingcity',
      'mailingcountry',
      'mailingpobox',
      'mailingstate',
      'mailingstreet',
      'mailingzip',
      'mobile',
      'modifiedby',
      'modifiedtime',
      'notify_owner',
      'origin_creation_contact_pick',
      'othercity',
      'othercountry',
      'otherphone',
      'otherpobox',
      'otherstate',
      'otherstreet',
      'otherzip',
      'phone',
      'public_url_rd',
      'rdstationid',
      'reference',
      'salutationtype',
      'secondaryemail',
      'social_network_facebook_id',
      'social_network_instagram_id',
      'title',
    );

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