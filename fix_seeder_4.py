import re

with open('scratch_STEP 2 SEED DATA — INSERT UNIQUE CONTENT.md', 'r', encoding='utf-8') as f:
    content = f.read()

# Clean markdown brackets and underscores
content = content.replace(r'\_', '_').replace(r'\[', '[').replace(r'\]', ']')

start_idx = content.find('$cities = [')
if start_idx == -1:
    print('Failed to find $cities = [')
    exit(1)

end_idx = content.find('];', start_idx)
if end_idx == -1:
    print('Failed to find ];')
    exit(1)

array_code = content[start_idx:end_idx + 2]

# The array has values that contain single quotes, like 'Pakistan\'s largest city'.
# Since the markdown had 'Pakistan\'s largest city', when we read it, it's already got the backslash.
# BUT we also need to make sure unescaped single quotes inside the text are escaped.
# Actually, the markdown has 'Pakistan\'s' literally, which means when we write it, it will be correct if we don't mess it up.
# Let's check if there are unescaped single quotes.
def escape_quotes(m):
    key_part = m.group(1)
    val_part = m.group(2)
    end_part = m.group(3)
    # inside val_part, replace unescaped single quotes with escaped ones
    # the regex for unescaped single quote is (?<!\\)'
    val_part = re.sub(r"(?<!\\)'", r"\'", val_part)
    return key_part + val_part + end_part

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
