<?php

namespace Controller;

use Manager\MainManager;

class Controller extends MainManager
{
    public function render($view, $var)
    {
        //foreach ($var as $key=>$item)
            //var_dump($item);
            //eval("$".$key." = ".$item.";");

        //var_dump($req->request());
        require __DIR__."/../Templates/".$view;
    }

    public function noDoth($array)
    {
        if (($key = array_search(".", $array)) !== false && ($key2 = array_search("..", $array)) !== false) {
            unset($array[$key]);
            unset($array[$key2]);
        }
        return $array;
    }

    function reArrayFiles(&$file_post) {

        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);

        for ($i=0; $i<$file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }

        return $file_ary;
    }




}