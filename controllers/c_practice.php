<?php

class practice_controller extends base_controller {
	
	public function test_db() {
		
		# Our SQL command
		/*$q = "INSERT INTO users SET 
		    first_name = 'Cheryl', 
		    last_name = 'Hislop',
		    email = 'cheryl@gmail.com'";
		
		# Run the command
		echo DB::instance(DB_NAME)->query($q);
		
		$new_user = Array(
		'first_name' => 'Cheryl',
		'last_name' => 'Hislop',
		'email' => 'cheryl@gmail.com',
		);
		DB::instance(DB_NAME)->insert('users',$new_user);*/
		
		$q = 'SELECT email
		FROM users WHERE 
		first_name = "Cheryl"';
		echo DB::instance(DB_NAME)->select_field($q);
	}
	
} 