<?php
$out = shell_exec('git show HEAD:resources/views/pages/islamic-date/hub.blade.php');
file_put_contents('temp_original_hub.blade.php', $out);
