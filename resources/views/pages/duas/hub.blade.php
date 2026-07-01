@extends('layouts.app')

@section('title', 'Daily Duas & Azkar')

@section('content')
<style>
    .category-pills {
        display: flex;
        gap: 10px;
        overflow-x: auto;
        padding-bottom: 10px;
        margin-bottom: 25px;
        scrollbar-width: none; /* Hide scrollbar for cleaner look */
    }
    .category-pills::-webkit-scrollbar {
        display: none;
    }
    .cat-pill {
        white-space: nowrap;
        padding: 8px 16px;
        border-radius: 8px;
        background: transparent;
        color: #666;
        font-weight: 500;
        font-size: 0.95rem;
        text-decoration: none;
        border: 1px solid #e0e0e0;
        transition: all 0.2s;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .cat-pill:hover {
        background: #f8f9fa;
        border-color: #ccc;
        color: var(--primary-dark);
    }
    .cat-pill.active {
        background: rgba(var(--primary-rgb), 0.05);
        color: var(--primary);
        border-color: var(--primary);
        font-weight: 600;
    }
    .dua-loader {
        display: none;
        text-align: center;
        padding: 40px;
        color: var(--gold);
        font-size: 2rem;
    }
</style>

<section class="section services-section" style="padding-top: 60px;">
    <div class="section-inner">
        <div class="section-header">
            <div class="section-badge"><i class="fas fa-praying-hands"></i> Hisnul Muslim</div>
            <h1 class="section-title">Daily <span>Duas & Azkar</span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Authentic supplications from the Quran and Sunnah. Filter by category or search below.</p>
            
            <div style="max-width: 600px; margin: 30px auto 0; position: relative;">
                <input type="text" id="dua-search" placeholder="Search duas by title, arabic, or translation..." 
                       style="width: 100%; padding: 15px 25px 15px 50px; border-radius: 50px; border: 1px solid #ddd; font-size: 1rem; outline: none; box-shadow: 0 5px 15px rgba(0,0,0,0.03);">
                <i class="fas fa-search" style="position: absolute; left: 20px; top: 50%; transform: translateY(-50%); color: #aaa; font-size: 1.1rem;"></i>
            </div>
        </div>

        <!-- CATEGORY NAVIGATION -->
        <div class="category-pills">
            @foreach($categories as $cat)
                <a href="{{ route('duas.category', $cat->slug) }}" 
                   class="cat-pill {{ ($activeCategory && $activeCategory->id === $cat->id) ? 'active' : '' }}"
                   data-slug="{{ $cat->slug }}">
                    <i class="fas {{ $cat->icon_class ?? 'fa-book-open' }}"></i> {{ $cat->name_english }}
                </a>
            @endforeach
        </div>

        <!-- AJAX CONTAINER -->
        <div id="dua-loader" class="dua-loader">
            <i class="fas fa-circle-notch fa-spin"></i>
        </div>
        
        <div id="dua-container">
            @if($activeCategory)
                @include('pages.duas.partials.dua_list', ['activeCategory' => $activeCategory])
            @endif
        </div>

    </div>
</section>

<!-- JSON-LD SCHEMAS -->
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@graph": [
    {
      "@type": "WebPage",
      "@id": "{{ url()->current() }}",
      "url": "{{ url()->current() }}",
      "name": "Daily Duas & Azkar",
      "description": "Authentic daily duas and azkar from Hisnul Muslim."
    }
  ]
}
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const pills = document.querySelectorAll('.cat-pill');
    const container = document.getElementById('dua-container');
    const loader = document.getElementById('dua-loader');
    const searchInput = document.getElementById('dua-search');
    let searchTimeout;
    
    // Function to fetch data
    const fetchDuas = (url, query = '') => {
        container.style.display = 'none';
        loader.style.display = 'block';

        const fetchUrl = query ? `${url}?search=${encodeURIComponent(query)}` : url;

        fetch(fetchUrl, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(res => res.text())
        .then(html => {
            container.innerHTML = html;
            loader.style.display = 'none';
            container.style.display = 'block';
        })
        .catch(err => {
            console.error(err);
            loader.style.display = 'none';
            container.style.display = 'block';
        });
    };

    // Category click
    pills.forEach(pill => {
        pill.addEventListener('click', function(e) {
            e.preventDefault();
            const url = this.getAttribute('href');
            
            pills.forEach(p => p.classList.remove('active'));
            this.classList.add('active');

            window.history.pushState({}, '', url);
            
            // Clear search when switching categories
            searchInput.value = '';
            fetchDuas(url);
        });
    });

    // Search input
    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        const query = this.value.trim();
        
        searchTimeout = setTimeout(() => {
            // Get active category URL, or default to current URL
            let activePill = document.querySelector('.cat-pill.active');
            let url = activePill ? activePill.getAttribute('href') : window.location.href.split('?')[0];
            
            fetchDuas(url, query);
        }, 300); // 300ms debounce
    });
});
</script>
@endsection
