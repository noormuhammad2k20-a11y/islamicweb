import json
import glob
import os

logs_dir = r"C:\Users\n tech\.gemini\antigravity-ide\brain"
transcripts = glob.glob(os.path.join(logs_dir, "*", ".system_generated", "logs", "transcript.jsonl"))

for transcript in transcripts:
    with open(transcript, "r", encoding="utf-8") as f:
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
                        print(f"Found edit in transcript {transcript} step {step.get('step_index')}")
                        if "CodeContent" in args:
                            with open(r"d:\Xamp\htdocs\Islamicwebsite\recovered_city.blade.php", "w", encoding="utf-8") as out:
                                out.write(args["CodeContent"])
                            print("RECOVERED FULL FILE!")
                            exit(0)
                        elif "ReplacementContent" in args:
                            # It might be a replace, not full file.
                            pass
        except Exception:
            pass
