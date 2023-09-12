<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function genres(){
        return $this->belongsToMany(Genre::class);
    }

    public function sponsors(){
        return $this->belongsToMany(Sponsor::class);
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function votes(){
        return $this->belongsToMany(Vote::class)->withPivot('date');
    }

    public function calculateAverageVote()
    {
        $averageVote = DB::table('user_vote')
            ->where('user_id', $this->id)
            ->join('votes', 'user_vote.vote_id', '=', 'votes.id')
            ->avg('votes.vote');

        $this->average_vote = round($averageVote, 2);
        $this->save();
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'img',
        'region',
        'phone',
        'cachet',
        'experience',
        'average_vote',
        'reviews_count'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
