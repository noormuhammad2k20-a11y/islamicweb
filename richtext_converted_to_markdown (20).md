Ab mujhe poori picture samajh aa gayi. Prompt likh raha hoon — seedha text mein:

ANTIGRAVITY MASTER PROMPT — NoorIslam Hadith Module Complete Seeding & Enrichment
=================================================================================

PROJECT CONTEXT
---------------

**Repository:** https://github.com/noormuhammad2k20-a11y/islamicweb**Framework:** Laravel 11, PHP 8.2, MariaDB, Blade**APP\_URL:** Must be https://noorislam.com in .env — never localhost (canonical bug)**Stack:** Tailwind/Bootstrap CSS, Gemini API available

PROBLEM ANALYSIS (Read Before Touching Any Code)
------------------------------------------------

The /hadith index page shows 100 topics but **most show "0 Hadiths"**. The individual topic pages like /hadith/trust-in-allah-tawakkul show **zero hadiths** because the hadith\_hadith\_topic pivot table is **completely empty** — hadiths exist in the DB but are NOT linked to any topics. Secondary problem: hadith\_topics rows have NULL in most rich-content columns. Tertiary problem: only Sahih Bukhari (695 hadiths) is seeded; 11 other collections show 0.

TASK 1 — ANALYZE EXISTING CODE FIRST
------------------------------------

Before writing any seeder or migration, read these files from the repo:

Plain textANTLR4BashCC#CSSCoffeeScriptCMakeDartDjangoDockerEJSErlangGitGoGraphQLGroovyHTMLJavaJavaScriptJSONJSXKotlinLaTeXLessLuaMakefileMarkdownMATLABMarkupObjective-CPerlPHPPowerShell.propertiesProtocol BuffersPythonRRubySass (Sass)Sass (Scss)SchemeSQLShellSwiftSVGTSXTypeScriptWebAssemblyYAMLXML`   app/Models/Hadith.php  app/Models/HadithTopic.php  app/Models/HadithCollection.php  app/Models/HadithNarrator.php  app/Http/Controllers/HadithController.php  resources/views/hadith/  database/migrations/ (all hadith-related migrations)  routes/web.php (hadith routes)   `

Map the actual relationship method names. The pivot table hadith\_hadith\_topic connects hadiths.id ↔ hadith\_topics.id. Confirm column names from migration before seeding.

DATABASE SCHEMA REFERENCE (From SQL Dump Analysis)
--------------------------------------------------

### hadiths table — key columns:

*   id, arabic\_text (placeholder currently), english\_translation, urdu\_translation (NULL), reference (e.g. "Sahih Bukhari 1"), grade, slug, book\_name (chapter within Bukhari like "Revelation", "Belief", "Knowledge"), hadith\_number, sahih\_grade, narrator, explanation (NULL), key\_lessons (JSON, NULL), tags (JSON), keywords (JSON), narrator\_id, collection\_id (=1 for all, Sahih Bukhari), hadith\_book\_id, hadith\_chapter\_id, practical\_applications (NULL), benefits (NULL)
    

### hadith\_topics table — 100 rows (IDs 1–100), key columns:

*   id, topic\_name, topic\_name\_arabic (NULL), topic\_name\_urdu (NULL), slug, content (minimal text), description (NULL), meta\_title, meta\_description, introduction, quick\_stats (JSON, NULL), quran\_references (JSON, NULL), faqs (JSON, basic only), overview (NULL), importance (NULL), lessons (NULL), benefits (NULL), practical\_guidance (NULL), misconceptions (NULL)
    

### hadith\_hadith\_topic pivot — EMPTY (this is the root cause)

Columns: hadith\_id, hadith\_topic\_id (confirm exact column name from migration)

### hadith\_collections — 12 rows (all present, only collection\_id=1 Bukhari has hadiths)

### hadith\_narrators — 600 rows already seeded

TASK 2 — POPULATE hadith\_hadith\_topic PIVOT TABLE
---------------------------------------------------

### Step A: Create an Artisan Command

Plain textANTLR4BashCC#CSSCoffeeScriptCMakeDartDjangoDockerEJSErlangGitGoGraphQLGroovyHTMLJavaJavaScriptJSONJSXKotlinLaTeXLessLuaMakefileMarkdownMATLABMarkupObjective-CPerlPHPPowerShell.propertiesProtocol BuffersPythonRRubySass (Sass)Sass (Scss)SchemeSQLShellSwiftSVGTSXTypeScriptWebAssemblyYAMLXML`   php artisan make:command HadithTopicLinker   `

**File:** app/Console/Commands/HadithTopicLinker.php

Logic — match hadiths to topics using KEYWORD MAPPING. Read every hadith's english\_translation + keywords JSON + book\_name + narrator, then insert into pivot table. A single hadith can map to MULTIPLE topics.

### Topic-to-Keyword Mapping Rules:

Build a $topicKeywords array inside the command. Each key = hadith\_topic.id, value = array of keywords/phrases to search in english\_translation:

