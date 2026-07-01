\# ISLAMIC WEBSITE — NEXT-LEVEL SEO IMPLEMENTATION PROMPT

\# Laravel + MySQL (MariaDB) | Programmatic SEO

\# Website: https://github.com/noormuhammad2k20-a11y/islamicweb

\---

\## PHASE 1: DATABASE FIXES (Critical — Pehle Yeh Karo)

\### 1A. Fix Wrong City Coordinates

Update these cities with correct lat/lng and timezone:

UPDATE cities SET latitude=33.7215, longitude=73.0433, timezone='Asia/Karachi' WHERE slug='peshawar';

\-- Actually Peshawar coords:

UPDATE cities SET latitude=34.0151, longitude=71.5249, timezone='Asia/Karachi' WHERE slug='peshawar';

UPDATE cities SET latitude=30.1798, longitude=66.9750, timezone='Asia/Karachi' WHERE slug='quetta';

UPDATE cities SET latitude=30.1575, longitude=71.5249, timezone='Asia/Karachi' WHERE slug='multan';

UPDATE cities SET latitude=32.0946, longitude=74.5348, timezone='Asia/Karachi' WHERE slug='sialkot';

UPDATE cities SET latitude=25.3924, longitude=68.3737, timezone='Asia/Karachi' WHERE slug='hyderabad';

UPDATE cities SET latitude=27.7052, longitude=68.8574, timezone='Asia/Karachi' WHERE slug='sukkur';

UPDATE cities SET latitude=32.1877, longitude=74.1945, timezone='Asia/Karachi' WHERE slug='gujranwala';

UPDATE cities SET latitude=21.3891, longitude=39.8579, timezone='Asia/Riyadh', prayer\_calc\_method='Umm Al-Qura University, Makkah' WHERE slug='makkah';

UPDATE cities SET latitude=24.5247, longitude=39.5692, timezone='Asia/Riyadh', prayer\_calc\_method='Umm Al-Qura University, Makkah' WHERE slug='madinah';

UPDATE cities SET latitude=24.7136, longitude=46.6753, timezone='Asia/Riyadh', prayer\_calc\_method='Umm Al-Qura University, Makkah' WHERE slug='riyadh';

UPDATE cities SET latitude=21.5433, longitude=39.1728, timezone='Asia/Riyadh', prayer\_calc\_method='Umm Al-Qura University, Makkah' WHERE slug='jeddah';

UPDATE cities SET latitude=26.4207, longitude=50.0888, timezone='Asia/Riyadh', prayer\_calc\_method='Umm Al-Qura University, Makkah' WHERE slug='dammam';

UPDATE cities SET latitude=24.4539, longitude=54.3773, timezone='Asia/Dubai', prayer\_calc\_method='UAE General Authority of Islamic Affairs' WHERE slug='abu-dhabi';

UPDATE cities SET latitude=25.3463, longitude=55.4209, timezone='Asia/Dubai', prayer\_calc\_method='UAE General Authority of Islamic Affairs' WHERE slug='sharjah';

UPDATE cities SET latitude=25.4052, longitude=55.5136, timezone='Asia/Dubai', prayer\_calc\_method='UAE General Authority of Islamic Affairs' WHERE slug='ajman';

UPDATE cities SET latitude=40.7128, longitude=-74.0060, timezone='America/New\_York', prayer\_calc\_method='Islamic Society of North America (ISNA)' WHERE slug='new-york';

UPDATE cities SET latitude=41.8781, longitude=-87.6298, timezone='America/Chicago', prayer\_calc\_method='Islamic Society of North America (ISNA)' WHERE slug='chicago';

UPDATE cities SET latitude=29.7604, longitude=-95.3698, timezone='America/Chicago', prayer\_calc\_method='Islamic Society of North America (ISNA)' WHERE slug='houston';

UPDATE cities SET latitude=32.7767, longitude=-96.7970, timezone='America/Chicago', prayer\_calc\_method='Islamic Society of North America (ISNA)' WHERE slug='dallas';

UPDATE cities SET latitude=34.0522, longitude=-118.2437, timezone='America/Los\_Angeles', prayer\_calc\_method='Islamic Society of North America (ISNA)' WHERE slug='los-angeles';

UPDATE cities SET latitude=52.4862, longitude=-1.8904, timezone='Europe/London', prayer\_calc\_method='London Unified Prayer Timetable' WHERE slug='birmingham';

