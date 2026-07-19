@extends('layouts.app')

@section('title', $seo['title'])
@section('meta_description', $seo['description'])
@section('canonical', $seo['canonical'])

@section('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "WebApplication",
  "name": "Zakat Calculator Online",
  "description": "{{ $seo['description'] }}",
  "url": "{{ $seo['canonical'] }}",
  "applicationCategory": "FinanceApplication",
  "operatingSystem": "All"
}
</script>
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "FAQPage",
  "mainEntity": [{
    "@@type": "Question",
    "name": "How to calculate Zakat online?",
    "acceptedAnswer": {
      "@@type": "Answer",
      "text": "You can calculate your Zakat online by entering the value of your assets (gold, silver, cash, business inventory) and subtracting your liabilities. If the net amount exceeds the Nisab threshold, you must pay 2.5% of the total amount."
    }
  }, {
    "@@type": "Question",
    "name": "What is the Nisab for Zakat?",
    "acceptedAnswer": {
      "@@type": "Answer",
      "text": "The Nisab is the minimum threshold of wealth a Muslim must possess for a lunar year to be obligated to pay Zakat. It is equivalent to 87.48 grams of gold or 612.36 grams of silver."
    }
  }]
}
</script>
@endsection

@section('content')
<div class="page-header text-center" style="padding: 60px 20px; background: var(--bg-tinted); border-bottom: 1px solid var(--border-light);">
    <div style="max-width: 800px; margin: 0 auto;">
        <h1 style="font-size: 2.8rem; color: var(--navy); margin-bottom: 15px;">Zakat Calculator Online</h1>
        <p style="font-size: 1.1rem; color: var(--text-medium); line-height: 1.6;">Calculate your exact Zakat obligation quickly and accurately. Find out if you meet the Nisab and compute the 2.5% on your wealth.</p>
    </div>
</div>

<div class="container" style="max-width: 1000px; margin: 50px auto; padding: 0 20px;">
    
    <div style="background: white; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); padding: 50px; margin-bottom: 40px; text-align: center;">
        <div style="margin-bottom: 30px;">
            <i class="fas fa-coins" style="font-size: 5rem; color: var(--gold);"></i>
        </div>
        <h2 style="color: var(--navy); margin-bottom: 15px;">Calculate Your Zakat Now</h2>
        <p style="color: var(--text-medium); max-width: 600px; margin: 0 auto 30px; line-height: 1.8;">Our comprehensive online Zakat Calculator allows you to add all your assets (gold, silver, cash, savings, investments) and deduct your debts to find out your exact Zakat liability.</p>
        
        <a href="{{ route('zakat.index') }}" style="display: inline-block; padding: 15px 35px; background: linear-gradient(145deg, var(--navy), var(--navy-mid)); color: white; border-radius: 30px; text-decoration: none; font-weight: bold; font-size: 1.1rem; box-shadow: 0 4px 15px rgba(10,31,63,0.2);">
            <i class="fas fa-calculator"></i> Open Zakat Calculator
        </a>
    </div>

    <div style="line-height: 1.8; color: var(--text-dark); margin-bottom: 50px;">
        <h2 style="color: var(--navy); margin-bottom: 20px;">What is Zakat?</h2>
        <p style="margin-bottom: 15px;">Zakat is the third pillar of Islam. It is a mandatory charitable contribution, often considered to be a tax, levied on the wealth that exceeds the Nisab limit, owned by a Muslim for one lunar year. It is generally calculated at a rate of 2.5% on accumulated wealth.</p>
        
        <h3 style="color: var(--navy); margin-top: 30px; margin-bottom: 15px;">Understanding Nisab</h3>
        <p style="margin-bottom: 15px;">Nisab is the minimum threshold of wealth a person must own for a full lunar year before Zakat becomes obligatory. The Nisab was set by Prophet Muhammad (ﷺ) at a rate equivalent to:</p>
        <ul style="list-style-type: disc; padding-left: 20px; color: var(--text-medium); margin-bottom: 20px;">
            <li style="margin-bottom: 10px;">87.48 grams (7.5 tolas) of gold</li>
            <li style="margin-bottom: 10px;">612.36 grams (52.5 tolas) of silver</li>
        </ul>
        <p>In modern times, it's safer and more beneficial to the poor to calculate the Nisab using the silver standard, meaning if your total net assets equal or exceed the current market value of 612.36 grams of silver, you must pay Zakat.</p>

        <h3 style="color: var(--navy); margin-top: 30px; margin-bottom: 15px;">Who is eligible to receive Zakat?</h3>
        <p style="margin-bottom: 15px;">The Quran explicitly mentions eight categories of people who can receive Zakat (Surah At-Tawbah 9:60):</p>
        <ol style="list-style-type: decimal; padding-left: 20px; color: var(--text-medium);">
            <li><strong>Al-Fuqara</strong> (The poor)</li>
            <li><strong>Al-Masakin</strong> (The needy)</li>
            <li><strong>Al-Amilina 'Alayha</strong> (Administrators of Zakat)</li>
            <li><strong>Al-Mu'allafati Qulubuhum</strong> (To reconcile hearts / new Muslims)</li>
            <li><strong>Fir-Riqab</strong> (To free those in bondage)</li>
            <li><strong>Al-Gharimin</strong> (Those in debt)</li>
            <li><strong>Fi Sabilillah</strong> (In the cause of Allah)</li>
            <li><strong>Ibn As-Sabil</strong> (The wayfarer/traveler)</li>
        </ol>
    </div>

</div>
@endsection
