@if ($paginator->hasPages())
    <nav style="display: flex; justify-content: center; align-items: center; gap: 8px; font-family: 'Amiri', serif; margin-top: 40px; margin-bottom: 20px;">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span style="padding: 10px 16px; border-radius: 8px; background: #f3f4f6; color: #9ca3af; cursor: not-allowed; border: 1px solid #e5e7eb; display: flex; align-items: center; justify-content: center;">
                <i class="fas fa-chevron-left"></i>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" style="padding: 10px 16px; border-radius: 8px; background: #fff; border: 1px solid #1a6b42; color: #1a6b42; text-decoration: none; transition: all 0.2s; display: flex; align-items: center; justify-content: center;" onmouseover="this.style.background='#1a6b42'; this.style.color='#fff';" onmouseout="this.style.background='#fff'; this.style.color='#1a6b42';">
                <i class="fas fa-chevron-left"></i>
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span style="padding: 10px 16px; color: #6b7280; font-weight: bold; font-size: 1.1rem;">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span style="padding: 10px 18px; border-radius: 8px; background: #1a6b42; color: #fff; font-weight: bold; font-size: 1.1rem; box-shadow: 0 2px 4px rgba(26,107,66,0.2);">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}" style="padding: 10px 18px; border-radius: 8px; background: #fff; border: 1px solid #e5e7eb; color: #374151; text-decoration: none; transition: all 0.2s; font-size: 1.1rem; font-weight: 500;" onmouseover="this.style.borderColor='#1a6b42'; this.style.color='#1a6b42';" onmouseout="this.style.borderColor='#e5e7eb'; this.style.color='#374151';">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" style="padding: 10px 16px; border-radius: 8px; background: #fff; border: 1px solid #1a6b42; color: #1a6b42; text-decoration: none; transition: all 0.2s; display: flex; align-items: center; justify-content: center;" onmouseover="this.style.background='#1a6b42'; this.style.color='#fff';" onmouseout="this.style.background='#fff'; this.style.color='#1a6b42';">
                <i class="fas fa-chevron-right"></i>
            </a>
        @else
            <span style="padding: 10px 16px; border-radius: 8px; background: #f3f4f6; color: #9ca3af; cursor: not-allowed; border: 1px solid #e5e7eb; display: flex; align-items: center; justify-content: center;">
                <i class="fas fa-chevron-right"></i>
            </span>
        @endif
    </nav>
@endif
