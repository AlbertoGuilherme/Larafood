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
}
