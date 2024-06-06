<?php
  /**
   * Concrete class List Box: Contacts
   */
  namespace views\components\list_boxes;

  include 'app/mvc/views/components/list_boxes/list_box.php';

  /**
   * This RESTful class handles all REST requests for entity Contacts from api
   */
  class ListBoxContacts implements ListBox {

    /**
     * Build header row for HTML table from fields array
     */
    public static function build_header(Array $header_fields): string {
      $header = '<tr>';
      foreach ($header_fields as $field) {
        $header .= '<th>'.$field.'</th>';
      };
      $header .= '</tr>';
      return $header;
    }

    /**
     * Build row for HTML table from object through array of fields
     */
    public static function build_row(
      Array $header_fields,
      Array $object,
    ): string {
      $row = '<tr>';
      foreach($header_fields as $header) {
        $row .= '<td>'.$object[$header].'</td>';
      };
      $row .= '</tr>';
      return $row;
    }

    /**
     * Build HTML table from entity list through array of fields
     */
    public static function build_table(
      Array $header_fields,
      Array $entity_list,
    ): string {
      $table = '<table>';
      $table .= self::build_header($header_fields);
      foreach($entity_list as $object) {
        $table .= self::build_row($header_fields, $object);
      }
      $table .= '</table>';
      return $table;
    }
  }

?>