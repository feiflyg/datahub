<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatformTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platform', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
            $table->uuid('id')->primary();
            $table->string('name');
            $table->tinyInteger('status')->default(1);
            $table->string('type')->default('WebAPI');
            $table->json('connector_params');
            $table->string('factory')->nullable();
            $table->string('logo')->nullable()->default('');
            $table->string('describe')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            $table->tinyInteger('community')->default(0);
            $table->index(['status', 'sort_order']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('platform');
    }
}
