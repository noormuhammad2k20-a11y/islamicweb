<?php foreach(glob("D:/Xamp/htdocs/Islamicwebsite/storage/framework/views/*.php") as $f) { exec("php -l \"$f\"", $out, $ret); if($ret !== 0) echo $f . PHP_EOL; }
