<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('plan_id');
            $table->string('NIF')->unique();
            $table->string('name')->unique();
            $table->string('url')->unique();
            $table->string('email')->unique();
            $table->string('logo')->nullable();


            //Status se inativar ele pode acesso ao sitema

            $table->enum('active', ['Y', 'N'])->default('Y');

            //Subscription
            $table->date('subscription')->nullable();//data em que se increveu
            $table->date('expires_at')->nullable();//data em que expira
            $table->string('subscription_id', 255)->nullable();//identificar no gatway de pagamento
            $table->boolean('subscription_active')->default(false);//Assinatura ativa
            $table->boolean('subscription_suspended')->default(false);//Assiantura cancelada

            $table->timestamps();

            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenants');
    }
}
