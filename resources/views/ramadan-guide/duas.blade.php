@extends('layouts.app')

@section('title', 'Ramadan Duas — Sehri, Iftar & Laylatul Qadr Supplications | IslamicWeb')
@section('meta_description', 'Complete collection of Ramadan duas in Arabic with Urdu and English translation. Includes Sehri dua, Iftar dua, Laylatul Qadr dua and Taraweeh duas.')

@section('content')

<div class="container">
  <nav class="breadcrumb">
    <a href="/">Home</a> &rsaquo;
    <a href="/ramadan-guide">Ramadan Guide</a> &rsaquo;
    <span>Ramadan Duas</span>
  </nav>
</div>

<section class="page-hero">
  <div class="container">
    <div class="bismillah">﷽</div>
    <h1>Ramadan Duas | رمضان کی دعائیں</h1>
    <p>Essential supplications for Sehri, Iftar, Laylatul Qadr and more</p>
  </div>
</section>

<div class="container section-gap">

  @php
  $duas = [
    [
      'title'           => 'Dua for Sehri (Niyyah of Fasting)',
      'arabic'          => 'نَوَيْتُ صَوْمَ غَدٍ عَنْ أَدَاءِ فَرْضِ شَهْرِ رَمَضَانَ هَذِهِ السَّنَةِ لِلّٰهِ تَعَالٰى',
      'transliteration' => 'Nawaitu sauma ghadin an ada\'i fardi shahri Ramadana hazihis sanati lillahi ta\'ala.',
      'urdu'            => 'میں نے اللہ تعالیٰ کے لیے اس سال کے رمضان کا کل کا فرض روزہ رکھنے کی نیت کی۔',
      'english'         => 'I intend to keep the fast of Ramadan tomorrow as a duty toward Allah, the Exalted.',
      'icon'            => '🌙',
    ],
    [
      'title'           => 'Dua for Iftar (Breaking the Fast)',
      'arabic'          => 'اللَّهُمَّ اِنِّي لَكَ صُمْتُ وَبِكَ آمَنْتُ وَعَلَيْكَ تَوَكَّلْتُ وَعَلٰى رِزْقِكَ أَفْطَرْتُ',
      'transliteration' => 'Allahumma inni laka sumtu wa bika amantu wa \'alayka tawakkaltu wa \'ala rizqika aftartu.',
      'urdu'            => 'اے اللہ! میں نے تیرے لیے روزہ رکھا، تجھ پر ایمان لایا، تجھ پر بھروسہ کیا، اور تیرے رزق سے افطار کیا۔',
      'english'         => 'O Allah, I fasted for You, I believe in You, I put my trust in You, and I break my fast with Your sustenance.',
      'icon'            => '🌅',
    ],
    [
      'title'           => 'Dua for Laylatul Qadr (Night of Power)',
      'arabic'          => 'اللَّهُمَّ إِنَّكَ عَفُوٌّ تُحِبُّ الْعَفْوَ فَاعْفُ عَنِّي',
      'transliteration' => 'Allahumma innaka \'afuwwun tuhibbul \'afwa fa\'fu \'anni.',
      'urdu'            => 'اے اللہ! بے شک تو معاف کرنے والا ہے، معافی کو پسند کرتا ہے، پس مجھے معاف فرما دے۔',
      'english'         => 'O Allah, indeed You are Pardoning, You love pardon, so pardon me.',
      'icon'            => '⭐',
      'source'          => 'Tirmidhi — Taught by Prophet ﷺ to Aisha (RA)',
    ],
    [
      'title'           => 'Dua upon Seeing the Ramadan Moon',
      'arabic'          => 'اللَّهُ أَكْبَرُ ، اللَّهُمَّ أَهِلَّهُ عَلَيْنَا بِالأَمْنِ وَالإِيمَانِ وَالسَّلامَةِ وَالإِسْلامِ',
      'transliteration' => 'Allahu Akbar. Allahumma ahillahu \'alayna bil-amni wal-imani was-salamati wal-islam.',
      'urdu'            => 'اللہ سب سے بڑا ہے۔ اے اللہ! یہ چاند ہم پر امن، ایمان، سلامتی اور اسلام کے ساتھ طلوع فرما۔',
      'english'         => 'Allah is the Greatest. O Allah, let this moon appear with peace, faith, safety, and Islam.',
      'icon'            => '🌙',
    ],
    [
      'title'           => 'Dua after completing Ramadan (Eid Night)',
      'arabic'          => 'اللَّهُمَّ لَا تَجْعَلْهُ آخِرَ الْعَهْدِ مِنَّا لِشَهْرِ رَمَضَانَ',
      'transliteration' => 'Allahumma la taj\'alhu akhiral-\'ahdi minna li-shahri Ramadan.',
      'urdu'            => 'اے اللہ! اس رمضان کو ہمارا آخری رمضان نہ بنا۔',
      'english'         => 'O Allah, do not make this Ramadan the last one we witness.',
      'icon'            => '🤲',
    ],
    [
      'title'           => 'Dua at the time of Iftar (short version)',
      'arabic'          => 'ذَهَبَ الظَّمَأُ وَابْتَلَّتِ الْعُرُوقُ وَثَبَتَ الأَجْرُ إِن شَاءَ اللهُ',
      'transliteration' => 'Dhahaba al-zama\'u wabtallatil-\'uruqu wa thabata al-ajru in sha\'a Allah.',
      'urdu'            => 'پیاس بجھ گئی، رگیں تر ہو گئیں، اور انشاء اللہ ثواب ثابت ہو گیا۔',
      'english'         => 'The thirst has gone, the veins are moistened, and the reward is confirmed, if Allah wills.',
      'icon'            => '💧',
      'source'          => 'Abu Dawood',
    ],
  ];
  @endphp

  {{-- Dua Cards --}}
  <div class="duas-grid">
    @foreach($duas as $i => $dua)
    <div class="dua-card">
      <div class="dua-card-header">
        <span class="dua-icon">{{ $dua['icon'] }}</span>
        <h2>{{ $dua['title'] }}</h2>
      </div>

      <div class="dua-arabic">{{ $dua['arabic'] }}</div>

      <div class="dua-transliteration">
        <em>{{ $dua['transliteration'] }}</em>
      </div>

      <div class="dua-translations">
        <div class="dua-urdu">
          <span class="lang-label">اردو:</span>
          <span class="urdu-text">{{ $dua['urdu'] }}</span>
        </div>
        <div class="dua-english">
          <span class="lang-label">English:</span>
          {{ $dua['english'] }}
        </div>
      </div>

      @if(!empty($dua['source']))
      <div class="dua-source">📚 Source: {{ $dua['source'] }}</div>
      @endif

      <div class="dua-actions">
        <button onclick="copyDua({{ $i }})">📋 Copy</button>
        <button onclick="shareDua({{ $i }})">📤 Share</button>
      </div>
    </div>
    @endforeach
  </div>

</div>

@push('scripts')
<script>
const duaTexts = @json(array_column($duas, 'arabic'));
const duaTitles = @json(array_column($duas, 'title'));
function copyDua(i) {
  navigator.clipboard.writeText(duaTexts[i]);
  alert('Dua copied!');
}
function shareDua(i) {
  if (navigator.share) {
    navigator.share({ title: duaTitles[i], text: duaTexts[i], url: window.location.href });
  }
}
</script>
@endpush

@endsection
