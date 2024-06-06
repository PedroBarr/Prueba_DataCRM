<?php
  /*
   * Abstract class Conection RESTful
   */
  namespace models\conn_rest;

  abstract class ConectionRestful {

    protected $entity_name;

    abstract protected function get_list_query(): string;
    abstract protected function get_list_params(): Array;
    abstract protected function get_list_headers(): Array;
    abstract public function get_list(): Array;
  }

?>