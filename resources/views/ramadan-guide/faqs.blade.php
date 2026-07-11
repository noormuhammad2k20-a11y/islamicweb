@extends('layouts.app')

@section('title', 'Ramadan FAQs — Common Questions & Rulings | IslamicWeb')
@section('meta_description', 'Frequently asked questions about Ramadan. What breaks the fast? Can I brush my teeth? Answers based on authentic Islamic jurisprudence.')

@section('content')

<div class="container">
  <nav class="breadcrumb">
    <a href="/">Home</a> &rsaquo;
    <a href="/ramadan-guide">Ramadan Guide</a> &rsaquo;
    <span>Ramadan FAQs</span>
  </nav>
</div>

<section class="page-hero">
  <div class="container">
    <h1>Ramadan FAQs</h1>
    <p>Common questions, misconceptions, and rulings regarding Sawm (Fasting)</p>
  </div>
</section>

<div class="container section-gap">
  <div class="content-article">
    <p class="lead-text">During Ramadan, many questions arise regarding what is permissible while fasting.
    Below are answers to the most frequently asked questions based on the consensus of major Islamic scholars.</p>

    <div class="faq-list">
      <details class="faq-item" open>
        <summary>Does brushing teeth or using toothpaste break the fast?</summary>
        <div class="faq-answer">
          <p>Using a Miswak or dry toothbrush is perfectly fine and sunnah. However, using toothpaste
          is disliked (makrooh) while fasting because of the strong taste and the risk of swallowing it.
          If any toothpaste or flavored water goes down the throat, the fast is broken. It is best to
          brush with toothpaste before Fajr begins or after Maghrib.</p>
        </div>
      </details>

      <details class="faq-item">
        <summary>What happens if I eat or drink by mistake?</summary>
        <div class="faq-answer">
          <p>If you genuinely forget that you are fasting and eat or drink, your fast is <strong>not</strong>
          broken. The Prophet ﷺ said: <em>"Whoever forgets he is fasting and eats or drinks, let him
          complete his fast, for it is Allah Who has fed him and given him drink."</em> (Bukhari).
          However, the moment you remember, you must stop immediately and spit out whatever is in your mouth.</p>
        </div>
      </details>

      <details class="faq-item">
        <summary>Do injections or blood tests break the fast?</summary>
        <div class="faq-answer">
          <p>Medical injections (intramuscular, intravenous, or subcutaneous) that are not for
          nutritional purposes (like vitamins or IV drips) do not break the fast. Taking a blood
          test also does not break the fast. However, nutritional IV drips do break the fast.</p>
        </div>
      </details>

      <details class="faq-item">
        <summary>Does vomiting break the fast?</summary>
        <div class="faq-answer">
          <p>Unintentional vomiting does not break the fast. However, if a person intentionally
          makes themselves vomit, the fast is broken and a makeup (qada) fast is required.</p>
        </div>
      </details>

      <details class="faq-item">
        <summary>Can I swallow my own saliva?</summary>
        <div class="faq-answer">
          <p>Yes, swallowing your own natural saliva is unavoidable and does not break the fast.
          However, swallowing mucus from the nose that enters the throat, or deliberately gathering
          saliva in the mouth to swallow it, should be avoided.</p>
        </div>
      </details>

      <details class="faq-item">
        <summary>Does using eye drops or ear drops break the fast?</summary>
        <div class="faq-answer">
          <p>According to the Hanafi school of thought, putting drops in the eye does not break
          the fast. However, putting drops in the ear may break the fast if there is a clear passage
          to the throat. Modern scholars often permit ear drops if the eardrum is intact, but
          caution is advised.</p>
        </div>
      </details>

      <details class="faq-item">
        <summary>Can women take pills to delay menstruation during Ramadan?</summary>
        <div class="faq-answer">
          <p>While medically permissible and the fasts will be valid, many scholars advise against
          this as menstruation is a natural process decreed by Allah. Women receive reward for
          obeying Allah by not fasting during their period, and they simply make up (qada) the
          fasts later.</p>
        </div>
      </details>
    </div>

    <div class="info-note" style="margin-top: 3rem;">
      <strong>Note:</strong> These answers provide general guidance. If you have a specific or
      complex medical condition, please consult a qualified local Mufti or scholar.
    </div>
  </div>
</div>

@endsection
