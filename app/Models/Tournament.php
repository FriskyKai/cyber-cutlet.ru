<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;

    protected $fillable = [
        'disciplineId',
        'prizeMoney',
        'contribution',
        'date',
        'ageLimit'
    ];

    public function discipline() {
        return $this->belongsTo(Discipline::class);
    }
}
