<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'citizen_id',
        'service_id',
        'tracking_number',
        'status',
        'notes',
        'documents',
        'processed_by',
        'processed_at'
    ];

    protected $casts = [
        'documents' => 'array',
        'processed_at' => 'datetime'
    ];

    public function citizen()
    {
        return $this->belongsTo(Citizen::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function processor()
    {
        return $this->belongsTo(User::class, 'processed_by');
    }

    public static function generateTrackingNumber()
    {
        $prefix = 'SR';
        $date = now()->format('Ymd');
        $random = str_pad(random_int(1, 999), 3, '0', STR_PAD_LEFT);
        return $prefix . $date . $random;
    }
}
