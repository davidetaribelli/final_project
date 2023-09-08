<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponsorUser extends Model
{
    protected $table = 'sponsor_user';
    protected $dates = ['start_time','end_time'];
    use HasFactory;
}
