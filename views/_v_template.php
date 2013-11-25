<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	
	<!-- Controller Specific JS/CSS -->
	    <script language="javascript" src="/js/sample-app.js"></script>
		<link rel="stylesheet" type="text/css" href="/css/sample-app.css">
	
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>	
	
    <div id='menu'>
		<a href='/'> <img src="/views/sources.jpg" alt="logo image" class="logo" /></a>



        <!-- Menu for users who are logged in -->
        <?php if($user): ?>
			<a href='/'>Home</a>
            <a href='/users/logout'>Logout</a>
            <a href='/users/profile'>Profile</a>
			<a href='/posts'>Posts</a>
			<a href='/posts/add'>Add Posts</a>
			<a href='/posts/users'>Users</a>
			
        <!-- Menu options for users who are not logged in -->
        <?php else: ?>

			<a href='/'>Home</a>
            <a href='/users/signup'>Sign up</a>
            <a href='/users/login'>Log in</a>

        <?php endif; ?>

    </div>

      <br>
 


     	 <?php if(isset($content)) echo $content; ?>
	 


         <?php if(isset($client_files_body)) echo $client_files_body; ?>

	<!-- ?php if(isset($content)) echo $content; ?> -->
  <p>I added javascript email validator to the forms</p>
</body>
</html>