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
                'title' => 'fgherfw',
                'content' => 'gafhsgff',
                'date' => '2025-12-02',
                'type' => 'meeting',
                'status' => 'pending',
            ],
            [
                'id' => 2,
                'village_id' => 1,
                'title' => 'sfdhgfshjsf',
                'content' => 'jhsjksfjf',
                'date' => '2025-12-02',
                'type' => 'meeting',
                'status' => 'pending',
            ],
            [
                'id' => 3,
                'village_id' => 1,
                'title' => 'xnvbdf',
                'content' => 'sjfsj',
                'date' => '2025-12-02',
                'type' => 'meeting',
                'status' => 'pending',
            ],
            [
                'id' => 4,
                'village_id' => 1,
                'title' => 'sfs',
                'content' => 'efsf',
                'date' => '2025-12-02',
                'type' => 'meeting',
                'status' => 'progress',
            ],
            [
                'id' => 5,
                'village_id' => 1,
                'title' => 'ad',
                'content' => 'add',
                'date' => '2025-12-02',
                'type' => 'meeting',
                'status' => 'pending',
            ],
            [
                'id' => 6,
                'village_id' => 1,
                'title' => 'cvg',
                'content' => 'xfgg',
                'date' => '2025-12-02',
                'type' => 'meeting',
                'status' => 'pending',
            ],
        ];

        foreach ($announcements as $data) {
            Announcement::updateOrCreate(['id' => $data['id']], $data);
        }
    }
}
