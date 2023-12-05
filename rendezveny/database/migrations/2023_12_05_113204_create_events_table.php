<?php

use App\Models\Events;
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
        Schema::create('events', function (Blueprint $table) {
            $table->id('event_id');
            $table->date('date');
            $table->foreignId('agency_id')->references('agency_id')->on('agencies');
            $table->integer('limit');
            $table->timestamps();
        });

        Events::create([
            'date' => '2022-1-15', 
            'agency_id' => 1,
            'limit' => 30,
        ]);

        Events::create([
            'date' => '2020-11-10', 
            'agency_id' => 2,
            'limit' => 100,
        ]);

        Events::create([
            'date' => '2023-5-15', 
            'agency_id' => 2,
            'limit' => 25,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
