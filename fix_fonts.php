<?php
$content = file_get_contents('design.html');
$content = str_replace('url(/build/assets/', 'url(./public/build/assets/', $content);
file_put_contents('design.html', $content);
echo "Fixed font paths!\n";
