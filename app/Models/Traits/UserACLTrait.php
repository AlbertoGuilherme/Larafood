<?php
namespace App\Models\Traits;

    trait UserACLTrait{

        public function permission()
        {

            $tenant = $this->tenant()->first();



        return $tenant->plan;

            // $permissions = [];

            // foreach($plan->profiles as $profile) {
            //     foreach($profile->permissions as $permission) {
            //         array_push($permissions , $permission);
            //     }
            // }
            // return $permissions;
        }
        // public function hasPermission(string $permissionName) : bool
        // {
        //         return in_array($permissionName, $this->permission()) ;
        // }
    }
