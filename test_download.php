<?php
$response = file_get_contents('https://api.github.com/repos/GovarJabbar/Quran-PNG/git/trees/master?recursive=1', false, stream_context_create([
    'http' => ['header' => "User-Agent: PHP\r\n"]
]));
$data = json_decode($response, true);
for($i=0; $i<10; $i++) { echo $data['tree'][$i]['path'] . "\n"; }
