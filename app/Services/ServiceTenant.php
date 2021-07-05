<?php

    namespace App\Services;

    use App\Models\Plan;
    class ServiceTenant
    {
        private $plan, $data = [];

                public function make(Plan $plan, array $data)
                {
                    $this->plan = $plan;
                    $this->data = $data;

                    $tenant = $this->storeTenant();
                        //Ele espera um tenant por causa do relacionamento entre models no caso o user belongsTo Tenant
                    $user = $this->storeUser($tenant);

                    return $user;


                }

                public function storeTenant()
                {
                    $data = $this->data;
                    $plan =  $this->plan;

              return      $tenant = $this->plan->tenants()->create([
                        'NIF' => $data['nif'],
                        'name' =>$data['empresa'],
                        'email' => $data['email'],

                        'subscription' => now(),
                        'expires_at' => now()->addDays(7),
                    ]);
                }

                public function storeUser($tenant)
                {

                    $user = $tenant->users()->create([
                        'name' => $this->data['name'],
                        'email' => $this->data['email'],
                        'password' => bcrypt($this->data['password'])
                    ]);

                                return $user;
                }
    }
