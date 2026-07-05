import re

with open('scratch_STEP 2 SEED DATA — INSERT UNIQUE CONTENT.md', 'r', encoding='utf-8') as f:
    content = f.read()

content = content.replace(r'\_', '_').replace(r'\[', '[').replace(r'\]', ']')

start_idx = content.find('$cities = [')
if start_idx == -1:
    print('Failed to find $cities')
    exit(1)

end_idx = content.find('];', start_idx)
if end_idx == -1:
    print('Failed to find ];')
    exit(1)

array_code = content[start_idx:end_idx + 2]

def convert_to_double_quotes(m):
    key_part = m.group(1)
    val_part = m.group(2)
    end_part = m.group(3)
    
    # Remove escaped single quotes
    val_part = val_part.replace("\\'", "'")
    # Escape double quotes
    val_part = val_part.replace('"', '\\"')
    # Escape dollar signs for PHP double quoted strings
    val_part = val_part.replace('$', '\\$')
    
    return key_part[:-1] + '"' + val_part + '"' + end_part[1:]

# Match 'some_key' => 'some_value',
array_code = re.sub(r"('[a-z_]+'\s*=>\s*)'(.*?)'(,\s*\n)", convert_to_double_quotes, array_code, flags=re.DOTALL)
# Also handle the last element which might not have a comma
array_code = re.sub(r"('[a-z_]+'\s*=>\s*)'(.*?)'(\s*\n)", convert_to_double_quotes, array_code, flags=re.DOTALL)


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
