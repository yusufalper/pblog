<?php

class Bootstrap
{
    private $controller;
    private $action;
    private $request;

    #construct
    public function __construct($request)
    {
        $this->request = $request;
        if ($this->request['controller'] == "") {
            $this->controller = "home";
        } else {
            $this->controller = $this->request['controller'];
        }

        if ($this->request['action'] == "") {
            $this->action = 'index';
        } else {
            $this->action = $this->request['action'];
        }
    }


    public function createController()
    {
        #Checking Class
        if (class_exists($this->controller)) {
            $parents = class_parents($this->controller);

            #Extend Check
            if (in_array("Controller", $parents)) {
                if (method_exists($this->controller, $this->action)) {
                    return new $this->controller($this->action, $this->request);
                } else {
                    //Method Fail
                    echo "<h1>Method does not exits!</h1>";
                    return;
                }
            } else {
                //Base Controller Fail
                echo "<h1>Base Controller not found!</h1>";
                return;
            }
        } else {
            //Controller Class Fail
            echo "<h1>Controller Class does not exits!</h1>";
            return;
        }

    }
}
