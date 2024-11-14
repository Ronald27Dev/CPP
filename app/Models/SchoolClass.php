<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SchoolClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'classname',
        'classroom',
        'id_teacher',
    ];

    protected $table = 'classes';

    public function parent(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_teacher');
    }
}
