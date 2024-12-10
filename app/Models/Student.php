<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'birthdate',
        'parent_id',
        'id_class',
    ];

    protected $table = 'students';

    public function parent(): BelongsTo
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

}
