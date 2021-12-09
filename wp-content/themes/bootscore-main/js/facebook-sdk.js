jQuery(document).ready(function ($) {
	$.ajaxSetup({ cache: true });
	$.getScript('https://connect.facebook.net/en_US/sdk.js', function(){
	  FB.init({
		appId: '448998139906757',
		version: 'v12.0' // or v2.1, v2.2, v2.3, ...
	  });     
	  $('#loginbutton,#feedbutton').removeAttr('disabled');
	  FB.getLoginStatus(updateStatusCallback);
	});
  });

