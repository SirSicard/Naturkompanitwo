<form id="login" class="ajax-auth" action="login" method="post">
	<h1><?php _e('Logga in', 'bootscore')?></h1>
	<p class="status"></p>
	<?php wp_nonce_field('ajax-login-nonce', 'security'); ?>
	<label for="username"><?php _e('Användarnamn','bootscore') ?></label>
	<input id="username" type="text" class="required w-100" name="username">
	<label for="password"><?php _e('Lösenord', 'bootscore')?></label>
	<input id="password" type="password" class="required w-100" name="password">
	<a class="text-link w-100" href="<?php echo wp_lostpassword_url(); ?>">
	<?php _e('Glömt ditt lösenord?','booscore') ?>
	</a>
	<input class="submit_button w-100 btn btn-dark my-3" type="submit" value="<?php _e('Logga in','bootscore')?>"></input>

	<h3><?php _e('Ny användare?', 'bootscore') ?>
		<a id="pop_signup" href=""><?php _e('Skapa ett konto', 'bootscore') ?></a>
	</h3>
	<hr />

	<div class="fb-login-button btn w-100" data-width="" data-size="large" data-button-type="continue_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="true">
	</div>

	<a class="close" href=""><i class="fas fa-window-close fa-lg"></i></a>
</form>

<form id="register" class="ajax-auth" action="register" method="post">

	<h3> <?php _e('Har du redan ett konto?','bootscore') ?> 
		<a id="pop_login" href=""><?php _e('Logga in', 'bootscore') ?></a>
	</h3>

	<hr />

	<h1> <?php _e('Bli Medlem','bootscore')?> </h1>
	<p class="status"></p>
	<?php wp_nonce_field('ajax-register-nonce', 'signonsecurity'); ?>
	<label for="signonname"><?php _e('Användarnamn','bootscore')?></label>
		<input id="signonname" type="text" name="signonname" class="required w-100">
	<label for="email"><?php _e('Email','bootscore') ?></label>
		<input id="email" type="text" class="required email w-100" name="email">
	<label for="signonpassword"><?php _e('Lösenord','bootscore')?></label>
		<input id="signonpassword" type="password" class="required w-100" name="signonpassword">
	<label for="password2"><?php _e('Bekräfta Lösenord','bootscore') ?></label>
		<input type="password" id="password2" class="required w-100" name="password2">
	<input class="submit_button btn btn-dark w-100 my-3" type="submit" value="<?php _e('Bli medlem','bootscore')?>"></input>

	<div class="fb-login-button btn w-100" data-width="" data-size="large" data-button-type="continue_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="true">
	</div>

	<a class="close" href="">
		<i class="fas fa-window-close fa-lg"></i>
	</a>
</form>