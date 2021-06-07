<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
        protected $fillable = ['name', 'description'];

        public function search($filters)
        {
            $result = $this->where('name', 'LIKE', "%{$filters}%")->paginate();

            return $result;


        }

        /**
         * Get Profiles
         */

        public function permissions()
        {
            return $this->belongsToMany(Permission::class);
        }

        /**
         * Get Plans
         */

        public function plans()
        {
            return $this->belongsToMany(Plan::class);
        }

        /**
         * Permission not linked with profile
         */
        public function permissionAvaliable($filter = null)
        {
            $permissions = Permission::whereNotIn('id' , function($query){
                                $query->select('permission_profile.permission_id');
                                $query->from('permission_profile');
                                $query->whereRaw("permission_profile.profile_id={$this->id}");
                            })->where(function ( $queryFilter) use ($filter){
                                if($filter)
                                       $queryFilter->where('permissions.name', 'LIKE', "%{$filter}%");
                            })
                            ->paginate();


                            return $permissions;


        }
}
