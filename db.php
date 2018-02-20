<?php
class db {
	private $db;
	function __construct( ){
		$this -> db = mysqli_connect( "localhost", "root", "root", "ciblog2" );
		mysqli_set_charset ( $this-> db , 'UTF-8' );
	}
	public function home_sql( ){
		return mysqli_query( $this -> db, "select * from posts order by id desc" );
	}
	public function post_sql( $id ){
		$id = (int) mysqli_real_escape_string( $this -> db, $id );
		return mysqli_query( $this -> db, "select * from posts where id = $id" );
	}
}
?>