<?php
$html = file_get_contents('error.html');
if (preg_match('/window\.data = ({.*});\s*<\/script>/', $html, $m)) {
    $data = json_decode($m[1], true);
    if (isset($data['report']['message'])) {
        echo "Message: " . $data['report']['message'] . "\n";
    }
    if (isset($data['report']['exception_class'])) {
        echo "Exception: " . $data['report']['exception_class'] . "\n";
    }
} else {
    // If not ignition, maybe just standard error
    preg_match('/<title>(.*?)<\/title>/', $html, $title);
    echo "Title: " . ($title[1] ?? 'Unknown') . "\n";
}
