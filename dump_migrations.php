<?php
$files = glob(__DIR__ . '/database/migrations/*create_surah*.php');
foreach ($files as $file) {
    echo basename($file) . "\n";
    $lines = file($file);
    foreach ($lines as $line) {
        if (strpos($line, '$table->') !== false) {
            echo "  " . trim($line) . "\n";
        }
    }
}
