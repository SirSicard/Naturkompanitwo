<form id="login" class="ajax-auth" action="login" method="post">
	<h3><?php _e('Ny användare?', 'bootscore') ?> <a id="pop_signup" href=""><?php _e('Skapa ett Konto', 'bootscore') ?></a></h3>
	<hr />
	<h1><?php _e('Logga in', 'bootscore')?></h1>
	<p class="status"></p>
	<?php wp_nonce_field('ajax-login-nonce', 'security'); ?>
	<label for="username"><?php _e('Användarnamn','bootscore') ?></label>
	<input id="username" type="text" class="required" name="username">
	<label for="password"><?php _e('Lösenord', 'bootscore')?></label>
	<input id="password" type="password" class="required" name="password">
	<a class="text-link" href="<?php
		echo wp_lostpassword_url(); ?>"><?php _e('Glömt ditt lösenord?','booscore') ?></a>
	<input class="submit_button" type="submit" value="LOGIN">

	<div class="fb-login-button w-100" data-width="" data-size="large" data-button-type="continue_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="true"></div>

	<a class="close" href=""><i class="fas fa-window-close"></i></a>
</form>

<form id="register" class="ajax-auth" action="register" method="post">
	<h3><?php _e('Har du redan ett konto?','bootscore') ?> <a id="pop_login" href=""><?php _e('Logga in', 'bootscore') ?></a></h3>
	<hr />
	<h1><?php _e('Bli Medlem','bootscore')?></h1>
	<p class="status"></p>
	<?php wp_nonce_field('ajax-register-nonce', 'signonsecurity'); ?>
	<label for="signonname"><?php _e('Användarnamn','bootscore')?></label>
	<input id="signonname" type="text" name="signonname" class="required">
	<label for="email"><?php _e('Email','bootscore') ?></label>
	<input id="email" type="text" class="required email" name="email">
	<label for="signonpassword"><?php _e('Lösenord','bootscore')?></label>
	<input id="signonpassword" type="password" class="required" name="signonpassword">
	<label for="password2"><?php _e('Bekräfta Lösenord','bootscore') ?></label>
	<input type="password" id="password2" class="required" name="password2">
	<input class="submit_button" type="submit" value="SIGNUP">
	<a class="close" href=""><i class="fas fa-window-close"></i></a>
</form>