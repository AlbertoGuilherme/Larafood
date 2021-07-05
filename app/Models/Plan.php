<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable  = ['name', 'url', 'price', 'description'];

    public function details()
    {
        return $this->hasMany(DetailPlan::class);
    }

    public function profiles()
    {
        return $this->belongsToMany(Profile::class, 'plan_profile');
    }

    public function tenants()
    {
        return $this->hasMany(Tenant::class);
    }

    public function search($filter)
    {
        $result = $this->where('name', 'LIKE', "%{$filter}%")
                                ->orWhere('description', 'LIKE', "%{$filter}%")
                                ->paginate();

                                return $result;
    }
    /**
     *  Profiles not linked with this plan
     */
    public function profileAvaliable($filter = null)
        {
            $profiles = Profile::whereNotIn('id' , function($query){
                                $query->select('plan_profile.profile_id');
                                $query->from('plan_profile');
                                $query->whereRaw("plan_profile.plan_id={$this->id}");
                            })->where(function ( $queryFilter) use ($filter){
                                if($filter)
                                       $queryFilter->where('profiles.name', 'LIKE', "%{$filter}%");
                            })
                            ->paginate();


                            return $profiles;


        }
}
