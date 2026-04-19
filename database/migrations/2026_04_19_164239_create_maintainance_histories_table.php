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
        Schema::create('maintainance_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bike_id');
            $table->double('cost', 11, 2)->default(0);
            $table->json('details');
            $table->string('maintainer');
            $table->double('odometer', 11, 2)->default(0);
            $table->dateTime('maintainance_date');
            $table->timestamps();
            // $table->foreign('bike_id')->references('id')->on('bikes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintainance_histories');
    }
};
