<?php

namespace App\Tenant\Traits;

use App\Tenant\Observers\TenantObserver;
use App\Tenant\Scopes\TenantScope;

   trait TenantTrait
   {
        /**
     * The booting Method for Model
     * @return void
     */

     protected static function boot()
     {
         parent::boot();

         static::observe(TenantObserver::class);

         static::addGlobalScope(new TenantScope);//aqui ja vai filtrar o tenant_id do usuario autenticado
     }
   }
