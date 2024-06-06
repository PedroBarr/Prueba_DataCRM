<?php
  /**
   * Config services
   */
  namespace config\config;

  /**
   * ConfigService class
   *
   * Encapsulate the config constants
   */
  class ConfigService {

    protected static $ENV_PATH = "/prueba/app/.env";

    private static $ACCESS_KEY;
    private static $API_URL;

    /**
     * Encapsulate construct and clone methods
     *
     * It prevent to create another any instance
     */
    protected function __construct() { }
    protected function __clone() { }


    // Prevents to create from string unserialization
    public function __wakeup() {
      throw new \Exception("Cannot unserialize config service");
    }


    /**
     * Init config service
     */
    public static function init_config_service() {
      $env_file_path = $_SERVER["DOCUMENT_ROOT"].self::$ENV_PATH;

      // If env file exists, sets constants from there
      if (file_exists($env_file_path)) {
        $env = parse_ini_file($env_file_path);

        self::$ACCESS_KEY = $env["DATACRM_PRUEBA_ACCESS_KEY"];
        self::$API_URL = $env["DATACRM_API_BASE_URL"];
      }
    }

    /**
     * ACCESS_KEY getter
     */
    public static function get_access_key(): string {
      return self::$ACCESS_KEY;
    }

    /**
     * API_URL getter
     */
    public static function get_api_url(): string {
      return self::$API_URL;
    }

  }

  ConfigService::init_config_service();

?>