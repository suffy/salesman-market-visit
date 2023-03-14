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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('kodeprod');
            $table->string('namaprod');
            $table->string('supp')->nullable();
            $table->string('kode_group')->nullable();
            $table->string('nama_group')->nullable();
            $table->string('kode_subgroup')->nullable();
            $table->string('nama_subgroup')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
