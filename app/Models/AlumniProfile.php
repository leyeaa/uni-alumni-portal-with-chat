<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AlumniProfile extends Model
{
    use HasFactory;

    //change primaryKey
    protected $primaryKey = 'matricno';
    //set as nonincrementing integer
    public $incrementing = false;
    protected $keyType='string';

    protected $fillable = [
        'matricno',
        'surname',
        'other_names',
        'phone',
        'position',
        'employer',
        'address',
        'profile_picture',
        'department',
        'graduation_month',
        'graduation_year',
        'brief_profile',
        'linkedin',
        'facebook',
        'twitter'
    ];

    public function scopeFilter($query, array $filters){
        if($filters['search'] ?? false){
            $query->where('surname', 'like', '%'.request('search').'%')
                ->orwhere('other_names', 'like', '%'.request('search').'%');
        }
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'matricno', 'matricno');
    }
}
