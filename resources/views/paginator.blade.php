@if ($paginator->hasPages())
    <div class="pagination">
        {{-- Previous Page Link --}}
        <div class="pagination-link">
            @if ($paginator->onFirstPage())
                <span aria-hidden="true">&lsaquo;</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            @endif
        </div>

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <div class="pagination-link pagination-current">
                            <span>{{ $page }}</span>
                        </div>
                    @else
                        <div class="pagination-link">
                            <a href="{{ $url }}">{{ $page }}</a>
                        </div>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        <div class="pagination-link">
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
            @else
                <span aria-hidden="true">&rsaquo;</span>
            @endif
        </div>
    </div>
@endif
