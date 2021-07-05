<?php

namespace App;


use App\Models\Tenant;
use App\Models\Traits\UserACLTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, UserACLTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     // AQUI TIVE O PROBLEMA DE DIZER QUE N\AO EXISTE O DEFAULT VALOR PARA O TENANT_ID, SOLUCAO , ADICIONAR AO FILLABLE
    protected $fillable = [
       'id' ,'name', 'email', 'password', 'tenant_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     /**
     * The attributes that should be cast to native types.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTenantFilter( Builder $query)
    {
            return $query->where('tenant_id', auth()->user()->tenant_id);
    }


    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
