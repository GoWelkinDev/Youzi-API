<?php
   header('Content-type: application/json; charset=utf-8"');

   require_once '../static/function/function_json.php';
   require_once '../static/function/function_query.php';
   require_once '../static/function/function_foreach.php';

   require_once '../config/config_global.php';
   require_once '../config/modules/module_download_config.php';

   if ($Anti_switch || $Download_action == false){
      http_response_code(503);
      exit(formatJson('{"code":503,"reason":"The system is undergoing maintenance."}'));
   }

   exit(download(getTypeForeach(array_keys($download_array))));


   function download($tmp){

      global $download_array;

      $file_path = "../static/file/".$download_array[$tmp];

      // 确保文件存在
      if (file_exists($file_path)) {

         $filename = basename($file_path);
         $file_size = filesize($file_path);

         header("Content-Type: application/octet-stream");
         header("Content-Transfer-Encoding: Binary");
         header("Content-Disposition: attachment; filename=\"$filename\"");
         header("Content-Length: $file_size");

         //清除可能存在的旧缓存
         if (ob_get_level()) {
            ob_end_clean();
         }

         readfile($file_path);
         exit;
      }
      http_response_code(404);
      exit(formatJson('{"code":404,"reason":"The requested file does not exist."}'));
   }
?>
