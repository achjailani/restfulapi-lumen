<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChecklistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklists', function (Blueprint $table) {
            $table->bigIncrements('id_checklist');
            $table->string('object_domain');
            $table->string('object_id');
            $table->string('description');
            $table->boolean('is_completed')->default(false);
            $table->timestamp('completed_at')->nullable($value = true);
            $table->string('updated_by')->nullable($value = true);   
            $table->timestamp('updated_at')->nullable($value = true);
            $table->string('created_at');
            $table->timestamp('due')->nullable($value = true);
            $table->unsignedBigInteger('urgency');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checklists');
    }
}
