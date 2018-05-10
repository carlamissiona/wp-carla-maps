<?php
/*
Plugin Name: AppEleven-NiftyMaps
Plugin URI: http://yourdomain.com/
Description: AXI Wordpress Google Map
Version: 1.0
Author: Carla Missiona
Author URI: http://yourdomain.com
License: GPL

*/



/* * * * * * * * * * * * * * * * * * * * * * * * * * * * ** * * *
=================================================================
This file is part of  AppXI-WP-Googlemap.

AppXI-WP-Googlemap is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Carla-WP-Banner is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Carla-WP-Banner.  If not, see <http://www.gnu.org/licenses/>
================================================================
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
*/

//require_once('../wp-includes/wp-db.php');

class AppXI_WP_NM{
       public $render; 
       public $imglist;
       public $meta;
       public $gen_id;
  
       private $google_key ;
       private $google_revert_key = "AIzaSyCm3l5x-A9gdGfQQFbdlkSotjRM_hnB-lI";
    
    function __construct(){

        $this->__autoload("appxi-wp-template-engine");
        $this->render = new AppxiWpTemplateEngine();

        /* lifecycle */
        register_activation_hook(__FILE__, array( $this , 'activate' ) );
        register_deactivation_hook(__FILE__, array( $this , 'deactivate' ) );
        /* lifecycle */

        /*admin_menu*/
         add_action( 'admin_menu', array( $this, 'add_admin_menu' ));

         add_action( 'admin_action_new_wp_google_map', array( $this, 'add_new_map' ) );

         //add_action( 'wp_head', array( $this, 'photobannerstyle' ) );
      
         wp_enqueue_script( 'uploadjs', plugins_url( 'appxi-niftymaps/res/js/upload.js' ), array(), '1.0.0', true ); 
  
    }   

    function deactivate(){
        global $wpdb; 
        $sql ="DROP DATABASE 'appxi_wp_map'";
        $wpdb->query( $sql );

    }

