@if ($paginator->hasPages())
    <nav style="display: flex; justify-content: center; align-items: center; gap: 8px; font-family: 'Playfair Display', serif; margin-top: 40px; margin-bottom: 20px;">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span style="padding: 10px 16px; border-radius: var(--radius-md); background: var(--secondary); color: var(--text-light); cursor: not-allowed; border: 1px solid rgba(10, 58, 42, 0.05); display: flex; align-items: center; justify-content: center;">
                <i class="fas fa-chevron-left"></i>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" style="padding: 10px 16px; border-radius: var(--radius-md); background: var(--white); border: 1px solid var(--primary); color: var(--primary); text-decoration: none; transition: var(--tr); display: flex; align-items: center; justify-content: center;" onmouseover="this.style.background='var(--primary)'; this.style.color='var(--white)';" onmouseout="this.style.background='var(--white)'; this.style.color='var(--primary)';">
                <i class="fas fa-chevron-left"></i>
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span style="padding: 10px 16px; color: var(--text-light); font-weight: 600; font-size: 1.1rem;">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span style="padding: 10px 18px; border-radius: var(--radius-md); background: var(--primary); color: var(--white); font-weight: 700; font-size: 1.1rem; box-shadow: var(--shadow-sm);">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}" style="padding: 10px 18px; border-radius: var(--radius-md); background: var(--white); border: 1px solid rgba(10, 58, 42, 0.1); color: var(--text-medium); text-decoration: none; transition: var(--tr); font-size: 1.1rem; font-weight: 500;" onmouseover="this.style.borderColor='var(--primary)'; this.style.color='var(--primary)'; this.style.background='var(--primary-subtle)';" onmouseout="this.style.borderColor='rgba(10, 58, 42, 0.1)'; this.style.color='var(--text-medium)'; this.style.background='var(--white)';">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" style="padding: 10px 16px; border-radius: var(--radius-md); background: var(--white); border: 1px solid var(--primary); color: var(--primary); text-decoration: none; transition: var(--tr); display: flex; align-items: center; justify-content: center;" onmouseover="this.style.background='var(--primary)'; this.style.color='var(--white)';" onmouseout="this.style.background='var(--white)'; this.style.color='var(--primary)';">
                <i class="fas fa-chevron-right"></i>
            </a>
        @else
            <span style="padding: 10px 16px; border-radius: var(--radius-md); background: var(--secondary); color: var(--text-light); cursor: not-allowed; border: 1px solid rgba(10, 58, 42, 0.05); display: flex; align-items: center; justify-content: center;">
                <i class="fas fa-chevron-right"></i>
            </span>
        @endif
    </nav>
@endif
