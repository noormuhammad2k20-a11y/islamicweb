import os
import json
import time
import argparse
import google.generativeai as genai
from dotenv import load_dotenv
from pydantic import BaseModel, Field

# Load environment variables
load_dotenv()
api_key = os.getenv("GEMINI_API_KEY")
if not api_key:
    print("Error: GEMINI_API_KEY not found in .env")
    exit(1)

genai.configure(api_key=api_key)

# Pydantic schema for structured JSON output
class DreamInterpretation(BaseModel):
    symbol_urdu: str = Field(description="The dream symbol in Urdu (e.g., پانی, سانپ)")
    symbol_arabic: str = Field(description="The dream symbol in Arabic")
    symbol_english: str = Field(description="The dream symbol in English")
    short_interpretation: str = Field(description="A 1-2 sentence short summary of the meaning in Urdu")
    detailed_interpretation_urdu: str = Field(description="The complete, detailed interpretation in Urdu")
    detailed_interpretation_english: str = Field(description="The complete, detailed interpretation in English")
    scholar_reference: str = Field(description="The scholar who interpreted this (e.g., Imam Ibn Sirin, Ibn Shaheen)")
    source_book: str = Field(description="The source book name if known (e.g., Ta'beer al-Ru'ya)")
    dream_type: int = Field(description="0 for Neutral, 1 for Good, 2 for Bad, 3 for Warning")
    keywords: list[str] = Field(description="List of related keywords in English and Urdu")
    search_keywords: str = Field(description="Comma separated search keywords including Roman Urdu (e.g., pani dekhna, snake in dream)")
    seo_title: str = Field(description="SEO optimized title in Urdu and English (max 60 chars)")
    meta_description: str = Field(description="SEO optimized meta description (max 150 chars)")

class DreamBatch(BaseModel):
    dreams: list[DreamInterpretation]

def generate_dreams_batch(topic: str, count: int = 10):
    print(f"\nGenerating {count} Dreams for category: {topic}...")
    
    prompt = f"""
    You are an expert in classical Islamic Dream Interpretation based on the works of Imam Ibn Sirin, Ibn Shaheen, and Abdul Ghani al-Nabulsi.
    Generate {count} authentic, unique dream symbols and their interpretations related to the category: '{topic}'.
    
    CRITICAL RULES:
    1. Only provide authentic interpretations traditionally attributed to classical Islamic scholars.
    2. Do NOT invent meanings. If a symbol has multiple interpretations (e.g., seeing a snake can mean an enemy or wealth), explain this nuance in the detailed interpretation.
    3. Ensure high quality Urdu and English text.
    4. Provide Roman Urdu keywords to help users search (e.g., 'khwab mein saanp dekhna').
    5. SEO fields must be optimized for search engines.
    """

    model = genai.GenerativeModel('gemini-2.5-flash')
    
    try:
        response = model.generate_content(
            prompt,
            generation_config=genai.GenerationConfig(
                response_mime_type="application/json",
                response_schema=DreamBatch,
                temperature=0.2,
            )
        )
        
        batch_data = json.loads(response.text)
        return batch_data.get("dreams", [])
        
    except Exception as e:
        print(f"Failed to generate for category {topic}. Error: {e}")
        return []

def main():
    OUTPUT_FILE = "dreams_database.json"
    DREAMS_PER_TOPIC = 10
    
    # Comprehensive list of classic dream categories
    CATEGORIES = [
        "Animals and Beasts (Snakes, Lions, Dogs, etc.)",
        "Water, Rain, Rivers and Oceans",
        "Prophets, Angels, and Holy Figures",
        "Death, Graves, and the Deceased",
        "Marriage, Divorce, and Relationships",
        "Food, Fruits, and Eating",
        "Fire, Earthquakes, and Disasters",
        "Flying, Falling, and Travel",
        "Money, Gold, and Wealth",
        "Body Parts, Teeth Falling, and Hair",
        "Clothing, Jewelry, and Adornment",
        "Trees, Gardens, and Nature",
        "Weapons, War, and Enemies",
        "Insects, Spiders, and Scorpions",
        "Birds and Poultry",
        "Pregnancy, Children, and Birth",
        "Sickness, Medicine, and Healing",
        "The Sun, Moon, Stars, and Sky",
        "Houses, Buildings, and Doors",
        "Crying, Laughing, and Emotions"
    ]
    
    all_dreams = []
    
    if os.path.exists(OUTPUT_FILE):
        try:
            with open(OUTPUT_FILE, 'r', encoding='utf-8') as f:
                all_dreams = json.load(f)
                print(f"Loaded {len(all_dreams)} existing dreams from {OUTPUT_FILE}")
        except:
            pass
            
    for category in CATEGORIES:
        batch = generate_dreams_batch(category, DREAMS_PER_TOPIC)
        if batch:
            all_dreams.extend(batch)
            
            with open(OUTPUT_FILE, 'w', encoding='utf-8') as f:
                json.dump(all_dreams, f, ensure_ascii=False, indent=4)
            
            print(f"Successfully added {len(batch)} records. Total: {len(all_dreams)}")
        
        # Respect rate limits (15 RPM for free tier -> 4 seconds per request)
        # To completely avoid 429 quota errors, sleep 16 seconds between batches
        time.sleep(16)
        
    print(f"\nDone! Generated {len(all_dreams)} dreams and saved to {OUTPUT_FILE}.")
    print("Run `php artisan dreams:import dreams_database.json` to load them into MySQL.")

if __name__ == "__main__":
    main()
