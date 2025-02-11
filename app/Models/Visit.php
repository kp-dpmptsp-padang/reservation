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
        'attachment_mime_type'
    ];

    protected $casts = [
        'day' => 'date',
        'clock' => 'datetime:H:i',
        'group_size' => 'integer',
        'status' => VisitStatusEnum::class,
        'attachment_type' => AttachmentTypeEnum::class,
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function canBeVerified(): bool
    {
        return $this->status === VisitStatusEnum::PENDING;
    }
    
    public function shouldStart(): bool
    {
        return $this->status === VisitStatusEnum::VERIFIED &&
               $this->day->isToday() &&
               now()->gte($this->clock);
    }
    
    public function shouldComplete(): bool
    {
        // Asumsikan kunjungan selesai setelah 3 jam
        return $this->status === VisitStatusEnum::ONGOING &&
               now()->gte($this->clock->addHours(3));
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
