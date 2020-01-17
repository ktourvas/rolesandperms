<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rap_model_permissions', function (Blueprint $table) {

            $table->increments('id');

            $table->unsignedInteger('user_id')->nullable();

            $table->string('policy', 100);

            $table->tinyInteger('viewany')->default(0);

            $table->tinyInteger('create')->default(0);

            $table->tinyInteger('update')->default(0);

            $table->tinyInteger('delete')->default(0);

            $table->tinyInteger('restore')->default(0);

            $table->tinyInteger('forcedelete')->default(0);

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
        Schema::dropIfExists('rap_model_permissions');
    }
}
