import json

log_file = r"C:\Users\n tech\.gemini\antigravity-ide\brain\ed825b68-f1bb-4567-8381-952edff3406d\.system_generated\logs\transcript.jsonl"
with open(log_file, "r", encoding="utf-8") as f:
    for line in f:
        try:
            step = json.loads(line)
            if step.get("type") == "TOOL_RESPONSE" and "tool_responses" in step:
                for resp in step["tool_responses"]:
                    if resp.get("name") == "view_file":
                        out = resp.get("response", {}).get("output", "")
                        if "city.blade.php" in out and "Total Lines:" in out:
                            print(f"\n--- VIEW FILE AT STEP {step.get('step_index')} ---")
                            # print(out[:200] + "...\n")
                            # We want to extract the exact lines shown
                            lines_shown = []
                            for out_line in out.split("\n"):
                                if ":" in out_line and out_line.split(":")[0].isdigit():
                                    lines_shown.append(out_line)
                            if lines_shown:
                                print(f"Captured {len(lines_shown)} lines, from {lines_shown[0].split(':')[0]} to {lines_shown[-1].split(':')[0]}")
                                with open(rf"d:\Xamp\htdocs\Islamicwebsite\view_dump_step_{step.get('step_index')}.txt", "w", encoding="utf-8") as dump:
                                    dump.write("\n".join(lines_shown))
        except Exception:
            pass
