<?php
$markdown = file_get_contents('richtext_converted_to_markdown.md');
$markdown = str_replace(['\`', '\_', '\'', '\\--'], ['`', '_', "'", '--'], $markdown);

// Extract exact strings by splitting on markdown headers
$parts = explode("### ", $markdown);

$p1a = '';
$p1b = '';
$p2a = '';
$p2b = '';
$p2c = '';
$p2d = '';

foreach ($parts as $part) {
    if (strpos($part, '1A.') !== false) {
        $p1a = substr($part, strpos($part, 'UPDATE'));
        $p1a = substr($p1a, 0, strrpos($p1a, ';') + 1);
    } elseif (strpos($part, '1B.') !== false) {
        $p1b = substr($part, strpos($part, 'INSERT INTO '));
        $p1b = substr($p1b, 0, strrpos($p1b, ';') + 1);
    } elseif (strpos($part, '2A.') !== false) {
        $p2a = substr($part, strpos($part, 'INSERT INTO '));
        $p2a = substr($p2a, 0, strrpos($p2a, ';') + 1);
    } elseif (strpos($part, '2B.') !== false) {
        $p2b = substr($part, strpos($part, 'INSERT INTO '));
        $p2b = substr($p2b, 0, strrpos($p2b, ';') + 1);
    } elseif (strpos($part, '2C.') !== false) {
        $p2c = substr($part, strpos($part, 'INSERT INTO '));
        $p2c = substr($p2c, 0, strrpos($p2c, ';') + 1);
    } elseif (strpos($part, '2D.') !== false) {
        $p2d = substr($part, strpos($part, 'INSERT INTO '));
        $p2d = substr($p2d, 0, strrpos($p2d, ';') + 1);
    }
}

$p1b = str_replace('INSERT INTO', 'INSERT IGNORE INTO', $p1b);
$p2a = str_replace('INSERT INTO', 'INSERT IGNORE INTO', $p2a);
$p2b = str_replace('INSERT INTO', 'INSERT IGNORE INTO', $p2b);
$p2c = str_replace('INSERT INTO', 'INSERT IGNORE INTO', $p2c);
$p2d = str_replace('INSERT INTO', 'INSERT IGNORE INTO', $p2d);

$seederContent = <<<EOT
<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeoAndContentSeeder extends Seeder
{
    public function run()
    {
        DB::unprepared(<<<SQL
$p1a
SQL
        );

        DB::unprepared("DELETE FROM surahs WHERE id IN (1,2);");
        
        DB::unprepared(<<<SQL
$p1b
SQL
        );

        DB::unprepared(<<<SQL
$p2a
SQL
        );

        DB::unprepared(<<<SQL
$p2b
SQL
        );

        DB::unprepared(<<<SQL
$p2c
SQL
        );

        DB::unprepared(<<<SQL
$p2d
SQL
        );
    }
}
EOT;
file_put_contents('database/seeders/SeoAndContentSeeder.php', $seederContent);
