<?php
  /**
   * Auth services
   */
  namespace config\auth;

  use config\config as config;
  use utils\api as http_client;

  /**
   * Singleton class AuthService
   *
   * Create a single instance for AuthService
   * Encapsulate the auth services for request
   */
  class AuthService {

    private static $auth_service_instance; // singleton instance

    /**
     * Encapsulate construct and clone methods
     *
     * It prevent to create another instance
     */
    protected function __construct() { }
    protected function __clone() { }


    // Prevents to create from string unserialization
    public function __wakeup() {
      throw new \Exception("Cannot unserialize auth service");
    }


    /**
     * Get singleton instance
     */
    public static function get_instance(): AuthService {

      if (!isset(self::$auth_service_instance)) {
        self::$auth_service_instance = new static();
      }

      return self::$auth_service_instance;
    }

    /**
     * Get token from backend
     */
    private function get_token() {
      config\ConfigService::get_access_key();
      echo http_client\api_get();
    }

    private function get_generate_key(): string {
    }

    public function a() {
      $this->get_token();
    }

  }

?>