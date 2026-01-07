<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // Change primary key of table
    protected $primaryKey = 'matricno';

    // Non increment primary key
    public $incrementing = false;

    protected $keyType='string';
    
    protected $fillable = [
        'matricno',
        'name',
        'email',
        'password',
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
        'password' => 'hashed',
    ];

    public function alumniProfile(): HasOne
    {
        return $this->hasOne(AlumniProfile::class, 'matricno','matricno');
    }

    public function serviceRequests(): HasMany
    {
        return $this->hasMany(ServiceRequest::class,'matricno','matricno');
    }
    
    public function messages(): HasMany
    {
        return $this->hasMany(Message::class,'matricno','matricno');
    }

    /**
     * Get all of the participants for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function participants(): HasMany
    {
        return $this->hasMany(Participant::class, 'matricno', 'matricno')->orderBy('updated_at');
    }
}
