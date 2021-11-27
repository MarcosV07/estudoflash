<?php

namespace SON;

class Router implements \ArrayAccess
{
    private $itens = [];

    public function __construct(array $itens = [])
    {
        $this->itens = $itens;
    }

    public function offsetExists($offset)
    {
        return isset($this->itens[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->itens[$offset];
    }

    public function offsetSet($offset, $value)
    {
        if (is_callable($value)){
            $value = $value($this);
        }
        
        $this->itens[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->itens[$offset]);
    }

    public function handler()
    {
        $path = $_SERVER['PATH_INFO'] ?? '/';
        if (strlen($path) > 1) {
            $path = rtrim($path, '/');
        }

        if ($this->offsetExists($path)) {
            return $this->offsetGet($path);
        }

        http_response_code(404);
        echo '<h1>Página inexistente</h1>';
        exit;
    }
}
