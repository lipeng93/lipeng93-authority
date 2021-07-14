<?php


namespace Lipeng93\Authority;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $fillable = [
        'role_id', 'user_id'
    ];
}