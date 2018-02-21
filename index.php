<?php

require_once 'stuff.php';
require_once 'db.php';

$app -> get( '/', function ( $request, $response ) {
	$db = new db( );
	$sql = $db -> home_sql( );
	$this -> view -> render( $response, 'header.php' , array( 'title' => 'Home Page' ) ) ;
	$this -> view -> render( $response, 'home.php' , array( 'rows' => $sql ) );
	$this -> view -> render( $response, 'footer.php' );
});

$app -> get( '/post/{id}', function ( $request, $response, array $args ) {
	$id = (int) $args['id'];
	$id = filter_var( $id, FILTER_SANITIZE_STRING );
	$db = new db( );
	$sql = $db -> post_sql( $id );
	if ( mysqli_num_rows( $sql ) != 0 ){
		$sql = mysqli_fetch_assoc( $sql );
		$this -> view -> render( $response, 'header.php' , array( 'title' => $sql['title'] ) );
		$this -> view -> render( $response, 'post.php' , array( 'row' => $sql ) );
		$this -> view -> render( $response, 'related.php' , array( 'title' => 'Related posts' ) );
		$this -> view -> render( $response, 'footer.php' );
	}else{
		header( "HTTP/1.0 404 Not Found" ); 
		die( '404' );
	}
});
	
$app -> get('/page/{page}', function ( $request, $response, array $args ) {
	$db = new db( );
	$page = (int) $args['page'];
	$page = filter_var( $page, FILTER_SANITIZE_STRING );
	$sql = $db -> page_sql( $page );
	$this -> view -> render( $response, 'header.php' , array( 'title' => 'Page '.$args['page'] ) );
	$this -> view -> render( $response, 'page.php', array( 'rows' => $sql ) );
	$this -> view -> render( $response, 'footer.php' );	
});

$app -> get('/search', function ( $request, $response ) {
	$db = new db();
	$query =@ $request -> getQueryParams()['query'];
	if ( is_null( $query ) ){
		header( "HTTP/1.0 404 Not Found" ); 
		die( '404' );
	}
	if ( !empty ($query) and isset($query) ){
		$sql = $db -> search_sql( $query );
		$this -> view -> render( $response, 'header.php' , array( 'title' => 'Search' ) );
		$this -> view -> render( $response, 'search.php', array ('rows'=>$sql) );
		$this -> view -> render( $response, 'footer.php' );	
	}else{
		$this -> view -> render( $response, 'header.php' , array( 'title' => 'Search' ) );
		$response->getBody()->write('Search request is empty.');
		$this -> view -> render( $response, 'footer.php' );	
		return $response;
	}
});

$app->run();