<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rap_record_permissions', function (Blueprint $table) {

            $table->increments('id');

            $table->unsignedInteger('policy_id')->nullable();

            $table->unsignedInteger('record_id')->nullable();

            $table->tinyInteger('view')->default(0);

            $table->tinyInteger('update')->default(0);

            $table->tinyInteger('delete')->default(0);

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
        Schema::dropIfExists('rap_record_permissions');
    }
}
