<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('leaves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->dateTime('from_date');
            $table->dateTime('to_date');
            $table->string('reason');
            $table->string('description');
            $table->enum('leave_type', ['Full Day Leave', 'Half Leave']);
            $table->string('pm_approved')->nullable();
            $table->string('admin_approved')->nullable();
            $table->dateTime('pm_approved_date')->nullable();
            $table->dateTime('admin_approved_date')->nullable();
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('leaves');
    }
}
