<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index()->nullable();
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('parent_id')->index()->nullable();
            $table->unsignedBigInteger('section_id')->index();
            $table->unsignedBigInteger('project_id')->index()->nullable();
            $table->unsignedBigInteger('assignee_id')->index()->nullable();
            $table->unsignedInteger('is_complete')->index()->default(0);
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
        Schema::dropIfExists('section_tasks');
    }
};
