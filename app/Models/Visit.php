<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\VisitStatusEnum;
use App\AttachmentTypeEnum;

class Visit extends Model
{
    protected $fillable = [
        'name',
        'institution',
        'phone_number',
        'whatsapp_number',
        'email',
        'province',
        'city',
        'address',
        'homestay',
        'day',
        'clock',
        'topic',
        'group_size',
        'group_leader',
        'description',
        'status',
        'admin_id',
        'attachment_path',
        'attachment_type',
        'attachment_mime_type',
        'success_token', 
        'token_expires_at',
        'verified_at',
        'cancelled_at'
    ];

    protected $casts = [
        'day' => 'date',
        'clock' => 'datetime:H:i',
        'group_size' => 'integer',
        'status' => VisitStatusEnum::class,
        'attachment_type' => AttachmentTypeEnum::class,
        'verified_at' => 'datetime',
        'cancelled_at' => 'datetime',
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function canBeVerified(): bool
    {
        return $this->status === VisitStatusEnum::PENDING;
    }
    
    public function shouldStart(): bool
    {
        return $this->status === VisitStatusEnum::VERIFIED &&
               $this->day->isToday();
    }

    public function start(): void
    {
        $this->update([
            'status' => VisitStatusEnum::ONGOING,
        ]);
    }
    
    public function shouldComplete(): bool
    {
        return $this->status === VisitStatusEnum::ONGOING &&
               $this->day->isPast();
    }

    public function complete(): void
    {
        $this->update([
            'status' => VisitStatusEnum::COMPLETED,
        ]);
    }   
    
    public function verify(?User $admin = null): void
    {
        $this->update([
            'status' => VisitStatusEnum::VERIFIED,
            'admin_id' => $admin?->id,
            'verified_at' => now(),
        ]);
    }
    
    public function cancel(): void
    {
        $this->update([
            'status' => VisitStatusEnum::CANCELLED,
            'cancelled_at' => now(),
        ]);
    }
}