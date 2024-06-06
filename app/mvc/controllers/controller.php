<?php
  /**
   * Abstract class Controller
   */
  namespace controllers;

  include_once('app/mvc/models/connREST/conn_rest.php');
  include_once('app/mvc/views/components/list_boxes/list_box.php');

  /**
   * This abstract class declared abstract methods required to control the
   *  entities from api and show them
   */
  abstract class Controller {

    protected $orm;
    protected $list_component;

    protected abstract function get_headers_fields(): Array;
    public abstract function get_list(): Array;
    public abstract function get_list_as_view(): string;

  }

?>
