<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

require 'db.php';

$app = new \Slim\App();
$container = $app -> getContainer();
$container['view'] = new \Slim\Views\PhpRenderer('views/');

$app->get( '/', function (  $request, $response ) {
	$db = new db( );
	$sql = $db -> home_sql( );
	$response = $this -> view -> render( $response, 'header.php' , array( 'title' => 'Home Page' ) ) ;
	$response = $this -> view -> render( $response, 'home.php' , array( 'rows' => $sql ) );
	$response = $this -> view -> render( $response, 'footer.php' );
    // return $response;
});

$app->get( '/post/{id}', function ( $request, $response, array $args ) {
	$id = $args['id'];
	$db = new db( );
	$sql = $db -> post_sql( $id );

	if ( mysqli_num_rows( $sql ) != 0 ){
		$sql = mysqli_fetch_assoc( $sql );	
		$response = $this -> view -> render( $response, 'header.php' , array( 'title' => $sql['title'] ) );
		$response = $this -> view -> render( $response, 'post.php' , array( 'row' => $sql ) );
		$response = $this -> view -> render( $response, 'related.php' , array( 'title' => 'Related posts' ) );
	}else{
		header( "HTTP/1.0 404 Not Found" ); die('404');
	}
});
	
$app->get( '/hello/{name}', function (  $request, $response, array $args) {
    // $name = $args['name'];
});

$app->run();

