<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FixAllahNamesBenefits extends Seeder
{
    /**
     * ISSUE 5: Replace identical generic benefits for all 99 Allah names 
     * with unique, authentic benefits per name.
     */
    public function run(): void
    {
        $genericText = 'Reciting this name brings immense spiritual benefits and closeness to Allah.';
        
        $genericCount = DB::table('allah_names')
            ->where('benefits', $genericText)
            ->count();
            
        $this->command->info("Found {$genericCount} names with generic benefits text.");

        // Unique benefits for each of the 99 names of Allah
        $benefits = $this->getUniqueBenefits();

        $fixedCount = 0;
        foreach ($benefits as $number => $data) {
            $updated = DB::table('allah_names')
                ->where('number', $number)
                ->update([
                    'benefits' => $data['benefits'],
                    'updated_at' => now(),
                ]);
            
            if ($updated) {
                $fixedCount++;
            }
        }

        $this->command->info("✅ ISSUE 5 Fixed: {$fixedCount} Allah names updated with unique benefits.");
    }

    private function getUniqueBenefits(): array
    {
        return [
            1  => ['benefits' => 'Reciting "Ar-Rahman" 100 times after Fajr prayer sharpens memory and brings divine mercy. Those who recite it regularly are blessed with compassion in their hearts and soft-heartedness toward all creation.'],
            2  => ['benefits' => 'Reciting "Ar-Raheem" after every obligatory prayer brings Allah\'s special mercy. It is recommended for those seeking forgiveness and wanting barakah in their provisions and family life.'],
            3  => ['benefits' => 'Reciting "Al-Malik" after Fajr prayer grants respect and dignity. It helps in matters of authority and governance, and protects against dependence on others.'],
            4  => ['benefits' => 'Reciting "Al-Quddus" 100 times daily purifies the heart from spiritual diseases like jealousy, hatred, and arrogance. It brings inner peace and tranquility to the soul.'],
            5  => ['benefits' => 'Reciting "As-Salam" 160 times over a sick person aids in their recovery. Regular recitation brings safety from calamities and peace of mind in times of worry.'],
            6  => ['benefits' => 'Reciting "Al-Mu\'min" brings safety from harm and protects from enemies. Those who recite it 631 times will be protected from the evil plots of others, InshaAllah.'],
            7  => ['benefits' => 'Reciting "Al-Muhaymin" after performing wudu with full concentration purifies both the outer and inner self. It strengthens one\'s iman and watchfulness over one\'s own actions.'],
            8  => ['benefits' => 'Reciting "Al-Aziz" 40 times after Fajr for 40 days grants independence from the need of others. It brings honor, strength, and self-sufficiency to the reciter.'],
            9  => ['benefits' => 'Reciting "Al-Jabbar" helps to restore what is broken — relationships, health, or fortunes. It is powerful for those who feel oppressed or helpless in difficult situations.'],
            10 => ['benefits' => 'Reciting "Al-Mutakabbir" before any important meeting or gathering grants dignity and respect. It protects against arrogance by reminding that true greatness belongs only to Allah.'],
            11 => ['benefits' => 'Reciting "Al-Khaliq" helps those seeking creativity and new beginnings. It is especially beneficial for expecting parents who seek a healthy and blessed child.'],
            12 => ['benefits' => 'Reciting "Al-Bari" helps in resolving complex problems and finding new paths. It aids in repentance and starting fresh after making mistakes.'],
            13 => ['benefits' => 'Reciting "Al-Musawwir" aids in conception and is recommended for couples seeking children. It also brings clarity of thought and helps in visualization of goals.'],
            14 => ['benefits' => 'Reciting "Al-Ghaffar" 100 times after Jumu\'ah prayer brings forgiveness of sins. It removes the burden of guilt and opens the door to divine mercy and new beginnings.'],
            15 => ['benefits' => 'Reciting "Al-Qahhar" 100 times helps overcome worldly attachments and removes love of dunya from the heart. It grants strength to defeat harmful desires and temptations.'],
            16 => ['benefits' => 'Reciting "Al-Wahhab" 40 times after obligatory prayer opens doors of provision and grants sustenance from unexpected sources. It is the name for those in financial hardship.'],
            17 => ['benefits' => 'Reciting "Ar-Razzaq" abundantly brings increase in rizq (sustenance) and removes financial worries. Recommended to recite before starting any business or seeking employment.'],
            18 => ['benefits' => 'Reciting "Al-Fattah" after Fajr with hands on chest opens the doors of success in all matters. It removes obstacles and brings victory in difficult situations.'],
            19 => ['benefits' => 'Reciting "Al-Aleem" brings increase in knowledge and understanding. Students and scholars benefit greatly from this name during studies and research.'],
            20 => ['benefits' => 'Reciting "Al-Qabid" protects wealth from being wasted and brings contentment. It helps in controlling expenses and managing resources wisely.'],
            21 => ['benefits' => 'Reciting "Al-Basit" before meals expands rizq and brings abundance. It removes tightness of the chest and brings joy and relief from anxiety.'],
            22 => ['benefits' => 'Reciting "Al-Khafid" helps in humbling oppressors and tyrants. It protects the reciter from arrogance and keeps them grounded in humility.'],
            23 => ['benefits' => 'Reciting "Ar-Rafi" raises one\'s status and rank in both this world and the hereafter. It is beneficial for those seeking promotions, recognition, or higher spiritual stations.'],
            24 => ['benefits' => 'Reciting "Al-Mu\'izz" 140 times after Maghrib on Monday and Thursday nights grants honor and respect from people. It raises one\'s dignity in the eyes of others.'],
            25 => ['benefits' => 'Reciting "Al-Mudhill" protects from the humiliation of enemies and oppressors. It should be recited with caution and only against those who are truly unjust.'],
            26 => ['benefits' => 'Reciting "As-Sami" 500 times on Thursday after Duha prayer ensures acceptance of du\'a. Allah hears all prayers — this name strengthens the bond between servant and Lord.'],
            27 => ['benefits' => 'Reciting "Al-Basir" 100 times after Jumu\'ah prayer strengthens inner sight and spiritual insight. It helps in seeing the truth clearly and making wise decisions.'],
            28 => ['benefits' => 'Reciting "Al-Hakam" on the night of 14th of every lunar month helps in resolving disputes and getting justice. It is especially powerful for those facing legal matters.'],
            29 => ['benefits' => 'Reciting "Al-Adl" on pieces of bread on the night before Friday brings harmony in the family and fairness in dealings. It attracts people\'s respect and obedience.'],
            30 => ['benefits' => 'Reciting "Al-Latif" 133 times brings relief from hardship and ease in difficult matters. Allah\'s gentleness and subtle help reach the reciter from unseen directions.'],
            31 => ['benefits' => 'Reciting "Al-Khabir" helps in gaining awareness and insight into hidden matters. It protects from deception and helps in making well-informed decisions.'],
            32 => ['benefits' => 'Reciting "Al-Halim" 88 times and blowing on items of concern protects them from harm. This name brings patience and forbearance in times of anger.'],
            33 => ['benefits' => 'Reciting "Al-Azim" frequently brings respect and honor in the hearts of people. It increases the reciter\'s greatness of character and spiritual magnitude.'],
            34 => ['benefits' => 'Reciting "Al-Ghafoor" brings complete forgiveness for past sins and protects from future ones. It is the most powerful name for those seeking sincere repentance (tawbah).'],
            35 => ['benefits' => 'Reciting "Ash-Shakoor" 41 times over water and washing the face cures sadness and depression. Allah\'s appreciation for even small deeds is reflected in the reciter\'s life.'],
            36 => ['benefits' => 'Reciting "Al-Aliyy" and keeping it written brings elevation in rank, knowledge, and spiritual station. It is the name of transcendence and supreme height.'],
            37 => ['benefits' => 'Reciting "Al-Kabir" 232 times for 7 days restores a lost position or job. The greatness of Allah reflected through this name humbles all worldly powers.'],
            38 => ['benefits' => 'Reciting "Al-Hafiz" 998 times protects from all dangers, enemies, and calamities. It creates a spiritual shield of divine protection around the reciter and their family.'],
            39 => ['benefits' => 'Reciting "Al-Muqit" over water and giving it to a child who does not eat well improves their appetite and health. It ensures sustenance and nourishment.'],
            40 => ['benefits' => 'Reciting "Al-Hasib" 70 times for 7 days starting from Thursday night protects from the evil of enemies, jealous people, and harmful plots against you.'],
            41 => ['benefits' => 'Reciting "Al-Jalil" and keeping it written brings majesty, awe, and respect in people\'s hearts. It is powerful for those in leadership positions who seek divine support.'],
            42 => ['benefits' => 'Reciting "Al-Karim" brings generosity from Allah and opens doors of barakah. It removes stinginess from the heart and attracts the generosity of others toward you.'],
            43 => ['benefits' => 'Reciting "Ar-Raqib" 7 times over oneself, family, and property places them under Allah\'s watchful protection. It brings mindfulness and consciousness of divine observation.'],
            44 => ['benefits' => 'Reciting "Al-Mujib" after wudu answers prayers and removes obstacles. Allah responds to the sincere caller — this name strengthens conviction that du\'a is always heard.'],
            45 => ['benefits' => 'Reciting "Al-Wasi" brings expansion of mind, heart, and provision. It removes narrowness of thinking and brings comprehensive understanding of matters.'],
            46 => ['benefits' => 'Reciting "Al-Hakim" brings wisdom in decision-making and helps choose the right path. It prevents hasty decisions and brings clarity of thought in complex situations.'],
            47 => ['benefits' => 'Reciting "Al-Wadud" 1000 times over food and having husband and wife both eat it resolves marital conflicts and strengthens the bond of love between spouses.'],
            48 => ['benefits' => 'Reciting "Al-Majid" brings glory and honor from Allah. It increases the light of iman in the heart and elevates the reciter\'s spiritual and worldly status.'],
            49 => ['benefits' => 'Reciting "Al-Ba\'ith" places hand on chest before sleeping grants spiritual awakening and beneficial knowledge. It gives hope in resurrection and life after death.'],
            50 => ['benefits' => 'Reciting "Ash-Shahid" 21 times with hand on the forehead of a disobedient person makes them obedient, InshaAllah. Allah witnesses all — this brings accountability awareness.'],
            51 => ['benefits' => 'Reciting "Al-Haqq" helps in finding truth in confusing matters and strengthens one\'s faith. It is powerful for scholars, judges, and those seeking justice.'],
            52 => ['benefits' => 'Reciting "Al-Wakil" 66 times brings complete trust in Allah\'s plan (tawakkul). It removes anxiety about the future and grants peace in uncertainty.'],
            53 => ['benefits' => 'Reciting "Al-Qawiyy" before meeting a powerful enemy or entering a difficult situation grants divine strength and courage. It overcomes weakness and fear.'],
            54 => ['benefits' => 'Reciting "Al-Matin" helps in overcoming persistent problems that seem impossible to solve. It brings steadfastness, firmness, and unshakeable determination.'],
            55 => ['benefits' => 'Reciting "Al-Waliyy" makes one close to Allah and under His special protection. It brings divine friendship, guidance, and support in all affairs.'],
            56 => ['benefits' => 'Reciting "Al-Hamid" brings a praiseworthy character and removes bad habits. It fills the heart with gratitude and makes the reciter beloved among people.'],
            57 => ['benefits' => 'Reciting "Al-Muhsi" brings organization and control over one\'s affairs. It helps in accounting for one\'s deeds and brings precision in all matters.'],
            58 => ['benefits' => 'Reciting "Al-Mubdi" at the beginning of any new venture or project brings success and divine support. It is the name for fresh starts and new beginnings.'],
            59 => ['benefits' => 'Reciting "Al-Mu\'id" helps in recovering lost things, returning to good habits, and restoring health. It brings renewal and restoration of what was lost.'],
            60 => ['benefits' => 'Reciting "Al-Muhyi" 7 times daily blowing on oneself gives spiritual life to the heart and cures spiritual diseases. It revives hope in the hopeless.'],
            61 => ['benefits' => 'Reciting "Al-Mumit" helps in conquering the nafs (ego) and removing attachment to this world. It is a reminder of the temporary nature of worldly life.'],
            62 => ['benefits' => 'Reciting "Al-Hayy" brings spiritual life and awakening. It cures lethargy of the heart and brings energy and vitality to worship and daily life.'],
            63 => ['benefits' => 'Reciting "Al-Qayyum" removes laziness and brings self-sufficiency. It grants the ability to manage affairs independently with Allah\'s support.'],
            64 => ['benefits' => 'Reciting "Al-Wajid" helps find lost things and brings abundance. It removes poverty of both wealth and spirit, filling life with richness.'],
            65 => ['benefits' => 'Reciting "Al-Majid" brings noble character and elevated status. It increases honor among people and attracts glorious outcomes in all endeavors.'],
            66 => ['benefits' => 'Reciting "Al-Wahid" 1000 times in seclusion removes fear and anxiety. It strengthens tawhid (monotheism) in the heart and brings singularity of focus.'],
            67 => ['benefits' => 'Reciting "Al-Ahad" strengthens the belief in the Oneness of Allah. It brings unity of purpose and protects from shirk in all its subtle forms.'],
            68 => ['benefits' => 'Reciting "As-Samad" 125 times brings independence from creation and dependence only on Allah. It fulfills all needs and removes want from the heart.'],
            69 => ['benefits' => 'Reciting "Al-Qadir" after 2 raka\'at nafl brings the ability to accomplish difficult tasks. It grants divine power and capability to the reciter.'],
            70 => ['benefits' => 'Reciting "Al-Muqtadir" brings ability and power to achieve goals. It strengthens determination and provides the means to accomplish what seems impossible.'],
            71 => ['benefits' => 'Reciting "Al-Muqaddim" removes obstacles from one\'s path and brings advancement in career, knowledge, and spiritual rank. It accelerates progress in all matters.'],
            72 => ['benefits' => 'Reciting "Al-Mu\'akhkhir" protects from hasty decisions and brings wisdom in timing. It helps in being patient and waiting for the right moment.'],
            73 => ['benefits' => 'Reciting "Al-Awwal" at the beginning of any task ensures its successful completion. It brings the blessing of a good start and divine initiation.'],
            74 => ['benefits' => 'Reciting "Al-Akhir" brings a good ending to all affairs and grants Husn al-Khatimah (a good death). It strengthens hope in the eternal hereafter.'],
            75 => ['benefits' => 'Reciting "Az-Zahir" brings clarity and makes hidden blessings apparent. It helps in understanding Allah\'s signs and recognizing His presence in all things.'],
            76 => ['benefits' => 'Reciting "Al-Batin" grants insight into hidden truths and inner knowledge. It purifies the inner self and brings awareness of one\'s own spiritual condition.'],
            77 => ['benefits' => 'Reciting "Al-Wali" brings divine governance and management of one\'s affairs. It grants leadership qualities and wisdom in administration and responsibility.'],
            78 => ['benefits' => 'Reciting "Al-Muta\'ali" elevates the reciter above worldly concerns and brings focus on the akhirah. It grants spiritual transcendence and detachment from material obsessions.'],
            79 => ['benefits' => 'Reciting "Al-Barr" fills the heart with righteousness and good conduct. It removes bad characteristics and brings excellence in moral behavior.'],
            80 => ['benefits' => 'Reciting "At-Tawwab" opens the door of sincere repentance. It is the most effective name for those who keep falling into sin and want Allah to accept their tawbah.'],
            81 => ['benefits' => 'Reciting "Al-Muntaqim" should be recited for justice against oppressors. Caution: this name should only be used against true injustice, not for personal grudges.'],
            82 => ['benefits' => 'Reciting "Al-Afuww" abundantly on the Night of Qadr brings complete pardon. The Prophet ﷺ taught Aisha (RA) the famous du\'a: "Allahumma innaka Afuwwun..."'],
            83 => ['benefits' => 'Reciting "Ar-Ra\'uf" brings Allah\'s gentle kindness and compassion. It softens the heart and brings tenderness in dealing with family, children, and all people.'],
            84 => ['benefits' => 'Reciting "Malik-ul-Mulk" grants authority and mastery over one\'s affairs. It is beneficial for those in positions of power who need wisdom to lead justly.'],
            85 => ['benefits' => 'Reciting "Dhul-Jalali-Wal-Ikram" brings honor and generosity from all directions. It is one of the most comprehensive names encompassing Allah\'s majesty and bounty.'],
            86 => ['benefits' => 'Reciting "Al-Muqsit" brings fairness and equity in all dealings. It helps in resolving disputes justly and removes bias and prejudice from the heart.'],
            87 => ['benefits' => 'Reciting "Al-Jami" on Fridays helps in reuniting separated family members and bringing scattered matters together. It brings unity and togetherness.'],
            88 => ['benefits' => 'Reciting "Al-Ghaniyy" 70 times daily brings freedom from dependence on creation. It fills the heart with spiritual richness and removes the feeling of need.'],
            89 => ['benefits' => 'Reciting "Al-Mughni" brings sufficiency and removes poverty. It grants enough wealth and provision to be content without excess or deficiency.'],
            90 => ['benefits' => 'Reciting "Al-Mani" protects from harm, evil eye, and destructive influences. It is a shield against all forms of danger and harmful situations.'],
            91 => ['benefits' => 'Reciting "Ad-Darr" should be recited with caution. It is a reminder that only Allah can cause harm, removing fear of creation and establishing trust in divine decree.'],
            92 => ['benefits' => 'Reciting "An-Nafi" before any beneficial endeavor ensures positive outcomes. It brings benefit in health, wealth, knowledge, and all aspects of life.'],
            93 => ['benefits' => 'Reciting "An-Nur" fills the heart and face with divine light (noor). It brings spiritual illumination, removes darkness of ignorance, and guides to the straight path.'],
            94 => ['benefits' => 'Reciting "Al-Hadi" when confused or lost in decisions brings clear divine guidance. It is the name for those seeking direction in life\'s important crossroads.'],
            95 => ['benefits' => 'Reciting "Al-Badi" brings innovation and creativity in finding solutions. It helps in seeing beauty in creation and appreciating Allah\'s unique artistry in everything.'],
            96 => ['benefits' => 'Reciting "Al-Baqi" removes fear of loss and death. It brings focus on eternal deeds and permanent values rather than temporary worldly pleasures.'],
            97 => ['benefits' => 'Reciting "Al-Warith" helps in matters of inheritance and legacy. It reminds us that everything returns to Allah and encourages building lasting good deeds.'],
            98 => ['benefits' => 'Reciting "Ar-Rashid" brings wisdom and maturity in decision-making. It guides to the right path and protects from being led astray by desires or bad advice.'],
            99 => ['benefits' => 'Reciting "As-Sabur" grants patience in trials, tests, and hardships. It is the ultimate name for those facing prolonged difficulties who need divine endurance.'],
        ];
    }
}
