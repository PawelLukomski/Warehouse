<?php
/**
 * Created by PhpStorm.
 * User: toor
 * Date: 21.08.18
 * Time: 13:02
 */

namespace Manager;


class Request
{
    protected $request;

    public function request()
    {
        return $this->request;
    }
    public function setRequest($request)
    {
        $this->request = $request;
    }
    public function useController()
    {
        $allControllers = scandir(__DIR__."/../Controller/");
        $thisController = $this->request[0]."Controller.php";
        if(in_array($thisController, $allControllers)) {
            $controllerName = "\Controller\\".$this->request[0]."Controller";

            $controller = new $controllerName();
            if(isset($this->request[1]) && $this->request[1] != "") {
                //var_dump($this->request[1]);
                $controllerAction = $this->request[1]."Action";
                    $controller->$controllerAction($this);
            }
            else
                $controller->indexAction($this);
        }
        else
            echo "<div class='error_msg'>Sorry, but the page wasn't found :(</div>";
    }
}