
 <div class="map_container <?php echo $name; ?>"> 
    <h4 class="map_title"> <?php echo $name ; ?> </h4> 
    <div id="map" style="position:relative;min-height:400px;width:auto;height:auto;"> </div>
    <p class="map_desc"> <?php echo $desc; ?> </p>
    <script>
      var map;
      function initMap(){
          var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: <?php echo $lat ; ?>, lng: <?php echo $lang ; ?> },
            zoom: <?php echo $initial_zoom ; ?>,
            mapTypeId: '<?php echo $map_type; ?>'
          });  

          var marker = new google.maps.Marker({
            position: {lat: <?php echo $lat ; ?>, lng: <?php echo $lang ; ?> } ,
            map: map,
            title: "<?php echo $name; ?>"
          });
         marker.setMap(map);
      }
                          
      //jQuery("#map").attr("style" , "height:auto;width:400px;");                            
    </script>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCm3l5x-A9gdGfQQFbdlkSotjRM_hnB-lI&callback=initMap&language=<?php echo $language ; ?>">
</script>
</div>
