<?php


namespace Lipeng93\Authority;
use Illuminate\Database\Eloquent\Model;

class PermissionModel extends Model
{
    protected $table = 'permissions';

    protected $fillable = [
        'name', 'route_name'
    ];
}