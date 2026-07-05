import re

with open('scratch_STEP 2 SEED DATA — INSERT UNIQUE CONTENT.md', 'r', encoding='utf-8') as f:
    content = f.read()

match = re.search(r'(\$cities\s*=\s*\[.*?\];)', content, re.DOTALL | re.IGNORECASE)
if not match:
    print('Array not found')
    exit(1)

code = match.group(1)

code = code.replace(r'\_', '_').replace(r'\[', '[').replace(r'\]', ']')

new_code = []
in_string = False
for i, c in enumerate(code):
    if c == "'":
        prev_c = code[i-1] if i > 0 else ' '
        next_c = code[i+1] if i < len(code)-1 else ' '
        
        if (prev_c in ' [=>(\n\t' and not in_string) or (next_c in ' ,]\n\t' and in_string):
            in_string = not in_string
            new_code.append(c)
        else:
            if len(new_code) > 0 and new_code[-1] != '\\':
                new_code.append('\\')
            new_code.append(c)
    else:
        new_code.append(c)

cities_array = ''.join(new_code)

out_code = f'''<?php
namespace Database\\Seeders;

use Illuminate\\Database\\Seeder;
use Illuminate\\Support\\Facades\\DB;

class CityPrayerContentSeeder extends Seeder
{{
    public function run(): void
    {{
        {cities_array}
        
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
print('Seeder written successfully')
