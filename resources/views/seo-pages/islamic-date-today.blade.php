@extends('layouts.app')

@section('title', $seo['title'])
@section('meta_description', $seo['description'])
@section('canonical', $seo['canonical'])

@section('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "FAQPage",
  "mainEntity": [{
    "@@type": "Question",
    "name": "What is the Islamic date today?",
    "acceptedAnswer": {
      "@@type": "Answer",
      "text": "The Islamic date today is {{ $hijri['day'] }} {{ $hijri['month_name'] }} {{ $hijri['year'] }} AH."
    }
  }, {
    "@@type": "Question",
    "name": "What is the current Hijri year?",
    "acceptedAnswer": {
      "@@type": "Answer",
      "text": "The current Hijri year is {{ $hijri['year'] }} AH."
    }
  }]
}
</script>
@endsection

@section('content')
<div class="page-header text-center" style="padding: 60px 20px; background: var(--bg-tinted); border-bottom: 1px solid var(--border-light);">
    <div style="max-width: 800px; margin: 0 auto;">
        <h1 style="font-size: 2.8rem; color: var(--navy); margin-bottom: 15px;">Islamic Date Today</h1>
        <p style="font-size: 1.1rem; color: var(--text-medium); line-height: 1.6;">Accurate Hijri date for today corresponding to <strong>{{ $date->format('d F Y') }}</strong> in the Gregorian calendar.</p>
    </div>
</div>

<div class="container" style="max-width: 1000px; margin: 50px auto; padding: 0 20px;">
    
    <div style="background: white; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); padding: 50px; margin-bottom: 40px; text-align: center;">
        <h2 style="color: var(--navy); margin-bottom: 25px;">Today's Islamic Date</h2>
        
        <div style="display: inline-block; padding: 30px; background: var(--gold-tint); border: 2px solid var(--gold); border-radius: 12px;">
            <div style="font-size: 3rem; font-weight: bold; color: var(--navy); line-height: 1.2;">
                {{ $hijri['day'] }} {{ $hijri['month_name'] }} {{ $hijri['year'] }} AH
            </div>
            <div class="arabic" style="font-size: 2.2rem; color: var(--gold-dark); margin-top: 15px;">
                {{ $hijri['day'] }} {{ $hijri['month_urdu'] }} {{ $hijri['year'] }} ھ
            </div>
        </div>
        
        <p style="color: var(--text-medium); margin-top: 25px;">The Islamic calendar (Hijri calendar) is lunar, meaning each month begins with the sighting of the new moon. The date above is calculated based on the standard global lunar cycle (Umm al-Qura calendar/Standard calculation).</p>
    </div>

    <div style="line-height: 1.8; color: var(--text-dark); margin-bottom: 50px; display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
        <div style="background: var(--bg-tinted); padding: 30px; border-radius: 8px;">
            <h3 style="color: var(--navy); margin-bottom: 15px;">Current Islamic Month</h3>
            <p>We are currently in the month of <strong>{{ $hijri['month_name'] }}</strong>, the {{ $hijri['month'] }}th month of the Islamic calendar.</p>
            <p style="margin-top: 15px;">
                <a href="{{ url('/islamic-month/' . Str::slug($hijri['month_name'])) }}" style="color: var(--navy-light); text-decoration: underline; font-weight: bold;">Learn more about {{ $hijri['month_name'] }}</a>
            </p>
        </div>
        
        <div style="background: var(--bg-tinted); padding: 30px; border-radius: 8px;">
            <h3 style="color: var(--navy); margin-bottom: 15px;">Date Conversion</h3>
            <p>Do you need to convert a specific past or future date between the Gregorian and Hijri calendars?</p>
            <div style="margin-top: 20px;">
                <a href="{{ route('converter.show') }}" style="display: inline-block; padding: 10px 20px; background: var(--navy); color: white; border-radius: 5px; text-decoration: none; font-weight: bold;">Gregorian to Hijri Converter</a>
            </div>
        </div>
    </div>

    <div style="text-align: center; margin-bottom: 30px;">
        <a href="{{ route('islamic-calendar') }}" style="display: inline-block; padding: 12px 25px; border: 2px solid var(--navy); color: var(--navy); border-radius: 5px; text-decoration: none; font-weight: bold;">View Full Islamic Calendar {{ $hijri['year'] }}</a>
    </div>

</div>
@endsection