Plain textANTLR4BashCC#CSSCoffeeScriptCMakeDartDjangoDockerEJSErlangGitGoGraphQLGroovyHTMLJavaJavaScriptJSONJSXKotlinLaTeXLessLuaMakefileMarkdownMATLABMarkupObjective-CPerlPHPPowerShell.propertiesProtocol BuffersPythonRRubySass (Sass)Sass (Scss)SchemeSQLShellSwiftSVGTSXTypeScriptWebAssemblyYAMLXML`   $topicKeywords = [      // ID => [keywords...]      1  => ['faith', 'iman', 'believe', 'belief', 'believer', 'disbelief', 'hypocrite'],      2  => ['islam', 'muslim', 'prayer', 'zakat', 'fasting', 'hajj', 'testify', 'five pillars'],      3  => ['tawheed', 'oneness', 'none has the right to be worshipped', 'associate', 'shirk', 'alone'],      4  => ['ihsan', 'perfection', 'as if you see him', 'excellence', 'worship as if'],      5  => ['prayer', 'salah', 'prostrate', 'bow', 'ruku', 'sujud', 'mosque', 'congregation', 'imam leads', 'wudu', 'ablution', 'qibla', 'asr', 'fajr', 'isha', 'maghrib', 'zuhr'],      6  => ['wudu', 'ablution', 'wash', 'wiping', 'feet', 'clean before prayer'],      7  => ['adhan', 'call to prayer', 'iqama', 'muezzin'],      8  => ['friday', 'jumuah', 'jumu\'ah', 'khutbah', 'friday prayer'],      9  => ['tahajjud', 'night prayer', 'qiyam', 'night of qadr', 'laylatul qadr', 'last third of night'],      10 => ['ramadan', 'laylatul qadr', 'night of decree', 'month of ramadan', 'tarawih'],      11 => ['fasting', 'fast', 'sawm', 'suhoor', 'iftar', 'observe fast'],      12 => ['zakat', 'alms', 'obligatory charity', 'poor due', 'nisab'],      13 => ['charity', 'sadaqah', 'give', 'donation', 'spend in allah\'s cause', 'alms-giving'],      14 => ['hajj', 'pilgrimage', 'mecca', 'mina', 'arafat', 'rami', 'tawaf', 'ihram', 'ka\'ba'],      15 => ['umrah', 'lesser pilgrimage', 'mecca', 'tawaf'],      16 => ['dua', 'supplication', 'invoke', 'pray to allah', 'ask allah'],      17 => ['dhikr', 'remembrance', 'glorify', 'praise allah', 'subhan', 'alhamdulillah', 'allahu akbar', 'la ilaha'],      18 => ['istighfar', 'forgiveness', 'seek forgiveness', 'repent', 'tawbah', 'sins forgiven'],      19 => ['repentance', 'tawbah', 'repent', 'turn to allah', 'sins forgiven', 'forgive'],      20 => ['quran', 'qur\'an', 'book of allah', 'revelation', 'recite', 'verse', 'surah'],      21 => ['tafsir', 'interpretation', 'explanation of quran', 'verse meaning'],      22 => ['knowledge', 'learn', 'teach', 'scholar', 'seek knowledge', 'ignorance', 'learned men'],      23 => ['parents', 'mother', 'father', 'obey parents', 'dutifulness to parents', 'birr'],      24 => ['mother', 'she suckled', 'umm', 'mother\'s right'],      25 => ['father', 'his father', 'dad', 'paternal'],      26 => ['children', 'child', 'son', 'daughter', 'offspring', 'kid'],      27 => ['marriage', 'marry', 'wife', 'husband', 'nikah', 'dowry', 'divorce'],      28 => ['family', 'household', 'relatives', 'kith and kin', 'kinship', 'silat ar-rahim'],      29 => ['women', 'woman', 'female', 'wife', 'mother', 'daughter'],      30 => ['brotherhood', 'brother', 'muslim brother', 'love for his brother', 'fellow muslim'],      31 => ['neighbour', 'neighbor', 'next door', 'adjacent'],      32 => ['business', 'trade', 'selling', 'buying', 'transaction', 'market', 'merchant', 'seller'],      33 => ['halal earnings', 'lawful earning', 'provision', 'rizq', 'earning'],      34 => ['riba', 'usury', 'interest', 'loan with interest'],      35 => ['justice', 'just', 'fairness', 'equity', 'oppression', 'wrongdoing'],      36 => ['honesty', 'honest', 'truthful', 'truth', 'truthfulness', 'true'],      37 => ['trustworthy', 'trust', 'amanah', 'betrays', 'dishonest', 'broken trust'],      38 => ['patience', 'sabr', 'patient', 'endure', 'trials', 'hardship'],      39 => ['gratitude', 'shukr', 'grateful', 'thankful', 'thank allah', 'blessings'],      40 => ['mercy', 'rahmah', 'merciful', 'compassion', 'kind to others', 'rahman'],      41 => ['kindness', 'kind', 'gentle', 'softness', 'rifq'],      42 => ['character', 'akhlaq', 'manners', 'morals', 'good conduct', 'character of prophet'],      43 => ['backbiting', 'gheebah', 'gossip', 'slander', 'mention your brother'],      44 => ['envy', 'hasad', 'jealousy', 'jealous', 'covet'],      45 => ['anger', 'angry', 'do not get angry', 'control anger', 'wrath'],      46 => ['major sins', 'kaba\'ir', 'grave sin', 'great sin', 'severe punishment', 'seven destructive'],      47 => ['minor sins', 'small sins', 'lesser sins'],      48 => ['death', 'die', 'dying', 'funeral', 'passed away', 'deceased', 'mortality'],      49 => ['grave', 'qabr', 'buried', 'burial', 'tomb', 'questioning in grave'],      50 => ['barzakh', 'intermediate stage', 'between death and resurrection'],      51 => ['resurrection', 'raised', 'day of rising', 'ba\'th', 'yawm al-qiyamah'],      52 => ['day of judgment', 'judgment day', 'resurrection', 'when the hour', 'accounts', 'reckoning'],      53 => ['paradise', 'jannah', 'garden', 'rivers of honey', 'houri', 'enter paradise'],      54 => ['hellfire', 'hell', 'jahannam', 'fire', 'punishment', 'enter hell'],      55 => ['prophet muhammad', 'messenger of allah', 'apostle', 'prophet ﷺ', 'allah\'s messenger'],      56 => ['companions', 'sahabah', 'sahabi', 'ansar', 'muhajirun'],      57 => ['good manners', 'adab', 'etiquette', 'greet', 'salaam', 'respect'],      58 => ['food', 'drink', 'eat', 'meal', 'hunger', 'halal food', 'haram food', 'slaughter'],      59 => ['dress', 'modesty', 'hijab', 'clothing', 'awrah', 'cover', 'garment'],      60 => ['purification', 'taharah', 'purity', 'clean', 'impurity', 'ghusl', 'bath'],      61 => ['travel', 'journey', 'safar', 'traveler', 'on the road', 'riding'],      62 => ['health', 'medicine', 'sick', 'disease', 'cure', 'ruqya', 'black seed', 'honey as cure'],      63 => ['morning', 'adhkar morning', 'upon waking', 'start of day', 'dawn dhikr'],      64 => ['evening', 'adhkar evening', 'night dhikr', 'before sleeping', 'end of day'],      65 => ['sleep', 'sleeping', 'bedtime', 'before sleep', 'upon waking'],      66 => ['visiting sick', 'visit the sick', 'ill person', 'hospital'],      67 => ['funeral', 'janazah', 'burial', 'condolences', 'coffin', 'shroud', 'wash the dead'],      68 => ['leadership', 'leader', 'ruler', 'authority', 'governance', 'imam of state'],      69 => ['education', 'teach', 'learning', 'student', 'scholar'],      70 => ['children rights', 'right of child', 'caring for children'],      71 => ['orphan', 'yateem', 'fatherless child', 'care for orphan'],      72 => ['animals', 'animal rights', 'bird', 'dog', 'cat', 'beast of burden', 'do not harm animals'],      73 => ['environment', 'tree', 'plant', 'water', 'earth', 'nature', 'greenery'],      74 => ['time', 'time management', 'precious time', 'waste time', 'opportunity'],      75 => ['youth', 'young man', 'young person', 'young age', 'childhood'],      76 => ['elders', 'elderly', 'old person', 'respect elders', 'senior'],      77 => ['guest', 'hospitality', 'hosting', 'visitor', 'welcome'],      78 => ['promise', 'oath', 'covenant', 'vow', 'pledge'],      79 => ['jihad', 'striving', 'fighting in allah\'s cause', 'mujahid', 'battle'],      80 => ['martyrdom', 'shaheed', 'martyr', 'die in allah\'s cause', 'killed in battle'],      81 => ['debt', 'owe', 'borrowed', 'creditor', 'debtor', 'loan'],      82 => ['inheritance', 'will', 'estate', 'bequest', 'heir'],      83 => ['cleanliness', 'clean', 'purity', 'dirt', 'filth', 'remove harm'],      84 => ['smile', 'smiling', 'cheerful', 'glad face', 'laughter'],      85 => ['gift', 'giving gifts', 'present', 'hadiya'],      86 => ['forgiveness', 'forgive', 'pardon', 'overlook', 'excuse'],      87 => ['humility', 'humble', 'modesty', 'lowering oneself', 'not arrogant'],      88 => ['arrogance', 'kibr', 'proud', 'haughty', 'boastful', 'show off'],      89 => ['hypocrisy', 'nifaq', 'hypocrite', 'munafiq', 'two-faced'],      90 => ['lying', 'lie', 'liar', 'false', 'tells a lie', 'fabricate'],      91 => ['cheating', 'cheat', 'deceive', 'fraud', 'deception'],      92 => ['modesty', 'haya', 'bashfulness', 'shyness', 'hayaa'],      93 => ['generosity', 'generous', 'give freely', 'liberal', 'munificent'],      94 => ['miserliness', 'miser', 'stingy', 'niggardly', 'withhold'],      95 => ['contentment', 'qana\'ah', 'satisfied', 'content with little', 'not greedy'],      96 => ['tawakkul', 'trust in allah', 'rely on allah', 'put trust', 'depend on allah'],      97 => ['taqwa', 'fear of allah', 'god-fearing', 'piety', 'consciousness of allah'],      98 => ['hope', 'hope in allah', 'hope for mercy', 'optimism', 'raja'],      99 => ['love of allah', 'love allah', 'love for allah', 'allah loves'],      100 => ['love of prophet', 'love for prophet', 'love the messenger', 'dearer than anything'],  ];   `

