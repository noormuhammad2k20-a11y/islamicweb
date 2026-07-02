import re

log_file = r"C:\Users\n tech\.gemini\antigravity-ide\brain\ed825b68-f1bb-4567-8381-952edff3406d\.system_generated\logs\transcript.jsonl"
with open(log_file, "r", encoding="utf-8") as f:
    content = f.read()

matches = re.finditer(r".{0,100}Qibla & City Info.{0,1000}", content, re.DOTALL)
for i, m in enumerate(matches):
    print(f"Match {i}:")
    # print(m.group(0))
    # Too much text, let's just save the entire transcript lines that have city.blade.php
    
with open(log_file, "r", encoding="utf-8") as f:
    lines = f.readlines()
    
found = []
for line in lines:
    if "Qibla & City Info" in line:
        found.append(line)

with open(r"d:\Xamp\htdocs\Islamicwebsite\found_lines.txt", "w", encoding="utf-8") as out:
    out.write("\n".join(found))
    
print(f"Saved {len(found)} lines")
