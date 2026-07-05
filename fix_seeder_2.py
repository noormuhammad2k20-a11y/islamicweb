import re

with open(r'database\seeders\CityPrayerContentSeeder.php', 'r', encoding='utf-8') as f:
    code = f.read()

# Fix unescaped single quotes inside the array
# We find all string values that are mapped to keys. e.g. 'article_en' => '...',
# The safest way is to use regex to find all text between => ' and ',
def escape_quotes(m):
    key_part = m.group(1)
    val_part = m.group(2)
    # inside val_part, escape any single quotes that are not already escaped
    val_part = re.sub(r"(?<!\\)'", r"\'", val_part)
    return key_part + val_part + "',"

# We can match: 'some_key' => 'some_value',
code = re.sub(r"('[a-z_]+'\s*=>\s*')(.*?)('[\s\n]*,)", escape_quotes, code, flags=re.DOTALL)

with open(r'database\seeders\CityPrayerContentSeeder.php', 'w', encoding='utf-8') as out:
    out.write(code)