### Step B: Matching Algorithm

Plain textANTLR4BashCC#CSSCoffeeScriptCMakeDartDjangoDockerEJSErlangGitGoGraphQLGroovyHTMLJavaJavaScriptJSONJSXKotlinLaTeXLessLuaMakefileMarkdownMATLABMarkupObjective-CPerlPHPPowerShell.propertiesProtocol BuffersPythonRRubySass (Sass)Sass (Scss)SchemeSQLShellSwiftSVGTSXTypeScriptWebAssemblyYAMLXML`   public function handle()  {      $topics = \App\Models\HadithTopic::all()->keyBy('id');      $hadiths = \App\Models\Hadith::all();      $insertData = [];      foreach ($hadiths as $hadith) {          $text = strtolower($hadith->english_translation . ' ' . implode(' ', json_decode($hadith->keywords ?? '[]', true)));          foreach ($this->topicKeywords as $topicId => $keywords) {              foreach ($keywords as $keyword) {                  if (str_contains($text, strtolower($keyword))) {                      $insertData[] = [                          'hadith_id' => $hadith->id,                          'hadith_topic_id' => $topicId, // adjust column name per migration                      ];                      break; // only add once per topic per hadith                  }              }          }          // Ensure every hadith is linked to AT LEAST topic 55 (Prophet Muhammad)          // since all are from Bukhari narrating about the Prophet ﷺ          $hasProphet = collect($insertData)->where('hadith_id', $hadith->id)->where('hadith_topic_id', 55)->count();          if (!$hasProphet) {              $insertData[] = ['hadith_id' => $hadith->id, 'hadith_topic_id' => 55];          }      }      // Deduplicate      $insertData = collect($insertData)->unique(fn($row) => $row['hadith_id'].'-'.$row['hadith_topic_id'])->values()->toArray();      // Chunk insert      foreach (array_chunk($insertData, 500) as $chunk) {          \DB::table('hadith_hadith_topic')->insertOrIgnore($chunk);      }      $this->info('Done. ' . count($insertData) . ' topic links inserted.');  }   `

**IMPORTANT:** Check the actual pivot table column name — it may be topic\_id instead of hadith\_topic\_id. Read the migration file first.

Run: php artisan hadith:link-topics

TASK 3 — ENRICH hadith\_topics TABLE (All 100 Rows)
---------------------------------------------------

Create seeder: database/seeders/HadithTopicEnrichmentSeeder.php

