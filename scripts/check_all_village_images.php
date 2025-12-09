<?php
$paths = ['database/database.sqlite', 'database/database.sqlite.bak'];
$p = null;
foreach ($paths as $pp) {
    if (file_exists($pp)) { $p = $pp; break; }
}
if (!$p) { echo "no_sqlite_file\n"; exit(0); }
$db = new SQLite3($p);
$res = $db->query('SELECT id, name, image FROM villages');
$rows = [];
while ($r = $res->fetchArray(SQLITE3_ASSOC)) {
    $image = $r['image'];
    $storagePath = $image ? __DIR__ . '/../storage/app/public/' . $image : null;
    $publicPath = $image ? __DIR__ . '/../public/storage/' . $image : null;
    $normalized = preg_replace('/^desa\s+/i', '', trim($r['name']));
    $base = 'desa ' . strtolower($normalized);
    $candidates = ["{$base}.jpg", "{$base}.jpeg", "{$base}.png"];
    $foundFallback = null;
    foreach ($candidates as $c) {
        $path = __DIR__ . '/../public/images/' . $c;
        if (file_exists($path)) { $foundFallback = $path; break; }
    }
    $rows[] = [
        'id' => $r['id'],
        'name' => $r['name'],
        'image_field' => $image,
        'storage_exists' => $storagePath ? (file_exists($storagePath) ? 'yes' : 'no') : 'no-image',
        'public_storage_exists' => $publicPath ? (file_exists($publicPath) ? 'yes' : 'no') : 'no-image',
        'fallback_exists' => $foundFallback ? 'yes' : 'no',
        'storage_path' => $storagePath,
        'public_path' => $publicPath,
        'fallback_path' => $foundFallback,
    ];
}
echo json_encode($rows, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n";
