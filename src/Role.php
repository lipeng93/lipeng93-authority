<?php


namespace Lipeng93\Authority;


class Role
{
    /**
     * 创建角色
     * @param string $name
     * @param string $show_name
     * @return mixed
     */
    public function add(string $name,string $show_name)
    {
        return RoleModel::create([
            'name' => $name,
            'show_name' => $show_name
        ]);
    }

    /**
     * 角色权限同步
     * @param RoleModel $role
     * @param array $permission_ids
     * @return mixed
     */
    public function syncPermissions(RoleModel $role,array $permission_ids)
    {
        return $role->permissions()->sync($permission_ids);
    }
}