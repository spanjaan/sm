<?php

use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;
use Winter\Storm\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spanjaan_sm_projects', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('color')->nullable();
            $table->timestamps();
        });
        Schema::create('spanjaan_sm_contacts_projects', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('contact_id')->unsigned();
            $table->integer('project_id')->unsigned();
            $table->primary(['contact_id', 'project_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spanjaan_sm_projects');
        Schema::dropIfExists('spanjaan_sm_contacts_projects');
    }
};
