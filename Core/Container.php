<?php

namespace Core;

class Container
{

    protected $bindings = [];

    public function bind($key, $resolver)
    {
        $this->bindings[$key] = $resolver;
    }

    public function resolve($key)
    {
        return !array_key_exists($key, $this->bindings) ? throw new Exception("no matching found for {$key}") : call_user_func($this->bindings[$key]);
    }


}