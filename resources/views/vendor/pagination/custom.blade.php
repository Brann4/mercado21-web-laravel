@if ($paginator->hasPages())
    <div class="pagination-area">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="prev page-numbers disabled"><i class="fas fa-chevron-left"></i></span>
        @else
            <a class="prev page-numbers" href="{{ $paginator->previousPageUrl() }}"><i class="fas fa-chevron-left"></i></a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="page-numbers disabled">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="page-numbers current" aria-current="page">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="page-numbers">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="next page-numbers" href="{{ $paginator->nextPageUrl() }}"><i class="fas fa-chevron-right"></i></a>
        @else
            <span class="next page-number disabled"><i class="fas fa-chevron-right"></i></span>
        @endif
    </div>
@endif