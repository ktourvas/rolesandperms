<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rap_user_roles', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('role_id')->nullable();

            //morph many to many relationship
            $table->integer('rap_user_roles_id')->default(0);
            $table->string('rap_user_roles_type')->default('');

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
        Schema::dropIfExists('rap_user_roles');
    }
}
