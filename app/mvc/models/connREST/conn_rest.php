<!-- Clase abstracta conexión RESTful -->
<?php
  namespace mvc.models.conn_rest;

  abstract class ConexionRest {

    public $nombre_entidad;

    abstract public function Lista(): string;
  }

?>