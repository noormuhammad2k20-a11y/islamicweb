<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\IslamicName;
use Illuminate\Support\Facades\Route;

$names = IslamicName::orderBy('name_english')->get();

$totalNames = $names->count();
$totalMale = 0;
$totalFemale = 0;
$missingUrls = 0;
$duplicateNamesCount = 0;
$duplicateSlugsCount = 0;

$nameCounts = [];
$slugCounts = [];

$inventory = "# Islamic Names Inventory\n\n";
$inventory .= "Total Names: $totalNames\n\n";
$inventory .= "| S.No | Name | Gender | Slug | URL | Status |\n";
$inventory .= "|------|------|---------|------|-----|--------|\n";

$sno = 1;
$duplicateNamesList = [];
$duplicateSlugsList = [];

foreach ($names as $nameRecord) {
    $name = trim($nameRecord->name_english);
    $gender = ucfirst($nameRecord->gender);
    $slug = trim($nameRecord->slug);
    $url = url('/islamic-names/' . $slug);
    
    if (strtolower($gender) === 'male' || strtolower($gender) === 'boy') {
        $totalMale++;
        $gender = 'Male';
    } elseif (strtolower($gender) === 'female' || strtolower($gender) === 'girl') {
        $totalFemale++;
        $gender = 'Female';
    }
    
    // Check duplicates
    $nameLower = strtolower($name);
    if (isset($nameCounts[$nameLower])) {
        $duplicateNamesList[] = $name;
        $duplicateNamesCount++;
    }
    $nameCounts[$nameLower] = true;
    
    $slugLower = strtolower($slug);
    if (isset($slugCounts[$slugLower])) {
        $duplicateSlugsList[] = $slug;
        $duplicateSlugsCount++;
    }
    $slugCounts[$slugLower] = true;
    
    // Check URL
    $status = 'OK';
    if (empty($slug)) {
        $status = 'Missing Slug';
        $missingUrls++;
    } else {
        // We can do a quick internal request or just check if it's resolvable
        try {
            $request = Illuminate\Http\Request::create('/islamic-names/' . $slug);
            $route = app('router')->getRoutes()->match($request);
            if (!$route) {
                $status = 'Broken URL (No Route Matched)';
                $missingUrls++;
            }
        } catch (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e) {
            $status = 'Broken URL (404 Not Found)';
            $missingUrls++;
        } catch (\Exception $e) {
            $status = 'Error: ' . $e->getMessage();
            $missingUrls++;
        }
    }
    
    $inventory .= "| $sno | $name | $gender | $slug | $url | $status |\n";
    $sno++;
}

$inventory .= "\n## Summary\n";
$inventory .= "- Total Male Names: $totalMale\n";
$inventory .= "- Total Female Names: $totalFemale\n";
$inventory .= "- Total Names: $totalNames\n";
$inventory .= "- Missing URLs: $missingUrls\n";
$inventory .= "- Duplicate Names: $duplicateNamesCount\n";
$inventory .= "- Duplicate Slugs: $duplicateSlugsCount\n";

if ($duplicateNamesCount > 0) {
    $inventory .= "\n### Duplicate Names Found:\n";
    foreach (array_unique($duplicateNamesList) as $dup) {
        $inventory .= "- $dup\n";
    }
}

if ($duplicateSlugsCount > 0) {
    $inventory .= "\n### Duplicate Slugs Found:\n";
    foreach (array_unique($duplicateSlugsList) as $dup) {
        $inventory .= "- $dup\n";
    }
}

file_put_contents(__DIR__ . '/islamic-names-inventory.md', $inventory);
echo "Inventory generated successfully!\n";
