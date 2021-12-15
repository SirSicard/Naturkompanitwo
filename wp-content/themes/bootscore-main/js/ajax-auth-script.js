jQuery(document).ready(function ($) {
    // Display form from link inside a popup
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
          appId      : '{app-id}',
          cookie     : true,                     // Enable cookies to allow the server to access the session.
          xfbml      : true,                     // Parse social plugins on this webpage.
          version    : '{api-version}'           // Use this Graph API version for this call.
        });


        FB.getLoginStatus(function(response) {   // Called after the JS SDK has been initialized.
          statusChangeCallback(response);        // Returns the login status.
        });
      };

      function testAPI() {                      // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
        console.log('Welcome!  Fetching your information.... ');
        FB.api('/me', {fields: 'name, email'}, function(response) {
        //   console.log('Successful login for: ' + response.name);
        //   console.log(response);
        //   document.getElementById('status').innerHTML =
        //     'Thanks for logging in, ' + response.name + '!';
        userEmail = response.email;
        userName = response.name;
        accessToken = response.accessToken;
        security = $('form#login #security').val();
        const fbUser = {
            email: userEmail,
            name: userName,
            auth_token: accessToken,
            security: security,
        };
        // Prepare form before submit
        console.log("Logged in user object: " + fbUser.name);
        // $('form#login #username').val(fbUser.email);

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajax_auth_object.ajaxurl,
            data: {
                'action': 'ajax_fb_login', // calls wp_ajax_nopriv_ajaxlogin
                'email': fbUser.email,
                'auth_token': fbUser.accessToken,
                'security': fbUser.security,
            },
            success: function(data) {
                // $('p.status').show().text(data.message);
                console.log(data);
                if (data.loggedin == true){
                    document.location.href = ajax_fb_auth_object.redirecturl;
                }
            },
            // error: function (xhr, ajaxOptions, thrownError) {
            //     // console.log(xhr.status);
            //     // console.log(thrownError.message);
            //     console.log(thrownError);
            //     console.log(xhr);
            //     console.log("error");

            //     $('p.status', this).show().text(xhr.message);
            // },
        });
        });
        console.log('after response');

      }

    $('#fb_login').on('click', function(e) {
        FB.login(function(response)  {
            if (response.status === 'connected') {
                console.log('success');
            }   else    {
                console.log('something went wrong');
            }
        }, {scope: 'public_profile, email'});
        e.preventDefault();
    });


      /* END of Facebook login */
      // end offacebook
 
	// Close popup
    $(document).on('click', '.login_overlay, .close', function () {
		$('form#login, form#register').fadeOut(500, function () {
            $('.login_overlay').remove();
        });
        return false;
    });
 
    // Show the login/signup popup on click
    $('#show_login, #show_signup').on('click', function (e) {
        $('body').prepend('<div class="login_overlay"></div>');
        if ($(this).attr('id') == 'show_login') 
          $('form#login').fadeIn(500);
        else 
			$('form#register').fadeIn(500);
        e.preventDefault();
    });
 
	// Perform AJAX login/register on form submit
	$('form#login, form#register').on('submit', function (e) {
        if (!$(this).valid()) return false;
        $('p.status', this).show().text(ajax_auth_object.loadingmessage);
		action = 'ajaxlogin';
		username = 	$('form#login #username').val();
		password = $('form#login #password').val();
		email = '';
		security = $('form#login #security').val();
		if ($(this).attr('id') == 'register') {
			action = 'ajaxregister';
			username = $('#signonname').val();
			password = $('#signonpassword').val();
        	email = $('#email').val();
        	security = $('#signonsecurity').val();	
		}  
		ctrl = $(this);
		$.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajax_auth_object.ajaxurl,
            data: {
                'action': action,
                'username': username,
                'password': password,
				  'email': email,
                'security': security
            },
            success: function (data) {
				$('p.status', ctrl).text(data.message);
				if (data.loggedin == true) {
                    document.location.href = ajax_auth_object.redirecturl;
                }
            }
        });
        e.preventDefault();
    });
	
	// Client side form validation
   if (jQuery("#register").length) 
		jQuery("#register").validate(
		{ 
			rules:{
			password2:{ equalTo:'#signonpassword' 
			}	
		}}
		);
    else if (jQuery("#login").length) 
		jQuery("#login").validate();
});

// window.fbAsyncInit = function() {
//     FB.init({
//       appId      : '519677222339502',
//       cookie     : true,                     // Enable cookies to allow the server to access the session.
//       xfbml      : true,                     // Parse social plugins on this webpage.
//       version    : 'v12.0'           // Use this Graph API version for this call.
//     });
  
//     FB.getLoginStatus(function(response) {   // Called after the JS SDK has been initialized.
//       statusChangeCallback(response);        // Returns the login status.
//     });
//   };