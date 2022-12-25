<?php

class input
{
    public function hasGet($name)
    {
        return isset($_GET[$name]);
    }

    public function hasPost($name)
    {
        return isset($_POST[$name]);
    }

    public function get($name)
    {
        if ($this->hasGet($_GET[$name])) {
            return $_GET[$name];
        }
    }
    public function post($name)
    {
        if (isset($_POST[$name])) {
            return $_POST[$name];
        }
    }
}
