<?php


namespace Lipeng93\Authority;
use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'name', 'show_name'
    ];

    /**
     * @return mixed
     */
    public function permissions()
    {
        return $this->belongsToMany(PermissionModel::class,'role_has_permissions','role_id','permission_id')->withTimestamps();
    }
}