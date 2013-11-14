<?php if ($user):?>

Hello <?=$user->first_name;?>
    <?php else:?>
	 <div class='welcome'>
           Welcome to Sources. Please  sign up or Log in<br/>
     </div>
      <?php endif; ?>
	  
	  
	  