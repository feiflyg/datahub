<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatformApiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platform_api', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->uuid('id')->primary();
            $table->string('code');
            $table->string('name');
            $table->uuid('platform_id');
            $table->uuid('group_id');
            $table->enum('direction',['source','target'])->default('source');
            $table->enum('type', ['WebAPI','SQL'])->default('WebAPI');
            $table->string('adapter');
            $table->json('factory')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('version')->nullable();
            $table->string('document_url')->nullable();
            $table->string('describe')->nullable();
            $table->integer('sort_order')->default(0);
            $table->tinyInteger('community')->default(0);
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
        Schema::dropIfExists('platform_api');
    }
}
