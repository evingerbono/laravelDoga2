<?php

use App\Models\Agencies;
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
        Schema::create('agencies', function (Blueprint $table) {
            $table->id('agency_id');
            $table->string('name');
            $table->string('country');
            $table->string('type');
            $table->timestamps();
        });

        Agencies::create([
            'name' => 'Agency1', 
            'country' => "Hungary",
            'type' => 'type1',
        ]);
        Agencies::create([
            'name' => 'Agency2', 
            'country' => "USA",
            'type' => 'type2',
        ]);
        
        Agencies::create([
            'name' => 'Agency3', 
            'country' => "Spain",
            'type' => 'type3',
        ]);

        Agencies::create([
            'name' => 'Agency4', 
            'country' => "Portugal",
            'type' => 'type4',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agencies');
    }
};
