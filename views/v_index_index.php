<?php if ($user):?>
	<pre>
	<?php
	print_r($user);
	?>
	</pre>
Hello <?=$user->first_name;?>
    <?php else:?>
Welcome to Sources. Please  sign up or Log in
      <?php endif; ?>
	  