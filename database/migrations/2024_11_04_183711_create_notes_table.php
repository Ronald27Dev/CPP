<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Student;
use App\Models\SchoolClass;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Student::class)->references('id_student')->on('students')->onDelete('cascade');
            $table->foreignIdFor(SchoolClass::class)->references('id_class')->on('classes')->onDelete('cascade');
            $table->double('portugues')->nullable();
            $table->double('matematica')->nullable();
            $table->double('historia')->nullable();
            $table->double('geografia')->nullable();
            $table->double('ciencias')->nullable();
            $table->double('artes')->nullable();
            $table->double('educacao_fisica')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notes', function(Blueprint $table) {
            $table->dropForeign(['student_id']);
            $table->dropForeign(['school_class_id']);
        });
        Schema::dropIfExists('notes');
    }
};
