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
        'head_of_district',
        'phone',
        'address',
    ];

    public function villages()
    {
        return $this->hasMany(Village::class);
    }
}
