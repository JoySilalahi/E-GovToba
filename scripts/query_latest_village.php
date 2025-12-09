<?php
$paths = ['database/database.sqlite', 'database/database.sqlite.bak'];
$p = null;
foreach ($paths as $pp) {
    if (file_exists($pp)) { $p = $pp; break; }
}
if (!$p) {
    echo json_encode(['error' => 'no_sqlite_file']);
    exit(0);
}
try {
    $db = new SQLite3($p);
    $res = $db->query('SELECT id, name, image, updated_at FROM villages ORDER BY id DESC LIMIT 1');
    $row = $res ? $res->fetchArray(SQLITE3_ASSOC) : null;
    echo json_encode($row);
} catch (Throwable $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
