<?php
define('HOME_URL', 'http://localhost/PHP2020/mvc196/home/index');
class App
{
    protected $controllerName = 'Home';
    protected $method = 'index';
    protected $param;
    protected $input = null;

    public function __construct()
    {
        $this->input = new input;
    }
    public function urlProcess()
    {
        if ($this->input->hasGet('url')) {
            return explode("/", filter_var(trim($_GET['url'], "/")));
        }
    }
    public function startSys()
    {
        $url = $this->input->get('url');
        $array = $this->urlProcess();
        if (!file_exists("./app/controllers/" . ucwords($array[0]) . "Controller" . ".php")) {
            header("Location:" . HOME_URL);
        }
        $this->controllerName = ucwords($array[0]) . "Controller";
        unset($array[0]);
        require_once "./app/controllers/" . "$this->controllerName.php";
        $controller = new $this->controllerName;
        if (isset($array[1])) {
            if (method_exists($controller , $array[1])) {
                $this->method = $array[1];
                unset($array[1]);
            } else {
                header("Location:" . HOME_URL);
            }
        }

        $this->param = $array ? array_values($array) : [];
        call_user_func([$controller, $this->method], $this->param);
    }
}
