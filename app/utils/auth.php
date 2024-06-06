<?php
  /**
   * Auth utils
   */
  namespace utils\auth;

  use config\config as config;

  /**
   * Generate access key encripted
   *
   * Create an access key, encripting by md5
   */
  function generate_access_key($token): string {
    $text_to_hash = $token . config\ConfigService::get_access_key();
    return md5($text_to_hash);
  }

?>