    function activate(){
      global $wpdb;  
      
      $this->google_key = "AIzaSyCm3l5x-A9gdGfQQFbdlkSotjRM_hnB-lI";
      if($wpdb->get_var("SHOW TABLES LIKE 'appxi_wp_map'") != "appxi_wp_map") {
        $sql = "CREATE TABLE IF NOT EXISTS `appxi_wp_map` (
              `map_id` int(255) NOT NULL AUTO_INCREMENT,
              `name` varchar(64) NOT NULL,
              `desc` varchar(255) NOT NULL, 
              `shortcode` varchar(64) NOT NULL,
              `lat` varchar(255) NOT NULL,
              `lang` varchar(255) NOT NULL,
              `short_id` varchar(64) NOT NULL,
              `css_class` varchar(64) NOT NULL,
              `language` varchar(64) NOT NULL DEFAULT 0,
              `map_type`  varchar(255) NOT NULL,
              `initial_zoom`  varchar(255) NOT NULL,
              `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
              `date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
              PRIMARY KEY (`map_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
        $wpdb->query( $sql );

         
      }

    }
    function __autoload($class_name) {
           require_once $class_name . '.php';
    }   
    function add_admin_menu(){

      add_menu_page( "Nifty Maps", "Nifty Maps","manage_options","appxi-wp-niftymaps dash", array($this , 'add_settings_page' ), plugins_url( 'appxi-niftymaps/res/images/nifty.png' ), "4.44");    
        
      add_submenu_page( NULL,"Add New Google Map", "Submenu" , "manage_options","appxi-wp-niftymaps new", array($this , 'action_new_map' ) );
        
      add_submenu_page( NULL,"Delete All", "Submenu" , "manage_options","appxi-wp-niftymaps delete", array($this , 'action_delete_map' ) );
      
      add_submenu_page( NULL,"Settings", "Submenu" , "manage_options","appxi-wp-niftymaps settings", array($this , 'action_defaults' ) );
    
      add_submenu_page( NULL,"Update Config", "Submenu" , "manage_options","appxi-wp-niftymaps key", array($this , 'action_update_constant' ) );
      
      
    }    
    function action_generate_shortcode($atts){  
      // api key AIzaSyCm3l5x-A9gdGfQQFbdlkSotjRM_hnB-lI
      $row =array();
        
      global $wpdb; 
      $sql ="Select * From `appxi_wp_map` Where short_id ='" .$atts['id']."'";
      $data = $wpdb->get_results( $sql, "ARRAY_A" ) ;
      $data[0]['key'] =  $this->google_key ; 
      return $this->render->display("map" , $data[0] );
       
    }
   
     
    
    function action_update_constant(){
      $data = array("hey" => "1");
      if( isset($_POST['action_revert']) ){
          $this->google_key = $this->google_revert_key;
      }
      else if( isset($_POST['save_key']) ){
        
            $this->google_key = $_POST['save_key']; 
             echo "gdposer" . $this->google_key ;
            return false;  
      }else{
       
        //  page for changing api key constant
        // print $this->render->display("constant_page" , $data );
        print $this->render->display("constant_page" , $data );
        
        
      }
      return false;
     
    }  
  
    function action_delete_map(){
      
      global $wpdb; 
      $sql = "DELETE FROM appxi_wp_map WHERE map_id=". $_POST['map_id'];
      $res = $wpdb->query( $sql );   
      echo $res;
      return false;
      
      
    }  
  
    function action_defaults(){
         $data = array( "no" => "sorry" ) ; 
         print $this->render->display("defaults" , $data );
    }
 

    function action_new_map(){
      
        if( isset($_POST['action_new_googlemap'] ) ){
               // generate id 
               $generated_id = substr(uniqid('', true), -5);
              
               echo "<div class='sc_id'>" .$generated_id."</div>"; 
            
               if( is_null($_POST['name']) || $_POST['desc'] === NULL || $_POST['lat'] =="" || $_POST['lang'] ==""){
                 echo "Empty Fields validation";
                 return false ;
                 
               }
                  
                // store to database 
                global $wpdb;
                
                echo "  aas : " . $is_widget;  
                if( $_POST['type'] == "road" ||  $_POST['type'] == "Road"  ){
                    $map_type = "Road";     

                }else{
                    $map_type = "Map";
                } 
            
                 
                $data = array(
                    "name" => $_POST['name'] ,   
                    "desc" => $_POST['desc'],  
                    "lat"  => $_POST['lat'] ,
                    "lang" => $_POST['lang'] ,  
                    "css_class" => $_POST['class'],
                    "map_type" => $_POST['type'],
                    "language" => $_POST['locale'],
                    "initial_zoom" => $_POST['zoom'], 
                    "short_id" => $generated_id,
                    "shortcode" => "[axm id='".$generated_id."']"
                );   
               
      
               $res = $wpdb->insert( "appxi_wp_map", $data, array( '%s','%s','%s','%s','%s','%s','%s','%s','%s','%s' ) ) ;
  
               if( $res == true ||  $res == 1 ){                 
                  echo "<div class='draft_db'>" . $res ."</div>";
   
               }else{
                  while( $res != 1 ){
                    echo  $wpdb->insert( "appxi_wp_map", $data, array( '%s', '%s','%s','%s','%s','%s' ));
                  }
               }    
                  
             
              echo "<use-code>".$generated_id."</use-code>";
             
             
        }else{
            echo "Insufficient permission";
        }
    }

  
 
    function add_settings_page(){  

       /* get photobanner from database */
        global $wpdb; 
        $sql ="Select * From `appxi_wp_map`"; 
        
    
        $data = array(  
            "date" => "date now" ,
            "author" => "Carla" ,
            "maps" => $wpdb->get_results( $sql, "ARRAY_A" )  
        );
        
        
        wp_enqueue_script('accordion');
        if(function_exists( 'wp_enqueue_media' )){
            wp_enqueue_media();
        }else{
            wp_enqueue_style('thickbox');
            wp_enqueue_script('media-upload');
            wp_enqueue_script('thickbox');
        }
              
        print $this->render->display("plugin_settings_page" , $data );
    }
  
}
$instance = new AppXI_WP_NM();


if ( shortcode_exists( "axm" ) ) {
    
}else{
    add_shortcode( "axm",  array( $instance, "action_generate_shortcode" ) );
} 

 

