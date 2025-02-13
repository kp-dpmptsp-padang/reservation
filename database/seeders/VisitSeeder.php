<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Visit;
use App\VisitStatusEnum;
use Carbon\Carbon;

class VisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            VisitStatusEnum::PENDING,
            VisitStatusEnum::VERIFIED,
            VisitStatusEnum::ONGOING,
            VisitStatusEnum::COMPLETED,
            VisitStatusEnum::CANCELLED,
        ];

        for ($i = 1; $i <= 15; $i++) {
            Visit::create([
                'name' => "Visitor $i",
                'institution' => "Institution $i",
                'phone_number' => '08123456789' . $i,
                'whatsapp_number' => '08123456789' . $i,
                'email' => "visitor$i@example.com",
                'province' => 'Province ' . $i,
                'city' => 'City ' . $i,
                'address' => 'Address ' . $i,
                'homestay' => 'Homestay ' . $i,
                'day' => Carbon::now()->addDays($i),
                'clock' => Carbon::now()->addDays($i)->setTime(rand(8, 17), 0),
                'topic' => 'Topic ' . $i,
                'group_size' => rand(1, 10),
                'group_leader' => "Leader $i",
                'description' => 'Description ' . $i,
                'status' => $statuses[array_rand($statuses)],
                'admin_id' => null,
                'attachment_path' => null,
                'attachment_type' => null,
                'attachment_mime_type' => null,
                'success_token' => null,
                'token_expires_at' => null,
            ]);
        }
    }
}