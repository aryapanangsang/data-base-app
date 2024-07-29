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
        Schema::create('applicants', function (Blueprint $table) {
            // Primary Data
            $table->id();            
            $table->string('noreg')->nullable();
            $table->string('appplicant_name');
            $table->string('identity_number')->unique();
            $table->string('npwp');
            $table->string('bpjs_kesehatan')->nullable();
            $table->string('birth_of');
            $table->date('birth_of_date');
            $table->string('address');
            // Secondary Data
            $table->string('domisili')->nullable();
            $table->string('phone_number');
            $table->string('wa_number');
            $table->string('email');
            $table->string('emergency_number');
            $table->string('emergency_number_name');
            $table->string('maried_status');
            $table->enum('gender',['Laki-laki','Perempuan']);
            $table->string('religion');
            $table->string('height');
            $table->string('weight');
            $table->string('uniform_size')->nullable();
            $table->string('shoes_size')->nullable();
            // Aditional Data
            $table->string('mother');
            $table->string('father');
            $table->string('vaccine');
            // education
            $table->string('education_level');
            $table->string('graduated');
            $table->string('major');
            $table->string('math_value');
            // Experience
            $table->string('company_name')->nullable();
            $table->string('salary')->nullable();
            $table->string('position')->nullable();
            $table->string('duration')->nullable();
            $table->string('skills')->nullable();
            $table->enum('office',['Cikarang','Purwakarta']);
            $table->string('reference')->nullable();
            // Updated Data
            $table->foreignId('company_id')->nullable()->constrained('companies')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('pre_test')->nullable();
            $table->string('test1')->nullable();
            $table->string('test2')->nullable();
            $table->string('post_test1')->nullable();
            $table->string('post_test2')->nullable();
            $table->date('mcu_date')->nullable();
            $table->string('mcu_result')->nullable();
            $table->date('join_date')->nullable();
            $table->date('finished')->nullable();
            $table->string('insurance_number')->nullable();
            $table->foreignId('status_id')->nullable()->constrained('statuses')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('information')->nullable();            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
