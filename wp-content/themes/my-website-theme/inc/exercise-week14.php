<?php


/*
 * creating an endpoint and route
 * 1. make a function to specify what we want to return
 * 2. follow wordpress rules to specify a ROUTE to take to access the function from (1), using register_rest_route
 * 3. add the function from (2) to a hook when we initialize the wordpress api.
 *
 * NOTES:
 *  you can easily test this by visiting the combined namespace+route from step (2) in the url, eg: /wp-json/hello-world/v1 -> this will return all routes available
 *
 */

function getEndpointPhrase(){
	/*
	 * the data to return to the endpoint
	 */
	//todo  code
	$val = "Hello World, this is the WordPress REST API";
	return $val;
}
function getEndpointPhrase2(){
	/*
	 * the data to return to the endpoint
	 */
	//todo  code
	$val = "exercise in week14 says hi :)";
	return $val;
}

function registerEndpoint(){
	// (1) unique namespace,
	// (2) route,
	// (3) array to describe what happens when the url is visited
	// https://developer.wordpress.org/reference/functions/register_rest_route/
	// this endpoint GET requests something.
	register_rest_route( // map a route to an endpoint
		'hello-world/v1', // namespace - allows us to group routes.
		'phrase', // resource path -
		array(
			// array of options - specify what methods the endpoint can use and
			// what callback should happen when the endpoint is matched
			'methods' => WP_REST_Server::READABLE, // this constant changes readable endpoints to work as intended.
			'callback' => 'getEndpointPhrase'
		)
	);
	register_rest_route( // map a route to an endpoint
		'hello-world/v1', // namespace - allows us to group routes.
		'phrase2', // resource path -
		array(
			// array of options - specify what methods the endpoint can use and
			// what callback should happen when the endpoint is matched
			'methods' => WP_REST_Server::READABLE, // this constant changes readable endpoints to work as intended.
			'callback' => 'getEndpointPhrase2'
		)
	);
}

add_action('rest_api_init', 'registerEndpoint');


