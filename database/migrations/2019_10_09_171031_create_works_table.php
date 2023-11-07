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
            $table->id(); // id
            $table->foreignId('user_id')->constrained(); // user id 
            $table->string('title'); // sarlavha
            $table->string('description'); // to'liq malumot
            $table->integer('place'); // joyi
            $table->date('date'); // ish sanasi
            $table->foreignId('job')->constrained(); // kasb
            $table->integer('workers'); // odam soni
            $table->double('price'); // narxi
            // $table->json('agreeables'); // rozi bo'lganlar
            $table->timestamps();
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