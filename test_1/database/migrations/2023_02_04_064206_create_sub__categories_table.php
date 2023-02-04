<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub__categories', function (Blueprint $table) {
            $table->id();
            $table->string('sub_name')->nullable();
            $table->string('sub_slug')->nullable();
            $table->string('description')->nullable();
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('cascade');
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
        Schema::dropIfExists('sub__categories');
    }
};
