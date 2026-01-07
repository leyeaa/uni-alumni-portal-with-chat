<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Thread extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'softdelete'
    ];

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    /**
     * Get the lastMessage associated with the Thread
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function lastMessage(): HasOne
    {
        return $this->hasOne(Message::class)->latestOfMany();
    }
    /**
     * Get all of the participants for the Thread
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function participants(): HasMany
    {
        return $this->hasMany(Participant::class);
    }

    public function otherParticipant(): HasOne
    {
        return $this->hasOne(Participant::class)->where('matricno','<>',Auth::user()->matricno);
    }
}
