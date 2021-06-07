<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Tive um problema nesse relacionamento , depois de trocar a ordem e criar as funcoes de rela funcionou
        Schema::create('plan_profile', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('plan_id');
            $table->unsignedBigInteger('profile_id');


            $table->timestamps();


            $table->foreign('plan_id')
                      ->references('id')
                      ->on('plans')
                      ->onDelete('cascade');

            $table->foreign('profile_id')
            ->references('id')
            ->on('profiles')
            ->onDelete('cascade');





        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_profile');
    }
}
