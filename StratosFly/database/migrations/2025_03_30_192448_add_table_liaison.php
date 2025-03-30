<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Passager;
use App\Models\Reservation;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('passager_reservation', function (Blueprint $table){
            $table->foreignIdFor(Passager::class) ;
            $table->foreignIdFor(Reservation::class) ;
            $table->primary(['passager_id', 'reservation_id']) ;
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passagers_reservations');
    }
};
