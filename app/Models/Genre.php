<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsToMany(User::class);
    }

    protected $fillable = [
        'name',
    ];
}
