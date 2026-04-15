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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('full_name');
            $table->string('nickname');
            $table->enum('gender', ['Pria', 'Wanita']);
            $table->string('pob');
            $table->date('dob');
            $table->enum('marital_status', ['Belum Menikah', 'Menikah', 'Cerai', 'Janda/Duda']);
            $table->enum('blood_type', ['A', 'B', 'AB', 'O']);
            $table->text('address_ktp');
            $table->string('province_ktp')->nullable();
            $table->string('city_ktp')->nullable();
            $table->string('postal_code_ktp')->nullable();
            $table->text('address_current');
            $table->string('province_current')->nullable();
            $table->string('city_current')->nullable();
            $table->string('postal_code_current')->nullable();
            $table->string('religion');
            $table->string('ethnic');
            $table->string('ktp_number')->unique();
            $table->string('kk_number');
            $table->string('sim_c')->nullable();
            $table->string('sim_a_b')->nullable();
            $table->decimal('weight', 5, 2);
            $table->decimal('height', 5, 2);
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->foreignId('position_id')->constrained();
            $table->enum('hr_status', ['pending', 'review', 'interview', 'hired', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
