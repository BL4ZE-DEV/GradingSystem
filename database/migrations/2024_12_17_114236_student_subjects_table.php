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
        Schema::create('stuent_subjects', function(Blueprint $table){
            $table->id();
            $table->foreignUuid('studentId')->constrained('students','studentId');
            $table->foreignUuid('subjectId')->constrained('subjects', 'subjectId');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
