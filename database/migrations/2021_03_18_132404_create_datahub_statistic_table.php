<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatahubStatisticTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datahub_statistic', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->uuid('id')->primary();
            $table->integer('data')->nullable()->default(0);
            $table->integer('data_success')->nullable()->default(0);
            $table->integer('data_error')->nullable()->default(0);
            $table->integer('data_queue')->nullable()->default(0);
            $table->integer('data_await')->nullable()->default(0);
            $table->integer('data_repeat')->nullable()->default(0);
            $table->integer('data_unacknowledged')->nullable()->default(0);
            $table->integer('source_queue')->nullable()->default(0);
            $table->integer('source_queue_success')->nullable()->default(0);
            $table->integer('source_queue_error')->nullable()->default(0);
            $table->integer('source_queue_await')->nullable()->default(0);
            $table->integer('source_queue_repeat')->nullable()->default(0);
            $table->integer('source_queue_unacknowledged')->nullable()->default(0);
            $table->integer('target_queue')->nullable()->default(0);
            $table->integer('target_queue_success')->nullable()->default(0);
            $table->integer('target_queue_error')->nullable()->default(0);
            $table->integer('target_queue_await')->nullable()->default(0);
            $table->integer('target_queue_repeat')->nullable()->default(0);
            $table->integer('target_queue_unacknowledged')->nullable()->default(0);
            $table->integer('throwable')->nullable()->default(0);
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
        Schema::dropIfExists('datahub_statistic');
    }
}
