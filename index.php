<?php

/**
 * Autoload vendor to use packages.
 */
require_once __DIR__ . '/vendor/autoload.php'; // change path as needed.

// using classes.
require_once __DIR__ . '/classes/class-url.php';
require_once __DIR__ . '/classes/class-extract.php';

$req = new ClassUrl();
$ext = new ClassExtract();

// Sample url to make request.
$result = $req->get_response( 'https://jsonplaceholder.typicode.com/users', $host = 'jsonplaceholder.typicode.com' );

if ( ! empty( $result['success'] ) ) {
	$res = $ext->extract_response( $result['body'] );
	foreach ( $res as $item ) {
		var_dump( $item );
	}
}
