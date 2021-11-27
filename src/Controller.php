<?php

namespace SON;

class Controller
{
    protected function loadView($viewName, $viewData = array())
    {        
        extract($viewData);
        require __DIR__ . '/../views/' . $viewName . '.php';
    }

    private function controllerName()
    {
        $class = get_class($this);
        $class = explode('\\', $class);
        $class = array_pop($class);
        $class = preg_replace('/Controller$/', '', $class);
        return strtolower($class);
    }
}
