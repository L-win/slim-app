<?php

require_once 'stuff.php';
require_once 'db.php';

$app -> get( '/', function (  $request, $response ) {
	$db = new db( );
	$sql = $db -> home_sql( );
	$this -> view -> render( $response, 'header.php' , array( 'title' => 'Home Page' ) ) ;
	$this -> view -> render( $response, 'home.php' , array( 'rows' => $sql ) );
	$this -> view -> render( $response, 'footer.php' );
    // return $response;
});

$app -> get( '/post/{id}', function ( $request, $response, array $args ) {
	$id = $args['id'];
	$db = new db( );
	$sql = $db -> post_sql( $id );
	if ( mysqli_num_rows( $sql ) != 0 ){
		$sql = mysqli_fetch_assoc( $sql );
		$this -> view -> render( $response, 'header.php' , array( 'title' => $sql['title'] ) );
		$this -> view -> render( $response, 'post.php' , array( 'row' => $sql ) );
		$this -> view -> render( $response, 'related.php' , array( 'title' => 'Related posts' ) );
		$this -> view -> render( $response, 'footer.php' );
	}else{
		header( "HTTP/1.0 404 Not Found" ); die( '404' );
	}
});
	
$app -> get('/page/{page}', function ( $request, $response, array $args ) {
	$db = new db();
	$sql = $db -> page_sql( $args['page'] );
	$this -> view -> render( $response, 'header.php' , array( 'title' => 'Page '.$args['page'] ) );
	$this -> view -> render( $response, 'page.php', array( 'rows' => $sql ) );
	$this -> view -> render( $response, 'footer.php' );	
});

$app -> get('/search/{query}', function ( $rquest, $response, array $args ) {
	
});

$app->run();