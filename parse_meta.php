<?php
$data = json_decode(file_get_contents('quran_meta.json'), true);
if (isset($data['data']['surahs']['references'])) {
    foreach ($data['data']['surahs']['references'] as $surah) {
        echo "Surah: {$surah['number']}, Ayahs: {$surah['numberOfAyahs']}\n";
    }
} else {
    echo "Could not parse JSON\n";
}
