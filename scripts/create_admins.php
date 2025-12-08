<?php
// scripts/create_admins.php
// Bootstraps Laravel and creates admin accounts as requested.

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\Hash;

$accounts = [
    ['email' => 'admin@tobakab.go.id', 'name' => 'Admin Kabupaten', 'password' => 'admin123', 'role' => 'admin', 'village_id' => null],
    ['email' => 'meat@village.admin', 'name' => 'Admin Desa Meat', 'password' => 'password123', 'role' => 'village_admin', 'village_id' => 1],
    ['email' => 'pareparean@village.admin', 'name' => 'Admin Desa Pareparean', 'password' => 'password123', 'role' => 'village_admin', 'village_id' => 4],
    ['email' => 'aekbolonjulu@village.admin', 'name' => 'Admin Desa Aek Bolon Julu', 'password' => 'password123', 'role' => 'village_admin', 'village_id' => 2],
    ['email' => 'pintubosi@village.admin', 'name' => 'Admin Desa Pintu Bosi', 'password' => 'password123', 'role' => 'village_admin', 'village_id' => 5],
    ['email' => 'pangombusan@village.admin', 'name' => 'Admin Desa Pangombusan', 'password' => 'password123', 'role' => 'village_admin', 'village_id' => 3],
    ['email' => 'sigumparta@village.admin', 'name' => 'Admin Desa Sigumpar Toba', 'password' => 'password123', 'role' => 'village_admin', 'village_id' => 6],
];

foreach ($accounts as $a) {
    $user = User::updateOrCreate(
        ['email' => $a['email']],
        ['name' => $a['name'], 'password' => Hash::make($a['password']), 'role' => $a['role'], 'village_id' => $a['village_id']]
    );
    echo "Upserted user: {$user->email} (id={$user->id}, role={$user->role})\n";
}

echo "Done creating/updating users.\n";

return 0;
