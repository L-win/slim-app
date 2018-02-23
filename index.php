<?php

require_once 'stuff.php';
require_once 'db.php';
require_once 'cache.php';

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
	$cache  = new Cache( );
	
	if ( $cache -> isCached( $id ) ){
		echo '! CACHED !';
		$sql = $cache -> retrieve( $id );
		$this -> view -> render( $response, 'header.php' , array( 'title' => $sql['title'] ) );
		$this -> view -> render( $response, 'post.php' , array( 'row' => $sql ) );
		$this -> view -> render( $response, 'related.php' , array( 'title' => 'Related posts' ) );
		$this -> view -> render( $response, 'footer.php' );
	}
	else {
		$db = new db( );
		$sql = $db -> post_sql( $id );
		if ( mysqli_num_rows( $sql ) != 0 ){
			$sql = mysqli_fetch_assoc( $sql );
			$cache -> store ( $id, $sql );
			$this -> view -> render( $response, 'header.php' , array( 'title' => $sql['title'] ) );
			$this -> view -> render( $response, 'post.php' , array( 'row' => $sql ) );
			$this -> view -> render( $response, 'related.php' , array( 'title' => 'Related posts' ) );
			$this -> view -> render( $response, 'footer.php' );
		}
		else{
			$this -> view -> render( $response, '404.php' );
			return $response -> withStatus(404);	
		}
	}
});
	
$app -> get('/page/{page}', function ( $request, $response, array $args ) {
	$db = new db( );
	$page = $args['page'];
	$page = filter_var( $page, FILTER_SANITIZE_STRING );
	$sql = $db -> page_sql( $page );
	$this -> view -> render( $response, 'header.php' , array( 'title' => 'Page '.$page ) );
	$this -> view -> render( $response, 'page.php', array( 'rows' => $sql ) );
	$this -> view -> render( $response, 'footer.php' );	
});

$app -> get('/search', function ( $request, $response ) {
	$db = new db( );
	$query = @$request -> getQueryParams()['query'];
	$query =  htmlentities( $query );
	if ( is_null( $query ) ){
		$this -> view -> render( $response, '404.php' );
		return $response -> withStatus(404);
	}
	if ( !empty( $query ) and isset( $query ) ){
		$sql = $db -> search_sql( $query );
		$this -> view -> render( $response, 'header.php' , array( 'title' => 'Search' ) );
		if ( mysqli_num_rows( $sql ) > 0 ){
			$this -> view -> render( $response, 'search.php', array ( 'rows' => $sql ) );
		}else{
			$response -> getBody( ) -> write( 'Nothing found.' );
		}
		$this -> view -> render( $response, 'footer.php' );	
	}else{
		$this -> view -> render( $response, 'header.php' , array( 'title' => 'Search' ) );
		$response -> getBody( ) -> write( 'Search request is empty.' );
		$this -> view -> render( $response, 'footer.php' );	
		return $response;
	}
});

$app->run();