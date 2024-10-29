<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\Scalar;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('fantasy', 255);
            $table->string('social', 255);
            $table->string('email', 255);
            $table->string('document', 50);
            $table->string('phone',  50);
            $table->string('ie', 255);
            $table->string('im', 255);
            $table->string('category', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('supplier');
    }
};
