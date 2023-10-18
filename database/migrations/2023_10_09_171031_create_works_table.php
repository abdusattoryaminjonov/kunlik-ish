<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('date');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('district_id')->constrained();
            $table->timestamps();
            // $table->bigInteger("adress_id");
            // $table->foreign('adress_id')->references('id')->on('adresses'); //->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('works');
    }
};