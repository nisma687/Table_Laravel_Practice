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
        Schema::create('table_packages', function (Blueprint $table) {
            $table->id();
            $table->string("package_name");
            $table->float("package_price");
            $table->string("currency");
            $table->date("package_duration_hour");
            $table->dateTime("package_duration_day");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_packages');
    }
};
