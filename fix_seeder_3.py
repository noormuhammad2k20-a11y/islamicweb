import re

with open('scratch_STEP 2 SEED DATA — INSERT UNIQUE CONTENT.md', 'r', encoding='utf-8') as f:
    content = f.read()

start_idx = content.find('$cities = [')
if start_idx == -1:
    start_idx = content.find('\$cities = [')

if start_idx == -1:
    print('Failed to find $cities')
    exit(1)

end_idx = content.find('];', start_idx)
if end_idx == -1:
    # check for \] instead of ]
    end_idx = content.find('\];', start_idx)

if end_idx == -1:
    print('Failed to find ];')
    exit(1)

array_code = content[start_idx:end_idx + 2]

# Remove markdown escapes
array_code = array_code.replace(r'\_', '_').replace(r'\[', '[').replace(r'\]', ']')

# Fix quotes inside values using a regex
def escape_quotes(m):
    return m.group(1) + m.group(2).replace("'", "\\'") + m.group(3)

array_code = re.sub(r"('[a-z_]+'\s*=>\s*')(.*?)('[\s\n]*,)", escape_quotes, array_code, flags=re.DOTALL)

out_code = f'''<?php
namespace Database\\Seeders;

use Illuminate\\Database\\Seeder;
use Illuminate\\Support\\Facades\\DB;

class CityPrayerContentSeeder extends Seeder
{{
    public function run(): void
    {{
        {array_code}
        
        foreach ($cities as $city) {{
            DB::table('city_prayer_contents')->updateOrInsert(
                ['city_slug' => $city['city_slug']],
                $city
            );
        }}
    }}
}}
'''

with open(r'database\seeders\CityPrayerContentSeeder.php', 'w', encoding='utf-8') as out:
    out.write(out_code)
print('Done!')
