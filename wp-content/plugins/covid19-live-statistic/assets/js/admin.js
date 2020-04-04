(function ($) {
	"use strict";

	$(document).ready(function () {
		mmscovidlive_admin.ready();
	});

	$(window).load(function () {
		mmscovidlive_admin.load();
	});

	var mmscovidlive_admin = window.$mmscovidlive_admin = {

		/**
		 * Call functions when document ready
		 */
		ready: function () {
			this.select_site();
		},

		/**
		 * Call functions when window load.
		 */
		load: function () {

		},

		// CUSTOM FUNCTION IN BELOW

		select_site: function () {
			$('select[name=covid_countries]').on('change', function (e) {
				var shortcode = '';
				var shortcodeBegin = '[mmscovidlive';
				var shortcodeEnd = ']';
				var countryName = $(this).val();

				shortcode = shortcodeBegin;
				if (countryName) {
					shortcode += ' country="'+countryName+'"';
				}
				shortcode += shortcodeEnd;
				$('#covid_shortcode').html(shortcode);
			});
		},

	};

})(jQuery);