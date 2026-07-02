import os
import json
import time
import google.generativeai as genai
from dotenv import load_dotenv

# Load environment variables
load_dotenv()

# Configure the API key
API_KEY = os.getenv("GEMINI_API_KEY")
if not API_KEY:
    print("Error: Please set GEMINI_API_KEY in your .env file.")
    exit(1)

genai.configure(api_key=API_KEY)

# Topics / Categories to loop through to ensure variety
TOPICS = [
    "Rizq and Wealth",
    "Health and Shifa",
    "Marriage and Relationships",
    "Success in Exams and Studies",
    "Protection from Evil Eye and Magic",
    "Forgiveness and Repentance (Tawbah)",
    "Patience and Hardships",
    "Children and Offspring",
    "Safety during Travel",
    "Overcoming Debt",
    "Peace of Mind and Anxiety Relief",
    "Anger Management",
    "Guidance and Hidayah",
    "Protection from Enemies",
    "Blessings in Home",
    "Morning and Evening Supplications"
]

WAZAIF_PER_TOPIC = 10  # Start small for testing. Increase this to generate thousands.
OUTPUT_FILE = "wazaif_data.json"

# Define the exact JSON schema for the output
wazifa_schema = {
    "type": "array",
    "items": {
        "type": "object",
        "properties": {
            "title_urdu": {"type": "string"},
            "title_english": {"type": "string"},
            "arabic_text": {"type": "string"},
            "urdu_text": {"type": "string", "description": "Full translation and explanation in Urdu"},
            "english_translation": {"type": "string"},
            "transliteration": {"type": "string"},
            "method": {"type": "string", "description": "Method of reciting the wazifa in Urdu"},
            "benefits": {"type": "string", "description": "Benefits of the wazifa in Urdu"},
            "frequency": {"type": "string", "description": "E.g., 3 times, 7 times, 100 times"},
            "before_after_salah": {"type": "string", "description": "E.g., After Fajr, Any time"},
            "conditions": {"type": "string", "description": "Any specific conditions in Urdu (e.g. wudu)"},
            "precautions": {"type": "string"},
            "recommended_situations": {"type": "string"},
            "book_name": {"type": "string", "description": "E.g., Al-Quran, Sahih Bukhari, Hisnul Muslim"},
            "chapter": {"type": "string"},
            "hadith_number": {"type": "string"},
            "authenticity_grade": {"type": "string", "description": "E.g., Sahih, Hasan. Must be authentic."},
            "scholar_verification": {"type": "string"},
            "reference": {"type": "string"},
            "reference_details": {"type": "string"},
            "is_authentic": {"type": "integer", "description": "Always set to 1"},
            "categories": {
                "type": "array",
                "items": {"type": "string"},
                "description": "Array of category names like ['Rizq', 'Morning']"
            }
        },
        "required": [
            "title_urdu", "title_english", "arabic_text", "urdu_text", "english_translation", 
            "method", "benefits", "frequency", "book_name", "authenticity_grade", "categories", "is_authentic"
        ]
    }
}

def generate_wazaif_for_topic(topic, count):
    print(f"\nGenerating {count} Wazaif for topic: {topic}...")
    
    prompt = f"""
    You are an expert Islamic Scholar and researcher. 
    Generate {count} highly authentic and verified Islamic Wazaif, Supplications (Duas), or Dhikr related strictly to the topic: "{topic}".
    
    RULES:
    1. ONLY use authentic sources (Quran, Sahih Bukhari, Sahih Muslim, Sunan Abu Dawood, etc.). Do NOT invent or use unverified social media wazaif.
    2. Provide accurate Arabic text with Tashkeel (diacritics).
    3. Provide accurate Urdu translations for 'urdu_text', 'method', and 'benefits'.
    4. Provide English translation.
    5. Be detailed in the 'method' and 'benefits' sections.
    6. Make sure all categories provided are relevant.
    """

    # We use gemini-2.5-flash as it is fast and supports JSON schema
    model = genai.GenerativeModel('gemini-2.5-flash')
    
    try:
        response = model.generate_content(
            prompt,
            generation_config=genai.GenerationConfig(
                response_mime_type="application/json",
                response_schema=wazifa_schema,
                temperature=0.2, # Low temperature for factual accuracy
            )
        )
        
        data = json.loads(response.text)
        return data
    except Exception as e:
        print(f"Failed to generate for topic {topic}. Error: {e}")
        return []

def main():
    all_wazaif = []
    
    # Load existing data if appending
    if os.path.exists(OUTPUT_FILE):
        with open(OUTPUT_FILE, 'r', encoding='utf-8') as f:
            try:
                all_wazaif = json.load(f)
                print(f"Loaded {len(all_wazaif)} existing records from {OUTPUT_FILE}.")
            except json.JSONDecodeError:
                pass

    for topic in TOPICS:
        batch = generate_wazaif_for_topic(topic, WAZAIF_PER_TOPIC)
        if batch:
            all_wazaif.extend(batch)
            
            # Save incrementally
            with open(OUTPUT_FILE, 'w', encoding='utf-8') as f:
                json.dump(all_wazaif, f, ensure_ascii=False, indent=4)
            
            print(f"Successfully added {len(batch)} records. Total: {len(all_wazaif)}")
        
        # Sleep to respect rate limits (Gemini free tier has RPM limits)
        time.sleep(5)
        
    print(f"\nDone! Successfully generated {len(all_wazaif)} Wazaif and saved to {OUTPUT_FILE}.")
    print("You can now import them using: php artisan wazaif:import wazaif_data.json")

if __name__ == "__main__":
    main()
