<?php
$resp = @file_get_contents('https://cdn.jsdelivr.net/gh/fawazahmed0/hadith-api@1/editions/urd-bukhari.min.json');
if ($resp === false) {
    echo "URL does not exist.\n";
} else {
    echo "Success: " . substr($resp, 0, 100);
}
