# Surah Section Audit and Content Expansion  
The existing site shows only a placeholder (“Content for this Surah is currently being updated”) and lists just 4 Surahs. In reality the Qur’an has 114 Surahs, so the site should dynamically list and link to *all* Surahs.  For each Surah, include its Arabic name, English transliteration, number of ayahs/verses, rukus, Juz (para), and place of revelation – as many established sites do.  (For example, Hamariweb’s Surah Yā­sīn page shows “Total Verses: 83”, “Surah No: 36”, “Juz: 22-23”, etc..)  This data can be sourced from Quran metadata (surah names and counts) – many open libraries (like **QUL**’s Quran metadata) provide surah, ayah and juz info for all 114 chapters.  In practice, ensure the site’s database or API fetches the full surah list and details (not just the four currently shown).



## Sources for High-Quality Mushaf Pages  
To display *full Mushaf pages* (traditional script) for each Surah, use reputable Quran image sources or layouts:  



- **QUL Mushaf Layouts:** The Quranic Universal Library provides **Mushaf layout data** that “renders Quran pages exactly like the printed Mushaf”.  This data (with approved Uthmani/Ottoman script fonts) can generate pixel-perfect page images. QUL even offers the *Quran script in image formats* (Uthmani script). In other words, one can programmatically generate or download the exact page images from QUL’s resources.  



- **Open Repositories (GitHub):**  For example, the **QuranHub/quran-pages-images** project hosts images of every Qur’an page (Hafs & Warsh recitations, with Tajwīd markings) under a GPL license.  This means you can download all page PNGs from that repo or GitHub Pages. Another repo (GovarJabbar/Quran-PNG) contains high-quality PNGs generated from quran.com’s fonts. Using these, one can script a download (e.g. with Python requests or a CI job) to fetch all 604 (Hafs) or 621 (Warsh) page images and save them in the site’s root folder.



- **Competitor Example – Hamariweb:** Hamariweb’s Quran section directly links to scanned page images. For instance, their Surah Yā­sīn page shows clickable images for each page (e.g. [Surah Yā­sīn page 1]) and provides PDF and audio downloads. Embedding similar full-page Mushaf images on your Surah pages will give an authentic look. For example, Hamariweb displays the first page of Yā­sīn like this:  

 *Example: Hamariweb’s Surah Yā­sīn Mushaf page (Arabic script). Displaying scanned-page images like this gives the feel of reading the actual Qur’an.*  

Combine these image sources with your existing site. You could either store the images locally (downloaded from the above sources) or use a dynamic fetch. For automation, write a script (e.g. in Python) that pulls the latest page images from the repo or API and places them in your `/static` folder or media directory. Then your Surah template can loop through these images. Tools like cron jobs or GitHub Actions can keep them in sync whenever source updates.



## Automating Quran Page Downloads  
To keep the pages up-to-date without manual work, automate the process:  
1. **Download Script:** Use a simple script (in PHP/Python/etc.) to fetch page images or PDFs. For example, if using QuranHub’s repository (which lists images online), your script can retrieve each URL (e.g. `quranhub.app/images/chapters/036/036.png` etc.). Python’s `requests` or `urllib` can save images to disk.  

2. **Scheduling:** Run this script periodically (via cron or a CI pipeline) so that any corrected recitations or script changes in the source get updated on your site.  


3. **Directory Structure:** Save images in a clear structure under your static files (e.g. `/surah_images/36/01.png`, `/surah_images/36/02.png`, … for Surah 36). Your Surah page code can then loop over the images in its folder.  


4. **PDF Option:** Alternatively, download official Quran PDF and split into pages. Many sites (including Hamariweb) offer Surah PDFs. If a multi-language PDF is available (with Urdu/English translation), consider offering a PDF download link. 

In all cases, cite the source of the images or PDF in your code comments for attribution, and verify the license (the Quran text is public domain, but specific renditions may have usage terms). The QuranHub images are GPL-3.0, so they can be used and shared.

## Improved Surah Page Layout  
The Surah page should follow your site’s existing theme but include these content blocks for a “best look”:  

- **Header Breadcrumbs:** Show navigation like “Home / Quran / Surah Yā­sīn” (as in your example).  


- **Surah Title & Info:** Prominently display the Surah number, Arabic name, transliteration, and summary details (verse count, Juz, rukus, revelation place) – similar to the “Full Detail” section on Hamariweb. Use headings (`<h1>`, `<h2>`) for the name and basic stats.  


