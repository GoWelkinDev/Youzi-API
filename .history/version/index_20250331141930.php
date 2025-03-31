<?php
   header('Content-type: application/json; charset=utf-8"');

   require_once '../static/function/function_json.php';
   require_once '../static/function/function_query.php';
   require_once '../static/function/function_foreach.php';

   require_once '../config/config_global.php';
   require_once '../config/modules/module_query_config.php';

   if ($Anti_switch || $Query_action == false){
      http_response_code(503);
      exit(formatJson('{"code":503,"reason":"The system is undergoing maintenance."}'));
   }

   exit(query(getTypeForeach(array_keys($QueryType_array))));

   function query($tmp){

      global $QueryType_array;

      $json_arr = array("version" => $QueryType_array[$tmp]);

      exit(formatJson($json_arr));

   }
?>
