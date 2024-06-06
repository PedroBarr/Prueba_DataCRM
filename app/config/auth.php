<?php
  /**
   * Auth services
   */
  namespace config\auth;

  use utils\api as http_client;
  use utils\auth;

  /**
   * Singleton class AuthService
   *
   * Create a single instance for AuthService
   * Encapsulate the auth services for request
   */
  class AuthService {

    private static $auth_service_instance; // singleton instance

    // Due test requirements, auth service only save the session name, not
    //  expiration date or server date
    private $session_name;

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
     * Get token request params
     *
     * Single responsability method that return required request params to
     *  get the token from api
     */
    private function get_token_params(): Array {
      return array(
        "operation" => "getchallenge",
        "username" => "prueba"
      );
    }

    /**
     * Get token from api
     */
    private function get_token(): string {
      // Get result from api
      $result_api_token = http_client\api_get(
        $this->get_token_params() // params
      );

      if (isset($result_api_token["token"]))
        return $result_api_token["token"]; // Get token from result

      return ''; // No token got
    }

    /**
     * Get generated access key encripted
     */
    private function get_generate_key(): string {
      $access_key = \utils\auth\generate_access_key(
        $this->get_token() // token from api
      );

      return $access_key;
    }

    /**
     * Get login request payload
     *
     * Single responsability method that return required request payload to
     *  do the login from api
     */
    private function get_login_payload(): Array {
      return array(
        "operation" => "login",
        "username" => "prueba",
        "accessKey" => $this->get_generate_key(),
      );
    }

    /**
     * Get login request headers
     *
     * Single responsability method that return required request headers to
     *  do the login from api
     */
    private function get_login_headers(): Array {
      return array(
        "Content-Type" => "application/x-www-form-urlencoded",
      );
    }

    /**
     * Do login from api
     */
    private function do_login(): string {
      // Get result from api
      $result_api_login = http_client\api_post(
        $this->get_login_payload(), // payload
        $this->get_login_headers(), // header
      );

      // Get session name from result
      if (isset($result_api_login["sessionName"]))
        return $result_api_login["sessionName"];

      return ''; // No token got
    }

    /**
     * Get session name
     *
     * If session name is unset, then do login and set the session name
     * Due test requirements:
     *  - no expired time is validate
     *  - no do_login == '' is validate
     */
    public function get_session_name(): string {
      if (!isset($this->session_name))
        $this->session_name = $this->do_login();

      return $this->session_name;
    }

  }

?>