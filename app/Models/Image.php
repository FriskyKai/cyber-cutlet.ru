<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'imageUrl'
    ];

    public function users() {
        return $this->hasMany(User::class);
    }

    public function teams() {
        return $this->hasMany(Team::class);
    }
}
