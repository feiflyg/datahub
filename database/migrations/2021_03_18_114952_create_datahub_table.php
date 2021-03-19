<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatahubTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datahub', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
            $table->uuid('id')->primary();
            $table->string('name');
            $table->uuid('lessee_id');
            $table->enum('strategy', ['asyn-asyn', 'sync-sync', 'sync-asyn'])->default('asyn-asyn');
            $table->tinyInteger('status')->default(1);
            $table->string('source_crontab')->nullable()->default('10 */1 * * *');
            $table->string('target_crontab')->nullable()->default('15 */1 * * *');
            $table->uuid('inherited')->nullable();
            $table->timestamp('start_at', 0)->nullable();
            $table->timestamp('recently_at', 0)->nullable();
            $table->string('describe')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->index(['lessee_id', 'sort_order']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datahub');
    }
}
