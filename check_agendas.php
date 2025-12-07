<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== CHECKING DISTRICT AGENDAS ===\n\n";

$agendas = \App\Models\DistrictAgenda::orderBy('created_at', 'desc')->get();

echo "Total agendas in database: " . $agendas->count() . "\n\n";

if ($agendas->count() > 0) {
    echo "Recent agendas:\n";
    foreach ($agendas as $agenda) {
        echo "----------------------------------------\n";
        echo "ID: {$agenda->id}\n";
        echo "Title: {$agenda->title}\n";
        echo "Event Date: {$agenda->event_date}\n";
        echo "Time: {$agenda->time_start} - {$agenda->time_end}\n";
        echo "Location: {$agenda->location}\n";
        echo "Created: {$agenda->created_at}\n";
    }
} else {
    echo "No agendas found!\n";
}
