<?php

class Router extends Singleton
{
    function parse($url)
    {    
        $path = $_REQUEST['route'];
        $reg_paths = App::gi()->config->router; 
        $request = $_REQUEST;
        $request['controller'] = app::gi()->config->default_controller;
        $request['action'] = app::gi()->config->default_action;
        $request['id'] = 0;
        $parts = parse_url($url);
     
        foreach($reg_paths as $regxp=>$keys) { 
            if (preg_match('#'.$regxp.'#Uuis', $path, $res)) {
                $keys = explode('/',$keys);
                $path = explode('/',$path);
                foreach ($keys as $key=>$value) {  
                        $this->$value = $path[$key];
                        $request[$value] = $path[$key];
                    }
                }
            }
        return $request;
    }
}
