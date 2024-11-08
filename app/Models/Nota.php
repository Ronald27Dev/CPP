<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\SchoolClass;

class Nota extends Model
{
    use HasFactory;
    
    //
    protected $fillable = [
        'student_id',
        'school_class_id',
        'portugues',
        'matematica',
        'historia',
        'geografia',
        'ciencias',
        'artes',
        'educacao_fisica'
    ];

    protected $table = 'notes';

    public function student() {
        return $this->belongsTo(Student::class);
    }

    public function class() {
        return $this->belongsTo(SchoolClass::class);
    }
}
