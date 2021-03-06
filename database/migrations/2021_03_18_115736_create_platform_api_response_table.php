<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatformApiResponseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platform_api_response', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
            $table->uuid('id')->primary();
            $table->uuid('api_id');
            $table->string('field');
            $table->string('parent_field')->nullable();
            $table->string('name');
            $table->string('type')->default('string');
            $table->string('length')->default('255');
            $table->string('default')->nullable();
            $table->json('factory')->nullable();
            $table->tinyInteger('is_required')->default(0);
            $table->tinyInteger('is_common_param')->default(0);
            $table->integer('sort_order')->default(0);
            $table->string('describe')->nullable();
            $table->timestamps();

            $table->index(['api_id', 'sort_order', 'is_common_param'],'index_fields');
            $table->unique(['api_id', 'field', 'parent_field','is_common_param'],'unique_fields');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('platform_api_response');
    }
}
