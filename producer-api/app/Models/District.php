<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = [
        'name',
        'code',
        'bupati_name',
        'visi_misi',
        'documentation',
    ];

    public function villages()
    {
        return $this->hasMany(Village::class);
    }

    public function announcements()
    {
        return $this->hasMany(DistrictAnnouncement::class);
    }

    public function budgets()
    {
        return $this->hasMany(DistrictBudget::class);
    }

    public function agendas()
    {
        return $this->hasMany(DistrictAgenda::class);
    }

    public function photos()
    {
        return $this->hasMany(DistrictPhoto::class);
    }

    public function news()
    {
        return $this->hasMany(DistrictNews::class);
    }
}
