<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'district_head',
        'phone',
        'email',
        'address',
        'visi',
        'misi',
        'documentation_file',
        'bupati_name',
        'wakil_bupati_name',
        'periode',
    ];

    public function villages()
    {
        return $this->hasMany(Village::class);
    }

    public function photos()
    {
        return $this->hasMany(DistrictPhoto::class);
    }
}
