<?php
foreach(glob('app/Models/*.php') as $f) {
    $content = file_get_contents($f);
    $content = str_replace('{\\n    protected $guarded = [];\\n', "{\n    protected \$guarded = [];\n", $content);
    file_put_contents($f, $content);
}
