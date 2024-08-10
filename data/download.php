<?php
   header('Content-type: application/json; charset=utf-8"');

   require_once './function/function_query.php';
   require_once './function/function_foreach.php';
   require_once '../config/config_global.php';
   require_once '../config/modules/module_download_config.php';

   
   if ($Anti_switch){
      exit(http_response_code(503));
   }
   
   exit(download(getTypeForeach(array_keys($download_array))));


   function download($tmp){

      global $App_Website;
      global $download_array;

      return(header("Location: ".$App_Website."/static/file/".$download_array[$tmp]));
   }
?>