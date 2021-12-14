<script>

function statusChangeCallback(response) {  // Called with the results from FB.getLoginStatus().
  console.log('statusChangeCallback');
  console.log(response);                   // The current login status of the person.
  if (response.status === 'connected') {   // Logged into your webpage and Facebook.
	testAPI();  
  } else {                                 // Not logged into your webpage or we are unable to tell.
	document.getElementById('status').innerHTML = 'Please log ' +
	  'into this webpage.';
  }
}


function checkLoginState() {               // Called when a person is finished with the Login Button.
  FB.getLoginStatus(function(response) {   // See the onlogin handler
	statusChangeCallback(response);
  });
}


window.fbAsyncInit = function() {
  FB.init({
	appId      : '519677222339502',
	cookie     : true,                     // Enable cookies to allow the server to access the session.
	xfbml      : true,                     // Parse social plugins on this webpage.
	version    : 'v12.0'           // Use this Graph API version for this call.
  });


  FB.getLoginStatus(function(response) {   // Called after the JS SDK has been initialized.
	statusChangeCallback(response);        // Returns the login status.
  });
};

function testAPI() {                      // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
  console.log('Welcome!  Fetching your information.... ');
  FB.api('/me', function(response) {
	console.log('Successful login for: ' + response.name);
	document.getElementById('status').innerHTML =
	  'Thanks for logging in, ' + response.name + '!';
  });
}

</script>
<!-- The JS SDK Login Button -->

<!-- Load the JS SDK asynchronously -->
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>

<form id="login" class="ajax-auth" action="login" method="post">
	<h1>
		<?php _e('Log in', 'bootscore') ?>
	</h1>

	<p class="status"></p>

	<?php wp_nonce_field('ajax-login-nonce', 'security'); ?>

	<label for="username"><?php _e('Username', 'bootscore') ?></label>
	<input id="username" type="text" class="required w-100" name="username">
	<label for="password"><?php _e('Password', 'bootscore') ?></label>
	<input id="password" type="password" class="required w-100" name="password">
	<a class="text-link w-100" href="<?php echo wp_lostpassword_url(); ?>">
		<?php _e('Forgot your password?', 'booscore') ?>
	</a>
	<input class="submit_button w-100 btn btn-dark my-3" type="submit" value="<?php _e('Log in', 'bootscore') ?>"></input>

	<h3> <?php _e('New costumer?', 'bootscore') ?>
		<a id="pop_signup" href=""><?php _e('Create an account', 'bootscore') ?></a>
	</h3>

	<hr />

	<div class="fb-login-button" data-width="" data-size="large" data-button-type="continue_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="false"></div>

	<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
	</fb:login-button>

	<div id="status">
	</div>


	<!-- The JS SDK Login Button -->
	<!-- 
	<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
	</fb:login-button>

	<div id="status">
	</div> -->

	<a class="close" href="">
		<i class="fas fa-window-close fa-lg"></i>
	</a>

</form>

<form id="register" class="ajax-auth" action="register" method="post">

	<h3> <?php _e('Already a member?', 'bootscore') ?>
		<a id="pop_login" href=""><?php _e('Log in', 'bootscore') ?></a>
	</h3>

	<hr />

	<h1> <?php _e('Sign up', 'bootscore') ?> </h1>
	<p class="status"></p>
	<?php wp_nonce_field('ajax-register-nonce', 'signonsecurity'); ?>
	<label for="signonname"><?php _e('Username', 'bootscore') ?></label>
	<input id="signonname" type="text" name="signonname" class="required w-100">
	<label for="email"><?php _e('Email', 'bootscore') ?></label>
	<input id="email" type="text" class="required email w-100" name="email">
	<label for="signonpassword"><?php _e('Password', 'bootscore') ?></label>
	<input id="signonpassword" type="password" class="required w-100" name="signonpassword">
	<label for="password2"><?php _e('Confirm password', 'bootscore') ?></label>
	<input type="password" id="password2" class="required w-100" name="password2">
	<input class="submit_button btn btn-dark w-100 my-3" type="submit" value="<?php _e('Create an account', 'bootscore') ?>"></input>

	<a class="close" href="">
		<i class="fas fa-window-close fa-lg"></i>
	</a>
</form>