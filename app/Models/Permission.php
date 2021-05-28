<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name', 'description'];
 /**
         * Get Profiles
         */
    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }

    public function search($filters)
    {
        $result = $this->where('name', 'LIKE', "%{$filters}%")->paginate();

        return $result;


    }



}
