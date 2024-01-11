<?php
namespace App\Test;
class Test

{
    protected $config;

    public function __construct($config)
    {
        $this->config = config();
    }

    public function foo(): string
    {
        return 'bar';
    }
}