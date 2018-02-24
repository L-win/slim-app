<?php

class validation extends \Slim\Flash\Messages{
	
	protected $valid;
	
	function __construct( ){
		parent::__construct( );
		$this->valid = array( );
	}
	
	public function login( $login ){
		if ( strlen( $login ) < 5 ) {
			$this -> addMessage( 'login', 'Login is too short. It must be more than 5 cahracters.' );
			array_push($this -> valid, false);
		}
	}
	public function password( $password = 0, $password2 = 0 ){
		if ( strlen ( $password ) < 8 ){
			$this -> addMessage( 'password', 'Password is too short. It must be more than 8 cahracters.' );
			array_push($this -> valid,false);
		}
		if ( $password !== $password2 ){
			$this -> addMessage( 'password', 'Passwords do not match.' );
			array_push($this -> valid,false);
		}		
	}
	public function email( $email ){
		if ( empty( $email ) ){
			$this -> addMessage( 'email', 'Email field is empty.' );
			array_push($this -> valid,false);
		}
	}
	public function isValid( ){
		if ( !in_array( false, $this -> valid ) ){
			return true;
		}
		else{
			return false;
		}
	}
	
}