This seeder must UPDATE existing rows (not insert new ones). Use HadithTopic::where('id', $id)->update(\[...\]) for each of the 100 topics.

### Fields to fill for EVERY topic:

Plain textANTLR4BashCC#CSSCoffeeScriptCMakeDartDjangoDockerEJSErlangGitGoGraphQLGroovyHTMLJavaJavaScriptJSONJSXKotlinLaTeXLessLuaMakefileMarkdownMATLABMarkupObjective-CPerlPHPPowerShell.propertiesProtocol BuffersPythonRRubySass (Sass)Sass (Scss)SchemeSQLShellSwiftSVGTSXTypeScriptWebAssemblyYAMLXML`   [      'topic_name_arabic'  => '...',   // Arabic name of the topic      'topic_name_urdu'    => '...',   // Urdu name of the topic      'overview'           => '...',   // 3-4 sentence overview of this topic in Islamic teachings      'importance'         => '...',   // Why this topic is important in Islam (2-3 sentences)      'lessons'            => '...',   // Key lessons Muslims can learn (2-3 sentences)      'benefits'           => '...',   // Spiritual and practical benefits (2-3 sentences)      'practical_guidance' => '...',   // How to apply this teaching in daily life (2-3 sentences)      'misconceptions'     => '...',   // Common misconceptions about this topic (2-3 sentences)      'quick_stats'        => json_encode([          'total_hadiths'     => 0,    // Will auto-update from pivot          'quran_mentions'    => 'XX times',          'importance_level'  => 'Core Pillar / High / Medium',      ]),      'quran_references'   => json_encode([          ['surah' => 'Al-Baqarah', 'ayah' => '2:177', 'relevance' => '...'],          ['surah' => '...', 'ayah' => '...', 'relevance' => '...'],      ]),      'faqs' => json_encode([          ['question' => 'What does Islam say about [topic]?', 'answer' => '...'],          ['question' => 'How many hadiths concern [topic]?', 'answer' => '...'],          ['question' => 'What is the Quranic basis for [topic]?', 'answer' => '...'],      ]),      'introduction' => '...', // 1-2 sentence intro for topic page header      'meta_title'   => '[Topic] Hadiths in Islam | Authentic Collection | NoorIslam',      'meta_description' => 'Read authentic hadiths about [Topic] with Arabic text, Urdu and English translation. Explore Islamic teachings on [Topic] from Sahih Bukhari and major collections.',  ]   `

### Complete Data for All 100 Topics:

Provide full data for every one of the 100 topics. Example for first 5 (continue this pattern for ALL 100):

