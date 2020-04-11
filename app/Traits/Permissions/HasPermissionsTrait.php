<?php
namespace App\Traits\Permissions;

use App\Permission;
use App\Role;

trait HasPermissionsTrait {

    public function givePermissionsTo(... $permissions): HasPermissionsTrait{
        $permissions = $this->getAllPermissions($permissions);
        if($permissions === null) {
            return $this;
        }
        $this->permissions()->saveMany($permissions);
        return $this;
    }

    public function withdrawPermissionsTo( ... $permissions ): HasPermissionsTrait{
        $permissions = $this->getAllPermissions($permissions);
        $this->permissions()->detach($permissions);
        return $this;
    }
    public function refreshPermissions( ... $permissions ): HasPermissionsTrait{
        $this->permissions()->detach();
        return $this->givePermissionsTo($permissions);
    }
    public function hasPermissionTo($permission): bool{
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }
    public function hasPermissionThroughRole($permission): bool{
        foreach ($permission->roles as $role){
            if($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }
    public function hasRole( ... $roles ): bool{
        foreach ($roles as $role) {
            if ($this->roles->contains('slug', $role)) {
                return true;
            }
        }
        return false;
    }
    public function roles() {
        return $this->belongsToMany(Role::class,'users_roles');
    }
    public function permissions() {
        return $this->belongsToMany(Permission::class,'users_permissions');
    }
    protected function hasPermission($permission): bool{
        return (bool) $this->permissions->where('slug', $permission->slug)->count();
    }
    protected function getAllPermissions(array $permissions) {
        return Permission::whereIn('slug',$permissions)->get();
    }
}