UPDATE cities SET latitude=53.4808, longitude=-2.2426, timezone='Europe/London', prayer\_calc\_method='London Unified Prayer Timetable' WHERE slug='manchester';

UPDATE cities SET latitude=53.7960, longitude=-1.7594, timezone='Europe/London', prayer\_calc\_method='London Unified Prayer Timetable' WHERE slug='bradford';

UPDATE cities SET latitude=43.6532, longitude=-79.3832, timezone='America/Toronto', prayer\_calc\_method='Islamic Society of North America (ISNA)' WHERE slug='toronto';

UPDATE cities SET latitude=45.5017, longitude=-73.5673, timezone='America/Toronto', prayer\_calc\_method='Islamic Society of North America (ISNA)' WHERE slug='montreal';

UPDATE cities SET latitude=49.2827, longitude=-123.1207, timezone='America/Vancouver', prayer\_calc\_method='Islamic Society of North America (ISNA)' WHERE slug='vancouver';

UPDATE cities SET latitude=51.0447, longitude=-114.0719, timezone='America/Denver', prayer\_calc\_method='Islamic Society of North America (ISNA)' WHERE slug='calgary';

UPDATE cities SET latitude=19.0760, longitude=72.8777, timezone='Asia/Kolkata', prayer\_calc\_method='University of Islamic Sciences, Karachi' WHERE slug='mumbai';

UPDATE cities SET latitude=28.7041, longitude=77.1025, timezone='Asia/Kolkata', prayer\_calc\_method='University of Islamic Sciences, Karachi' WHERE slug='delhi';

UPDATE cities SET latitude=26.8467, longitude=80.9462, timezone='Asia/Kolkata', prayer\_calc\_method='University of Islamic Sciences, Karachi' WHERE slug='lucknow';

UPDATE cities SET latitude=23.5880, longitude=58.3829, timezone='Asia/Muscat', prayer\_calc\_method='Ministry of Awqaf and Religious Affairs, Oman' WHERE slug='muscat';

UPDATE cities SET latitude=17.0151, longitude=54.1000, timezone='Asia/Muscat', prayer\_calc\_method='Ministry of Awqaf and Religious Affairs, Oman' WHERE slug='salalah';

UPDATE cities SET latitude=24.3647, longitude=56.7450, timezone='Asia/Muscat', prayer\_calc\_method='Ministry of Awqaf and Religious Affairs, Oman' WHERE slug='sohar';

\---

\### 1B. Add Missing Surahs (114 complete) to \`surahs\` table

Run this INSERT — all 114 surahs with correct numbers, names, slugs:

