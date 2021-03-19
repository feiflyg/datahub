<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConnectorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('connector', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
            $table->uuid('id')->primary();
            $table->string('name');
            $table->uuid('lessee_id');
            $table->uuid('platform_id');
            $table->enum('env', ['development', 'test', 'production'])->default('development');
            $table->json('development')->nullable();
            $table->json('test')->nullable();
            $table->json('production')->nullable();
            $table->string('describe')->nullable();
            $table->timestamps();

            $table->index('lessee_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('connector');
    }
}
