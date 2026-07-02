<?php
$content = file_get_contents('design.html');
$content = str_replace('http://localhost/', './public/', $content);
file_put_contents('design.html', $content);
echo "Replaced localhost with relative paths!";
