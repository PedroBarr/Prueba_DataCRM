<?php
  /**
   * Abstract class Conection RESTful
   */
  namespace models\conn_rest;

  /**
   * This class declared abstract methods for all RESTful classes
   * Due test requirements, only list methods is declared
   */
  abstract class ConectionRestful {

    protected $entity_name;
    protected $fields;

    /**
     * Fields getter
     */
    public function get_fields(): Array {
      return $this->fields;
    }

    abstract protected function get_list_query(): string;
    abstract protected function get_list_params(): Array;
    abstract protected function get_list_headers(): Array;
    abstract public function get_list(): Array;

  }

?>