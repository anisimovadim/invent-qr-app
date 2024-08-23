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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->string('type');
            $table->integer('number_invent')->unique();
            $table->integer('cabinet')->nullable();
            $table->text('character')->nullable();
            $table->text('status');
            $table->string('src_qrcode');
            $table->string('whome')->nullable();
            $table->integer('number_building')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
