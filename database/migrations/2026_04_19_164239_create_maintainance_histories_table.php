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
            $table->decimal('total', 15, 2)->default(0);
            $table->longText('details');
            $table->unsignedBigInteger('maintainer_id');
            $table->decimal('odometer', 15, 2)->default(0);
            $table->unsignedBigInteger('brand_id');
            $table->string('bike_model');
            $table->string('plate');
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
