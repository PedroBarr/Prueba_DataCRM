<?php
  /**
   * Interface List Box
   */
  namespace views\components\list_boxes;

  /**
   * This interface show the main methods needed to render a list box
   */
  interface ListBox {

    public static function build_header(Array $header_fields): string;

    public static function build_row(
      Array $header_fields,
      Array $object,
    ): string;

    public static function build_table(
      Array $header_fields,
      Array $entity_list,
    ): string;

  }

?>