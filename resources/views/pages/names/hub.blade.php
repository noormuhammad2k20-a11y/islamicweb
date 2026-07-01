@extends('layouts.app')

@section('title', 'Islamic Names Directory')

@section('content')
<style>
    .search-card {
        background: linear-gradient(135deg, #ffffff, #fdfdfd);
        border-radius: 20px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.05);
        border: 1px solid rgba(0, 0, 0, 0.04);
        padding: 40px;
        position: relative;
        overflow: hidden;
    }
    .search-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; width: 4px; height: 100%;
        background: linear-gradient(180deg, var(--primary), var(--gold));
    }
    .search-input {
        flex: 1;
        padding: 16px 20px;
        border: 2px solid #eee;
        border-radius: 12px;
        font-size: 1.1rem;
        transition: all 0.3s;
        background: #fafafa;
        min-width: 250px;
    }
    .search-input:focus {
        border-color: var(--primary);
        outline: none;
        background: #fff;
        box-shadow: 0 0 0 4px rgba(var(--primary-rgb), 0.1);
    }
    .gender-select {
        padding: 16px 20px;
        border: 2px solid #eee;
        border-radius: 12px;
        font-size: 1.1rem;
        background: #fafafa;
        min-width: 160px;
        transition: border-color 0.3s;
        appearance: none;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23333' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 15px center;
        background-size: 16px;
    }
    .gender-select:focus {
        border-color: var(--primary);
        outline: none;
    }
    .btn-search {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        padding: 16px 35px;
        border-radius: 12px;
        border: none;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        box-shadow: 0 8px 20px rgba(5,67,62,0.2);
    }
    .btn-search:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 25px rgba(5,67,62,0.3);
    }
    .name-card {
        background: #ffffff;
        padding: 30px;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.03);
        text-decoration: none;
        border: 1px solid rgba(0,0,0,0.04);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        position: relative;
        overflow: hidden;
    }
    .name-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.08);
        border-color: rgba(var(--primary-rgb), 0.2);
    }
    .name-card::after {
        content: '';
        position: absolute;
        bottom: 0; left: 0; right: 0; height: 3px;
        background: linear-gradient(90deg, transparent, rgba(var(--gold-rgb), 0.5), transparent);
        opacity: 0;
        transition: opacity 0.3s;
    }
    .name-card:hover::after {
        opacity: 1;
    }
    .name-en {
        color: var(--primary-dark);
        margin: 0;
        font-size: 1.5rem;
        font-weight: 700;
        letter-spacing: -0.5px;
    }
    .name-ar {
        font-family: 'Amiri', serif;
        font-size: 2.2rem;
        color: var(--gold);
        font-weight: bold;
        line-height: 1;
    }
    .name-meaning {
        color: #666;
        margin: 15px 0;
        font-size: 1rem;
        line-height: 1.5;
    }
    .tag {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 5px 12px;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 500;
    }
    .tag-gender.male { background: rgba(52, 152, 219, 0.1); color: #2980b9; }
    .tag-gender.female { background: rgba(233, 30, 99, 0.1); color: #c2185b; }
    .tag-origin { background: rgba(var(--gold-rgb), 0.1); color: #b89730; }
</style>

<section class="section services-section" style="padding-top: 60px;">
    <div class="section-inner">
        <div class="section-header">
            <div class="section-badge"><i class="fas fa-book-open"></i> Dictionary</div>
            <h1 class="section-title">Islamic <span>Names</span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Discover beautiful and meaningful names from Islamic history with their Arabic text, origin, and translations.</p>
        </div>

        <div class="contact-grid" style="grid-template-columns: 1fr; margin-bottom: 50px;">
            <!-- INPUT CARD: Search & Filters -->
            <div class="search-card">
                <h3 style="color: var(--primary-dark); margin-bottom: 25px; font-size: 1.4rem;">
                    <i class="fas fa-search" style="color: var(--gold); margin-right: 8px;"></i> Find the Perfect Name
                </h3>
                <form action="{{ route('names.index') }}" method="GET" style="display: flex; gap: 15px; flex-wrap: wrap;">
                    <input type="text" name="search" class="search-input" placeholder="Search by English or Urdu meaning..." value="{{ request('search') }}">
                    <select name="gender" class="gender-select">
                        <option value="">Any Gender</option>
                        <option value="male" {{ (isset($gender) && $gender == 'male') || request('gender') == 'male' ? 'selected' : '' }}>Boys</option>
                        <option value="female" {{ (isset($gender) && $gender == 'female') || request('gender') == 'female' ? 'selected' : '' }}>Girls</option>
                    </select>
                    <button type="submit" class="btn-search"><i class="fas fa-filter"></i> Search</button>
                </form>
                
                <div style="display: flex; gap: 15px; flex-wrap: wrap; margin-top: 25px;">
                    <a href="{{ route('names.gender', 'boys') }}" style="padding: 10px 20px; background: rgba(52, 152, 219, 0.05); color: #2980b9; border-radius: 50px; text-decoration: none; font-size: 0.95rem; font-weight: 500; border: 1px solid rgba(52, 152, 219, 0.2); transition: all 0.2s;"><i class="fas fa-male"></i> Popular Boys Names</a>
                    <a href="{{ route('names.gender', 'girls') }}" style="padding: 10px 20px; background: rgba(233, 30, 99, 0.05); color: #c2185b; border-radius: 50px; text-decoration: none; font-size: 0.95rem; font-weight: 500; border: 1px solid rgba(233, 30, 99, 0.2); transition: all 0.2s;"><i class="fas fa-female"></i> Popular Girls Names</a>
                </div>
            </div>
        </div>

        <!-- OUTPUT CARD: Results -->
        <div>
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
                <h3 style="color: var(--primary-dark); margin: 0; font-size: 1.6rem;">
                    <i class="fas fa-list" style="color: var(--primary); margin-right: 10px;"></i> 
                    {{ isset($gender) ? ucfirst($gender) . ' Names' : (request('search') ? 'Search Results' : 'Trending Names') }}
                </h3>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 25px;">
                @php $collection = isset($names) ? $names : $popularNames; @endphp
                
                @forelse($collection as $name)
                <a href="{{ route('names.show', $name->slug) }}" class="name-card">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                        <h4 class="name-en">{{ $name->name_english }}</h4>
                        <span class="name-ar" dir="rtl">{{ $name->name_arabic }}</span>
                    </div>
                    <p class="name-meaning">Meaning: <strong>{{ $name->translation_urdu }}</strong></p>
                    <div style="display: flex; gap: 10px;">
                        <span class="tag tag-gender {{ $name->gender }}">
                            <i class="fas {{ $name->gender == 'male' ? 'fa-male' : 'fa-female' }}"></i> {{ ucfirst($name->gender) }}
                        </span>
                        @if($name->origin)
                            <span class="tag tag-origin"><i class="fas fa-globe"></i> {{ ucfirst($name->origin) }}</span>
                        @endif
                    </div>
                </a>
                @empty
                <div style="grid-column: 1 / -1; text-align: center; padding: 60px; background: white; border-radius: 20px; border: 1px dashed #ddd;">
                    <i class="fas fa-search" style="font-size: 3rem; margin-bottom: 20px; color: #ccc;"></i>
                    <h4 style="color: #777; font-size: 1.2rem;">No names found matching your criteria.</h4>
                    <p style="color: #999;">Try adjusting your search filters.</p>
                </div>
                @endforelse
            </div>

            @if(isset($names) && method_exists($names, 'links'))
                <div style="margin-top: 50px;">
                    {{ $names->links() }}
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
