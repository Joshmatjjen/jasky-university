(function($) {
  /* map initialization */
  $(document).ready(function() {
    if($('.wp-mapbox-gl-js-map').length) {
      var access_token = $('.wp-mapbox-gl-js-map').first().data('token');
      mapboxgl.accessToken = access_token;

      var allMaps = {};
      $('.wp-mapbox-gl-js-map').each(function() {
         var data = $(this).data();
         var mapStyle = {
           'container' : $(this).attr('id'),
           'style' : data.style
         };
         var baseSettings = ['center','zoom','pitch','bearing',];
         baseSettings.forEach(function(setting) {
           if(data[setting]!=='') {
             if(setting==='center') {
               mapStyle[setting] = data[setting].split(',');
             } else {
               mapStyle[setting] = parseFloat(data[setting]);
             }
           }
         });
         var map = new mapboxgl.Map(mapStyle);
         allMaps[$(this).attr('id')] = map;
      });

      $(document).on('click','.wp-mapbox-gl-js-map-menu input',function() {
        allMaps[$(this).data('map-id')].setStyle($(this).attr('id'));
      });

    }
  });
})(jQuery);
