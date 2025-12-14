<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Announcement;

class AnnouncementSeeder extends Seeder
{
    public function run(): void
    {
        $announcements = [
            [
                'id' => 1,
                'village_id' => 1,
                'title' => 'test',
                'content' => 'test',
                'date' => '2025-12-14',
                'effective_date' => '2025-12-14',
                'end_date' => '2025-12-15',
                'location' => 'Rumah',
                'contact' => null,
                'type' => 'meeting',
                'category' => 'administrasi',
                'status' => 'published',
                'created_at' => '2025-12-14 02:20:12',
                'updated_at' => '2025-12-14 02:20:12',
            ],
            [
                'id' => 2,
                'village_id' => 1,
                'title' => 'Test',
                'content' => 'lest',
                'date' => '2025-12-14',
                'effective_date' => '2025-12-16',
                'end_date' => '2025-12-17',
                'location' => 'Rumah',
                'contact' => null,
                'type' => 'meeting',
                'category' => 'administrasi',
                'status' => 'published',
                'created_at' => '2025-12-14 05:16:43',
                'updated_at' => '2025-12-14 05:16:43',
            ],
        ];

        foreach ($announcements as $data) {
            Announcement::updateOrCreate(['id' => $data['id']], $data);
        }
    }
}
