<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    protected $fillable = [
        'district_id',
        'name',
        'code',
        'village_head',
        'visi_misi',
        'budget_file',
        'image',
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }

    public function citizens()
    {
        return $this->hasMany(Citizen::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
