<?php

namespace App\Models;
use App\User;
use App\Models\Plan;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = ['id', 'NIF', 'name', 'url','email', 'logo', 'active', 'subscription', 'expires_at', 'subscription_id','subscription_active', 'subscription_suspended'];

        public function users()
        {
            return $this->hasMany(User::class);
        }

        public function plan()
        {
            return $this->belongsTo(Plan::class );
        }

}
