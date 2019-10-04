<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->bigIncrements('id_template');
            $table->string('name');
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('checklist_id');

            $table
            ->foreign('item_id')
            ->references('id_item')
            ->on('items');

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
        Schema::dropIfExists('templates');
    }
}
