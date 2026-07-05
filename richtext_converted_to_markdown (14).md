Ye mera existing Laravel Islamic website hai.

GitHub: https://github.com/noormuhammad2k20-a11y/islamicweb

PROBLEM: Mere prayer times pages pe sirf prayer times data show ho raha hai.

Koi article, FAQ, unique content nahi. Example:

/prayer-times/bahawalpur pe bas times + monthly table + nearby cities hai.

GOAL: Har city page aur prayer-specific page pe:

1\. 300–400 word unique article add karo

2\. 5–6 FAQ with schema markup

3\. Rakat info table

4\. City Islamic history paragraph

5\. Sunnah times section

6\. Tomorrow's times section

Existing design/theme bilkul same rahe — sirf content add karo.

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

STEP 1: DATABASE TABLE BANAO

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

\`\`\`sql

CREATE TABLE IF NOT EXISTS city\_prayer\_content (

id INT AUTO\_INCREMENT PRIMARY KEY,

city\_slug VARCHAR(100) NOT NULL UNIQUE,

city\_name VARCHAR(100) NOT NULL,

country VARCHAR(50) NOT NULL DEFAULT 'Pakistan',

country\_code CHAR(2) NOT NULL DEFAULT 'PK',

\-- Article content (unique per city, 300-400 words)

article\_en TEXT NOT NULL,

article\_urdu TEXT,

\-- City Islamic info

famous\_mosques JSON COMMENT '\["Masjid X","Masjid Y"\]',

islamic\_history TEXT NOT NULL,

\-- Country-specific notes

calculation\_note TEXT,

eid\_prayer\_note TEXT,

jummah\_note TEXT,

special\_note TEXT COMMENT 'e.g. Dawateislami for Karachi, Awqaf for Dubai',

created\_at TIMESTAMP DEFAULT CURRENT\_TIMESTAMP,

updated\_at TIMESTAMP DEFAULT CURRENT\_TIMESTAMP ON UPDATE CURRENT\_TIMESTAMP,

INDEX idx\_slug (city\_slug),

INDEX idx\_country (country\_code)

) ENGINE=InnoDB CHARSET=utf8mb4;

\`\`\`

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

STEP 2: SEED DATA — INSERT UNIQUE CONTENT

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Create: database/seeders/CityPrayerContentSeeder.php

Seeder mein ye EXACT unique articles insert karo.

Har city ka article DIFFERENT hona chahiye.

DO NOT copy-paste same article for multiple cities.

\`\`\`php

namespace Database\\Seeders;

use Illuminate\\Database\\Seeder;

use Illuminate\\Support\\Facades\\DB;

class CityPrayerContentSeeder extends Seeder

{

public function run(): void

{

$cities = \[

// ═══ PAKISTAN ═══

\[

'city\_slug' => 'lahore',

'city\_name' => 'Lahore',

'country' => 'Pakistan',

'country\_code' => 'PK',

'article\_en' => 'Lahore, the cultural capital of Pakistan and heart of Punjab, is home to millions of devout Muslims who observe the five daily prayers with great commitment. Prayer time in Lahore today follows the University of Islamic Sciences Karachi calculation method, which is the official standard adopted across Pakistan. The city\\'s geographic coordinates (31.5204°N, 74.3587°E) determine its precise namaz timings, which shift gradually throughout the year as the sun\\'s position changes. Fajr prayer time in Lahore begins at dawn (Subah Sadiq) — approximately 72 minutes before sunrise in standard calculation. This pre-dawn prayer is spiritually significant as it begins the Muslim\\'s day with remembrance of Allah. Lahore\\'s Maghrib prayer time marks the sunset and is one of the most precisely timed prayers, starting exactly at sunset. The city has thousands of mosques where the Azan is called at each prayer time. Major mosques including Badshahi Mosque, Data Darbar, and Masjid Wazir Khan are iconic landmarks where congregational prayers draw large numbers of worshippers. Zuhr prayer time in Lahore falls around midday when the sun reaches its zenith. Asr time in Lahore, following the Hanafi madhab, starts when the shadow of an object becomes twice its length — slightly later than the Shafi calculation. Isha prayer time in Lahore concludes the daily prayer cycle and typically falls around 90 minutes after Maghrib. During Ramadan, prayer times in Lahore hold special significance as Sehri (pre-dawn meal) ends at Fajr time and Iftar begins at Maghrib time. Jummah prayer in Lahore is observed every Friday at Zuhr time, with Lahore\\'s historic mosques hosting thousands of worshippers. The Dawateislami organization, headquartered in Karachi, publishes prayer times that align with these official timings for Lahore.',

'article\_urdu' => 'لاہور، پاکستان کا ثقافتی دارالحکومت اور پنجاب کا دل، لاکھوں مسلمانوں کا گھر ہے جو پانچ وقت کی نماز پابندی سے ادا کرتے ہیں۔ لاہور میں نماز کے اوقات کراچی اسلامک یونیورسٹی کے حساب سے مرتب کیے جاتے ہیں۔ فجر کی نماز طلوعِ آفتاب سے پہلے ادا کی جاتی ہے۔ بادشاہی مسجد، داتا دربار اور مسجد وزیر خان جیسی تاریخی مساجد میں جماعت سے نماز ادا کی جاتی ہے۔',

'famous\_mosques' => json\_encode(\['Badshahi Mosque','Masjid Wazir Khan','Data Darbar Masjid','Sunehri Masjid','Masjid Shuhada'\]),

'islamic\_history' => 'Lahore has been an Islamic city since the 11th century when Sultan Mahmud Ghaznavi conquered it. The city flourished under Mughal rule and became a major center of Islamic scholarship. Saint Ali Hujwiri (Data Ganj Bakhsh), buried at Data Darbar, came to Lahore in 1039 CE and his shrine remains a major pilgrimage site. The Mughal emperors built the magnificent Badshahi Mosque here in 1673 CE.',

'jummah\_note' => 'Jummah prayer in Lahore is observed at Zuhr time. Major congregations gather at Badshahi Mosque, Masjid Shuhada, and thousands of neighborhood mosques. Jummah Khutba begins approximately 15-20 minutes before Zuhr time.',

'special\_note' => 'Dawateislami, the major Islamic organization, operates from Pakistan and its prayer time schedule aligns with official Karachi method timings used for Lahore.',

\],

\[

'city\_slug' => 'karachi',

'city\_name' => 'Karachi',

'country' => 'Pakistan',

'country\_code' => 'PK',

'article\_en' => 'Karachi, Pakistan\\'s largest city and financial capital, hosts one of the world\\'s largest Muslim populations with an estimated 20+ million residents. Prayer time in Karachi is calculated using the University of Islamic Sciences Karachi method — the same institution that developed the calculation standard used across Pakistan and many Muslim countries. Karachi\\'s coastal location (24.8607°N, 67.0011°E) along the Arabian Sea affects its prayer times, with Maghrib arriving slightly earlier in winter months. Fajr prayer time in Karachi is observed before sunrise when the sky begins to lighten. The city\\'s devout Muslim population observes all five prayers, with many masjids in every neighborhood calling the Azan simultaneously. Asr prayer time in Karachi follows the Hanafi madhab, starting when shadow length is double the object height. Dawateislami, Pakistan\\'s major Islamic education and dawah organization headquartered in Karachi, publishes prayer timings and their global network follows Karachi\\'s official calculation. Namaz timing in Karachi today changes daily as the sun\\'s path shifts through the year. During Ramadan, Sehri ends at Fajr time in Karachi and Iftar begins at Maghrib. Key mosques include Masjid-e-Tooba, Memon Masjid, and Masjid-e-Binori Town. Isha prayer time in Karachi typically falls approximately 75-90 minutes after Maghrib. Zuhr prayer time in Karachi arrives when the sun is at its zenith, marking the midday prayer.',

'famous\_mosques' => json\_encode(\['Masjid-e-Tooba','Memon Masjid','Masjid-e-Binori Town','Abdullah Shah Ghazi Dargah Masjid','Masjid Baitul Mukarram'\]),

'islamic\_history' => 'Karachi became a significant Muslim city during the British era and grew enormously after Pakistan\\'s independence in 1947. The city is home to major Islamic seminaries (Darul Ulooms) and the headquarters of Dawateislami and Tableeghi Jamaat\\'s regional operations. The University of Islamic Sciences Karachi developed the prayer time calculation method used globally.',

'jummah\_note' => 'Jummah prayer in Karachi draws massive congregations. Masjid-e-Tooba in Defence Housing Authority is one of the world\\'s largest mosques by capacity. Karachi observes Jummah at Zuhr time.',

'special\_note' => 'Dawateislami (دعوتِ اسلامی), the globally active Islamic organization, is headquartered in Karachi. Prayer times in Karachi are the reference point for the Karachi calculation method used worldwide.',

\],

\[

'city\_slug' => 'islamabad',

'city\_name' => 'Islamabad',

'country' => 'Pakistan',

'country\_code' => 'PK',

'article\_en' => 'Islamabad, the capital of Pakistan and one of the world\\'s most planned cities, observes prayer times according to the official Karachi calculation method. Located at an elevation in the Margalla Hills region (33.6844°N, 73.0479°E), Islamabad\\'s prayer times are slightly different from Lahore due to its more northerly latitude. Fajr time in Islamabad arrives earlier in summer and later in winter — a characteristic of northern cities. Prayer timings in Islamabad Hanafi madhab follow the standard Pakistan schedule. Faisal Mosque, one of the world\\'s largest mosques with a capacity of 300,000 worshippers, is located in Islamabad and serves as a landmark for Friday prayers. The city is the seat of Pakistan\\'s government, and prayer times at government institutions follow the official Islamabad prayer schedule. Asr prayer time in Islamabad (Hanafi) differs from Shafi by approximately 30-40 minutes. Zuhr time in Islamabad arrives at solar noon. Maghrib prayer time in Islamabad coincides exactly with sunset. The twin cities of Islamabad and Rawalpindi share nearly identical prayer times due to their proximity. Namaz timing in Islamabad today is calculated with precision using astronomical data. The Margalla Hills backdrop gives Islamabad a unique Islamic atmosphere with the call to prayer echoing across the valley.',

'famous\_mosques' => json\_encode(\['Faisal Mosque','Shah Faisal Masjid','Masjid Margalla','Masjid-e-Noor','Islamabad Model Mosque'\]),

'islamic\_history' => 'Islamabad was established as Pakistan\\'s capital in the 1960s. The iconic Faisal Mosque, built with Saudi Arabian funding and named after King Faisal, was completed in 1986 and stands as a symbol of Islamic architecture. The city hosts major Islamic institutions including the International Islamic University Islamabad.',

'jummah\_note' => 'Faisal Mosque in Islamabad hosts the largest Jummah congregation in the city. The Pakistan government\\'s official religious affairs department announces moon sighting from Islamabad.',

'special\_note' => 'Prayer timings in Islamabad Hanafi madhab are officially published by the Ministry of Religious Affairs. Islamabad and Rawalpindi prayer times are virtually identical.',

\],

\[

'city\_slug' => 'rawalpindi',

'city\_name' => 'Rawalpindi',

'country' => 'Pakistan',

'country\_code' => 'PK',

'article\_en' => 'Rawalpindi, known as Pindi by locals and the twin city of Islamabad, has a rich Islamic heritage and a large Muslim population that faithfully observes all five daily prayers. Prayer time in Rawalpindi follows the Karachi calculation method, same as the rest of Pakistan. Situated at coordinates 33.5651°N, 73.0169°E, Rawalpindi shares nearly identical prayer times with Islamabad, with differences of only a few seconds. Rawalpindi prayer timings are observed across the city\\'s many historic mosques and modern masjids in its densely populated neighborhoods. Fajr prayer time in Rawalpindi begins before dawn and is announced by the Azan from hundreds of mosques. The city\\'s Asr prayer time (Hanafi) starts when shadow length equals twice the object height. Rawalpindi prayer times today align with the officially published Pakistan prayer schedule. Namaz timing in Rawalpindi Hanafi is the most commonly followed madhab in the city. Rawalpindi Cantt (Cantonment) area has its own large mosque facilities. Zuhr prayer time in Rawalpindi falls at solar noon. Maghrib time in Rawalpindi arrives at sunset. Isha time is observed approximately 75-90 minutes after Maghrib. The Raja Bazaar area of Rawalpindi is known for its numerous historic mosques.',

'famous\_mosques' => json\_encode(\['Liaquat Bagh Mosque','Gurdwara Converted Mosque Rawalpindi','Masjid Quba Rawalpindi','Jamia Masjid Rawalpindi Cantt','Ayub National Park Mosque'\]),

'islamic\_history' => 'Rawalpindi is one of Pakistan\\'s oldest cities with significant Islamic history. It served as a military headquarters during multiple eras. The city\\'s Islamic character was strengthened during the Mughal period.',

'jummah\_note' => 'Rawalpindi prayer timings for Jummah follow Zuhr time. The city\\'s large congregational mosques host Jummah prayers every Friday.',

'special\_note' => 'Rawalpindi and Islamabad share nearly identical prayer times. Rawalpindi prayer timings are the same as Islamabad prayer timings.',

\],

\[

'city\_slug' => 'faisalabad',

'city\_name' => 'Faisalabad',

'country' => 'Pakistan',

'country\_code' => 'PK',

'article\_en' => 'Faisalabad, Pakistan\\'s third-largest city and the country\\'s textile capital, is home to a hardworking Muslim population that maintains its religious practices amid a busy industrial environment. FSD prayer time (as Faisalabad is locally abbreviated) follows the Karachi calculation method for Pakistan. Located at 31.4504°N, 73.1350°E in central Punjab, Faisalabad prayer timings are slightly different from Lahore due to its slightly different longitude. Fajr prayer time in Faisalabad requires waking before dawn, and the city\\'s industrial workers often observe their prayers during factory shifts. Asr prayer time Faisalabad falls in the afternoon and is the prayer many workers observe during work breaks. The famous "Clock Tower" chowk (Ghanta Ghar) area of Faisalabad is surrounded by numerous historic mosques. Prayer time in Faisalabad today is calculated using precise astronomical data. Zuhr time in Faisalabad falls at solar noon. Maghrib time in Faisalabad comes at sunset. Isha time is observed at night, completing the day\\'s prayer cycle. The city has thousands of masjids, with large congregational mosques hosting Jummah prayers attended by thousands every Friday. Namaz timing in Faisalabad follows Hanafi madhab which is the predominant school of thought in Pakistan.',

'famous\_mosques' => json\_encode(\['Jamia Masjid Ghanta Ghar','Masjid-e-Aqsa Faisalabad','Jamia Masjid Raza','Masjid Bilal','Central Mosque Faisalabad'\]),

'islamic\_history' => 'Faisalabad was established as Lyallpur during British colonial rule in 1880. After Pakistan\\'s independence, it was renamed Faisalabad after King Faisal of Saudi Arabia. The city grew rapidly and developed a strong Islamic identity with numerous mosques and madrasas.',

'jummah\_note' => 'Jummah prayer in Faisalabad is a major weekly event. The Clock Tower area mosques and large city mosques host thousands for Friday prayers.',

'special\_note' => 'Faisalabad is sometimes abbreviated as FSD. Prayer time FSD refers to Faisalabad prayer times.',

\],

\[

'city\_slug' => 'peshawar',

'city\_name' => 'Peshawar',

'country' => 'Pakistan',

'country\_code' => 'PK',

'article\_en' => 'Peshawar, the ancient city and capital of Khyber Pakhtunkhwa province, is one of Pakistan\\'s most historically significant Islamic cities. Prayer time in Peshawar follows the Karachi calculation method, though its more northerly and westerly position means its prayer times differ noticeably from Karachi and Lahore. Located at 34.0151°N, 71.5249°E near the Afghan border, Peshawar has a predominantly Pashtun Muslim population known for their strong Islamic identity. Fajr prayer time in Peshawar is observed with great devotion, as the Pashtun culture has deep roots in Islamic practice. The city\\'s Qissa Khwani Bazaar area and the historic old city are lined with ancient mosques. Asr prayer time in Peshawar Hanafi is observed in afternoon. The Mahabat Khan Mosque, built in the 17th century, is one of Peshawar\\'s most beautiful Islamic landmarks. Prayer time in Peshawar today reflects the city\\'s latitude — Fajr arrives later in winter due to its northern position. Zuhr prayer time in Peshawar falls at solar noon. Namaz timing in Peshawar is published daily by local religious authorities. Isha time in Peshawar follows approximately 90 minutes after Maghrib. The city has hundreds of mosques including large Jama Masjids in every neighborhood.',

'famous\_mosques' => json\_encode(\['Mahabat Khan Mosque','Shahi Bala Hisar Mosque','Jamia Mosque Peshawar','Masjid Qasim Ali Khan','Karkhano Market Mosque'\]),

'islamic\_history' => 'Peshawar is one of South Asia\\'s oldest cities with Islamic roots dating to the Arab and Ghaznavid conquests. The city was a major center of Islamic learning under the Mughal Empire. During the Afghan jihad era, Peshawar was a hub for Muslim scholars and fighters. The Pashtun tribal code (Pashtunwali) is deeply intertwined with Islamic values.',

'jummah\_note' => 'Jummah prayer in Peshawar draws massive gatherings. The city\\'s mosques are packed every Friday. Mahabat Khan Mosque is a historic Jummah prayer venue.',

'special\_note' => 'Peshawar prayer times are slightly earlier for Fajr compared to Lahore due to its more westerly longitude.',

\],

\[

'city\_slug' => 'quetta',

'city\_name' => 'Quetta',

'country' => 'Pakistan',

'country\_code' => 'PK',

'article\_en' => 'Quetta, the capital of Balochistan and Pakistan\\'s fruit garden city, has a Muslim population representing multiple ethnicities including Baloch, Pashtun, Hazara, and Punjabi communities, all united in their Islamic faith. Prayer time in Quetta follows the Karachi calculation method for Pakistan. Located at 30.1798°N, 66.9750°E at an elevation of 1,680 meters, Quetta\\'s prayer times are influenced by its high altitude and western position. Fajr time in Quetta is calculated for its precise coordinates. The Hazara community of Quetta is known for its devotion, observing prayers at Imambargahs and mosques throughout the city. Asr prayer time in Quetta Hanafi follows the standard Pakistan calculation. The city\\'s Balochistan Islamic Research Academy and various Islamic educational institutions contribute to its religious character. Quetta prayer times today are calculated with astronomical precision. Zuhr time in Quetta falls at solar noon local time. Maghrib prayer in Quetta arrives at sunset. Due to Quetta\\'s western location in Pakistan, its prayer times are slightly later than Lahore and Islamabad. Isha time in Quetta completes the daily prayer cycle. Namaz timing in Quetta is followed by all Muslim communities in the city.',

'famous\_mosques' => json\_encode(\['Quetta Masjid','Hazarganji Mosque','Alamdar Road Masjid','Mizan-ul-Haq Mosque','Masjid Toot'\]),

'islamic\_history' => 'Quetta has been inhabited since ancient times and came under strong Islamic influence during the medieval period. The city has a diverse Muslim population with both Sunni and Shia communities. It serves as the gateway to Afghanistan and Iran, giving it a unique multicultural Islamic character.',

'jummah\_note' => 'Jummah prayer in Quetta is observed across all communities. The city has numerous congregational mosques for Friday prayers.',

'special\_note' => 'Quetta is Pakistan\\'s westernmost major city. Its prayer times are the latest among Pakistan\\'s major cities.',

\],

\[

'city\_slug' => 'multan',

'city\_name' => 'Multan',

'country' => 'Pakistan',

'country\_code' => 'PK',

'article\_en' => 'Multan, known as the "City of Saints" (Madinat-ul-Awliya), is one of Pakistan\\'s most spiritually significant cities with a rich Sufi heritage. Prayer time in Multan follows the Karachi calculation method. Located at 30.1575°N, 71.5249°E in southern Punjab, Multan\\'s prayer times are calculated precisely for its coordinates. The city is home to numerous shrines of Islamic saints, including Bahauddin Zakariya and Shah Rukn-e-Alam, where thousands of devotees visit daily. Fajr prayer time in Multan is observed in the peaceful pre-dawn hours. Asr prayer time Multan Hanafi is the afternoon prayer. The famous Shah Rukn-e-Alam shrine mosque is a major Islamic landmark. Multan\\'s extreme summer heat makes the Zuhr prayer an important midday observance. Namaz timing in Multan today is followed by the city\\'s large Muslim population. Maghrib prayer in Multan arrives at sunset. Isha time in Multan completes the evening prayers. The city has a strong Barelvi and Sufi tradition with numerous Dargahs (shrines) that function as important Islamic centers. Multan has been an Islamic city since the Arab conquest in 712 CE, making it one of South Asia\\'s oldest Muslim cities.',

'famous\_mosques' => json\_encode(\['Shah Rukn-e-Alam Shrine Mosque','Bahauddin Zakariya Shrine Mosque','Masjid Mustafa Multan','Eid Gah Multan','Jamia Masjid Multan'\]),

'islamic\_history' => 'Multan was conquered by Muhammad bin Qasim in 712 CE, making it one of the first cities in South Asia to embrace Islam. The city became a major center of Sufi saints and Islamic scholarship. Saints like Bahauddin Zakariya and Shah Shams Tabrez are buried here.',

'jummah\_note' => 'Jummah prayer in Multan attracts large congregations at the city\\'s historic mosques and shrine complexes.',

'special\_note' => 'Multan is called City of Saints (Madinat-ul-Awliya). The shrine complexes serve as important Islamic gathering centers.',

\],

\[

'city\_slug' => 'gujranwala',

'city\_name' => 'Gujranwala',

'country' => 'Pakistan',

'country\_code' => 'PK',

'article\_en' => 'Gujranwala, known as the "City of Wrestlers" and an industrial hub of Punjab, has a deeply religious Muslim community that faithfully observes the five daily prayers. Prayer time in Gujranwala follows the Karachi calculation method used across Pakistan. Located at 32.1877°N, 74.1945°E in upper Punjab, Gujranwala\\'s prayer times are similar to Lahore but with slight variations due to its different coordinates. Fajr prayer time in Gujranwala marks the start of the Islamic day. Asr prayer time Gujranwala Hanafi is observed in the afternoon. The city has a strong tradition of Islamic education with numerous madrasas. Zuhr time in Gujranwala arrives at solar noon. Maghrib prayer time Gujranwala comes at sunset. The industrial workers of Gujranwala observe prayer breaks at factories and workshops. Namaz timing in Gujranwala is followed by the city\\'s large Muslim population. Isha prayer time completes the day\\'s prayer cycle. Gujranwala has numerous mosques including large Jama Masjids in each area.',

'famous\_mosques' => json\_encode(\['Jamia Masjid Gujranwala','Masjid Taqwa','Central Mosque Gujranwala','Masjid-e-Ibrahim','Eid Gah Gujranwala'\]),

'islamic\_history' => 'Gujranwala has a strong Islamic heritage as part of Punjab\\'s Muslim majority region. It was the birthplace of Maharaja Ranjit Singh but has been a predominantly Muslim city since the medieval period.',

'jummah\_note' => 'Friday prayers in Gujranwala draw large congregations at city mosques.',

'special\_note' => 'Gujranwala is one of Punjab\\'s major industrial cities with a strong Islamic community.',

\],

\[

'city\_slug' => 'sialkot',

'city\_name' => 'Sialkot',

'country' => 'Pakistan',

'country\_code' => 'PK',

'article\_en' => 'Sialkot, Pakistan\\'s export capital and birthplace of the philosopher-poet Allama Iqbal, is a bustling industrial city with a strong Islamic identity. Prayer time in Sialkot follows the Karachi calculation method. Located at 32.4945°N, 74.5229°E, Sialkot\\'s prayer times are similar to Lahore and Gujranwala. The city is home to many Muslim families engaged in the sports goods and surgical instruments export industries. Fajr prayer time in Sialkot is observed before the workday begins. Allama Iqbal, whose birthplace is preserved as a national monument in Sialkot, was an advocate for Islamic renaissance in South Asia. Asr prayer time Sialkot Hanafi falls in afternoon. Zuhr time in Sialkot arrives at solar noon. Maghrib prayer time Sialkot comes at sunset. The city\\'s factories and export houses often have dedicated prayer rooms for workers. Namaz timing in Sialkot today is calculated with precision. Isha prayer time in Sialkot completes the evening worship.',

'famous\_mosques' => json\_encode(\['Iqbal Memorial Mosque Sialkot','Jamia Masjid Sialkot','Masjid-e-Akbar Sialkot','Imam Bari Mosque','Eid Gah Sialkot'\]),

'islamic\_history' => 'Sialkot is the birthplace of Allama Muhammad Iqbal (1877-1938), the philosopher-poet who envisioned a separate Muslim homeland in South Asia. This vision led to Pakistan\\'s creation in 1947. Sialkot Fort has ancient historical significance.',

'jummah\_note' => 'Jummah prayers in Sialkot are observed at major mosques across the city.',

'special\_note' => 'Sialkot is the birthplace of Allama Iqbal, the spiritual founder of Pakistan.',

\],

\[

'city\_slug' => 'bahawalpur',

'city\_name' => 'Bahawalpur',

'country' => 'Pakistan',

'country\_code' => 'PK',

'article\_en' => 'Bahawalpur, the royal city of southern Punjab and former princely state, is a historically significant Islamic city with magnificent architecture reflecting its royal Islamic heritage. Prayer time in Bahawalpur follows the Karachi calculation method used across Pakistan. Located at 29.3956°N, 71.6836°E in the Cholistan region, Bahawalpur\\'s prayer times are calculated for its southern Punjab coordinates. The city was once the capital of the Bahawalpur State, ruled by the Abbasi dynasty — descendants of the Abbasid Caliphs of Baghdad — giving it a direct connection to Islamic royalty. Fajr prayer time in Bahawalpur marks the beginning of the Islamic day in this historic city. The Noor Mahal palace and Sadiq Garh Palace, both built by the Nawabs of Bahawalpur, are masterpieces of Islamic architecture. Asr prayer time in Bahawalpur Hanafi is observed daily by the city\\'s population. Zuhr time in Bahawalpur falls at solar noon. Bahawalpur sits close to the Cholistan Desert, giving its Maghrib prayer a dramatic desert sunset backdrop. Namaz timing in Bahawalpur today is followed by its Muslim population. Isha prayer time in Bahawalpur completes the day\\'s prayers. The famous Islamia University of Bahawalpur is one of Pakistan\\'s major Islamic educational institutions.',

'famous\_mosques' => json\_encode(\['Jamia Masjid Bahawalpur','Masjid al-Sadiq','Noor Mahal Mosque','Central Mosque Bahawalpur','Islamia University Mosque'\]),

'islamic\_history' => 'Bahawalpur was ruled by the Abbasi Nawabs who claimed descent from the Abbasid Caliphate. The state had a unique Islamic identity. Islamia University Bahawalpur is one of Pakistan\\'s oldest Islamic universities.',

'jummah\_note' => 'Jummah prayers in Bahawalpur are major weekly events at the city\\'s historic mosques.',

'special\_note' => 'Bahawalpur was ruled by Nawabs who were descendants of the Abbasid Caliphate of Baghdad.',

\],

\[

'city\_slug' => 'abbottabad',

'city\_name' => 'Abbottabad',

'country' => 'Pakistan',

'country\_code' => 'PK',

'article\_en' => 'Abbottabad, situated in the beautiful Orash valley of Khyber Pakhtunkhwa, is a hill station city known for its natural beauty and educational institutions. Prayer time in Abbottabad follows the Karachi calculation method. Located at 34.1463°N, 73.2117°E at an elevation of 1,260 meters, Abbottabad\\'s prayer times are influenced by its northern latitude and altitude. Fajr prayer time in Abbottabad arrives later in winter due to the shorter days at this latitude. The city is home to Pakistan Military Academy (PMA) Kakul and many educational institutions where prayer times are strictly observed. Asr prayer time Abbottabad Hanafi falls in the afternoon. Zuhr time in Abbottabad arrives at midday. Maghrib prayer time in Abbottabad is observed at sunset among the mountains. The cool climate of Abbottabad makes outdoor mosque worship particularly pleasant. Namaz timing in Abbottabad is followed by the city\\'s residents and the large military community. Isha prayer time completes the evening. The surrounding Hazara region is known for its devout Muslim population.',

'famous\_mosques' => json\_encode(\['PMA Kakul Mosque','Jamia Masjid Abbottabad','Masjid-e-Noor Abbottabad','Main Market Mosque Abbottabad','Eid Gah Abbottabad'\]),

'islamic\_history' => 'Abbottabad and the broader Hazara region have been Muslim since the medieval period. The city gained global attention in 2011 but its Islamic character remains strong through its many mosques and religious institutions.',

'jummah\_note' => 'Friday prayers in Abbottabad are well-attended at city mosques. The PMA Kakul has its own impressive mosque.',

'special\_note' => 'Abbottabad\\'s prayer times differ slightly from Lahore due to its more northerly latitude.',

\],

\[

'city\_slug' => 'mardan',

'city\_name' => 'Mardan',

'country' => 'Pakistan',

'country\_code' => 'PK',

'article\_en' => 'Mardan, the second-largest city in Khyber Pakhtunkhwa after Peshawar, is an important agricultural and commercial hub with a strongly Islamic Pashtun culture. Prayer time in Mardan follows the Karachi calculation method. Located at 34.1986°N, 72.0404°E in the Peshawar Valley, Mardan prayer times are similar to Peshawar but with slight longitude differences. The Pashtun culture of Mardan is deeply intertwined with Islamic values. Fajr prayer time in Mardan is observed with great dedication by the city\\'s Pashtun community. Mardan is home to Abdul Wali Khan University and numerous Islamic educational institutions. Asr prayer time Mardan Hanafi is observed in the afternoon. Zuhr time in Mardan arrives at solar noon. The city has many mosques in its bazaars and residential areas. Namaz timing in Mardan is followed strictly by the predominantly Pashtun Muslim population. Maghrib prayer time Mardan comes at sunset. Isha prayer time completes the day.',

'famous\_mosques' => json\_encode(\['Jamia Masjid Mardan','Takht-i-Bahi area mosques','Masjid-e-Aqsa Mardan','Central Mosque Mardan','Eid Gah Mardan'\]),

'islamic\_history' => 'Mardan region is home to the ancient Gandhara civilization and Takht-i-Bahi (a UNESCO heritage site). The area converted to Islam with the Muslim conquests and developed a strongly Islamic Pashtun identity.',

'jummah\_note' => 'Jummah prayers in Mardan are major congregational events with Pashtun traditions of large gatherings.',

'special\_note' => 'Mardan is in KPK province. Its prayer times are similar to Peshawar.',

\],

\[

'city\_slug' => 'sahiwal',

'city\_name' => 'Sahiwal',

'country' => 'Pakistan',

'country\_code' => 'PK',

'article\_en' => 'Sahiwal, located in central Punjab along the Ravi river region, is an agricultural city with a deeply religious Muslim population. Prayer time in Sahiwal follows the Karachi calculation method used across Pakistan. Located at 30.6706°N, 73.1064°E in Punjab, Sahiwal\\'s prayer times fall between Lahore and Multan. Fajr prayer time in Sahiwal starts the Islamic day before sunrise. The city\\'s farmers and agricultural workers observe prayer times around their farming schedules. Asr prayer time Sahiwal Hanafi is observed in the afternoon. Zuhr time arrives at midday in Sahiwal. Maghrib prayer time Sahiwal comes at sunset. The city has numerous mosques in its markets and residential areas. Namaz timing in Sahiwal today is followed by the local Muslim population. Isha prayer time completes the evening in Sahiwal.',

'famous\_mosques' => json\_encode(\['Jamia Masjid Sahiwal','Central Mosque Sahiwal','Masjid Taqwa Sahiwal','Eid Gah Sahiwal','Masjid al-Noor Sahiwal'\]),

'islamic\_history' => 'Sahiwal is an ancient city of Punjab with Islamic roots dating to the medieval period. The city was historically known as Montgomery during British rule.',

'jummah\_note' => 'Friday prayers in Sahiwal are held at major mosques across the city.',

'special\_note' => 'Sahiwal was formerly known as Montgomery. It is in central Punjab.',

\],

\[

'city\_slug' => 'sheikhupura',

'city\_name' => 'Sheikhupura',

'country' => 'Pakistan',

'country\_code' => 'PK',

'article\_en' => 'Sheikhupura, an industrial city near Lahore in Punjab, has significant Mughal era historical heritage and a strong Muslim population. Prayer time in Sheikhupura follows the Karachi calculation method. Located at 31.7167°N, 73.9850°E close to Lahore, Sheikhupura\\'s prayer times are very similar to Lahore with minor differences. The city\\'s Hiran Minar, a Mughal-era monument, reflects its Islamic architectural heritage. Fajr prayer time in Sheikhupura marks the dawn prayer. Asr prayer time Sheikhupura Hanafi is the afternoon prayer. Zuhr prayer arrives at solar noon. Maghrib prayer comes at sunset. The city\\'s industrial workers observe prayer breaks. Namaz timing in Sheikhupura today is followed by all Muslims in the city.',

'famous\_mosques' => json\_encode(\['Jamia Masjid Sheikhupura','Hiran Minar area Masjid','Masjid Bilal Sheikhupura','Central Mosque Sheikhupura','Eid Gah Sheikhupura'\]),

'islamic\_history' => 'Sheikhupura has Mughal-era historical significance. The famous Hiran Minar was built by Emperor Jahangir in memory of his pet deer. The area has been Muslim-majority since the Mughal period.',

'jummah\_note' => 'Jummah prayers in Sheikhupura are observed at city mosques.',

'special\_note' => 'Sheikhupura is close to Lahore and shares nearly identical prayer times.',

\],

\[

'city\_slug' => 'sargodha',

'city\_name' => 'Sargodha',

'country' => 'Pakistan',

'country\_code' => 'PK',

'article\_en' => 'Sargodha, Pakistan\\'s Citrus Capital, is an agricultural and military city in central Punjab with a devout Muslim population. Prayer time in Sargodha follows the Karachi calculation method. Located at 32.0836°N, 72.6711°E, Sargodha is home to Pakistan Air Force Base Mushaf, one of the country\\'s most important air bases. Fajr prayer time in Sargodha begins the Islamic day. The military and civilian population of Sargodha observe prayer times with discipline. Asr prayer time Sargodha Hanafi is afternoon prayer. Zuhr time in Sargodha falls at solar noon. Maghrib prayer at sunset. Isha time in Sargodha completes the day. The city is known for its citrus orchards and agricultural wealth. Namaz timing in Sargodha is followed by the city\\'s Muslim population.',

'famous\_mosques' => json\_encode(\['Jamia Masjid Sargodha','PAF Base Mushaf Mosque','Central Mosque Sargodha','Masjid-e-Aqsa Sargodha','Eid Gah Sargodha'\]),

'islamic\_history' => 'Sargodha was established in 1903 during British rule. The area has been Muslim-majority for centuries as part of Punjab.',

'jummah\_note' => 'Friday prayers in Sargodha are held at major mosques. PAF Base Mushaf has its own mosque facilities.',

'special\_note' => 'Sargodha is known as the Citrus Capital of Pakistan.',

\],

\[

'city\_slug' => 'rahim-yar-khan',

'city\_name' => 'Rahim Yar Khan',

'country' => 'Pakistan',

'country\_code' => 'PK',

'article\_en' => 'Rahim Yar Khan, located in the southernmost part of Punjab near the Sindh border, is an agricultural city on the Indus plains. Prayer time in Rahim Yar Khan follows the Karachi calculation method. Situated at 28.4202°N, 70.2952°E, its southern location means slightly different prayer times compared to Lahore. Fajr prayer time in Rahim Yar Khan begins the day. The city\\'s agricultural community — known for cotton and sugarcane farming — observes prayer times between farm activities. Asr prayer time Rahim Yar Khan Hanafi is afternoon prayer. The extreme summer heat of this southern Punjab city makes Zuhr prayer a crucial midday observance. Maghrib time in Rahim Yar Khan comes at sunset. Namaz timing in Rahim Yar Khan is followed by the local Muslim population. Isha prayer completes the evening.',

'famous\_mosques' => json\_encode(\['Jamia Masjid Rahim Yar Khan','Central Mosque RYK','Masjid-e-Noor RYK','Eid Gah Rahim Yar Khan','Khanpur Dam Mosque'\]),

'islamic\_history' => 'Rahim Yar Khan is named after a local Muslim ruler. The area is part of the ancient Indus civilization region that converted to Islam in the medieval period.',

'jummah\_note' => 'Jummah prayers in Rahim Yar Khan are held at mosques throughout the city.',

'special\_note' => 'Rahim Yar Khan is abbreviated as RYK in Pakistan. It borders Sindh province.',

\],

\[

'city\_slug' => 'okara',

'city\_name' => 'Okara',

'country' => 'Pakistan',

'country\_code' => 'PK',

'article\_en' => 'Okara, an agricultural district in central Punjab, is known for its dairy farms and agricultural productivity. Prayer time in Okara follows the Karachi calculation method. Located at 30.8092°N, 73.4453°E in Punjab, Okara\\'s prayer times fall between Lahore and Multan. The city has a strong Muslim farming community that observes prayer times faithfully. Fajr prayer time in Okara starts the day. Asr prayer time Okara Hanafi is afternoon prayer. Zuhr time in Okara arrives at midday. Maghrib prayer comes at sunset. The military cantonment in Okara has its own mosque facilities. Namaz timing in Okara is followed by the local community. Isha prayer completes the day.',

'famous\_mosques' => json\_encode(\['Central Mosque Okara','Okara Cantt Mosque','Jamia Masjid Okara','Eid Gah Okara','Masjid-e-Ibrahim Okara'\]),

'islamic\_history' => 'Okara was established as a town in 1892 during British rule. Its agricultural lands have been farmed by Muslim families for generations.',

'jummah\_note' => 'Friday prayers in Okara are observed at city mosques.',

'special\_note' => 'Okara is known for its dairy farming. Okara Military Farms are famous across Pakistan.',

\],

// ═══ UAE ═══

\[

'city\_slug' => 'dubai',

'city\_name' => 'Dubai',

'country' => 'UAE',

'country\_code' => 'AE',

'article\_en' => 'Dubai, the global city and commercial capital of the UAE, is home to over 3.5 million residents from more than 200 nationalities, with Muslims forming a significant portion. Prayer time in Dubai follows the UAE Awqaf (General Authority of Islamic Affairs and Endowments — UAQF) calculation, which uses the astronomical method approved for the UAE. Dubai prayer times are published daily by Khaleej Times newspaper and the official UAQF app. Fajr prayer time in Dubai is observed before sunrise when the sky shows the first light. The Dubai Khaleej Times prayer times are widely referenced across the emirate. Asr prayer time in Dubai uses the Shafi madhab as the default UAE calculation, though Hanafi Asr time is also observed by South Asian expatriates. The iconic Dubai Mosque and Jumeirah Mosque are landmarks that attract visitors worldwide. Maghrib prayer time in Dubai coincides with sunset over the Arabian Gulf. Jummah prayer time in Dubai draws thousands to major mosques. Eid prayer time in Dubai is announced officially by the UAE government. Isha prayer time in Dubai completes the night prayer cycle. The Dubai Department of Islamic Affairs (IACAD) regulates mosque activities and prayer times. Awqaf prayer time Dubai follows the official UAE Islamic calendar.',

'famous\_mosques' => json\_encode(\['Jumeirah Mosque','Grand Mosque Dubai (Al Farooq Omar Bin Al Khattab Mosque)','Dubai Frame Mosque','Eid Gah Dubai','Ibn Battuta Mall Mosque'\]),

'islamic\_history' => 'Dubai has ancient Islamic heritage. The Al Fahidi Historical Neighbourhood preserves the old Dubai. The Dubai Museum showcases the emirate\\'s history. Dubai\\'s transformation from a fishing village to a global city happened within living memory, but its Islamic identity remains central to its character.',

'jummah\_note' => 'Jummah prayer time in Dubai is at Zuhr time. Major mosques including Jumeirah Mosque and Al Farooq Mosque host thousands of worshippers. Dubai Khaleej Times publishes Jummah prayer times.',

'eid\_prayer\_note' => 'Eid prayer time in Dubai is announced by the UAE government 1 day before Eid. Prayers are held at major mosques and open-air Eid Gah areas. Eid al-Adha prayer time in Dubai is typically 6:00-7:00 AM.',

'special\_note' => 'Dubai prayer times are published by Khaleej Times daily. The UAQF (UAE Awqaf) calculation method is used. Awqaf prayer time Dubai is the official source.',

'calculation\_note' => 'Dubai uses the UAE UAQF calculation method. This differs from the Karachi method. South Asian expatriates may follow Hanafi Asr time which is 30-40 minutes later than the standard UAE Asr.',

\],

\[

'city\_slug' => 'abu-dhabi',

'city\_name' => 'Abu Dhabi',

'country' => 'UAE',

'country\_code' => 'AE',

'article\_en' => 'Abu Dhabi, the capital of the UAE and seat of the federal government, is a city where Islamic values and modern development coexist seamlessly. Prayer time in Abu Dhabi follows the UAE Awqaf official calculation. Abu Dhabi prayer times are regulated by the General Authority of Islamic Affairs and Endowments (UAQF). The Sheikh Zayed Grand Mosque, one of the world\\'s most magnificent mosques with a capacity of 41,000 worshippers, is the spiritual heart of Abu Dhabi. Fajr prayer time in Abu Dhabi is observed before sunrise. The Awqaf prayer time Abu Dhabi is the official reference for all mosques in the capital. Isha prayer time in Abu Dhabi follows approximately 90 minutes after Maghrib. Asr prayer time in Abu Dhabi follows the default UAE Shafi calculation. The Abu Dhabi Department of Culture and Tourism preserves Islamic heritage sites. Prayer time in Abu Dhabi today is published by the Abu Dhabi Awqaf. Jummah prayer time in Abu Dhabi draws massive congregations to Sheikh Zayed Grand Mosque. Eid prayer time in Abu Dhabi is announced by the UAE government. The UAE President\\'s official residence is in Abu Dhabi, making it the political and spiritual center of the country.',

'famous\_mosques' => json\_encode(\['Sheikh Zayed Grand Mosque','Al Musalla Mosque Abu Dhabi','Khalifa City A Mosque','Mohamed bin Zayed City Mosque','Al Wahda Mosque Abu Dhabi'\]),

'islamic\_history' => 'Abu Dhabi has been an Islamic settlement since the early Islamic era. The Al Ain Oasis, near Abu Dhabi, has UNESCO heritage status and has been inhabited for thousands of years. The UAE was founded in 1971 under Sheikh Zayed, who built the magnificent Sheikh Zayed Grand Mosque.',

'jummah\_note' => 'Jummah prayer at Sheikh Zayed Grand Mosque is broadcast live and draws thousands. Abu Dhabi Awqaf announces Friday sermon topics in advance.',

'eid\_prayer\_note' => 'Eid prayer time in Abu Dhabi is officially announced. Sheikh Zayed Grand Mosque hosts major Eid prayers. Eid prayer timing Abu Dhabi follows UAE government announcement.',

'special\_note' => 'Abu Dhabi Awqaf (UAQF) prayer times are the official reference for UAE prayer times. Islamic prayer times Abu Dhabi follow UAQF calculation.',

\],

\[

'city\_slug' => 'sharjah',

'city\_name' => 'Sharjah',

'country' => 'UAE',

'country\_code' => 'AE',

'article\_en' => 'Sharjah, the third-largest emirate and UAE\\'s Cultural Capital, is known for its strong Islamic values and strict adherence to Islamic principles. Prayer time in Sharjah follows the UAE Awqaf official calculation. Sharjah is unique among UAE emirates for its strict Islamic laws — the sale of alcohol is prohibited and the emirate emphasizes Islamic culture. Fajr prayer time in Sharjah is observed before sunrise. The King Faisal Mosque in Sharjah is one of the UAE\\'s most beautiful mosques. Asr prayer time in Sharjah follows the UAE standard calculation. Jummah prayer time in Sharjah draws large congregations. The Sharjah Department of Islamic Affairs organizes regular Islamic events. Isha prayer time in Sharjah completes the night prayer. Today prayer time Sharjah is published by the UAE Awqaf. Sharjah Jummah prayer time today is at Zuhr time. The emirate\\'s Islamic Museum and Heritage Area are major educational centers.',

'famous\_mosques' => json\_encode(\['King Faisal Mosque Sharjah','Al Noor Mosque Sharjah','Masjid al-Khalid Sharjah','Al Khan Mosque Sharjah','Eid Gah Sharjah'\]),

'islamic\_history' => 'Sharjah has maintained strong Islamic values and is known as the Cultural Capital of the UAE. The emirate has invested heavily in Islamic heritage, museums, and education. Sharjah has won multiple UNESCO awards for its cultural preservation.',

'jummah\_note' => 'Sharjah Jummah prayer time is at Zuhr time. Sharjah has a strong culture of Friday prayers with mosques filled across the emirate. Sharjah Friday prayer time today is officially published.',

'eid\_prayer\_note' => 'Eid prayer time in Sharjah follows UAE official announcement. Major mosques and open areas host Eid prayers.',

'special\_note' => 'Sharjah prohibits alcohol and has strict Islamic laws. Prayer times in Sharjah follow UAE Awqaf official calculation.',

\],

\[

'city\_slug' => 'ajman',

'city\_name' => 'Ajman',

'country' => 'UAE',

'country\_code' => 'AE',

'article\_en' => 'Ajman, the smallest of the seven UAE emirates, is a compact city with a strong Muslim community and growing population. Prayer time in Ajman follows the UAE Awqaf official calculation. Located adjacent to Sharjah, Ajman prayer times are nearly identical to Sharjah prayer times. Fajr prayer time in Ajman is observed before sunrise. Asr prayer time in Ajman follows UAE standard calculation. The Ajman Mosque and other local mosques serve the emirate\\'s Muslim population. Jummah prayer time in Ajman is at Zuhr time. Eid prayer time in Ajman follows UAE government announcement. Isha prayer time Ajman completes the night. Today prayer time Ajman today is published by UAE Awqaf. Ajman prayer time today follows official UAE calculation.',

'famous\_mosques' => json\_encode(\['Ajman Mosque','Sheikh Humaid Bin Rashid Mosque Ajman','Al Rashidiya Mosque Ajman','Masjid al-Farooq Ajman','Eid Gah Ajman'\]),

'islamic\_history' => 'Ajman is one of the original seven emirates of the UAE. The Al Zorah area of Ajman preserves Emirati heritage. The Ajman Museum is located in a historic fort.',

'jummah\_note' => 'Jummah prayer time in Ajman is at Zuhr time. Ajman prayer time today for Friday follows official UAE times.',

'eid\_prayer\_note' => 'Eid prayer time Ajman follows UAE government official announcement.',

'special\_note' => 'Ajman prayer times are nearly identical to Sharjah due to their adjacent location.',

\],

// ═══ SAUDI ARABIA ═══

\[

'city\_slug' => 'makkah',

'city\_name' => 'Makkah',

'country' => 'Saudi Arabia',

'country\_code' => 'SA',

'article\_en' => 'Makkah (Mecca), the holiest city in Islam and birthplace of Prophet Muhammad (PBUH), draws millions of pilgrims from around the world every year for Hajj and Umrah. Prayer time in Makkah is the reference point for Muslims worldwide. Makkah prayer times are led by the Imam of Masjid al-Haram, the Grand Mosque that surrounds the Kaaba. Fajr prayer time in Makkah begins the day before sunrise in the holy city. The Azan from Makkah\\'s minarets is broadcast worldwide and millions of Muslims listen to it daily. Makkah prayer time today follows the Umm al-Qura University calculation used across Saudi Arabia. The Masjid al-Haram (Grand Mosque of Makkah) can accommodate up to 2.5 million worshippers simultaneously. Asr prayer time in Makkah follows Shafi madhab as per Saudi Arabia\\'s official calculation. Zuhr prayer time in Makkah falls at solar noon. During Hajj, prayer times in Makkah are observed at Mina, Arafat, and Muzdalifah according to the same schedule. Maghrib prayer in Makkah — when the sun sets over the Kaaba — is one of the most spiritually significant moments in Islam. Haram prayer time is broadcast worldwide. Isha prayer time in Makkah completes the night prayer behind the Imam of the Haram.',

'famous\_mosques' => json\_encode(\['Masjid al-Haram (Grand Mosque)','Masjid al-Tan\\'eem (Masjid Aisha)','Masjid al-Khayf (Mina)','Masjid al-Jinn','Masjid al-Ijabah'\]),

'islamic\_history' => 'Makkah is Islam\\'s holiest city. The Kaaba, built by Prophet Ibrahim and his son Ismail (PBUH), is the direction of prayer for all Muslims. Prophet Muhammad (PBUH) was born here in 570 CE. The city was conquered by Muslims in 630 CE (Fatah Makkah). No non-Muslim is permitted to enter Makkah.',

'jummah\_note' => 'Jummah prayer at Masjid al-Haram in Makkah is led by the Grand Imam of the Haram and broadcast globally. This is considered the most blessed Jummah prayer in the world.',

'eid\_prayer\_note' => 'Eid prayer in Makkah is performed at Masjid al-Haram. Eid is announced by the Saudi Supreme Court based on moon sighting.',

'special\_note' => 'Makkah prayer times are the spiritual reference for the entire Muslim world. Haram prayer time Makkah is broadcast live globally. Masjid al-Haram prayer times are published by Saudi Arabia\\'s Ministry of Islamic Affairs.',

'calculation\_note' => 'Makkah prayer times use the Umm al-Qura University calculation, the official Saudi Arabia method.',

\],

\[

'city\_slug' => 'madinah',

'city\_name' => 'Madinah',

'country' => 'Saudi Arabia',

'country\_code' => 'SA',

'article\_en' => 'Madinah (Medina), the City of the Prophet and second holiest city in Islam, is where Prophet Muhammad (PBUH) established the first Islamic state and where his blessed tomb is located. Prayer time in Madinah follows the Umm al-Qura calculation used across Saudi Arabia. Madinah prayer times are led by the Imam of Masjid al-Nabawi (Prophet\\'s Mosque). Fajr prayer time in Madinah is observed in the most blessed atmosphere of the Prophet\\'s city. The Masjid al-Nabawi (Prophet\\'s Mosque), originally built by Prophet Muhammad (PBUH) himself, has been expanded multiple times and can now accommodate up to 1 million worshippers. Masjid Nabawi prayer times are broadcast worldwide and observed with great devotion. Asr prayer time in Madinah follows Saudi Arabia\\'s official calculation. Zuhr prayer at the Prophet\\'s Mosque is led by the Imam of Masjid Nabawi. Maghrib prayer time in Madinah marks the end of the fasting day during Ramadan. Prayer in Masjid al-Nabawi is equivalent to 1,000 prayers elsewhere according to Hadith. Medina prayer times today use the Umm al-Qura calculation. Isha prayer in Madinah is followed by Tahajjud prayers throughout the night in this blessed city.',

'famous\_mosques' => json\_encode(\['Masjid al-Nabawi (Prophet\\'s Mosque)','Masjid Quba','Masjid al-Qiblatayn','Masjid al-Jumua','Masjid al-Miqat'\]),

'islamic\_history' => 'Madinah was the destination of the Hijra (migration) of Prophet Muhammad (PBUH) in 622 CE, marking Year 1 of the Islamic calendar. The city is home to the Prophet\\'s Mosque and his blessed tomb. Masjid Quba, also in Madinah, was the first mosque built in Islamic history.',

'jummah\_note' => 'Jummah prayer at Masjid al-Nabawi is led by the Imam of the Prophet\\'s Mosque and is one of the most sought-after religious experiences. Prayer in Masjid al-Nabawi on Friday equals 1,000 ordinary Jummah prayers according to Islamic scholars.',

'eid\_prayer\_note' => 'Eid prayers in Madinah are held at Masjid al-Nabawi and Eid Gah areas. Eid is announced per Saudi Arabia\\'s official moon sighting.',

'special\_note' => 'Madinah prayer times are published by the Saudi Ministry of Islamic Affairs. Masjid Nabawi prayer times are broadcast globally. Prayer in Masjid al-Nabawi carries special spiritual rewards.',

'calculation\_note' => 'Madinah uses the Umm al-Qura University calculation method — the official Saudi Arabia standard.',

\],

\[

'city\_slug' => 'riyadh',

'city\_name' => 'Riyadh',

'country' => 'Saudi Arabia',

'country\_code' => 'SA',

'article\_en' => 'Riyadh, the capital of Saudi Arabia and one of the world\\'s largest cities, is the political and administrative heart of the Kingdom. Prayer time in Riyadh is strictly observed throughout the city, with shops and businesses required to close during prayer times by law. Riyadh prayer times follow the Umm al-Qura University calculation, Saudi Arabia\\'s official method. Fajr prayer time in Riyadh begins the day before sunrise. Today prayer time in Riyadh is published by the Saudi Ministry of Islamic Affairs and widely referenced. The King Khalid Grand Mosque and Al Rajhi Mosque are among Riyadh\\'s most prominent mosques. Asr prayer time in Riyadh follows the Saudi Shafi-based calculation. Zuhr prayer time in Riyadh falls at solar noon. During prayer times in Riyadh, the Hay\\'a (religious police, now reformed) enforced closure of shops — a tradition still observed voluntarily by many businesses. Maghrib prayer time in Riyadh marks the end of the fast during Ramadan. Jummah prayer time Riyadh is observed with shops closing. Isha prayer time in Riyadh completes the night.',

'famous\_mosques' => json\_encode(\['King Khalid Grand Mosque Riyadh','Al Rajhi Mosque Riyadh','Imam Turki bin Abdullah Grand Mosque','King Fahd Mosque Riyadh','Masjid al-Ansar Riyadh'\]),

'islamic\_history' => 'Riyadh was the capital of the First Saudi State established by Muhammad bin Saud and Muhammad ibn Abd al-Wahhab in 1744. The Diriyah area, near Riyadh, is the birthplace of the Saudi state and a UNESCO World Heritage Site.',

'jummah\_note' => 'Jummah prayer time Riyadh is a significant event. Shops close and businesses shut during Friday prayers in Riyadh. Jummah prayer time riyadh today follows the official Saudi schedule.',

'eid\_prayer\_note' => 'Eid prayer time in Riyadh is announced by the Saudi Supreme Court. Open prayer grounds (Musalla) across Riyadh host Eid prayers.',

'special\_note' => 'Prayer time Riyadh today is strictly observed. Saudi Arabia law requires businesses to close during prayer times. Today prayer time in Riyadh is widely referenced by South Asian expats.',

'calculation\_note' => 'Riyadh uses Umm al-Qura University calculation method.',

\],

\[

'city\_slug' => 'jeddah',

'city\_name' => 'Jeddah',

'country' => 'Saudi Arabia',

'country\_code' => 'SA',

'article\_en' => 'Jeddah, Saudi Arabia\\'s commercial capital and gateway city for Hajj and Umrah pilgrims, is a cosmopolitan city on the Red Sea coast. Prayer time in Jeddah follows the Umm al-Qura calculation. Jeddah prayer times today are widely followed by Saudi nationals and the large expatriate community. Fajr prayer time in Jeddah begins before sunrise over the Red Sea. The city\\'s historic Al-Balad neighborhood (a UNESCO World Heritage Site) has centuries-old mosques. The Floating Mosque (Mosque of the Open Sea) in Jeddah is an iconic landmark that appears to float on the Red Sea. Asr prayer time in Jeddah follows Saudi calculation. Zuhr prayer time in Jeddah falls at solar noon. The King Fahd Fountain — world\\'s tallest fountain — stands near several prominent mosques. Today prayer time jeddah is published by Saudi authorities. Maghrib prayer time in Jeddah marks sunset over the Red Sea. Juma prayer time Jeddah is observed weekly. Isha prayer time in Jeddah completes the night.',

'famous\_mosques' => json\_encode(\['Al-Shafi\\'i Mosque Jeddah (oldest)','Floating Mosque (Masjid al-Rahma)','King Fahd Mosque Jeddah','Qishla Mosque (Al-Balad)','Masjid Bilal Jeddah'\]),

'islamic\_history' => 'Jeddah has been an important Islamic city and gateway for Hajj pilgrims for over 1,400 years. The historic Al-Balad district with its coral-stone buildings is a UNESCO World Heritage Site. Eve\\'s Tomb (Hawwa) is traditionally said to be located in Jeddah.',

'jummah\_note' => 'Jummah prayer time Jeddah is observed weekly. The city\\'s large mosques host thousands for Friday prayers. Juma prayer time in jeddah today follows official Saudi schedule.',

'eid\_prayer\_note' => 'Eid prayer time in Jeddah follows Saudi government announcement. Open musallas and major mosques host Eid prayers.',

'special\_note' => 'Jeddah is the gateway city for Umrah pilgrims. Today prayer time jeddah is widely referenced by millions of pilgrims passing through.',

\],

\[

'city\_slug' => 'dammam',

'city\_name' => 'Dammam',

'country' => 'Saudi Arabia',

'country\_code' => 'SA',

'article\_en' => 'Dammam, the capital of Saudi Arabia\\'s Eastern Province and center of the Kingdom\\'s oil industry, is a modern city with a strong Islamic community. Prayer time in Dammam follows the Umm al-Qura University calculation used across Saudi Arabia. Located on the Arabian Gulf coast, Dammam prayer times are similar to Khobar and Jubail. Fajr prayer time in Dammam is observed before sunrise over the Gulf. The city\\'s prosperity from oil wealth has funded the construction of many magnificent mosques. Asr prayer time in Dammam follows Saudi calculation. Today prayer time in Dammam is published by Saudi authorities. Zuhr prayer at midday in Dammam. Maghrib prayer time Dammam today marks sunset over the Arabian Gulf. Prayer time Dammam today is widely followed by the large Pakistani, Indian, and other South Asian expatriate communities working in the oil industry. Jummah prayer time in Dammam is a significant weekly event. Isha prayer time in Dammam completes the night. Prayer time in Dammam today follows official Saudi schedule.',

'famous\_mosques' => json\_encode(\['Al Ameer Mosque Dammam','Masjid al-Jafali Dammam','King Fahd Mosque Dammam','Al Faisaliyah Mosque Dammam','Eid Gah Dammam'\]),

'islamic\_history' => 'Dammam grew rapidly after the discovery of oil in 1938. The Eastern Province has significant Islamic heritage with ancient Muslim settlements along the Gulf coast.',

'jummah\_note' => 'Jummah prayer in Dammam is observed at major mosques. The large South Asian expatriate community follows the official Saudi prayer times.',

'eid\_prayer\_note' => 'Eid prayer time in Dammam follows Saudi government announcement. Major mosques and open musallas host Eid prayers.',

'special\_note' => 'Dammam is the center of Saudi Arabia\\'s oil industry. Today prayer time Dammam is followed by thousands of Pakistani and Indian expats.',

\],

// ═══ INDIA (Kerala focus) ═══

\[

'city\_slug' => 'calicut',

'city\_name' => 'Calicut',

'country' => 'India',

'country\_code' => 'IN',

'article\_en' => 'Calicut (Kozhikode), the historic city on Kerala\\'s Malabar Coast, has been an important center of Islamic civilization in South Asia since Arab traders arrived here in the 7th century CE. Prayer time in Calicut follows calculations for its geographic coordinates (11.2588°N, 75.7804°E) in Kerala, India. The city\\'s Muslim community, known as Mappila Muslims, are descendants of Arab traders and local converts who have preserved their Islamic identity for over 1,400 years. Fajr prayer time in Calicut begins before sunrise over the Arabian Sea. The Miskal Mosque in Calicut, built in the 14th century, is one of India\\'s oldest mosques. Asr prayer time in Calicut follows the Shafi madhab which is predominant in Kerala. Zuhr prayer time in Calicut falls at solar noon. Prayer time calicut today is followed by the city\\'s large Muslim population. Maghrib prayer time in Calicut marks sunset. Today prayer time calicut is published by local Islamic organizations. Isha prayer time in Calicut completes the evening. Muslim pro prayer times calicut is widely used by the community. The city\\'s Muslim neighborhoods have mosques in every street.',

'famous\_mosques' => json\_encode(\['Miskal Mosque (Muchundi Palli)','Kuttichira Juma Masjid','Jama Masjid Calicut','SM Street Mosque Kozhikode','Palayam Mosque Calicut'\]),

'islamic\_history' => 'Calicut (Kozhikode) was visited by Arab traders as early as the 7th century CE, making it one of South Asia\\'s oldest centers of Islam. The Zamorin rulers of Calicut were Hindu but allowed free practice of Islam. Vasco da Gama arrived in Calicut in 1498. The Mappila Muslim community maintains centuries-old Islamic traditions.',

'jummah\_note' => 'Jummah prayer in Calicut draws huge congregations. The Kuttichira and SM Street areas have historic mosques hosting large Friday prayers.',

'special\_note' => 'Calicut is also spelled Kozhikode. Calicut prayer time and Kozhikode prayer time are the same. Kerala follows Shafi madhab predominantly.',

'calculation\_note' => 'Calicut prayer times are calculated for Kerala coordinates. Shafi madhab is predominantly followed in Kerala, which means Asr time is earlier than Hanafi calculation.',

\],

\[

'city\_slug' => 'kozhikode',

'city\_name' => 'Kozhikode',

'country' => 'India',

'country\_code' => 'IN',

'article\_en' => 'Kozhikode (Calicut) is the same city known by two names — Kozhikode in Malayalam and Calicut in English. Prayer time in Kozhikode is identical to Calicut prayer times as they refer to the same location (11.2588°N, 75.7804°E). The Mappila Muslim community of Kozhikode has maintained Islamic traditions for over 1,400 years since Arab traders arrived on the Malabar Coast. Fajr prayer time in Kozhikode begins before sunrise on the Arabian Sea coast. The Miskal Mosque in Kuttichira, Kozhikode, dates back to the 14th century and is one of India\\'s finest examples of Kerala Islamic architecture. Asr prayer time in Kozhikode follows Shafi madhab. The Kerala Muslim population follows the Shafi school of thought, which means Asr time is earlier than in North India where Hanafi is followed. Zuhr prayer time in Kozhikode falls at midday. Prayer time Kozhikode today is followed by the city\\'s Muslim majority neighborhoods. Maghrib prayer time Kozhikode comes at sunset. Isha prayer time Kozhikode completes the evening. The Kozhikode Muslim Educational Society (MES) runs numerous schools and educational institutions.',

'famous\_mosques' => json\_encode(\['Miskal Mosque Kozhikode','Kuttichira Mosque','Puthiyapalli Mosque Kozhikode','Juma Masjid Nadakkave','Mucchandipalli Mosque'\]),

'islamic\_history' => 'Kozhikode (Calicut) was the capital of the Zamorin kings of Kerala. Arab Muslim traders settled here from the 7th century. The city is famous for its Mappila Muslims who have preserved a unique blend of Arab and Kerala Islamic culture for centuries.',

'jummah\_note' => 'Jummah prayers in Kozhikode are major events. The historic mosques of Kuttichira area fill up every Friday.',

'special\_note' => 'Kozhikode and Calicut are the same city. Kozhikode prayer time = Calicut prayer time.',

\],

\[

'city\_slug' => 'malappuram',

'city\_name' => 'Malappuram',

'country' => 'India',

'country\_code' => 'IN',

'article\_en' => 'Malappuram, Kerala\\'s most Muslim-majority district, is the heartland of Mappila Islamic culture in India. Prayer time in Malappuram is calculated for its coordinates (11.0510°N, 76.0711°E) in Kerala. The district has the highest Muslim population percentage of any district in India at over 70%. Fajr prayer time in Malappuram is observed devoutly throughout the district. The Malappuram district is home to major Islamic institutions including the Markaz Knowledge City and numerous Darul Ulooms. Asr prayer time in Malappuram follows Shafi madhab as is standard in Kerala. The Tirurangadi and Manjeri towns within Malappuram district have major mosques. Prayer time Malappuram today is followed by the district\\'s Muslim majority population. Zuhr time in Malappuram arrives at midday. Maghrib prayer Malappuram marks sunset. Isha prayer time Malappuram completes the night. The Samastha Kerala Jamiyyathul Ulema, a major Islamic scholarly body, is based in Malappuram and issues religious guidance for Kerala Muslims. Malappuram prayer time today is referenced by millions of Muslims in the district.',

'famous\_mosques' => json\_encode(\['Tirurangadi Juma Masjid','Markaz Knowledge City Mosque','Manjeri Juma Masjid','Nilambur Mosque','Thanur Masjid Malappuram'\]),

'islamic\_history' => 'Malappuram has the highest Muslim population percentage in India. The Malabar Rebellion (1921) began here. The Samastha Kerala Jamiyyathul Ulema, one of India\\'s most influential Islamic scholarly bodies, is based here. The Mappila culture with its unique synthesis of Arab and Kerala traditions is strongest in Malappuram.',

'jummah\_note' => 'Jummah prayers in Malappuram are major events with thousands attending at historic mosques. Tirurangadi and Manjeri have famous Friday prayer traditions.',

'special\_note' => 'Malappuram is India\\'s most Muslim-majority district. Prayer time Malappuram today is followed by 70%+ of the district population.',

\],

\[

'city\_slug' => 'kannur',

'city\_name' => 'Kannur',

'country' => 'India',

'country\_code' => 'IN',

'article\_en' => 'Kannur (Cannanore), located in northern Kerala, has a significant Muslim population alongside its Hindu and Christian communities. Prayer time in Kannur follows calculations for its coordinates (11.8745°N, 75.3704°E) on the Malabar Coast. The Mappila Muslim community of Kannur has maintained its Islamic identity for centuries. Fajr prayer time in Kannur begins before sunrise on the Arabian Sea. The mosques of Kannur\\'s Thalassery and Payyanur areas are historic Islamic landmarks. Asr prayer time in Kannur follows Shafi madhab. Zuhr prayer time in Kannur falls at midday. Prayer time Kannur today is published by local Islamic organizations. Maghrib prayer time Kannur comes at sunset. Isha prayer time Kannur completes the evening. The Muslim League\\'s stronghold in Kerala includes Kannur district. Kannur is known for its Theyyam performances which have deep cultural roots shared between communities.',

'famous\_mosques' => json\_encode(\['Azhikode Juma Masjid Kannur','Thalassery Juma Masjid','Payyanur Masjid','Kannur Town Juma Masjid','Mahe Mosque (near Kannur)'\]),

'islamic\_history' => 'Kannur\\'s Muslim community dates back to early Arab trade contacts on the Malabar Coast. The Portuguese built St. Angelo Fort in Kannur and had conflicts with local Muslim traders. The Mappila culture of Kannur preserves centuries-old traditions.',

'jummah\_note' => 'Jummah prayers in Kannur are held at major mosques in Thalassery and other areas.',

'special\_note' => 'Kannur is also spelled Cannanore. Kannur prayer time follows Kerala Shafi madhab calculation.',

\],

\[

'city\_slug' => 'kochi',

'city\_name' => 'Kochi',

'country' => 'India',

'country\_code' => 'IN',

'article\_en' => 'Kochi (Cochin), Kerala\\'s commercial capital and major port city, is a cosmopolitan city with a significant Muslim population alongside Hindu, Christian, and Jewish communities. Prayer time in Kochi is calculated for its coordinates (9.9312°N, 76.2673°E) in Kerala. The city\\'s Mappila Muslims have maintained their Islamic identity since Arab traders first arrived on the Kerala coast centuries ago. Fajr prayer time in Kochi begins before sunrise. The Cheraman Juma Masjid in Kodungallur (near Kochi) is considered India\\'s first mosque, built by Cheraman Perumal who reportedly converted to Islam. Asr prayer time in Kochi follows Shafi madhab. Prayer time kochi today is widely followed. Zuhr prayer time in Kochi arrives at midday. The Ernakulam area of Kochi has numerous mosques serving the Muslim community. Maghrib prayer time Kochi comes at sunset over the backwaters. Today prayer time kochi is published by local Islamic organizations. Isha prayer time Kochi completes the evening.',

'famous\_mosques' => json\_encode(\['Cheraman Juma Masjid (first mosque in India)','Ernakulam Juma Masjid','Mattancherry Masjid Kochi','Karukapilly Masjid Kochi','Paravur Mosque near Kochi'\]),

'islamic\_history' => 'Kochi region has one of India\\'s oldest Muslim communities. The Cheraman Juma Masjid in nearby Kodungallur (626 CE) is considered India\\'s oldest mosque. The Arab seafarers who traded with Kochi brought Islam to Kerala in the earliest days of the religion.',

'jummah\_note' => 'Jummah prayers in Kochi are held at major mosques across Ernakulam and Fort Kochi areas.',

'special\_note' => 'Kochi is also spelled Cochin. Kochi prayer time follows Kerala Shafi madhab. Kochi is home to the site of India\\'s first mosque.',

\],

// ═══ USA ═══

\[

'city\_slug' => 'new-york',

'city\_name' => 'New York',

'country' => 'USA',

'country\_code' => 'US',

'article\_en' => 'New York City, home to one of North America\\'s largest and most diverse Muslim populations, has a vibrant Islamic community spanning all five boroughs. Prayer times NYC follow the ISNA (Islamic Society of North America) calculation method, which is the standard for North American Muslims. Fajr prayer time in New York varies significantly by season — from approximately 4:30 AM in summer to 6:30 AM in winter due to New York\\'s latitude (40.7128°N). Prayer times New York City are published by ISNA and the Islamic Cultural Center of New York. Asr prayer time NYC follows the standard North American calculation. The Islamic Cultural Center of New York (ICCNY) on 96th Street is one of the most prominent mosques in the USA. Prayer times nyc are followed by approximately 800,000 Muslims living in New York City. New York fajr prayer time changes significantly across seasons. Zuhr prayer time in New York City falls at solar noon. Brooklyn Muslim prayer time is also widely searched as Brooklyn has a large Muslim community. Maghrib prayer time in New York marks sunset. Isha prayer time in New York completes the night.',

'famous\_mosques' => json\_encode(\['Islamic Cultural Center of New York (96th St)','Masjid Malcolm Shabazz (Harlem)','Masjid Al-Farah (Tribeca)','Al-Noor Mosque Brooklyn','Masjid Al-Ikhlas Staten Island'\]),

'islamic\_history' => 'Muslims have been in New York since the early 20th century, with waves of immigration from Muslim countries. Malcolm X (El-Hajj Malik El-Shabazz) is associated with the Harlem mosque. New York has Muslims from virtually every Muslim country in the world.',

'jummah\_note' => 'Jummah prayers in New York City draw thousands. The ICCNY on 96th Street, Masjid Malcolm Shabazz in Harlem, and numerous Brooklyn mosques host large Friday congregations.',

'special\_note' => 'New York uses ISNA (Islamic Society of North America) calculation. Prayer times nyc change significantly with seasons. New York fajr prayer time in summer is much earlier than winter.',

'calculation\_note' => 'New York prayer times follow ISNA calculation method: Fajr at 15° solar depression, Isha at 15°. This is the standard for USA and Canada.',

\],

\[

'city\_slug' => 'chicago',

'city\_name' => 'Chicago',

'country' => 'USA',

'country\_code' => 'US',

'article\_en' => 'Chicago, the third-largest city in the USA, has one of North America\\'s most established Muslim communities with deep roots going back over a century. Prayer times Chicago follow the ISNA calculation method. Located at 41.8781°N, Chicago has significant seasonal variation in prayer times. Fajr prayer time in Chicago in summer arrives before 4:00 AM, while in winter it arrives after 6:30 AM. Chicago prayer times are followed by approximately 400,000 Muslims in the metropolitan area. The Muslim Community Center (MCC) on the North Side and the Islamic Foundation in Villa Park are major Chicago-area Islamic institutions. Asr prayer time Chicago follows North American calculation. Zuhr prayer in Chicago falls at solar noon. Prayer times chicago are published by major Islamic centers. Fajr prayer time in Chicago varies by 2+ hours between summer and winter. Maghrib prayer time in Chicago marks sunset. Isha prayer time Chicago completes the night. The Council of Islamic Organizations of Greater Chicago (CIOGC) coordinates Islamic activities across the metro area.',

'famous\_mosques' => json\_encode(\['Muslim Community Center (MCC) Chicago','Islamic Foundation Villa Park','Mosque Foundation Bridgeview Chicago','Masjid Al-Huda Chicago','Downtown Islamic Center Chicago'\]),

'islamic\_history' => 'Chicago has had a Muslim community since the late 19th century with the first Muslims arriving as immigrants from Eastern Europe and the Arab world. The Nation of Islam was founded in Chicago in 1930. Elijah Muhammad and Malcolm X were based in Chicago.',

'jummah\_note' => 'Chicago prayer times for Jummah draw large congregations at major Islamic centers across the metro area.',

'special\_note' => 'Chicago uses ISNA calculation. Prayer times chicago change significantly with seasons due to northern latitude.',

\],

\[

'city\_slug' => 'dearborn-michigan',

'city\_name' => 'Dearborn Michigan',

'country' => 'USA',

'country\_code' => 'US',

'article\_en' => 'Dearborn, Michigan, is home to the largest Arab and Muslim community in the United States, making it one of North America\\'s most important Islamic cities. Prayer times in Dearborn Michigan follow ISNA calculation. Located at 42.3223°N, 83.1763°W, Dearborn has significant seasonal prayer time variation. Approximately 40% of Dearborn\\'s population is of Arab descent — the highest concentration in the USA. Fajr prayer time Dearborn is observed before sunrise. Prayer time in dearborn michigan is widely searched by the large Muslim community. The Islamic Center of America in Dearborn is one of the largest mosques in North America with a capacity of 3,000. Pray time in dearborn is followed by thousands of Arab-American Muslims. Asr prayer time Dearborn follows North American ISNA calculation. Today prayer time Dearborn Michigan is published by major Islamic centers. Zuhr prayer in Dearborn at solar noon. Maghrib prayer time Dearborn marks sunset. Praying time in dearborn and time prayer in dearborn are commonly searched terms. Isha prayer time Dearborn completes the evening.',

'famous\_mosques' => json\_encode(\['Islamic Center of America (ICA) Dearborn','The Islamic House of Wisdom Dearborn Heights','American Muslim Society Dearborn','Ford Community Mosque Dearborn','Masjid al-Falah Dearborn'\]),

'islamic\_history' => 'Dearborn\\'s Muslim community developed in the early 20th century when Arab immigrants came to work at Ford Motor Company. The community has grown to include Lebanese, Iraqi, Yemeni, Palestinian, and other Arab communities. The Islamic Center of America was established in 1963.',

'jummah\_note' => 'Jummah prayers in Dearborn draw the largest Friday Muslim congregations in North America. The Islamic Center of America hosts thousands every Friday.',

'special\_note' => 'Dearborn has the largest Arab Muslim community in the USA. Prayer time in dearborn michigan and pray time dearborn are commonly searched terms.',

\],

\[

'city\_slug' => 'houston',

'city\_name' => 'Houston',

'country' => 'USA',

'country\_code' => 'US',

'article\_en' => 'Houston, Texas\\'s largest city and the USA\\'s energy capital, has a rapidly growing Muslim population of over 250,000. Houston prayer times follow the ISNA calculation method used across North America. Located at 29.7604°N, 95.3698°W, Houston\\'s southern latitude means less seasonal variation in prayer times compared to Chicago or New York. Fajr prayer time in Houston varies from approximately 5:00 AM in summer to 6:30 AM in winter. Prayer time houston is published by the Islamic Society of Greater Houston (ISGH). Asr prayer time Houston follows ISNA calculation. The ISGH operates multiple mosque locations across the greater Houston area. Houston prayer times are followed by South Asian, Arab, and African Muslim communities. Zuhr prayer time Houston falls at solar noon. Maghrib prayer time in Houston marks sunset over the Texas plains. Isha prayer time Houston completes the night. Houston Muslim prayer times are increasingly important as the Muslim population grows rapidly with immigration.',

'famous\_mosques' => json\_encode(\['Islamic Society of Greater Houston (ISGH)','Masjid Al-Islam Houston','Clear Lake Islamic Center Houston','West Oaks Masjid Houston','Pearland Islamic Center'\]),

'islamic\_history' => 'Houston\\'s Muslim community grew significantly in the second half of the 20th century with immigration from South Asia, the Middle East, and Africa. The Islamic Society of Greater Houston, established in 1969, is one of the oldest Islamic organizations in Texas.',

'jummah\_note' => 'Houston prayer times for Jummah are widely followed. ISGH mosques host large Friday congregations across Houston metro.',

'special\_note' => 'Houston prayer times use ISNA calculation. Texas\\'s southern latitude means less seasonal variation than northern US cities.',

\],

\[

'city\_slug' => 'minneapolis',

'city\_name' => 'Minneapolis',

'country' => 'USA',

'country\_code' => 'US',

'article\_en' => 'Minneapolis, Minnesota, home to one of the largest Somali communities in North America, has become one of the USA\\'s most notable Islamic cities. Prayer times Minneapolis follow the ISNA calculation method. Located at 44.9778°N, Minneapolis has significant seasonal variation — Fajr in summer arrives before 3:30 AM while in winter it arrives after 7:00 AM. Prayer times Minneapolis are widely followed by the large Somali Muslim community which numbers over 100,000 in the metro area. Fajr prayer time in Minneapolis is particularly challenging in summer due to the extreme northern latitude. The Dar Al-Hijrah Islamic Center, the Islamic Civic Society of America, and numerous Somali-run mosques serve Minneapolis\\'s Muslim community. Asr prayer time Minneapolis follows ISNA standard. Prayer times minneapolis are published by local Islamic centers. Zuhr prayer in Minneapolis falls at solar noon. Maghrib prayer time Minneapolis marks sunset. Isha prayer time Minneapolis completes the night.',

'famous\_mosques' => json\_encode(\['Dar Al-Hijrah Islamic Center Minneapolis','Abubakar As-Siddiq Islamic Center Minneapolis','Islamic Civic Society of America Minneapolis','MECCA Center Minneapolis','Masjid An-Nur Minneapolis'\]),

'islamic\_history' => 'Minneapolis has the largest Somali Muslim community in the United States, with tens of thousands having arrived as refugees since the 1990s. The community has established numerous mosques, Islamic schools, and community centers.',

'jummah\_note' => 'Jummah prayers in Minneapolis draw large Somali and other Muslim congregations. Cedar-Riverside area (Little Mogadishu) has multiple mosques.',

'special\_note' => 'Minneapolis has extreme seasonal prayer time variation due to its northern latitude. Prayer times Minneapolis in summer have very early Fajr and late Isha.',

\],

\];

foreach ($cities as $city) {

DB::table('city\_prayer\_content')->updateOrInsert(

\['city\_slug' => $city\['city\_slug'\]\],

array\_merge($city, \[

'created\_at' => now(),

'updated\_at' => now(),

\])

);

}

}

}

\`\`\`

Run this seeder:

\`\`\`bash

php artisan db:seed --class=CityPrayerContentSeeder

\`\`\`

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

STEP 3: UPDATE city.blade.php — ADD CONTENT SECTIONS

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Existing city.blade.php mein EXISTING CONTENT ke BAAD ye sections add karo.

Design change mat karo — sirf ye new sections append karo existing page ke end se pehle (before closing tag).

Add these sections after the monthly table and nearby cities — in this exact order:

\`\`\`blade

{{-- ══ SECTION 1: RAKAT INFO TABLE ══ --}}

Namaz Rakat Information — {{ $name }}
-------------------------------------

Prayer / نماز

Sunnah (Muakkadah)

Farz

Sunnah (Ghair Muakkadah)

Nafl

Witr

Total

**Fajr / فجر**

2

2

—

—

—

4

**Dhuhr / ظہر**

4 (before)

4

2

2

—

12

**Asr / عصر**

—

4

4

—

—

8

**Maghrib / مغرب**

—

3

—

2

—

7

**Isha / عشاء**

4 (before)

4

2

2

3

17

{{-- ══ SECTION 2: TOMORROW'S TIMES ══ --}}

Tomorrow Prayer Time {{ $name }} —

{{ \\Carbon\\Carbon::now($tz)->addDay()->format('d M Y') }}


---------------------------------------------------------------------------------------------------

@foreach(\['fajr','dhuhr','asr','maghrib','isha'\] as $p)

{{ ucfirst($p) }}

{{ $tomorrow\[$p\] ?? 'N/A' }}

@endforeach

{{-- ══ SECTION 3: CITY ARTICLE (300-400 words unique) ══ --}}

@if($content && $content->article\_en)

Prayer Time {{ $name }} — Complete Guide
----------------------------------------

{{ $content->article\_en }}

@if($content->article\_urdu)

* * *

{{ $content->article\_urdu }}

@endif

@endif

{{-- ══ SECTION 4: FAMOUS MOSQUES ══ --}}

@if($content && $content->famous\_mosques)

Famous Mosques in {{ $name }}
-----------------------------

@foreach(json\_decode($content->famous\_mosques) as $mosque)

🕌

{{ $mosque }}

@endforeach

@endif

{{-- ══ SECTION 5: SPECIAL NOTES ══ --}}

@if($content && ($content->special\_note || $content->jummah\_note || $content->eid\_prayer\_note))

Important Prayer Information — {{ $name }}
------------------------------------------

@if($content->jummah\_note)

### 🕌 Jummah Prayer Time {{ $name }}

{{ $content->jummah\_note }}

@endif

@if($content->eid\_prayer\_note)

### 🌙 Eid Prayer Time {{ $name }}

{{ $content->eid\_prayer\_note }}

@endif

@if($content->special\_note)

### ℹ️ Note

{{ $content->special\_note }}

@endif

@endif

{{-- ══ SECTION 6: FAQ WITH SCHEMA ══ --}}

FAQ — Prayer Time {{ $name }} Today
-----------------------------------

### 

What is Fajr time in {{ $name }} today?

itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">

**Fajr time in {{ $name }} today**

{{ $prayers\['date'\]->format('d F Y') }} is

**{{ $prayers\['fajr'\] }}**.

Fajr namaz consists of 2 Sunnah and 2 Farz rakats (total 4 rakats).

Fajr time ends at sunrise which is {{ $prayers\['sunrise'\] }} today in {{ $name }}.

### 

What are all prayer times in {{ $name }} today?

itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">

**Prayer times {{ $name }} today**

{{ $prayers\['date'\]->format('d F Y') }}:

Fajr **{{ $prayers\['fajr'\] }}**,

Sunrise {{ $prayers\['sunrise'\] }},

Dhuhr/Zuhr **{{ $prayers\['dhuhr'\] }}**,

Asr **{{ $prayers\['asr'\] }}**,

Maghrib **{{ $prayers\['maghrib'\] }}**,

Isha **{{ $prayers\['isha'\] }}**.

These timings are calculated using the

@if($content && $content->calculation\_note)

{{ $content->calculation\_note }}

@else

University of Islamic Sciences Karachi method.

@endif

### 

What is Asr prayer time in {{ $name }}?

itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">

**Asr time {{ $name }} today** is

**{{ $prayers\['asr'\] }}**.

Asr consists of 4 Sunnah (Ghair Muakkadah) and 4 Farz rakats.

Asr time ends at Maghrib {{ $prayers\['maghrib'\] }}.

Hanafi Asr starts when shadow is twice the object length.

### 

What is Maghrib prayer time in {{ $name }} today?

itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">

**Maghrib time {{ $name }} today** is

**{{ $prayers\['maghrib'\] }}**.

Maghrib prayer is 3 Farz + 2 Nafl (total 7 rakats if including optional Sunnah).

Maghrib time ends at Isha {{ $prayers\['isha'\] }}.

### 

What is Isha prayer time in {{ $name }}?

itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">

**Isha time {{ $name }} today** is

**{{ $prayers\['isha'\] }}**.

Isha is the final prayer of the day — 4 Sunnah + 4 Farz + 2 Sunnah + 2 Nafl + 3 Witr + 2 Nafl = 17 total rakats.

### 

What is the Qibla direction in {{ $name }}?

itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">

**Qibla direction from {{ $name }}** is

**{{ number\_format($qibla, 2) }}°** from True North.

Face this direction while performing Salah in {{ $name }}.

@if($content && $content->jummah\_note)

### 

What is Jummah prayer time in {{ $name }}?

itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">

{{ $content->jummah\_note }}

Today's Zuhr time in {{ $name }} is {{ $prayers\['dhuhr'\] }}.

@endif

{{-- ══ SECTION 7: SEO TEXT BLOCK ══ --}}

Prayer Time {{ $name }} — Namaz Timing Guide
--------------------------------------------

**Prayer time {{ $name }}** today

{{ $prayers\['date'\]->format('d F Y') }}

({{ $hijri\['day'\] }} {{ $hijri\['month\_name'\] }} {{ $hijri\['year'\] }} AH):

**Fajr {{ $prayers\['fajr'\] }}**,

Dhuhr {{ $prayers\['dhuhr'\] }},

**Asr {{ $prayers\['asr'\] }}**,

Maghrib {{ $prayers\['maghrib'\] }},

**Isha {{ $prayers\['isha'\] }}**.

**Fajr prayer time {{ $name }}** begins at dawn and ends at

sunrise ({{ $prayers\['sunrise'\] }}).

**Asr time {{ $name }}** follows the

@if(in\_array($country, \['Pakistan','India (Hanafi)'\]))Hanafi@elseif($country==='UAE')UAE Shafi@elseif($country==='USA')ISNA@else standard @endif

calculation.

**Maghrib time {{ $name }}** starts exactly at sunset.

**Isha prayer time {{ $name }}** begins

approximately 90 minutes after Maghrib.

**Tomorrow prayer time {{ $name }}**

({{ \\Carbon\\Carbon::now($tz)->addDay()->format('d M Y') }}):

Fajr {{ $tomorrow\['fajr'\] ?? 'N/A' }},

Dhuhr {{ $tomorrow\['dhuhr'\] ?? 'N/A' }},

Asr {{ $tomorrow\['asr'\] ?? 'N/A' }},

Maghrib {{ $tomorrow\['maghrib'\] ?? 'N/A' }},

Isha {{ $tomorrow\['isha'\] ?? 'N/A' }}.

\`\`\`

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

STEP 4: CONTROLLER — ADD MISSING VARIABLES

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Make sure cityPage() method passes these to view:

\- $content (from CityPrayerContent model)

\- $tomorrow (from buildTomorrow() helper)

\- $hijri (from toHijri() helper)

\- $qibla (from calcQibla() helper)

If any of these are missing in current controller, add them:

\`\`\`php

// In cityPage() method, ADD these if missing:

$content = \\App\\Models\\CityPrayerContent::where('city\_slug', $citySlug)->first();

$tomorrow = $this->buildTomorrow($lat, $lng, $tz);

$hijri = $this->toHijri(\\Carbon\\Carbon::now($tz));

$qibla = $this->calcQibla($lat, $lng);

// Pass to view:

return view('prayer-times.city', compact(

'city','name','country','citySlug','prayers',

'content','tomorrow','hijri','qibla','monthly',

'next','nearbyCities','seoData','tz'

));

\`\`\`

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

STEP 5: MODEL — CREATE IF MISSING

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

\`\`\`php

// app/Models/CityPrayerContent.php

namespace App\\Models;

use Illuminate\\Database\\Eloquent\\Model;

class CityPrayerContent extends Model

{

protected $table = 'city\_prayer\_content';

protected $fillable = \[

'city\_slug','city\_name','country','country\_code',

'article\_en','article\_urdu','famous\_mosques',

'islamic\_history','calculation\_note',

'eid\_prayer\_note','jummah\_note','special\_note'

\];

protected $casts = \['famous\_mosques' => 'array'\];

}

\`\`\`

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

STEP 6: RUN COMMANDS

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

\`\`\`bash

php artisan migrate

php artisan db:seed --class=CityPrayerContentSeeder

php artisan view:clear

php artisan cache:clear

\`\`\`

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

RESULT: What each page will have AFTER this:

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

✅ Existing: countdown + prayer cards + monthly table + nearby cities

✅ NEW: Rakat info table

✅ NEW: Tomorrow's prayer times

✅ NEW: 300-400 word unique article (English + Urdu)

✅ NEW: Famous mosques list

✅ NEW: Jummah + Eid prayer notes

✅ NEW: 7-question FAQ with Schema markup

✅ NEW: SEO text block with all keywords

✅ Design: 100% same as existing — only content added━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

STEP 7: INTERNAL LINKING — Add to city.blade.php

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Internal linking 4 jagah add karo — existing content ke andar.

Design change nahi hoga — sirf links add honge.

── 7A: PRAYER CARDS pe sub-page links ──────────────

Existing prayer cards (fajr/dhuhr/asr/maghrib/isha) mein

har card ke neeche ek small link add karo:

\`\`\`blade

{{-- Har prayer card ke andar, existing time ke BAAD add karo: --}}

@if($p\['key'\] !== 'sunrise')

[]({{ url('/prayer-times/'.$citySlug.'/'.$p['key']) }})

[class="btn btn-sm btn-outline-secondary mt-1 w-100"]({{ url('/prayer-times/'.$citySlug.'/'.$p['key']) }})

[title="{{ $p\['name'\] }} time {{ $name }}">]({{ url('/prayer-times/'.$citySlug.'/'.$p['key']) }})

[{{ $p\['name'\] }} Details →]({{ url('/prayer-times/'.$citySlug.'/'.$p['key']) }})

@endif

\`\`\`

── 7B: Prayer-Specific Pages Internal Links Section ──

City page pe monthly table ke BAAD ye section add karo:

\`\`\`blade

{{-- ══ INTERNAL LINKS: Prayer-Specific Pages ══ --}}

{{ $name }} Prayer Times — Detailed Pages
-----------------------------------------

View detailed information for each individual prayer in {{ $name }}:

@foreach(\[

\['key'=>'fajr', 'label'=>'Fajr Time', 'urdu'=>'فجر', 'icon'=>'🌙','desc'=>'Dawn prayer · Before sunrise'\],

\['key'=>'zuhr', 'label'=>'Dhuhr/Zuhr Time','urdu'=>'ظہر', 'icon'=>'☀️','desc'=>'Noon prayer · At solar midday'\],

\['key'=>'asr', 'label'=>'Asr Time', 'urdu'=>'عصر', 'icon'=>'🌤','desc'=>'Afternoon prayer · Hanafi method'\],

\['key'=>'maghrib', 'label'=>'Maghrib Time', 'urdu'=>'مغرب', 'icon'=>'🌇','desc'=>'Sunset prayer · Exact sunset'\],

\['key'=>'isha', 'label'=>'Isha Time', 'urdu'=>'عشاء', 'icon'=>'🌌','desc'=>'Night prayer · Evening worship'\],

\] as $pl)

[]({{ url('/prayer-times/'.$citySlug.'/'.$pl['key']) }})

[class="text-decoration-none d-block border rounded p-2 h-100"]({{ url('/prayer-times/'.$citySlug.'/'.$pl['key']) }})

[title="{{ $pl\['label'\] }} in {{ $name }}">]({{ url('/prayer-times/'.$citySlug.'/'.$pl['key']) }})

[]({{ url('/prayer-times/'.$citySlug.'/'.$pl['key']) }})

[{{ $pl\['icon'\] }} {{ $pl\['label'\] }}]({{ url('/prayer-times/'.$citySlug.'/'.$pl['key']) }})

[]({{ url('/prayer-times/'.$citySlug.'/'.$pl['key']) }})

[{{ $pl\['urdu'\] }} — {{ $pl\['desc'\] }}]({{ url('/prayer-times/'.$citySlug.'/'.$pl['key']) }})

[]({{ url('/prayer-times/'.$citySlug.'/'.$pl['key']) }})

@endforeach

\`\`\`

── 7C: Country Hub + Related Countries ─────────────

City page pe FAQ section ke BAAD add karo:

\`\`\`blade

{{-- ══ INTERNAL LINKS: Country Hub + Cross-Country ══ --}}

Prayer Times by Country
-----------------------

[]({{ url('/prayer-times/pakistan') }})

[class="btn btn-outline-success w-100 {{ $country==='Pakistan'?'active':'' }}"]({{ url('/prayer-times/pakistan') }})

[title="Prayer Times Pakistan All Cities">]({{ url('/prayer-times/pakistan') }})

[🇵🇰 Pakistan]({{ url('/prayer-times/pakistan') }})

[]({{ url('/prayer-times/pakistan') }})

[]({{ url('/prayer-times/uae') }})

[class="btn btn-outline-primary w-100 {{ $country==='UAE'?'active':'' }}"]({{ url('/prayer-times/uae') }})

[title="Prayer Times UAE All Cities">]({{ url('/prayer-times/uae') }})

[🇦🇪 UAE]({{ url('/prayer-times/uae') }})

[]({{ url('/prayer-times/uae') }})

[]({{ url('/prayer-times/saudi-arabia') }})

[class="btn btn-outline-danger w-100 {{ $country==='Saudi Arabia'?'active':'' }}"]({{ url('/prayer-times/saudi-arabia') }})

[title="Prayer Times Saudi Arabia">]({{ url('/prayer-times/saudi-arabia') }})

[🇸🇦 Saudi Arabia]({{ url('/prayer-times/saudi-arabia') }})

[]({{ url('/prayer-times/saudi-arabia') }})

[]({{ url('/prayer-times/india') }})

[class="btn btn-outline-warning w-100 {{ $country==='India'?'active':'' }}"]({{ url('/prayer-times/india') }})

[title="Prayer Times India">]({{ url('/prayer-times/india') }})

[🇮🇳 India]({{ url('/prayer-times/india') }})

[]({{ url('/prayer-times/india') }})

{{-- Same-country popular cities --}}

* * *

### 

Popular Cities in

@if($country==='Pakistan')Pakistan 🇵🇰

@elseif($country==='UAE')UAE 🇦🇪

@elseif($country==='Saudi Arabia')Saudi Arabia 🇸🇦

@elseif($country==='India')India 🇮🇳

@else USA 🇺🇸 @endif

@php

$popularByCountry = \[

'Pakistan' => \[\['lahore','Lahore'\],\['karachi','Karachi'\],\['islamabad','Islamabad'\],\['rawalpindi','Rawalpindi'\],\['faisalabad','Faisalabad'\],\['peshawar','Peshawar'\],\['multan','Multan'\],\['quetta','Quetta'\]\],

'UAE' => \[\['dubai','Dubai'\],\['abu-dhabi','Abu Dhabi'\],\['sharjah','Sharjah'\],\['ajman','Ajman'\],\['al-ain','Al Ain'\],\['ras-al-khaimah','RAK'\],\['fujairah','Fujairah'\]\],

'Saudi Arabia' => \[\['makkah','Makkah'\],\['madinah','Madinah'\],\['riyadh','Riyadh'\],\['jeddah','Jeddah'\],\['dammam','Dammam'\],\['khobar','Khobar'\],\['taif','Taif'\]\],

'India' => \[\['calicut','Calicut'\],\['kozhikode','Kozhikode'\],\['malappuram','Malappuram'\],\['kochi','Kochi'\],\['kannur','Kannur'\],\['bangalore','Bangalore'\],\['mumbai','Mumbai'\]\],

'USA' => \[\['new-york','New York'\],\['chicago','Chicago'\],\['houston','Houston'\],\['dearborn-michigan','Dearborn'\],\['minneapolis','Minneapolis'\],\['los-angeles','LA'\],\['boston','Boston'\]\],

\];

$links = $popularByCountry\[$country\] ?? $popularByCountry\['Pakistan'\];

@endphp

@foreach($links as \[$slug, $label\])

@if($slug !== $citySlug)

[]({{ url('/prayer-times/'.$slug) }})

[class="badge text-decoration-none bg-light text-dark border py-2 px-3"]({{ url('/prayer-times/'.$slug) }})

[title="Prayer Time {{ $label }}">]({{ url('/prayer-times/'.$slug) }})

[{{ $label }}]({{ url('/prayer-times/'.$slug) }})

[]({{ url('/prayer-times/'.$slug) }})

@endif

@endforeach

\`\`\`

── 7D: Cross-Feature Links (Islamic Date + Qibla) ──

SEO text block ke BAAD, page ke end mein add karo:

\`\`\`blade

{{-- ══ INTERNAL LINKS: Cross-Feature Navigation ══ --}}

Islamic Tools — {{ $name }}
---------------------------

[]({{ url('/islamic-date-today') }})

[class="text-decoration-none d-block border rounded p-3 h-100"]({{ url('/islamic-date-today') }})

[title="Islamic Date Today {{ $name }}">]({{ url('/islamic-date-today') }})

[]({{ url('/islamic-date-today') }})

[📅 Islamic Date Today]({{ url('/islamic-date-today') }})

[]({{ url('/islamic-date-today') }})

[Today's Hijri date:]({{ url('/islamic-date-today') }})

[**{{ $hijri\['day'\] }} {{ $hijri\['month\_name'\] }} {{ $hijri\['year'\] }}**]({{ url('/islamic-date-today') }})

[]({{ url('/islamic-date-today') }})

[]({{ url('/islamic-date-today') }})

[]({{ url('/islamic-calendar') }})

[class="text-decoration-none d-block border rounded p-3 h-100"]({{ url('/islamic-calendar') }})

[title="Islamic Calendar {{ $prayers\['date'\]->format('Y') }}">]({{ url('/islamic-calendar') }})

[]({{ url('/islamic-calendar') }})

[🗓️ Islamic Calendar {{ $prayers\['date'\]->format('Y') }}]({{ url('/islamic-calendar') }})

[]({{ url('/islamic-calendar') }})

[Full Hijri calendar with all months]({{ url('/islamic-calendar') }})

[]({{ url('/islamic-calendar') }})

[]({{ url('/islamic-calendar') }})

[]({{ url('/prayer-times/'.$citySlug.'/fajr') }})

[class="text-decoration-none d-block border rounded p-3 h-100"]({{ url('/prayer-times/'.$citySlug.'/fajr') }})

[title="Fajr Time {{ $name }} Today">]({{ url('/prayer-times/'.$citySlug.'/fajr') }})

[]({{ url('/prayer-times/'.$citySlug.'/fajr') }})

[🌙 Fajr Time {{ $name }}]({{ url('/prayer-times/'.$citySlug.'/fajr') }})

[]({{ url('/prayer-times/'.$citySlug.'/fajr') }})

[Today: **{{ $prayers\['fajr'\] }}** —]({{ url('/prayer-times/'.$citySlug.'/fajr') }})

[Full details, monthly schedule]({{ url('/prayer-times/'.$citySlug.'/fajr') }})

[]({{ url('/prayer-times/'.$citySlug.'/fajr') }})

[]({{ url('/prayer-times/'.$citySlug.'/fajr') }})

\`\`\`

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

INTERNAL LINKING STRATEGY SUMMARY

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Link Type | From | To | Anchor Text

──────────────────────|───────────────────|───────────────────────────|─────────────────────────

Prayer card links | /prayer-times/lahore | /prayer-times/lahore/fajr | "Fajr Details →"

Prayer sub-pages grid | /prayer-times/lahore | /prayer-times/lahore/asr | "Asr Time — عصر"

Same-country cities | /prayer-times/lahore | /prayer-times/karachi | "Karachi"

Country hubs | /prayer-times/lahore | /prayer-times/pakistan | "🇵🇰 Pakistan"

Cross-feature (date) | /prayer-times/lahore | /islamic-date-today | "Islamic Date Today"

Cross-feature (cal) | /prayer-times/lahore | /islamic-calendar | "Islamic Calendar 2026"

Nearby cities | /prayer-times/lahore | /prayer-times/sialkot | "Sialkot" (already exists)

RESULT: Every page links to:

✅ 5 prayer sub-pages (/city/fajr, /city/asr etc)

✅ 5-7 same-country popular cities

✅ 4 country hubs (Pakistan/UAE/Saudi/India)

✅ Islamic Date page

✅ Islamic Calendar page

\= 15-20 internal links per page × 200 pages = 3,000-4,000 internal links total