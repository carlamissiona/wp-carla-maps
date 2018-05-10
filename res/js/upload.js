jQuery(document).ready(function($){
    var tgm_media_frame;
    window.img =""; window.alt="";
    $('#upload_image_button').click(function() {

      if ( tgm_media_frame ) {
        tgm_media_frame.open();
        return;
      }

      tgm_media_frame = wp.media.frames.tgm_media_frame = wp.media({
        multiple: true,
        library: {
          type: 'image'
        },   
      });

      tgm_media_frame.on('select', function(){
        var selection = tgm_media_frame.state().get('selection');
        selection.map( function( attachment ) {
              attachment = attachment.toJSON();
              console.log(attachment);
             // $("#banner-desc").val( JSON.stringify(attachment) );
              $(".preview, .publish").attr("style","float:left; display:block;");
              $(".shortcode").attr("style","display:block;");
              var imgbx = '<img src='+ attachment.url +' alt='+ attachment.alt +' class="img-thb" id="carla-wp-banner-img-'+attachment.title+'">';
              $(".banner-img-preview").append(imgbx);
              window.img += attachment.url +",";
              window.meta += attachment.alt +",";
              // Do something with attachment.id and/or attachment.url here
        });

           console.log( window.img + " End");
        
      });

      tgm_media_frame.open();
      
      

    }); // end click
  
  $( "#delete_map" ).change(function () {
     var url = window.location.href.substring(0,  window.location.href.lastIndexOf("+") );
     for (var index = 0; index < $(".map_record input:checked").length; index++) {
         $.post(
          url+"+delete",
          {
            action_delete_googlemap: "token",
            map_id : $(".map_record input:checked").eq(index).val()
          },  
          function(data){
             console.log(data);    
          });
       
       
        
    }
    setTimeout( function(){ window.location.reload(true) } , 2000);    
  });
     
     $("#save-key").click(function(){  
        alert("hhhhhhgdposer");
        var url = window.location.href.substring(0,window.location.href.lastIndexOf("+") );
        $.post(
            url+"+key",
            {
              action_token: "token",
              save_key : $("#gmap-key").val()             
            },  
            function(data){
              console.log(data);
            }
         );    
    
    });
   
    $("#revert-key").click(function(){  

        var url = window.location.href.substring(0,window.location.href.lastIndexOf("+") );
        $.post(
            url+"+key",
            {
              action_token: "token",
              action_revert : 1                 
            },  
            function(data){
              console.log(data);
            }
         );    
    
    });
    $(".button#prevw-map").click(function(){ 
      
      var url = window.location.href.substring(0,  window.location.href.lastIndexOf("+") );
      $.post(
          url+"+new",
          {
            action_new_googlemap: "token",
            name : $("#gmap-name").val(),  
            desc :  $("#gmap-desc").val(),
            lat :  $("#gmap-lat").val(),
            lang :  $("#gmap-lang").val(),
            zoom :  $("#gmap-zoom").val(),
            class :  $("#gmap-class").val(),
            locale :  $("#gmap-locale").val(),
            type :  $("#gmap-type").val()
          },  
          function(data){
//             console.log(" Whhut name-" +  $("#gmap-name").val() +" desc-"+  $("#gmap-desc").val() +"  lat-" +  $("#gmap-lat").val() + " lang-" +  $("#gmap-lang").val() +
//             " zoom-"+$("#gmap-zoom").val() +" class-" +  $("#gmap-class").val() + " style-" +    $(".gmap_style").val() + "  type-"+   $(".gmap_type").val() );
//             console.log(" Howhowhow ");
//             console.log(data);
            
             setTimeout( function(){ window.location.reload(true) } , 2000);
          });
 
        
    });
//     $(".button.publis").click(function(){
//       console.log( "name " +$("#banner-name").val()  +  $("#banner-desc").val() +  window.img + window.alt + "before publish");
//       var url = window.location.href.substring(0,  window.location.href.lastIndexOf("+") );
//         $.post(
//           url+"+new",
//           { action_new_banner : "token" ,
//             name : $("#banner-name").val(),  
//             desc :  $("#banner-desc").val(),
//             img : window.img ,
//             meta : window.alt  
            
//           },
//           function(data){
            
//             var uc =data.substring( data.lastIndexOf("<use-code>")+10 , data.lastIndexOf("</use-code>"));
//             $(".use-code").text("[axi id='"+uc+"' ]");
//             $(".code-container").show();
//             setTimeout( function(){ window.location.reload(true) } , 4000);
         

//           });
 
//     });  
    $("#cb-select-all-1").on('change', 'input[type=checkbox]', function(e) {
          alert("Are you sure you want to delete all banners");
          var url = window.location.href.substring(0,  window.location.href.lastIndexOf("+") );
          $.post(
            url+"+delete+all",
            { 
              action_delete_all : "token" ,
            },
            function(data){
              
                setTimeout( function(){ window.location.reload(true) } , 2000);

          });  

    });
  
      $("#cb-select-all-1").live("click", function(){
          alert("Are you sure you want to delete all banners");
          var url = window.location.href.substring(0,  window.location.href.lastIndexOf("+") );
          $.post(
            url+"+delete+all",
            { 
              action_delete_all : "token" ,
            },
            function(data){
              
                setTimeout( function(){ window.location.reload(true) } , 4000);

          });
      });
        $(".accordion-section-title.hndle").live("click", function(){
            if( $(".control-section.accordion-section.open").is(":visible") == 0 ){
                $(".shortcode").hide();
                $(".banner-img-preview").empty();
                $(".preview, .publish").removeAttr("style");    
            }

        });

    
     
});
