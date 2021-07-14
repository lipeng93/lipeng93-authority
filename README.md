## Requirements

- PHP >= 7.0.0
- Laravel >= 5.5.0

## Installation

> This package requires PHP 7+ and Laravel 5.5

First, install laravel 5.5, and make sure that the database connection settings are correct.

```
composer require lipeng93/authority
```

Then run these commands to publish assets and config：

```php
php artisan vendor:publish --provider="Lipeng93\\Authority\\AuthorityServiceProvider"
```

After run command you can find config file in `config/authority.php`, in this file you can change the install directory,db connection or table names.

Set your login user model and primary key , then this model must to extends  Lipeng93\Authority\UserModel

At last run php artisan migrate to finish install.

```
php artisan migrate
```

1. create role

   ```
   Authority::role()->add('admin','超级管理员')
   ```

2. create permission

   ```
   Authority::permission()->add('角色权限列表','role.permissions.index');
   ```

3. role sync permission

   ```
   public function syncPermissions(RoleModel $role)
   {
       return Authority::role()->syncPermissions($role,[1,2,3,4,5,6,7,8,9,10,11,12]);
   }
   ```

4. sync user role

   ```
   public function syncUserRoles(User $user,RoleModel $role)
   {
       return $user->role()->sync([$role->id]);
   }
   ```

5. verify user authority

   ```
   public function verifyUserAuthority(User $user)
   {
       return $user->verifyAuthority('route_name');
   }
   ```

6. users all permission

   ```
   $user->permission();
   ```