Plain textANTLR4BashCC#CSSCoffeeScriptCMakeDartDjangoDockerEJSErlangGitGoGraphQLGroovyHTMLJavaJavaScriptJSONJSXKotlinLaTeXLessLuaMakefileMarkdownMATLABMarkupObjective-CPerlPHPPowerShell.propertiesProtocol BuffersPythonRRubySass (Sass)Sass (Scss)SchemeSQLShellSwiftSVGTSXTypeScriptWebAssemblyYAMLXML`   // Topic 1: Faith (Iman)  HadithTopic::where('id', 1)->update([      'topic_name_arabic'  => 'الإيمان',      'topic_name_urdu'    => 'ایمان',      'overview'           => 'Iman (Faith) is the foundation of Islamic belief, encompassing belief in Allah, His Angels, His Books, His Messengers, the Day of Judgment, and divine decree. The Prophet ﷺ defined Iman through the famous Hadith of Jibreel as believing in Allah, His angels, His books, His messengers, the Last Day, and predestination. Authentic hadiths reveal that Iman has over sixty branches, with the highest being the testimony of faith and the lowest being removing harm from the road.',      'importance'         => 'Iman is the prerequisite for all acts of worship and the dividing line between salvation and loss in the Hereafter. Without sound faith, no deed is accepted by Allah. The Prophet ﷺ emphasized that the sweetness of faith is tasted only when one loves Allah and His Messenger above all else.',      'lessons'            => 'Faith is not static — it increases with obedience and decreases with sin. A believer must continually renew and strengthen their Iman through dhikr, knowledge, and righteous deeds. The concept of Iman also encompasses action of the heart, tongue, and limbs.',      'benefits'           => 'True Iman brings inner peace, clarity of purpose, and protection from anxiety and despair. It instills hope in Allah\'s mercy and fear of His punishment, creating a balanced psychological state. Faith also opens the door to divine forgiveness and Paradise.',      'practical_guidance' => 'Strengthen your faith by learning the six pillars of Iman deeply, attending Islamic circles, reading Quran daily, and making dua for firm faith (thabaat). Recite "Allahumma thabbit qalbi ala dinik" regularly. Avoid sins that weaken faith and seek repentance immediately.',      'misconceptions'     => 'Many people confuse Iman with mere verbal declaration of the Shahada. In reality, Iman requires belief in the heart, declaration on the tongue, and action through the limbs according to classical scholars. Another misconception is that faith cannot increase or decrease — authentic hadiths clearly state otherwise.',      'introduction'       => 'Explore authentic hadiths concerning Faith (Iman) — the cornerstone of Islamic belief and the foundation of every Muslim\'s relationship with Allah.',      'quick_stats'        => json_encode(['importance_level' => 'Core Pillar', 'quran_mentions' => '200+ times', 'related_pillars' => '6 Pillars of Iman']),      'quran_references'   => json_encode([          ['surah' => 'Al-Baqarah', 'ayah' => '2:285', 'relevance' => 'The Messenger has believed in what was revealed to him from his Lord, and so have the believers.'],          ['surah' => 'Al-Hujurat', 'ayah' => '49:14', 'relevance' => 'The bedouins say we have believed — say rather we have submitted, for faith has not yet entered your hearts.'],          ['surah' => 'Al-Anfal', 'ayah' => '8:2', 'relevance' => 'The believers are only those who, when Allah is mentioned, their hearts tremble.'],      ]),      'faqs'               => json_encode([          ['question' => 'What are the six pillars of Iman?', 'answer' => 'Belief in Allah, His Angels, His Books, His Messengers, the Day of Judgment, and divine decree (Qadar) — both good and bad.'],          ['question' => 'Can Iman increase and decrease?', 'answer' => 'Yes. According to authentic hadiths and scholarly consensus, Iman increases with obedience and good deeds, and decreases with sins and heedlessness.'],          ['question' => 'What is the difference between Iman and Islam?', 'answer' => 'Islam refers to outward submission (the five pillars), while Iman refers to inner belief. Ihsan is the highest level — worshipping Allah as if you see Him.'],      ]),      'meta_title'        => 'Hadiths on Faith (Iman) | Authentic Islamic Teachings | NoorIslam',      'meta_description'  => 'Read authentic hadiths about Faith (Iman) with Arabic text, Urdu and English translations. Explore what Prophet Muhammad ﷺ said about belief, faith, and Iman in Islam.',  ]);  // Topic 2: Islam  HadithTopic::where('id', 2)->update([      'topic_name_arabic' => 'الإسلام',      'topic_name_urdu'   => 'اسلام',      'overview'          => 'Islam as a topic in hadith literature focuses on the five pillars — Shahada, Salah, Zakat, Sawm, and Hajj — which form the structural foundation of Muslim practice. The famous Hadith of Jibreel defines Islam as the outward acts of worship and submission to Allah. The Prophet ﷺ described the best Islam as the act that benefits others — feeding the poor and giving salaam.',      'importance'        => 'The five pillars of Islam are obligatory acts whose abandonment has serious consequences in Islamic jurisprudence. They represent the practical dimension of faith and structure a Muslim\'s relationship with Allah throughout every day, week, month, and lifetime.',      'lessons'           => 'Islam teaches that worship must be consistent and sincere, not merely performative. Each pillar has a distinct wisdom — Salah maintains connection with Allah five times daily, Zakat purifies wealth, Sawm disciplines the self, and Hajj demonstrates global Muslim unity.',      'benefits'          => 'Practicing the pillars of Islam purifies the soul, strengthens communal bonds, disciplines desires, and earns immense reward in this life and the Hereafter. The Prophet ﷺ promised that fulfilling them correctly leads to Paradise.',      'practical_guidance'=> 'Learn the proper way to perform each pillar from qualified teachers. Prioritize Salah above all — it is the first deed questioned on the Day of Judgment. Pay Zakat on savings held for a lunar year. Fast Ramadan with intention and avoid all that breaks it.',      'misconceptions'    => 'Islam is sometimes reduced to rituals alone. However, authentic hadiths emphasize that the best Muslim is one whose tongue and hands do not harm others. External rituals without internal transformation are incomplete. Islam is a complete way of life.',      'introduction'      => 'Discover what the Prophet ﷺ taught about Islam — the five pillars, the best deeds, and the qualities of a true Muslim.',      'quick_stats'       => json_encode(['importance_level' => 'Core Pillar', 'quran_mentions' => '92 times', 'key_concept' => 'Five Pillars']),      'quran_references'  => json_encode([          ['surah' => 'Al-Imran', 'ayah' => '3:19', 'relevance' => 'Indeed, the religion in the sight of Allah is Islam.'],          ['surah' => 'Al-Maidah', 'ayah' => '5:3', 'relevance' => 'Today I have perfected for you your religion and completed My favor upon you and have approved for you Islam as religion.'],      ]),      'faqs' => json_encode([          ['question' => 'What are the five pillars of Islam?', 'answer' => 'Shahada (testimony of faith), Salah (prayer 5 times daily), Zakat (obligatory charity), Sawm (fasting in Ramadan), and Hajj (pilgrimage to Mecca once in a lifetime for those able).'],          ['question' => 'What does the Prophet ﷺ say is the best Islam?', 'answer' => 'The Prophet ﷺ said the best Islam is to feed the poor and greet with salaam those you know and those you do not know (Sahih Bukhari 12).'],      ]),      'meta_title'       => 'Hadiths on Islam | Five Pillars & Islamic Practice | NoorIslam',      'meta_description' => 'Read authentic hadiths about Islam — the five pillars, the best deeds, and the complete way of life as taught by Prophet Muhammad ﷺ.',  ]);   `

**Continue this exact pattern for all topics 3–100.** Full Arabic names, Urdu names, and rich content for every single topic. Key Arabic names reference:

