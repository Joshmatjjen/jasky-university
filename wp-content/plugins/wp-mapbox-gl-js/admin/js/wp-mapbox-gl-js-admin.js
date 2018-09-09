(function( $ ) {
	'use strict';

	$(document).on('click','.wp-mapbox-gl-js-advanced-options-button',function(e) {
		e.preventDefault();
		$('.wp-mapbox-gl-js-advanced-options').slideToggle();
	});

	if(window.location.href.indexOf("wp-mapbox-gl-js-settings") > -1) {

		try {
			var access_token = $('#mapbox_gl_js_access_token').val();
			mapboxgl.accessToken = access_token;
			var map = new mapboxgl.Map({
				style : 'mapbox://styles/mapbox/light-v9',
				container : document.createElement('div')
			});
			$.ajax({
				url : 'https://api.mapbox.com/styles/v1/mapbox/light-v9?access_token='+access_token
			}).done(function(data) {
				$('.dashicons-yes').show();
			}).fail(function(err) {
				$('.dashicons-no').show();
			})
		} catch {
			$('.dashicons-no').show();
		}
		// pk.eyJ1IjoidGVtcHJhbm92YSIsImEiOiJjaWd0c3M2MW4wOHI2dWNrbzZ5dWo1azVjIn0.x5sm8OjRxO9zO_uUmxYEqg

	}

})( jQuery );
