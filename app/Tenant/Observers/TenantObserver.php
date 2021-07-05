<?php

    namespace App\Tenant\Observers;
    use App\Tenant\ManagerTenant;
    use Illuminate\Database\Eloquent\Model;


    class TenantObserver
    {
             /**
     * Handle the Model "creating" event.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return void
     * Aqui podemos usar para qualquer model
     */
    public function creating(Model $model)
    {
        $managerTenant = app(ManagerTenant::class);
        $model->tenant_id = $managerTenant ->getTenantIdentify();
    }

    }