Plain textANTLR4BashCC#CSSCoffeeScriptCMakeDartDjangoDockerEJSErlangGitGoGraphQLGroovyHTMLJavaJavaScriptJSONJSXKotlinLaTeXLessLuaMakefileMarkdownMATLABMarkupObjective-CPerlPHPPowerShell.propertiesProtocol BuffersPythonRRubySass (Sass)Sass (Scss)SchemeSQLShellSwiftSVGTSXTypeScriptWebAssemblyYAMLXML`   3-Tawheed: التوحيد / توحید  4-Ihsan: الإحسان / احسان  5-Prayer: الصلاة / نماز  6-Wudu: الوضوء / وضو  7-Adhan: الأذان / اذان  8-Jumuah: الجمعة / جمعہ  9-Tahajjud: التهجد / تہجد  10-Ramadan: رمضان / رمضان  11-Fasting: الصيام / روزہ  12-Zakat: الزكاة / زکوٰۃ  13-Sadaqah: الصدقة / صدقہ  14-Hajj: الحج / حج  15-Umrah: العمرة / عمرہ  16-Dua: الدعاء / دعا  17-Dhikr: الذكر / ذکر  18-Istighfar: الاستغفار / استغفار  19-Tawbah: التوبة / توبہ  20-Quran: القرآن / قرآن  21-Tafsir: التفسير / تفسیر  22-Knowledge: العلم / علم  23-Parents: الوالدان / والدین  24-Mother: الأم / ماں  25-Father: الأب / باپ  26-Children: الأطفال / بچے  27-Marriage: النكاح / نکاح  28-Family: الأسرة / خاندان  29-Women: المرأة / خواتین  30-Brotherhood: الأخوة / اخوت  31-Neighbour: الجيران / پڑوسی  32-Business: التجارة / تجارت  33-Halal: الكسب الحلال / حلال کمائی  34-Riba: الربا / سود  35-Justice: العدل / عدل  36-Honesty: الصدق / صداقت  37-Trustworthiness: الأمانة / امانت  38-Patience: الصبر / صبر  39-Gratitude: الشكر / شکر  40-Mercy: الرحمة / رحمت  41-Kindness: اللطف / مہربانی  42-Akhlaq: الأخلاق / اخلاق  43-Gheebah: الغيبة / غیبت  44-Hasad: الحسد / حسد  45-Anger: الغضب / غصہ  46-Major Sins: الكبائر / کبیرہ گناہ  47-Minor Sins: الصغائر / صغیرہ گناہ  48-Death: الموت / موت  49-Grave: القبر / قبر  50-Barzakh: البرزخ / برزخ  51-Resurrection: البعث / قیامت  52-Day of Judgment: يوم القيامة / روز قیامت  53-Paradise: الجنة / جنت  54-Hellfire: جهنم / جہنم  55-Prophet: النبي محمد ﷺ / نبی محمدﷺ  56-Sahabah: الصحابة / صحابہ کرام  57-Adab: الآداب / آداب  58-Food: الطعام والشراب / کھانا پینا  59-Hijab: اللباس والحشمة / حجاب  60-Taharah: الطهارة / طہارت  61-Travel: السفر / سفر  62-Health: الصحة / صحت  63-Morning: أذكار الصباح / صبح کے اذکار  64-Evening: أذكار المساء / شام کے اذکار  65-Sleep: آداب النوم / سونے کے آداب  66-Sick: عيادة المريض / مریض کی عیادت  67-Funeral: الجنازة / جنازہ  68-Leadership: القيادة / قیادت  69-Education: التعليم / تعلیم  70-Children Rights: حقوق الأطفال / بچوں کے حقوق  71-Orphans: الأيتام / یتیم  72-Animals: حقوق الحيوان / جانوروں کے حقوق  73-Environment: البيئة / ماحولیات  74-Time: إدارة الوقت / وقت کا انتظام  75-Youth: الشباب / نوجوان  76-Elders: الشيوخ / بزرگ  77-Guests: الضيافة / مہمان نوازی  78-Promises: الوعود والأيمان / وعدہ اور قسم  79-Jihad: الجهاد / جہاد  80-Martyrdom: الشهادة / شہادت  81-Debt: الدين / قرض  82-Inheritance: الميراث / وراثت  83-Cleanliness: النظافة / صفائی  84-Smiling: الابتسام / مسکراہٹ  85-Gifts: الهدايا / تحفے  86-Forgiveness: العفو / معافی  87-Humility: التواضع / انکساری  88-Arrogance: الكبر / تکبر  89-Hypocrisy: النفاق / نفاق  90-Lying: الكذب / جھوٹ  91-Cheating: الغش / دھوکہ  92-Haya: الحياء / حیا  93-Generosity: الكرم / سخاوت  94-Miserliness: البخل / بخل  95-Contentment: القناعة / قناعت  96-Tawakkul: التوكل / توکل  97-Taqwa: التقوى / تقویٰ  98-Hope: الرجاء / امید  99-Love of Allah: محبة الله / اللہ سے محبت  100-Love of Prophet: محبة النبي ﷺ / نبیﷺ سے محبت   `

TASK 4 — ENRICH hadiths TABLE (Urdu Translations + Explanations)
----------------------------------------------------------------

Since urdu\_translation is NULL for all 695 hadiths, and explanation, key\_lessons, practical\_applications, benefits are also NULL, create:

**File:** app/Console/Commands/HadithEnricher.php

This command should use **Gemini API** to enrich hadiths in batches. Process 10 hadiths per batch, store in DB.

Plain textANTLR4BashCC#CSSCoffeeScriptCMakeDartDjangoDockerEJSErlangGitGoGraphQLGroovyHTMLJavaJavaScriptJSONJSXKotlinLaTeXLessLuaMakefileMarkdownMATLABMarkupObjective-CPerlPHPPowerShell.propertiesProtocol BuffersPythonRRubySass (Sass)Sass (Scss)SchemeSQLShellSwiftSVGTSXTypeScriptWebAssemblyYAMLXML`   // For each hadith without urdu_translation:  $prompt = "  You are an Islamic scholar. Given this hadith in English, provide:  1. Urdu translation (natural Urdu, not literal)  2. Brief explanation (2-3 sentences in English)  3. Key lessons (JSON array of 3 strings in English)  4. Practical applications (1-2 sentences)  5. Benefits (1-2 sentences)  Hadith: {$hadith->english_translation}  Reference: {$hadith->reference}  Respond ONLY in JSON:  {    \"urdu_translation\": \"...\",    \"explanation\": \"...\",    \"key_lessons\": [\"lesson1\", \"lesson2\", \"lesson3\"],    \"practical_applications\": \"...\",    \"benefits\": \"...\"  }  ";   `

Run: php artisan hadith:enrich --batch=10 --sleep=2

Use --batch and --sleep flags to avoid Gemini rate limits.

TASK 5 — SEED ADDITIONAL HADITH COLLECTIONS
-------------------------------------------

Currently only Sahih Bukhari (695 hadiths) is in DB. The other 11 collections show 0 hadiths. Create:

**File:** database/seeders/HadithCollectionsSeeder.php

Import hadiths from authentic open-source APIs. Suggested source: sunnah.com API or hadithapi.com. For each collection (IDs 2-12), seed minimum 50-100 hadiths per collection to populate the "Browse by Collection" section on /hadith.

