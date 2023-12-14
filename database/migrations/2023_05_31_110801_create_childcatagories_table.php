<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('childcatagories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Catagory_id');
            $table->unsignedBigInteger('Subcatagory_id');
            $table->string('Childcatagory_name')->nullable();
            $table->string('Childcatagory_slug')->nullable();
            $table->timestamps();
            $table->foreign('Catagory_id')->references('id')->on('catagories')->onDelete('cascade');
            $table->foreign('Subcatagory_id')->references('id')->on('subcatagories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('childcatagories');
    }
};
