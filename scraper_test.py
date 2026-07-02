import requests
from bs4 import BeautifulSoup
url = "https://www.myislamicdream.com/a.html"
headers = {'User-Agent': 'Mozilla/5.0'}
response = requests.get(url, headers=headers)
soup = BeautifulSoup(response.text, 'html.parser')
dreams = soup.select('div.dict-word')
for dream in dreams[:5]:
    print("SYMBOL:", dream.select_one('h3').text.strip() if dream.select_one('h3') else 'N/A')
    print("MEANING:", dream.select_one('p').text.strip() if dream.select_one('p') else 'N/A')
    print("---")
