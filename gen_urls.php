<?php 
$url = "https://noormuhammad.com"; // Assuming the domain, or just relative
$urls = [];
$urls[] = "/islamic-calendar";
$urls[] = "/islamic-calendar/today";
$urls[] = "/islamic-calendar/pakistan";
$urls[] = "/islamic-calendar/saudi-arabia";
$urls[] = "/islamic-calendar/in-urdu";

$months = ["muharram", "safar", "rabi-ul-awwal", "rabi-us-sani", "jumada-al-awwal", "jumada-as-sani", "rajab", "shaban", "ramadan", "shawwal", "dhu-al-qadah", "dhu-al-hijjah"];
$cities = ["karachi", "lahore", "islamabad", "peshawar", "quetta", "multan", "faisalabad", "rawalpindi"];

foreach($months as $m) {
    $urls[] = "/islamic-month/" . $m;
}

foreach($cities as $c) {
    $urls[] = "/islamic-date/" . $c;
}

for($y = 2018; $y <= 2030; $y++) {
    $urls[] = "/islamic-calendar/" . $y;
    for($m = 1; $m <= 12; $m++) {
        $urls[] = "/islamic-calendar/" . $y . "/" . $m;
    }
}

file_put_contents("recent_urls.txt", implode(PHP_EOL, $urls));
echo "Generated " . count($urls) . " URLs.\n";

