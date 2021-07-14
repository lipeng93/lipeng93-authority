<?php


namespace Lipeng93\Authority;


class Authority
{
    private $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public static function role()
    {
        return new Role;
    }

    public static function permission()
    {
        return new Permission;
    }
}