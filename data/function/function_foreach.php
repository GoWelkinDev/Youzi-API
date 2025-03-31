<?php
    function getTypeForeach($type_array){
        #获取到url
        $url = queryUrl();
        $array = parseUrl($url);
        #检查链接是否携带了参数
        if(key_exists('query',$array)){
            #将链接携带的参数提取出来
            parse_str($array['query'],$query_arr);
            if(key_exists('type',$query_arr)){
                #遍历匹配
                foreach ($type_array as $tmp){
                    if($query_arr['type'] == $tmp){
                        return $tmp;
                    }
                }
                http_response_code(403);
                exit(formatJson('{"code":403,"reason":"Invalid parameter."}')); 
            }
        }
        http_response_code(403);
        exit(formatJson('{"code":403,"reason":"The \'type\' parameter is not specified."}'));
    }
?>