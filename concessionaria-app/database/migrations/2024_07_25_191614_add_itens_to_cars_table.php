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
        Schema::table('cars', function (Blueprint $table) {
            $table->boolean('airbag');
            $table->boolean('brake'); // 'freio'
            $table->boolean('gps');
            $table->boolean('lock'); // 'trava'
            $table->boolean('window'); // 'vidro'
            $table->boolean('alarm'); 
            $table->boolean('air_conditioning'); // 'ar condicionado'
            $table->boolean('sensor');
            $table->boolean('steering'); // 'direcao'
            
            $table->string('transmission'); // 'cambio'
            $table->string('km'); 
            $table->string('color'); 
            $table->text('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            
            $table->dropColumn('airbag');
            $table->dropColumn('brake'); 
            $table->dropColumn('gps');
            $table->dropColumn('lock'); 
            $table->dropColumn('window'); 
            $table->dropColumn('alarm'); 
            $table->dropColumn('air_conditioning'); 
            $table->dropColumn('sensor');
            $table->dropColumn('steering'); 

            $table->dropColumn('transmission'); 
            $table->dropColumn('km'); 
            $table->dropColumn('color'); 
            $table->dropColumn('description');
        });
    }
};
