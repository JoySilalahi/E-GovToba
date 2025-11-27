<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Village extends Model
{
    use HasFactory;

    protected $fillable = [
        'district_id',
        'name',
        'code',
        'head_of_village',
        'phone',
        'address',
        'visi',
        'misi',
        'budget_file',
        'village_head',
        'population',
        'area',
        'image',
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function citizens()
    {
        return $this->hasMany(Citizen::class);
    }
}