Plain textANTLR4BashCC#CSSCoffeeScriptCMakeDartDjangoDockerEJSErlangGitGoGraphQLGroovyHTMLJavaJavaScriptJSONJSXKotlinLaTeXLessLuaMakefileMarkdownMATLABMarkupObjective-CPerlPHPPowerShell.propertiesProtocol BuffersPythonRRubySass (Sass)Sass (Scss)SchemeSQLShellSwiftSVGTSXTypeScriptWebAssemblyYAMLXML`   // Structure for each new hadith to insert:  [      'arabic_text' => '...',      'english_translation' => '...',      'urdu_translation' => null, // will be filled by Task 4      'reference' => 'Sahih Muslim 1',      'grade' => 'Sahih',      'slug' => 'muslim-1',      'book_name' => 'Faith',      'hadith_number' => 1,      'sahih_grade' => 'Sahih',      'is_featured' => 0,      'narrator' => '...',      'narrator_id' => null, // create narrator first      'collection_id' => 2, // Sahih Muslim      'chapter_number' => '1',      'grade_explanation' => 'Agreed upon authentic narration.',      'hadith_book_id' => null,      'hadith_chapter_id' => null,  ]   `

TASK 6 — UPDATE TOPIC PAGE VIEW (Blade Template)
------------------------------------------------

Check resources/views/hadith/show.blade.php (or similar). The topic detail page must display:

### Required Sections on /hadith/{slug}:

1.  **Hero Header** — topic\_name (English + Arabic + Urdu), introduction, hadith count badge, grade filter
    
2.  **Overview Card** — overview text
    
3.  **Hadith List** — paginated, 10 per page, each hadith card showing:
    
    *   Arabic text (in Arabic font, right-to-left)
        
    *   English translation
        
    *   Urdu translation
        
    *   Reference (e.g. "Sahih Bukhari 52")
        
    *   Grade badge (Sahih = green, Hasan = blue)
        
    *   Narrator name
        
    *   Collection name
        
    *   explanation (expandable)
        
4.  **Advanced Filters** — by authenticity grade, by collection, by narrator (already in UI, just needs data)
    
5.  **Quick Stats** — from quick\_stats JSON
    
6.  **Quran References** — from quran\_references JSON
    
7.  **Key Lessons** — from topic lessons field
    
8.  **Practical Guidance** — from practical\_guidance field
    
9.  **FAQs** — from faqs JSON, displayed as expandable accordion (schema.org FAQPage markup)
    
10.  **Related Topics** — 6 random related topics from hadith\_topic\_related or random selection
    
11.  **Misconceptions** — from misconceptions field
    

### /hadith Index Page Updates:

Each topic card must show:

*   Topic name (English)
    
*   Arabic name
    
*   Urdu name
    
*   Actual hadith count (count from pivot, NOT hardcoded)
    
*   Short description (truncated introduction)
    
*   "Read Hadiths" link
    
*   Grade distribution mini-bar (Sahih/Hasan/Daif count)
    

The stats section must show real numbers:

*   Total Topics: 100
    
*   Total Hadiths: (real DB count)
    
*   Authentic Collections: 12
    
*   Key Narrators: (count from narrators table)
    

TASK 7 — SEO META + SCHEMA MARKUP
---------------------------------

### For /hadith index:

Plain textANTLR4BashCC#CSSCoffeeScriptCMakeDartDjangoDockerEJSErlangGitGoGraphQLGroovyHTMLJavaJavaScriptJSONJSXKotlinLaTeXLessLuaMakefileMarkdownMATLABMarkupObjective-CPerlPHPPowerShell.propertiesProtocol BuffersPythonRRubySass (Sass)Sass (Scss)SchemeSQLShellSwiftSVGTSXTypeScriptWebAssemblyYAMLXML`   // In controller:  $seoMeta = [      'title' => 'Hadith Collection | احادیث | Browse by Topic, Collection & Narrator | NoorIslam',      'description' => 'Explore authentic hadiths organized by 100+ topics with Arabic text, Urdu and English translations. Browse Sahih Bukhari, Muslim, Abu Dawud and more.',      'og:type' => 'website',  ];   `

### For /hadith/{slug} topic page:

Plain textANTLR4BashCC#CSSCoffeeScriptCMakeDartDjangoDockerEJSErlangGitGoGraphQLGroovyHTMLJavaJavaScriptJSONJSXKotlinLaTeXLessLuaMakefileMarkdownMATLABMarkupObjective-CPerlPHPPowerShell.propertiesProtocol BuffersPythonRRubySass (Sass)Sass (Scss)SchemeSQLShellSwiftSVGTSXTypeScriptWebAssemblyYAMLXML`   // Schema: FAQPage + BreadcrumbList + ItemList  $schema = [      '@context' => 'https://schema.org',      '@graph' => [          ['@type' => 'FAQPage', 'mainEntity' => $faqSchema],          ['@type' => 'BreadcrumbList', 'itemListElement' => [              ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => config('app.url')],              ['@type' => 'ListItem', 'position' => 2, 'name' => 'Hadith Topics', 'item' => config('app.url').'/hadith'],              ['@type' => 'ListItem', 'position' => 3, 'name' => $topic->topic_name, 'item' => config('app.url').'/hadith/'.$topic->slug],          ]],      ]  ];   `

TASK 8 — CONTROLLER UPDATES
---------------------------

Check HadithController.php. The show($slug) method must:

Plain textANTLR4BashCC#CSSCoffeeScriptCMakeDartDjangoDockerEJSErlangGitGoGraphQLGroovyHTMLJavaJavaScriptJSONJSXKotlinLaTeXLessLuaMakefileMarkdownMATLABMarkupObjective-CPerlPHPPowerShell.propertiesProtocol BuffersPythonRRubySass (Sass)Sass (Scss)SchemeSQLShellSwiftSVGTSXTypeScriptWebAssemblyYAMLXML`   public function show($slug)  {      $topic = HadithTopic::where('slug', $slug)->firstOrFail();      // Eager load hadiths via pivot with collection and narrator      $hadiths = $topic->hadiths()          ->with(['collection', 'narrator'])          ->when(request('grade'), fn($q) => $q->where('sahih_grade', request('grade')))          ->when(request('collection'), fn($q) => $q->where('collection_id', request('collection')))          ->when(request('narrator'), fn($q) => $q->where('narrator_id', request('narrator')))          ->paginate(10);      $relatedTopics = HadithTopic::whereHas('hadiths')          ->where('id', '!=', $topic->id)          ->inRandomOrder()          ->limit(6)          ->get();      $collections = HadithCollection::all();      $narrators = HadithNarrator::orderBy('name_en')->get();      // SEO      $canonicalUrl = config('app.url') . '/hadith/' . $topic->slug;      // NEVER use APP_URL=localhost — must be real domain      return view('hadith.show', compact('topic', 'hadiths', 'relatedTopics', 'collections', 'narrators', 'canonicalUrl'));  }   `

