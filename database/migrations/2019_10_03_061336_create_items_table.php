<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id_item');
            $table->string('description');
            $table->boolean('is_completed');
            $table->timestamp('completed_at')->nullable($value = true);
            $table->string('due');
            $table->unsignedBigInteger('urgency')->nullable($value = true);
            $table->string('updated_by')->nullable($value = true);
            $table->timestamp('updated_at')->nullable($value = true);
            $table->string('created_at');
            $table->string('assignee_id');
            $table->unsignedBigInteger('task_id');
            $table->unsignedBigInteger('checklist_id');


            $table
            ->foreign('checklist_id')
            ->references('id_checklist')
            ->on('checklists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
