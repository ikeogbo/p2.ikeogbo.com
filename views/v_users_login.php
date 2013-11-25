<form name="" method='POST' action='/users/p_login'onsubmit="return validateForm();">

    Email<br>
    <input type='text' name='email'>
	

    <br><br>

    Password<br>
    <input type='password' name='password'>

    <br><br>

	    <?php if(isset($error)): ?>
        <div class='error'>
            <b>Login failed. Please double check your email and password.</b>
        </div>
        <br/>
    <?php endif; ?>

	
    <input type='submit' value='Log in'>

</form>