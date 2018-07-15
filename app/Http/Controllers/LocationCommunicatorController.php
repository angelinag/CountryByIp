<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use GuzzleHttp\Client;

class LocationCommunicatorController extends Controller
{
	const URL = 'http://api.geoiplookup.net/?query=';
	
	/**
     * Communicates with the Geo IP location API.
     *
     * @param  Illuminate\Http\Request $request
     * @return Response
     */
	public function indexAction( Request $request )
    {
		// Correct parameter here is $request->ip(), but since it returns the
		// localhost ::1 IP address, I decided to use a dummy IP instead.
		
		$queryUrl = $this->getQueryUrl( '72.229.28.185' );
		$locationParameters = $this->getApiResponseParameters( $queryUrl );
		$country = $locationParameters["countryname"];
        return view( 'welcome', [ 'country' => $country ] );
    }
	
	/**
     * Returns the full query URL
     *
     * @param  string $ip
     * @return string
     */
	public function getQueryUrl( $ip )
	{
		return $this::URL . $ip;
	}
	
	/**
     * Sends HTTP Guzzle request to the IP locator and
	 * returns response body as associative array
     *
     * @param  string $queryUrl
     * @return array
     */
	public function getApiResponseParameters( $queryUrl )
	{
		$client = new Client();
        $response = $client->request( 'GET', $queryUrl );
		$body = $response->getBody();
		$xml = simplexml_load_string( $body );
		
		$params = [];
		foreach( $xml->results->result->children() as $key => $param ) {
			$params[$key] = (string) $param;
		} 
		return $params;
	}
}