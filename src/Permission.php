<?php


namespace Lipeng93\Authority;


class Permission
{
    /**
     * εε»Ίζι
     * @param string $name
     * @param string $route_name
     * @return mixed
     */
    public function add(string $name,string $route_name)
    {
        return PermissionModel::create([
            'name' => $name,
            'route_name' => $route_name
        ]);
    }
}