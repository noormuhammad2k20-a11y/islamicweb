<?php

$inputFile = __DIR__ . '/website-Full pages-analysis.md';
$outputDir = __DIR__ . '/website-pages-by-category';

if (!file_exists($outputDir)) {
    mkdir($outputDir, 0777, true);
}

$handle = fopen($inputFile, "r");
if (!$handle) {
    die("Failed to open input file.");
}

$currentFile = null;
$categories = [];

while (($line = fgets($handle)) !== false) {
    if (preg_match('/^## (.+?) \(Total Pages: (\d+)\)/', trim($line), $matches)) {
        $catName = trim($matches[1]);
        $total = trim($matches[2]);
        
        $filename = strtolower(trim(preg_replace('/[^A-Za-z0-9]+/', '-', $catName), '-')) . '.md';
        $categories[] = ['name' => $catName, 'file' => $filename, 'total' => $total];
        
        if ($currentFile) {
            fclose($currentFile);
        }
        
        $currentFile = fopen($outputDir . '/' . $filename, 'w');
        fwrite($currentFile, "# " . $catName . "\n\n");
        fwrite($currentFile, "**Total Pages:** " . $total . "\n\n");
        continue; // Don't write the '## ' line
    }
    
    // Ignore global headers before the first category
    if ($currentFile) {
        fwrite($currentFile, $line);
    }
}

if ($currentFile) {
    fclose($currentFile);
}
fclose($handle);

// Create index.md
$indexFile = fopen($outputDir . '/index.md', 'w');
fwrite($indexFile, "# Website Pages By Category\n\n");
fwrite($indexFile, "This directory contains the SEO inventory split by category.\n\n");
fwrite($indexFile, "| Category | Total Pages | File |\n");
fwrite($indexFile, "|---|---|---|\n");

foreach ($categories as $cat) {
    fwrite($indexFile, "| {$cat['name']} | {$cat['total']} | [{$cat['file']}](./{$cat['file']}) |\n");
}

fclose($indexFile);

echo "Successfully split the file into " . count($categories) . " categories!\n";
