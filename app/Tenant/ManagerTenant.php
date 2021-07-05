<?php

namespace App\Tenant;

use App\Models\Tenant;

class ManagerTenant
{
    /**
     * Esse metodo visa Apenas para facilitar facilitar na obtenção do Tenant do usuario logado
     * dessa forma podemos fazer o seguinte ManagerTenant->getTenantIdentify() em vez de repetir
     * toda hora  auth()->user()->tenant_id
     */
        public function getTenantIdentify()
        {
            return auth()->user()->tenant_id;
        }

        /**
         * Recuperando o tenant em si
         */

         public function getTenant() : Tenant
         {
             return auth()->user()->tenant;
         }

                /**
                 * Se o email da pessoa logada estiver aqui ele retorna true se nao retorna false
                 * significa que nao e admin
                 */
         public function isAdmin() : bool
         {
             return in_array(auth()->user()->email, config('tenant.admins'));
         }
}
