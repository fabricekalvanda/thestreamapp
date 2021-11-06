<?php

$API_KEY = 'api_key=96d57acf388a355fe46885c51489fe78';
$BASE_URL = 'https://api.themoviedb.org/3/';
$API_URL = $BASE_URL . 'discover/movie?sort_by=popularity.desc&' . $API_KEY;


function callAPI( $API_URL ) {
  //'API_URL: '.$API_URL;
  $movies = curl_init();
  curl_setopt_array( $movies, array(
    CURLOPT_URL => $API_URL,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HEADER => false,
    CURLOPT_FAILONERROR => true,
    CURLOPT_HTTPHEADER => array(
      'Accept: application/json',
      'Content-type: application/json'
    ),
  ));

  $response = curl_exec( $movies );
  if ( $response === false ) {
    die( curl_error( $movies ) );
  }
  $responsedata = json_decode( $response, true );
  curl_close( $movies );
  return $responsedata;

}


?>