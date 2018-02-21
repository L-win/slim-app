<?php

class db {
	
	private $db;
	private $n_posts;
	
	function __construct( ){
		$this -> db = mysqli_connect( 'localhost', 'root', 'root', 'ciblog2' );
		mysqli_set_charset ( $this-> db , 'UTF-8' );
	}
	
	public function home_sql( ){
		return mysqli_query( $this -> db, "select * from posts order by id desc limit 2" );
	}
	
	public function post_sql( $id ){
		$id = (int) mysqli_real_escape_string( $this -> db, $id );
		return mysqli_query( $this -> db, "select * from posts where id = $id" );
	}

	public function page_sql( $page ){
		$sql = mysqli_query( $this -> db, "select count(*) from posts" );
		$this -> n_posts = mysqli_fetch_row( $sql )[0];

		$page = (int) mysqli_real_escape_string( $this -> db, $page );
		$limit = 3;
		$pages = array( );
		$starts = array( );
		
		for ( $i = 1; $i <= ceil( $this -> n_posts / $limit ); ++$i ){
			array_push( $pages, $i );
		}
		for ( $i = 0; $i <= $this -> n_posts; $i+=$limit ){
			array_push( $starts, $i );
		}
		
		if ( in_array( $page, $pages ) ) {
			$key = array_search( $page, $pages );
			$start = $starts[$key];
		}
		else{
			$start = 0;
		}

		return mysqli_query( $this -> db, "select * from posts order by id desc limit $start, $limit" );
	}
}

?>