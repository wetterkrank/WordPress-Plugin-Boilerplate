(function( $ ) {
  'use strict';
  
  // Makes a request to the price API for each .flymon-tag element in the page
  $(document).ready(function() {
    
    // TODO: widget sizes, localization; error handling
    function flymonWidget(element, response) {
      const resJSON = JSON.parse(response);
      const success = resJSON.success;
      if (success) {
        const data = resJSON.data;
        element.html(
          "<a href=\"" + data.deeplink + "\"" + " target=\"_blank\" rel=\"nofollow\">" + data.currency + " " + data.price + "</a>"
        );
      } else {
        flymonError(element, resJSON);
      }
    };

    function flymonError(element, resJSON) {
      const data = resJSON.data;
      element.html(
        "???"
      );
    };

    const loaderOn = (element) => { element.addClass('flymon-tag--loading'); }
    const loaderOff = (element) => { element.removeClass('flymon-tag--loading'); }

    $(".flymon-tag").each(function() {
      const element = $(this);
      const data = element.data();
      const query = {'action': 'price'};
      for (const [key, value] of Object.entries(data)) {
        query[key] = value;
      }
      loaderOn(element);
      $.post({
        url: FLYMON.ajaxUrl, 
        data: query, 
        success: function(response) { flymonWidget(element, response) },
        error: function(response) { flymonError(element, response.responseJSON) },
        complete: function() { loaderOff(element) }
      });
      
    });
  });
})( jQuery );
