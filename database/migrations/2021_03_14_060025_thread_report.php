<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ThreadReport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thread_report', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('reported_thread_id');
            $table->uuid('reporter_id');
            $table->text('reason');
            $table->text('additional')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thread_report');
    }
}