INSERT INTO \`surahs\` (\`number\`, \`name\_ar\`, \`name\_ur\`, \`name\_en\`, \`slug\`, \`ayah\_count\`, \`para\_juz\`, \`revelation\_place\`, \`arabic\_text\`, \`urdu\_translation\`, \`english\_translation\`, \`audio\_url\`, \`pdf\_url\`, \`created\_at\`, \`updated\_at\`) VALUES

(1, 'الفاتحة', 'الفاتحہ', 'Al-Fatihah', 'al-fatihah', 7, '1', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/001.mp3', NULL, NOW(), NOW()),

(2, 'البقرة', 'البقرہ', 'Al-Baqarah', 'al-baqarah', 286, '1-3', 'Medinan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/002.mp3', NULL, NOW(), NOW()),

(3, 'آل عمران', 'آل عمران', 'Al-Imran', 'al-imran', 200, '3-4', 'Medinan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/003.mp3', NULL, NOW(), NOW()),

(4, 'النساء', 'النساء', 'An-Nisa', 'an-nisa', 176, '4-6', 'Medinan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/004.mp3', NULL, NOW(), NOW()),

(5, 'المائدة', 'المائدہ', 'Al-Maidah', 'al-maidah', 120, '6-7', 'Medinan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/005.mp3', NULL, NOW(), NOW()),

(6, 'الأنعام', 'الانعام', 'Al-Anam', 'al-anam', 165, '7-8', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/006.mp3', NULL, NOW(), NOW()),

(7, 'الأعراف', 'الاعراف', 'Al-Araf', 'al-araf', 206, '8-9', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/007.mp3', NULL, NOW(), NOW()),

(8, 'الأنفال', 'الانفال', 'Al-Anfal', 'al-anfal', 75, '9-10', 'Medinan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/008.mp3', NULL, NOW(), NOW()),

(9, 'التوبة', 'التوبہ', 'At-Tawbah', 'at-tawbah', 129, '10-11', 'Medinan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/009.mp3', NULL, NOW(), NOW()),

(10, 'يونس', 'یونس', 'Yunus', 'yunus', 109, '11', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/010.mp3', NULL, NOW(), NOW()),

(11, 'هود', 'ہود', 'Hud', 'hud', 123, '11-12', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/011.mp3', NULL, NOW(), NOW()),

(12, 'يوسف', 'یوسف', 'Yusuf', 'yusuf', 111, '12-13', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/012.mp3', NULL, NOW(), NOW()),

(13, 'الرعد', 'الرعد', 'Ar-Rad', 'ar-rad', 43, '13', 'Medinan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/013.mp3', NULL, NOW(), NOW()),

(14, 'إبراهيم', 'ابراہیم', 'Ibrahim', 'ibrahim', 52, '13', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/014.mp3', NULL, NOW(), NOW()),

(15, 'الحجر', 'الحجر', 'Al-Hijr', 'al-hijr', 99, '14', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/015.mp3', NULL, NOW(), NOW()),

(16, 'النحل', 'النحل', 'An-Nahl', 'an-nahl', 128, '14', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/016.mp3', NULL, NOW(), NOW()),

(17, 'الإسراء', 'الاسراء', 'Al-Isra', 'al-isra', 111, '15', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/017.mp3', NULL, NOW(), NOW()),

(18, 'الكهف', 'الکہف', 'Al-Kahf', 'al-kahf', 110, '15-16', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/018.mp3', NULL, NOW(), NOW()),

(19, 'مريم', 'مریم', 'Maryam', 'maryam', 98, '16', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/019.mp3', NULL, NOW(), NOW()),

(20, 'طه', 'طہ', 'Ta-Ha', 'ta-ha', 135, '16', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/020.mp3', NULL, NOW(), NOW()),

(21, 'الأنبياء', 'الانبیاء', 'Al-Anbiya', 'al-anbiya', 112, '17', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/021.mp3', NULL, NOW(), NOW()),

(22, 'الحج', 'الحج', 'Al-Hajj', 'al-hajj', 78, '17', 'Medinan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/022.mp3', NULL, NOW(), NOW()),

(23, 'المؤمنون', 'المومنون', 'Al-Muminun', 'al-muminun', 118, '18', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/023.mp3', NULL, NOW(), NOW()),

(24, 'النور', 'النور', 'An-Nur', 'an-nur', 64, '18', 'Medinan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/024.mp3', NULL, NOW(), NOW()),

(25, 'الفرقان', 'الفرقان', 'Al-Furqan', 'al-furqan', 77, '18-19', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/025.mp3', NULL, NOW(), NOW()),

(26, 'الشعراء', 'الشعراء', 'Ash-Shuara', 'ash-shuara', 227, '19', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/026.mp3', NULL, NOW(), NOW()),

(27, 'النمل', 'النمل', 'An-Naml', 'an-naml', 93, '19-20', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/027.mp3', NULL, NOW(), NOW()),

(28, 'القصص', 'القصص', 'Al-Qasas', 'al-qasas', 88, '20', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/028.mp3', NULL, NOW(), NOW()),

(29, 'العنكبوت', 'العنکبوت', 'Al-Ankabut', 'al-ankabut', 69, '20-21', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/029.mp3', NULL, NOW(), NOW()),

(30, 'الروم', 'الروم', 'Ar-Rum', 'ar-rum', 60, '21', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/030.mp3', NULL, NOW(), NOW()),

(31, 'لقمان', 'لقمان', 'Luqman', 'luqman', 34, '21', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/031.mp3', NULL, NOW(), NOW()),

(32, 'السجدة', 'السجدۃ', 'As-Sajdah', 'as-sajdah', 30, '21', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/032.mp3', NULL, NOW(), NOW()),

(33, 'الأحزاب', 'الاحزاب', 'Al-Ahzab', 'al-ahzab', 73, '21-22', 'Medinan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/033.mp3', NULL, NOW(), NOW()),

(34, 'سبأ', 'سبا', 'Saba', 'saba', 54, '22', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/034.mp3', NULL, NOW(), NOW()),

(35, 'فاطر', 'فاطر', 'Fatir', 'fatir', 45, '22', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/035.mp3', NULL, NOW(), NOW()),

(36, 'يس', 'یٰسین', 'Ya-Sin', 'ya-sin', 83, '22-23', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/036.mp3', NULL, NOW(), NOW()),

(37, 'الصافات', 'الصافات', 'As-Saffat', 'as-saffat', 182, '23', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/037.mp3', NULL, NOW(), NOW()),

(38, 'ص', 'ص', 'Sad', 'sad', 88, '23', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/038.mp3', NULL, NOW(), NOW()),

(39, 'الزمر', 'الزمر', 'Az-Zumar', 'az-zumar', 75, '23-24', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/039.mp3', NULL, NOW(), NOW()),

(40, 'غافر', 'غافر', 'Ghafir', 'ghafir', 85, '24', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/040.mp3', NULL, NOW(), NOW()),

(41, 'فصلت', 'فصلت', 'Fussilat', 'fussilat', 54, '24-25', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/041.mp3', NULL, NOW(), NOW()),

(42, 'الشورى', 'الشوریٰ', 'Ash-Shura', 'ash-shura', 53, '25', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/042.mp3', NULL, NOW(), NOW()),

(43, 'الزخرف', 'الزخرف', 'Az-Zukhruf', 'az-zukhruf', 89, '25', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/043.mp3', NULL, NOW(), NOW()),

(44, 'الدخان', 'الدخان', 'Ad-Dukhan', 'ad-dukhan', 59, '25', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/044.mp3', NULL, NOW(), NOW()),

(45, 'الجاثية', 'الجاثیۃ', 'Al-Jathiyah', 'al-jathiyah', 37, '25', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/045.mp3', NULL, NOW(), NOW()),

(46, 'الأحقاف', 'الاحقاف', 'Al-Ahqaf', 'al-ahqaf', 35, '26', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/046.mp3', NULL, NOW(), NOW()),

(47, 'محمد', 'محمد', 'Muhammad', 'muhammad', 38, '26', 'Medinan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/047.mp3', NULL, NOW(), NOW()),

(48, 'الفتح', 'الفتح', 'Al-Fath', 'al-fath', 29, '26', 'Medinan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/048.mp3', NULL, NOW(), NOW()),

(49, 'الحجرات', 'الحجرات', 'Al-Hujurat', 'al-hujurat', 18, '26', 'Medinan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/049.mp3', NULL, NOW(), NOW()),

(50, 'ق', 'ق', 'Qaf', 'qaf', 45, '26', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/050.mp3', NULL, NOW(), NOW()),

(51, 'الذاريات', 'الذاریات', 'Adh-Dhariyat', 'adh-dhariyat', 60, '26-27', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/051.mp3', NULL, NOW(), NOW()),

(52, 'الطور', 'الطور', 'At-Tur', 'at-tur', 49, '27', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/052.mp3', NULL, NOW(), NOW()),

(53, 'النجم', 'النجم', 'An-Najm', 'an-najm', 62, '27', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/053.mp3', NULL, NOW(), NOW()),

(54, 'القمر', 'القمر', 'Al-Qamar', 'al-qamar', 55, '27', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/054.mp3', NULL, NOW(), NOW()),

(55, 'الرحمن', 'الرحمن', 'Ar-Rahman', 'ar-rahman', 78, '27', 'Medinan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/055.mp3', NULL, NOW(), NOW()),

(56, 'الواقعة', 'الواقعۃ', 'Al-Waqiah', 'al-waqiah', 96, '27', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/056.mp3', NULL, NOW(), NOW()),

(57, 'الحديد', 'الحدید', 'Al-Hadid', 'al-hadid', 29, '27', 'Medinan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/057.mp3', NULL, NOW(), NOW()),

(58, 'المجادلة', 'المجادلۃ', 'Al-Mujadila', 'al-mujadila', 22, '28', 'Medinan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/058.mp3', NULL, NOW(), NOW()),

(59, 'الحشر', 'الحشر', 'Al-Hashr', 'al-hashr', 24, '28', 'Medinan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/059.mp3', NULL, NOW(), NOW()),

(60, 'الممتحنة', 'الممتحنہ', 'Al-Mumtahanah', 'al-mumtahanah', 13, '28', 'Medinan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/060.mp3', NULL, NOW(), NOW()),

(61, 'الصف', 'الصف', 'As-Saf', 'as-saf', 14, '28', 'Medinan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/061.mp3', NULL, NOW(), NOW()),

(62, 'الجمعة', 'الجمعۃ', 'Al-Jumuah', 'al-jumuah', 11, '28', 'Medinan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/062.mp3', NULL, NOW(), NOW()),

(63, 'المنافقون', 'المنافقون', 'Al-Munafiqun', 'al-munafiqun', 11, '28', 'Medinan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/063.mp3', NULL, NOW(), NOW()),

(64, 'التغابن', 'التغابن', 'At-Taghabun', 'at-taghabun', 18, '28', 'Medinan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/064.mp3', NULL, NOW(), NOW()),

(65, 'الطلاق', 'الطلاق', 'At-Talaq', 'at-talaq', 12, '28', 'Medinan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/065.mp3', NULL, NOW(), NOW()),

(66, 'التحريم', 'التحریم', 'At-Tahrim', 'at-tahrim', 12, '28', 'Medinan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/066.mp3', NULL, NOW(), NOW()),

(67, 'الملك', 'الملک', 'Al-Mulk', 'al-mulk', 30, '29', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/067.mp3', NULL, NOW(), NOW()),

(68, 'القلم', 'القلم', 'Al-Qalam', 'al-qalam', 52, '29', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/068.mp3', NULL, NOW(), NOW()),

(69, 'الحاقة', 'الحاقۃ', 'Al-Haqqah', 'al-haqqah', 52, '29', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/069.mp3', NULL, NOW(), NOW()),

(70, 'المعارج', 'المعارج', 'Al-Maarij', 'al-maarij', 44, '29', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/070.mp3', NULL, NOW(), NOW()),

(71, 'نوح', 'نوح', 'Nuh', 'nuh', 28, '29', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/071.mp3', NULL, NOW(), NOW()),

(72, 'الجن', 'الجن', 'Al-Jinn', 'al-jinn', 28, '29', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/072.mp3', NULL, NOW(), NOW()),

(73, 'المزمل', 'المزمل', 'Al-Muzzammil', 'al-muzzammil', 20, '29', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/073.mp3', NULL, NOW(), NOW()),

(74, 'المدثر', 'المدثر', 'Al-Muddaththir', 'al-muddaththir', 56, '29', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/074.mp3', NULL, NOW(), NOW()),

(75, 'القيامة', 'القیامۃ', 'Al-Qiyamah', 'al-qiyamah', 40, '29', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/075.mp3', NULL, NOW(), NOW()),

(76, 'الإنسان', 'الانسان', 'Al-Insan', 'al-insan', 31, '29', 'Medinan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/076.mp3', NULL, NOW(), NOW()),

(77, 'المرسلات', 'المرسلات', 'Al-Mursalat', 'al-mursalat', 50, '29', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/077.mp3', NULL, NOW(), NOW()),

(78, 'النبأ', 'النبا', 'An-Naba', 'an-naba', 40, '30', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/078.mp3', NULL, NOW(), NOW()),

(79, 'النازعات', 'النازعات', 'An-Naziat', 'an-naziat', 46, '30', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/079.mp3', NULL, NOW(), NOW()),

(80, 'عبس', 'عبس', 'Abasa', 'abasa', 42, '30', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/080.mp3', NULL, NOW(), NOW()),

(81, 'التكوير', 'التکویر', 'At-Takwir', 'at-takwir', 29, '30', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/081.mp3', NULL, NOW(), NOW()),

(82, 'الانفطار', 'الانفطار', 'Al-Infitar', 'al-infitar', 19, '30', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/082.mp3', NULL, NOW(), NOW()),

(83, 'المطففين', 'المطففین', 'Al-Mutaffifin', 'al-mutaffifin', 36, '30', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/083.mp3', NULL, NOW(), NOW()),

(84, 'الانشقاق', 'الانشقاق', 'Al-Inshiqaq', 'al-inshiqaq', 25, '30', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/084.mp3', NULL, NOW(), NOW()),

(85, 'البروج', 'البروج', 'Al-Buruj', 'al-buruj', 22, '30', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/085.mp3', NULL, NOW(), NOW()),

(86, 'الطارق', 'الطارق', 'At-Tariq', 'at-tariq', 17, '30', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/086.mp3', NULL, NOW(), NOW()),

(87, 'الأعلى', 'الاعلیٰ', 'Al-Ala', 'al-ala', 19, '30', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/087.mp3', NULL, NOW(), NOW()),

(88, 'الغاشية', 'الغاشیۃ', 'Al-Ghashiyah', 'al-ghashiyah', 26, '30', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/088.mp3', NULL, NOW(), NOW()),

(89, 'الفجر', 'الفجر', 'Al-Fajr', 'al-fajr', 30, '30', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/089.mp3', NULL, NOW(), NOW()),

(90, 'البلد', 'البلد', 'Al-Balad', 'al-balad', 20, '30', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/090.mp3', NULL, NOW(), NOW()),

(91, 'الشمس', 'الشمس', 'Ash-Shams', 'ash-shams', 15, '30', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/091.mp3', NULL, NOW(), NOW()),

(92, 'الليل', 'اللیل', 'Al-Layl', 'al-layl', 21, '30', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/092.mp3', NULL, NOW(), NOW()),

(93, 'الضحى', 'الضحیٰ', 'Ad-Duha', 'ad-duha', 11, '30', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/093.mp3', NULL, NOW(), NOW()),

(94, 'الشرح', 'الشرح', 'Ash-Sharh', 'ash-sharh', 8, '30', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/094.mp3', NULL, NOW(), NOW()),

(95, 'التين', 'التین', 'At-Tin', 'at-tin', 8, '30', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/095.mp3', NULL, NOW(), NOW()),

(96, 'العلق', 'العلق', 'Al-Alaq', 'al-alaq', 19, '30', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/096.mp3', NULL, NOW(), NOW()),

(97, 'القدر', 'القدر', 'Al-Qadr', 'al-qadr', 5, '30', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/097.mp3', NULL, NOW(), NOW()),

(98, 'البينة', 'البینۃ', 'Al-Bayyinah', 'al-bayyinah', 8, '30', 'Medinan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/098.mp3', NULL, NOW(), NOW()),

(99, 'الزلزلة', 'الزلزلہ', 'Az-Zalzalah', 'az-zalzalah', 8, '30', 'Medinan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/099.mp3', NULL, NOW(), NOW()),

(100, 'العاديات', 'العادیات', 'Al-Adiyat', 'al-adiyat', 11, '30', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/100.mp3', NULL, NOW(), NOW()),

(101, 'القارعة', 'القارعۃ', 'Al-Qariah', 'al-qariah', 11, '30', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/101.mp3', NULL, NOW(), NOW()),

(102, 'التكاثر', 'التکاثر', 'At-Takathur', 'at-takathur', 8, '30', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/102.mp3', NULL, NOW(), NOW()),

(103, 'العصر', 'العصر', 'Al-Asr', 'al-asr', 3, '30', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/103.mp3', NULL, NOW(), NOW()),

(104, 'الهمزة', 'الہمزۃ', 'Al-Humazah', 'al-humazah', 9, '30', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/104.mp3', NULL, NOW(), NOW()),

(105, 'الفيل', 'الفیل', 'Al-Fil', 'al-fil', 5, '30', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/105.mp3', NULL, NOW(), NOW()),

(106, 'قريش', 'قریش', 'Quraysh', 'quraysh', 4, '30', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/106.mp3', NULL, NOW(), NOW()),

(107, 'الماعون', 'الماعون', 'Al-Maun', 'al-maun', 7, '30', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/107.mp3', NULL, NOW(), NOW()),

(108, 'الكوثر', 'الکوثر', 'Al-Kawthar', 'al-kawthar', 3, '30', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/108.mp3', NULL, NOW(), NOW()),

(109, 'الكافرون', 'الکافرون', 'Al-Kafirun', 'al-kafirun', 6, '30', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/109.mp3', NULL, NOW(), NOW()),

(110, 'النصر', 'النصر', 'An-Nasr', 'an-nasr', 3, '30', 'Medinan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/110.mp3', NULL, NOW(), NOW()),

(111, 'المسد', 'المسد', 'Al-Masad', 'al-masad', 5, '30', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/111.mp3', NULL, NOW(), NOW()),

(112, 'الإخلاص', 'الاخلاص', 'Al-Ikhlas', 'al-ikhlas', 4, '30', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/112.mp3', NULL, NOW(), NOW()),

(113, 'الفلق', 'الفلق', 'Al-Falaq', 'al-falaq', 5, '30', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/113.mp3', NULL, NOW(), NOW()),

(114, 'الناس', 'الناس', 'An-Nas', 'an-nas', 4, '30', 'Meccan', NULL, NULL, NULL, 'https://download.quranicaudio.com/quran/mishaari\_raashid\_al-3afaasee/114.mp3', NULL, NOW(), NOW());

\-- Skip existing: Muzammil (73) and Mulk (67) already in DB as id=1,2

\-- Run: DELETE FROM surahs WHERE id IN (1,2) first, OR use INSERT IGNORE with number as unique key

\---

\## PHASE 2: SEO METAS — Fill \`seo\_metas\` Table

Run this PHP Artisan command OR add this seeder in Laravel:

(Create: database/seeders/SeoMetaSeeder.php)

\---

\### 2A. Prayer Time Pages — seo\_metas for each city

For EACH city in your \`cities\` table, insert into \`seo\_metas\`:

Example for Karachi (metaable\_type = 'App\\Models\\City', metaable\_id = city.id):

INSERT INTO \`seo\_metas\` (\`metaable\_type\`, \`metaable\_id\`, \`title\`, \`meta\_description\`, \`canonical\_url\`, \`schema\_override\_json\`, \`created\_at\`, \`updated\_at\`)

SELECT

'App\\\\Models\\\\City',

id,

CONCAT('Namaz Time ', name, ' Today – Fajr, Zuhr, Asr, Maghrib, Isha | NoorIslam'),

CONCAT('Check today\\'s accurate namaz timings in ', name, '. Fajr, Zuhr, Asr, Maghrib and Isha prayer times for ', name, ' updated daily using UISK method.'),

CONCAT('https://noorislam.com/prayer-times/', slug),

JSON\_OBJECT(

'@context', 'https://schema.org',

'@type', 'WebPage',

'name', CONCAT('Prayer Times in ', name),

'description', CONCAT('Daily namaz timings for ', name, ' – Fajr, Dhuhr, Asr, Maghrib, Isha'),

'publisher', JSON\_OBJECT('@type', 'Organization', 'name', 'NoorIslam')

),

NOW(), NOW()

FROM cities;

\---

\### 2B. Surah Pages — seo\_metas

INSERT INTO \`seo\_metas\` (\`metaable\_type\`, \`metaable\_id\`, \`title\`, \`meta\_description\`, \`canonical\_url\`, \`schema\_override\_json\`, \`created\_at\`, \`updated\_at\`)

SELECT

'App\\\\Models\\\\Surah',

id,

CONCAT('Surah ', name\_en, ' (', name\_ur, ') – Arabic, Urdu & English | NoorIslam'),

CONCAT('Read Surah ', name\_en, ' with Urdu and English translation. Full Arabic text, audio recitation, PDF download and ', name\_en, ' ki fazilat.'),

CONCAT('https://noorislam.com/surah/', slug),

JSON\_OBJECT(

'@context', 'https://schema.org',

'@type', 'Article',

'headline', CONCAT('Surah ', name\_en, ' – Complete with Translation'),

'inLanguage', 'ur',

'author', JSON\_OBJECT('@type', 'Person', 'name', 'Imam Noor'),

'publisher', JSON\_OBJECT('@type', 'Organization', 'name', 'NoorIslam')

),

NOW(), NOW()

FROM surahs;

\---

\### 2C. Islamic Date Pages

INSERT INTO \`seo\_metas\` (\`metaable\_type\`, \`metaable\_id\`, \`title\`, \`meta\_description\`, \`canonical\_url\`, \`schema\_override\_json\`, \`created\_at\`, \`updated\_at\`)

VALUES

('static', 1, 'Islamic Date Today in Pakistan – Hijri Calendar 2026 | NoorIslam',

'Today\\'s Islamic (Hijri) date in Pakistan. Check current Hijri date, Islamic months calendar, and date converter for Pakistan.',

'https://noorislam.com/islamic-date-today-pakistan',

'{"@context":"https://schema.org","@type":"WebPage","name":"Islamic Date Today Pakistan","description":"Current Hijri date for Pakistan updated daily"}',

NOW(), NOW()),

('static', 2, 'Islamic Date Today – Hijri Calendar | NoorIslam',

'What is today\\'s Islamic date? Check current Hijri date, Islamic month, and Gregorian to Hijri converter updated every day.',

'https://noorislam.com/islamic-date-today',

'{"@context":"https://schema.org","@type":"WebPage","name":"Islamic Date Today","description":"Today Hijri date updated daily"}',

NOW(), NOW());

\---

\### 2D. Fazilat Pages — FAQPage Schema

INSERT INTO \`seo\_metas\` (\`metaable\_type\`, \`metaable\_id\`, \`title\`, \`meta\_description\`, \`canonical\_url\`, \`schema\_override\_json\`, \`created\_at\`, \`updated\_at\`)

SELECT

'App\\\\Models\\\\Surah',

id,

CONCAT('Surah ', name\_en, ' Ki Fazilat – Benefits of Recitation | NoorIslam'),

CONCAT('Discover the fazilat and benefits of Surah ', name\_en, ' (', name\_ur, '). Hadith references, when to recite, and spiritual rewards.'),

CONCAT('https://noorislam.com/surah/', slug, '/fazilat'),

JSON\_OBJECT(

'@context', 'https://schema.org',

'@type', 'FAQPage',

'mainEntity', JSON\_ARRAY(

JSON\_OBJECT(

'@type', 'Question',

'name', CONCAT('Surah ', name\_en, ' ki fazilat kya hai?'),

'acceptedAnswer', JSON\_OBJECT(

'@type', 'Answer',

'text', CONCAT('Surah ', name\_en, ' padhne ke buhat se fayde hain. Is surah ki tilawat se dil ko sukoon milta hai aur Allah ki rehmat nazil hoti hai.')

)

)

)

),

NOW(), NOW()

FROM surahs WHERE id <= 20; -- Top 20 surahs pehle, baad mein sab

\---

\## PHASE 3: LARAVEL CONTROLLER/BLADE CHANGES

\### 3A. Meta Tags — Every page par yeh add karo (Blade layout):

In resources/views/layouts/app.blade.php section:

@if(isset($seoMeta))

{{ $seoMeta->title ?? config('app.name') }}

@if($seoMeta->schema\_override\_json)

{!! $seoMeta->schema\_override\_json !!}

@endif

@endif

\### 3B. In every Controller, load the SEO meta:

// Example in PrayerTimesController:

$city = City::where('slug', $citySlug)->firstOrFail();

$seoMeta = $city->seoMeta; // hasOne relationship

return view('prayer-times.show', compact('city', 'seoMeta', ...));

// Add to City model:

public function seoMeta() {

return $this->morphOne(SeoMeta::class, 'metaable');

}

// Same for Surah model.

\### 3C. hreflang tags — Add for Urdu/English versions:

\---

\## PHASE 4: SITEMAP GENERATION

Run: php artisan sitemap:generate (install spatie/laravel-sitemap)

OR manually generate in routes/web.php:

Route::get('/sitemap.xml', function() {

$cities = City::all();

$surahs = Surah::all();

// Generate XML with all prayer-times/{slug}, surah/{slug}, islamic-date pages

});

Priority mapping:

\- /prayer-times/karachi → priority 1.0, changefreq daily

\- /prayer-times/{city} → priority 0.8, changefreq daily

\- /surah/{slug} → priority 0.9, changefreq monthly

\- /surah/{slug}/fazilat → priority 0.7, changefreq monthly

\- /islamic-date-today → priority 1.0, changefreq daily

\- /sehri-iftar/{city} → priority 0.9, changefreq daily (Ramadan only)

\---

\## PHASE 5: HIGH-PRIORITY KEYWORD GAPS TO BUILD

These pages NOT yet in your DB — create them:

1\. /namaz-time (alias → /prayer-times/karachi as default)

2\. /namaz-timing-karachi

3\. /sehri-time-karachi

4\. /surah-yaseen (slug: ya-sin — add redirect from surah-yaseen → surah/ya-sin)

5\. /surah-waqiah (redirect → surah/al-waqiah)

6\. /surah-rahman (redirect → surah/ar-rahman)

7\. /surah-al-muzammil-ki-fazilat

8\. /hijri-calendar (link to Islamic date page)

Add these URL aliases in routes/web.php:

Route::redirect('/namaz-time', '/prayer-times/karachi', 301);

Route::redirect('/surah-yaseen', '/surah/ya-sin', 301);

Route::redirect('/surah-waqiah', '/surah/al-waqiah', 301);

Route::redirect('/surah-e-mulk', '/surah/al-mulk', 301);

Route::redirect('/surah-muzammil', '/surah/al-muzzammil', 301);

\---

\## PHASE 6: robots.txt + Performance

robots.txt:

User-agent: \*

Allow: /

Disallow: /admin/

Disallow: /api/

Disallow: /cache/

Sitemap: https://noorislam.com/sitemap.xml

Performance:

\- Enable Laravel response caching for prayer time pages (cache 1 hour)

\- Use lazy loading for Quran Arabic text (heavy content)

\- Add WebP images for author photos

\- Enable gzip/brotli compression on server