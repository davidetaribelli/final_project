<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public function users(){
        return $this->hasMany(User::class);
    }
    
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'comment',
        'date',
    ];
}
