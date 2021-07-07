<?php
namespace App\Models\Traits;

    trait UserACLTrait{

        public function permission()
        {

            $tenant = $this->tenant()->first();
            $plan =   $tenant->plan;




            $permissions = [];

            foreach($plan->profiles as $profile) {
                foreach($profile->permissions as $permission) {
                    array_push($permissions , $permission->name);
                }
            }
            return $permissions;
        }
        public function hasPermission(string $permissionName) : bool
        {
                return in_array($permissionName, $this->permission()) ;
        }

        public function isAdmin() : bool
        {
            return in_array($this->email, config('acl.admins'));
        }
        public function isTenant() : bool
        {
            return !in_array($this->email, config('acl.admins'));
        }

    }