- **Mushaf Image Gallery:** Embed the full-page images in a scrollable gallery or paginated view. Each page should have an `<img>` tag with descriptive alt text. For example: `<img src="/surah_images/36/01.png" alt="Surah Yaseen (36): Arabic text page 1">`. Good alt text is crucial: it improves accessibility and SEO. Describe the image in context (e.g. “Page 1 of Surah Yā­sīn in Uthmani script”) rather than “image”.  


- **Audio Player:** Include an audio player or “Play Audio” button, as your mockup shows. This can stream a known reciter (e.g. Sudais) or your own files. Label controls clearly and consider providing URLs to audio for SEO (e.g. `<audio>` with `sources`).  


- **Translations/Resources:** Offer tabs or links for Urdu/Hindi/English translation and Tafsir, if available. Hamariweb provides buttons like “[Urdu Translation] [Hindi Translation] [English Translation] [Tafseer]”. You could link to static pages or other sections on your site.  


- **FAQs Section:** Keep (or enhance) the FAQ section. Google recommends using FAQPage schema for SEO if you have FAQ Q&A on the page. Questions like “Where was Surah revealed?”, “How many verses?”, “Core theme?” are helpful and match Hamariweb’s style. Mark them up with JSON-LD or Microdata so search engines can feature them.  


- **Social Sharing & Related Surahs:** Add social share buttons (Facebook, WhatsApp, etc.) and links to “Next/Previous Surah” or “Most Searched Surahs” (as Hamariweb does in its related section). This keeps users engaged and improves internal linking.  

Overall, **use your existing CSS/theme** for consistency but expand the content layout as above. Ensure the page is mobile-responsive (many users read on phones). Use headings and bullet lists where appropriate (e.g. a bullet list of Surah facts or benefits). Keep paragraphs short and scannable.  

 *Example: Hamariweb’s Surah Maʿārij Mushaf page. This shows multiple full-page images of the Surah text with a clean layout. A similar image gallery layout can be implemented on your site (using your own theme styles).*  

## SEO and Keyword Strategy  
To outrank competitors like Hamariweb, apply strong on-page SEO:  
- **Title & Meta Description:** Craft a unique, descriptive title and meta description for each Surah page, including target keywords. For example, “Surah Yā­sīn (Chapter 36) – Read Online Arabic with Urdu & English Translation” or similar. Google advises creating unique descriptions per page that accurately summarize the content. Avoid generic or duplicate text. Mention key terms (“Surah Yaseen”, “83 verses”, “heart of the Quran”, “Meccan Surah”) naturally in the description.  
- **Headings and Keywords:** Use `<h1>` for “Surah [Name]” and `<h2>`/`<h3>` for sections (like Details, Translation, FAQs). Include keywords in headings (e.g. “Surah Yaseen – 83 Verses – Makki Surah”). The competitor page title “Surah Maarij PDF” uses the pattern “[Surah Name] PDF, [Key stats]” which can guide your phrasing. Also include synonyms and translations (e.g. “Surah Yasin”, “Surah Yaseen”, “Arabic translation”) in the content for semantic relevance.  
- **Structured Data:** As mentioned, mark up the FAQ section with **FAQPage** schema so Google can display rich results. You can also use **BreadcrumbList** schema for the navigation path.  
- **Image SEO:** Provide meaningful `alt` text and `title` attributes on all images. According to accessibility best practices, alt text should contextualize the image. For instance, the Mushaf page image alt might be “Page 1 of Surah Yaseen (36) in Arabic script (Makkah Surah)”. This helps visually impaired users and gives Google context. Also ensure images are compressed (without losing quality) to improve load times.  
- **URL Structure:** Use clean URLs with Surah names or numbers (e.g. `/surah/ya-sin/` or `/surah/36-yaseen/`). Hamariweb uses transliterated names (e.g. `/download-Surah-Yaseen-arabic-translation-pdf`). A clear URL containing the Surah name/number improves SEO and user clarity.  
- **Interlinking and Keywords:** Within content, link to other Surahs (like “next” and “prev”) and related pages (like full Quran PDF, translations). This keeps users on the site longer and distributes link equity. Also add a section for “Most Popular Surahs” or similar (as Hamariweb does) to capture more searches. Use rich keywords in anchor text (e.g. “Surah Rahman PDF” linking to Surah Rahman).  

By combining full Mushaf page images, comprehensive surah info, and these SEO practices, your Surah section will be much more engaging and search-friendly. This approach should make each Surah page stand out (with rich content and structured data) and help improve rankings over competitors. 

**Sources:** Open-source Quran resources (e.g. QUL, QuranHub), competitor example pages, and SEO guidelines (Google Search Central, schema.org FAQ, accessibility best practices) were used to inform these recommendations.