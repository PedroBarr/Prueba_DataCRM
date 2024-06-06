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
  function init_http_client(
    Array $params = array(),
  ) {
    $curl = curl_init();
    $baseurl = config\ConfigService::get_api_url();
    $query_params = http_build_query($params);

    curl_setopt_array($curl, array(
      CURLOPT_URL => $baseurl.'?'.$query_params,
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
   *
   * Params: query params for the request
   * Headers: headers required for the request
   */
  function api_get(
    Array $params = array(),
    Array $headers = array()
  ): Array {
    $curl = init_http_client($params);

    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');

    $response = curl_exec($curl);
    $response_json = format_response($response);
    $response_result = get_result($response_json);

    curl_close($curl);
    return $response_result;
  }

  /**
   * Do post request to api
   *
   * Payload: data or body for the request
   * Headers: headers required for the request
   * Params: query params for the request
   */
  function api_post(
    Array $payload = array(),
    Array $headers = array(),
    Array $params = array(),
  ): Array {
    $curl = init_http_client($params);

    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($curl);
    $response_json = format_response($response);
    $response_result = get_result($response_json);

    curl_close($curl);
    return $response_result;
  }

  /**
   * Format response from string to array
   *
   * Due the test requirements, no exceptions is catched
   */
  function format_response(string $response_string): Array {
    return json_decode($response_string, true);
  }

  /**
   * Get result from response
   *
   * Due the DataCRM api response format, this method check if status is
   *  success and then return the result
   * Due the test requirements, otherwise it return an empty Array, without
   *  catch any exception
   */
  function get_result($response_json): Array {
    if (isset($response_json["success"]) && $response_json["success"])
      return $response_json["result"];

    return Array();
  }

?>