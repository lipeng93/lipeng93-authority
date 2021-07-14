<?php


namespace Lipeng93\Authority;
use Illuminate\Foundation\Auth\User;
use \Exception;

class UserModel extends User
{
    protected $table = 'users';

    public function role()
    {
        return $this->belongsToMany(RoleModel::class, UserRole::class, 'user_id', 'role_id')->withTimestamps();
    }

    /**
     * 用户所有权限
     * @return mixed
     * @throws Exception
     */
    public function permission()
    {
        $user_role = $this->role->first();
        if (!$user_role){
            throw new Exception('用户角色不存在');
        }
        $user_permission = $user_role->permissions();
        if (!$user_permission->count()){
            throw new Exception('用户角色未分配权限');
        }
        return $user_permission->get();
    }

    /**
     * 验证用户是否拥有某个权限
     * @param $route_name
     * @return bool
     * @throws Exception
     */
    public function verifyAuthority($route_name)
    {
        $user_role = $this->role->first();
        if (!$user_role){
            throw new Exception('用户角色不存在');
        }
        $user_permission = $user_role->permissions();
        if (!$user_permission->count()){
            throw new Exception('用户角色未分配权限');
        }
        $route_names = $this->role->first()->permissions()->pluck('route_name')->toArray();
        if(!in_array($route_name,$route_names)){
            return false;
        }
        return true;
    }
}