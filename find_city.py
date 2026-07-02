import json

log_file = r"C:\Users\n tech\.gemini\antigravity-ide\brain\ed825b68-f1bb-4567-8381-952edff3406d\.system_generated\logs\transcript.jsonl"

file_content = ""

# Read from bottom to top
with open(log_file, "r", encoding="utf-8") as f:
    lines = f.readlines()

for line in reversed(lines):
    try:
        step = json.loads(line)
        if step.get("type") == "TOOL_CALL" and "tool_calls" in step:
            for tc in step["tool_calls"]:
                args = tc.get("arguments", {})
                if isinstance(args, str):
                    args = json.loads(args)
                if tc.get("name") in ["replace_file_content", "write_to_file"] and "city.blade.php" in args.get("TargetFile", ""):
                    print("Found edit in step:", step.get("step_index"))
                    
        if step.get("type") == "TOOL_RESPONSE" and "tool_responses" in step:
            # We can also check tool responses for view_file
            pass
            
    except Exception as e:
        pass
