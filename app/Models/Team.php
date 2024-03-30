<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'disciplineId',
        'title',
        'logoUrl',
    ];

    public function users() {
        return $this->hasMany(User::class);
    }

    public function discipline() {
        return $this->belongsTo(Discipline::class);
    }

    public function logo() {
        return $this->belongsTo(Logo::class);
    }
}
