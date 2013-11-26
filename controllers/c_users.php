<?php
class users_controller extends base_controller {

    public function __construct() {
        parent::__construct();
    } 

    public function index() {
        echo "This is the index page";
    }

    public function signup() {
	#setup the view
       $this->template->content = View::instance('v_users_signup');
	   
	   #Render the view
	   echo $this->template;
    }
	
public function p_signup() {

    # More data we want stored with the user
    $_POST['created']  = Time::now();
    $_POST['modified'] = Time::now();

    # Encrypt the password  
    $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);            

    # Create an encrypted token via their email address and a random string
    $_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string()); 

    # Insert this user into the database 
    $user_id = DB::instance(DB_NAME)->insert("users", $_POST);

   
    # send them to the login page
    Router::redirect("/users/login");

}

    public function login() {
	$this->template->content = View::instance('v_users_login');
	   echo $this->template;
    }


	public function p_login(){
	
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
		
 
		
		$q = 
		    'SELECT token
			FROM users
			WHERE email = "'.$_POST['email'].'"
			AND password = "'.$_POST['password'].'"';
			//echo $q;
		
      $token = DB::instance(DB_NAME)->select_field($q);	
	  
	  #success
	  if($token) {
	  setcookie('token', $token, strtotime('+1 year'),'/');
	//  echo "Thanks for loging in";
	    Router::redirect("/");
	  }
	  #Fail
	  else {
	  echo "Login failed. Please make sure you entered the correct username and password";
	  }
    # Send them back to the main index.

	}
	
	
public function logout() {

    # Generate and save a new token for next login
    $new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());

    # Create the data array we'll use with the update method
    # In this case, we're only updating one field, so our array only has one entry
    $data = Array("token" => $new_token);

    # Do the update
    DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");

    # Delete their token cookie by setting it to a date in the past - effectively logging them out
    setcookie("token", "", strtotime('-1 year'), '/');

    # Send them back to the main index.
    Router::redirect("/");

}

    public function profile($user_name = NULL) {
	if(!$this->user) {
	die('Members Only. <a href="users/login">Login</a>' );
	}
	#set up view
	$this->template->content = View::instance('v_users_profile');
	$this->template->title = "Profile";
	
	#Load client files
	//
	$client_files_head = Array(
	'/css/profile.css',
	);
	
	$this->template->client_files_head = Utils::load_client_files($client_files_head);
	
	$client_files_head = Array(
    '/js/profile.js'
	);
	
	$this->template->client_files_head = Utils::load_client_files($client_files_head);
	
	#pass the data to View
	$this->template->content->user_name = $user_name;
	#Display view
	echo $this->template;
       //$view = View::instance('v_users_profile');
		//$view->user_name = $user_name;
        //echo $view;
	}

} # end of the class