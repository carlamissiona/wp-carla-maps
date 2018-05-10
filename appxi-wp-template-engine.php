<?php
/* Template class */
class AppxiWpTemplateEngine{

    function __construct(){

    }

   function display($temp, $param){
       ob_start();
       $temp = "template/".$temp.".php";
       //extract everything in param into the current scope
       extract($param, EXTR_SKIP);
       include($temp);
       ob_end_flush();
    }
   
}
/* Template class */