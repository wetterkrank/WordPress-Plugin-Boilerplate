(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

        // Making a request to the prices API for each widget element in the page
        $(document).ready(function() {
          $(".fpmtag").each(function() {
            var element = this;
            
            var query = {
              "origin": element.getAttribute("data-from"),
              "destination": element.getAttribute("data-to"),
              "latest": element.getAttribute("data-latest"),
              "earliest": element.getAttribute("data-earliest"),
              "minDays": element.getAttribute("data-min_days"),
              "maxDays": element.getAttribute("data-max_days"),
              "currency": element.getAttribute("data-currency"),
              "locale": element.getAttribute("data-locale"),
              "deeplink": "search"
            };

            // todo: different widget types
            $.ajax({
              url: 'https://escapefromberl.in:8080/prices', // todo: endpoint in config; authorization
              type: "POST",
              data: JSON.stringify(query),
              contentType: "application/json; charset=utf-8",
              success: function(data) {
                $(element).html("<a href=\"" + data.deeplink + "\"" + " target=\"_blank\" rel=\"nofollow\">" + data.currency + " " + data.price + "</a>"); // todo: micro/mini/full output, localization; error handling
              },
              error: function(xhr) {
                // do nothing or $(element).html("click to check");
              }
            });

          });
        });

})( jQuery );
