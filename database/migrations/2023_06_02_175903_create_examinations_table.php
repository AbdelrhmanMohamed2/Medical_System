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
        Schema::create('examinations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_patient_id')->constrained('doctor_patient')->cascadeOnDelete();
            $table->float('price');
            $table->enum('status', [
                'pending', 'cancelled', 'success'
            ]);
            $table->string('title')->nullable();
            $table->string('file')->nullable();
            $table->text('description')->nullable();
            $table->float('offer')->default(0);
            // $table->timestamp('time')->useCurrent();
            $table->date('time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examinations');
    }
};