The index() method must:

Plain textANTLR4BashCC#CSSCoffeeScriptCMakeDartDjangoDockerEJSErlangGitGoGraphQLGroovyHTMLJavaJavaScriptJSONJSXKotlinLaTeXLessLuaMakefileMarkdownMATLABMarkupObjective-CPerlPHPPowerShell.propertiesProtocol BuffersPythonRRubySass (Sass)Sass (Scss)SchemeSQLShellSwiftSVGTSXTypeScriptWebAssemblyYAMLXML`   public function index()  {      $topics = HadithTopic::withCount('hadiths')->orderBy('topic_name')->get();      $collections = HadithCollection::withCount('hadiths')->get();      $narrators = HadithNarrator::withCount('hadiths')->orderByDesc('hadiths_count')->limit(12)->get();      $stats = [          'total_topics'      => $topics->count(),          'total_hadiths'     => \App\Models\Hadith::count(),          'total_collections' => $collections->whereNotNull('hadiths_count')->where('hadiths_count', '>', 0)->count(),          'total_narrators'   => \App\Models\HadithNarrator::count(),      ];      return view('hadith.index', compact('topics', 'collections', 'narrators', 'stats'));  }   `

TASK 9 — MODEL RELATIONSHIPS (Verify & Fix)
-------------------------------------------

In Hadith.php:

Plain textANTLR4BashCC#CSSCoffeeScriptCMakeDartDjangoDockerEJSErlangGitGoGraphQLGroovyHTMLJavaJavaScriptJSONJSXKotlinLaTeXLessLuaMakefileMarkdownMATLABMarkupObjective-CPerlPHPPowerShell.propertiesProtocol BuffersPythonRRubySass (Sass)Sass (Scss)SchemeSQLShellSwiftSVGTSXTypeScriptWebAssemblyYAMLXML`   public function topics()  {      return $this->belongsToMany(HadithTopic::class, 'hadith_hadith_topic', 'hadith_id', 'hadith_topic_id');  }  public function collection()  {      return $this->belongsTo(HadithCollection::class, 'collection_id');  }  public function narrator()  {      return $this->belongsTo(HadithNarrator::class, 'narrator_id');  }   `

In HadithTopic.php:

Plain textANTLR4BashCC#CSSCoffeeScriptCMakeDartDjangoDockerEJSErlangGitGoGraphQLGroovyHTMLJavaJavaScriptJSONJSXKotlinLaTeXLessLuaMakefileMarkdownMATLABMarkupObjective-CPerlPHPPowerShell.propertiesProtocol BuffersPythonRRubySass (Sass)Sass (Scss)SchemeSQLShellSwiftSVGTSXTypeScriptWebAssemblyYAMLXML`   public function hadiths()  {      return $this->belongsToMany(Hadith::class, 'hadith_hadith_topic', 'hadith_topic_id', 'hadith_id');  }   `

**CRITICAL:** Verify exact pivot column names from migration before using. Column may be topic\_id not hadith\_topic\_id.

EXECUTION ORDER
---------------

Run tasks in this exact sequence:

Plain textANTLR4BashCC#CSSCoffeeScriptCMakeDartDjangoDockerEJSErlangGitGoGraphQLGroovyHTMLJavaJavaScriptJSONJSXKotlinLaTeXLessLuaMakefileMarkdownMATLABMarkupObjective-CPerlPHPPowerShell.propertiesProtocol BuffersPythonRRubySass (Sass)Sass (Scss)SchemeSQLShellSwiftSVGTSXTypeScriptWebAssemblyYAMLXML`   # 1. Read all existing code/models first  # 2. Fix model relationships if needed  # 3. Populate pivot table  php artisan hadith:link-topics  # 4. Enrich topic data  php artisan db:seed --class=HadithTopicEnrichmentSeeder  # 5. Enrich individual hadiths via Gemini (slow, run overnight)  php artisan hadith:enrich --batch=10 --sleep=2  # 6. Update controller methods  # 7. Update Blade views  # 8. Add schema markup  # 9. Test every topic page URL   `

CRITICAL CONSTRAINTS (Never Violate)
------------------------------------

1.  **APP\_URL must be https://noorislam.com** — never localhost. This breaks canonical URLs and all SEO.
    
2.  **Never change existing CSS/theme** — only add to views, never break existing design system (Deep Islamic Green #1a4731, Gold #c9a227).
    
3.  **Arabic text** must use lang="ar" dir="rtl" attributes and an Arabic font (Amiri or similar via Google Fonts).
    
4.  **Pagination** — always paginate hadith lists, never ->get() all at once on topic pages.
    
5.  **Eager loading** — always use ->with(\['collection', 'narrator'\]) to avoid N+1 queries.
    
6.  **Pivot column name** — read the actual migration file before any pivot insert. Do NOT assume column names.
    
7.  **JSON fields** — always use json\_encode() when inserting and json\_decode($field, true) when reading faqs, quick\_stats, quran\_references, key\_lessons, related\_duas, keywords.
    
8.  **Hadith count on index page** — use withCount('hadiths') not manual counts. This ensures accuracy.
    
9.  **Slug uniqueness** — when seeding new hadiths, ensure slug is unique. Use Str::slug($reference).
    
10.  **Grade display** — Sahih = green badge, Hasan = blue badge, Daif = orange badge, Maudu = red badge.
    

Yeh full prompt hai Antigravity ke liye. Isme sab kuch cover hai: pivot linking, topic enrichment, hadith Urdu translations via Gemini, controller fixes, Blade view requirements, SEO schema, aur execution order. Seedha copy karke Antigravity ko de do.