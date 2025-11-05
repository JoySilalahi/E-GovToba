<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Citizen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'name',
        'birth_place',
        'birth_date',
        'gender',
        'religion',
        'marital_status',
        'occupation',
        'nationality',
        'address',
        'rt',
        'rw',
        'village_id',
        'phone',
        'email'
    ];

    protected $casts = [
        'birth_date' => 'date'
    ];

    public function village()
    {
        return $this->belongsTo(Village::class);
    }

    public function serviceRequests()
    {
        return $this->hasMany(ServiceRequest::class);
    }
}
