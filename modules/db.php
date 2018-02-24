<?php

class db {
	
	private $con;
	private $n_posts;
	
	function __construct( ){
		$this -> con = mysqli_connect( 'localhost', 'root', 'root', 'ciblog2' );
		mysqli_set_charset ( $this-> con , 'UTF-8' );
	}
	
	public function home_sql( ){
		return mysqli_query( $this -> con, "select * from posts order by id desc limit 2" );
	}
	
	public function post_sql( $id ){
		$id = (int) mysqli_real_escape_string( $this -> con, $id );
		return mysqli_query( $this -> con, "select * from posts where id = $id" );
	}

	public function page_sql( $page ){
		$sql = mysqli_query( $this -> con, "select count(*) from posts" );
		$this -> n_posts = mysqli_fetch_row( $sql )[0];

		$page = (int) mysqli_real_escape_string( $this -> con, $page );
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

		return mysqli_query( $this -> con, "select * from posts order by id desc limit $start, $limit" );
	}
	
	public function search_sql( $title ){
		$title = mysqli_real_escape_string( $this -> con, $title );
		return mysqli_query( $this->con, "select * from posts where title like '%$title%'");
	}
	
	public function register( $login, $password, $email ){
		$login = mysqli_real_escape_string( $this -> con, $login );
		$email = mysqli_real_escape_string( $this -> con, $email );
		$password = mysqli_real_escape_string( $this -> con, $password );
		return mysqli_query( $this -> con, "insert into users(user_name,email,password,zipcode,name)  values('$login','$email','$password','','' )");
	}
	
	public function isRegistered( $login ){
		$login = mysqli_real_escape_string( $this->con, $login );
		$sql = mysqli_query( $this -> con, "select * from users where user_name = '$login' " );
		if ( mysqli_num_rows($sql) == 0 ){
			return false;
		}
		else {
			return true;
		}
	}
	
}

?>