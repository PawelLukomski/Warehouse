<?php
/**
 * Created by PhpStorm.
 * User: toor
 * Date: 21.08.18
 * Time: 12:52
 */

namespace Manager;


class MainManager
{
    public function param()
    {
        $file = fopen(__DIR__."/../../config/params.qcl", "r");


        $params = [];
        $underParams = [];
        while ($line = fgets($file))
        {

            if($line != "\n") {
                if ($line[0] != "    " && $line[0] != " " && $line != "") {
                    $underParams = [];
                    $key = trim($line);
                } else {
                        $exp = explode(":", trim($line));
                        $value = preg_replace("/\"/", "", $exp[1]);
                        $underParams[$exp[0]] = $value;

                }

                $params[$key] = $underParams;
            }
        }
        return $params;
    }

    public function getSqlConfig()
    {
        $file = $this->param()['mainParams']['sqlFile'];

        $getFile = file_get_contents(__DIR__."/../../config/".$file);

        return json_decode($getFile, 1);
    }
}