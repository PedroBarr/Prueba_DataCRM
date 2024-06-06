<?php
  /**
   * API utils
   */
  namespace utils\api;

  use config\config as config;

  /**
   * Initialize the HTTP client for request
   *
   * Creates and setup a curl instance, then return it
   */
  function init_http_client() {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => config\ConfigService::get_api_url(),
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    ));

    return $curl;
  }

  /**
   * Do get request to api
   */
  function api_get(
    Array $params = Array(),
    Array $headers = Array()
  ): string {
    $curl = init_http_client();

    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $params);

    $response = curl_exec($curl);

    curl_close($curl);
    return $response;
  }

?>