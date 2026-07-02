<?php
$c = file_get_contents('design.html');
$c = str_replace('`rotate(${brng}deg)`', '\'rotate(\' + brng + \'deg)\'', $c);
$c = str_replace('`Qibla Direction: <strong>${brng.toFixed(2)}°</strong> from True North.`', '\'Qibla Direction: <strong>\' + brng.toFixed(2) + \'°</strong> from True North.\'', $c);
file_put_contents('design.html', $c);
echo "Fixed!";
