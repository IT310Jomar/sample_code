<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employment_status', function (Blueprint $table) {
            $table->id();
            $table->string("name",50);
            $table->timestamps();
        });

        DB::table('employment_status')->insert([
           [
            "name" => "Regular"
           ],
           [
           "name" => "Contractual"
           ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employment_status');
    }
};
