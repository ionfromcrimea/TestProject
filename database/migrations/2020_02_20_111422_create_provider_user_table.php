<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProviderUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provider_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('provider_id')->nullable()->default('0');
            $table->integer('user_id')->nullable()->default('0');
            $table->integer('stars')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provider_user');
    }
}
