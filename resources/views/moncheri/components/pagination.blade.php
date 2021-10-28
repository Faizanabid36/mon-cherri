@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li data-page-num="prev">
                <span><img src="{{ asset('renameMe/images/pagination-arrow.svg') }}"></span>
            </li>
        @else
            <li data-page-num="prev">
                <a href="{{ $paginator->previousPageUrl() }}">
                    <span><img src="{{ asset('renameMe/images/pagination-arrow.svg') }}"></span>
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><span>{{ $page }}</span></li>
                    @else
                        <li><a class="text-decoration-none text-dark" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li data-page-num="next">
                <a href="{{ $paginator->nextPageUrl() }}">
                    <span>
                        <img src="{{asset('renameMe/images/pagination-arrow.svg')}}" style="transform: rotate(180deg)">
                    </span>
                </a>
            </li>
        @else
            <li class="disabled">
                <span>
                    <img src="{{asset('renameMe/images/pagination-arrow.svg')}}" style="transform: rotate(180deg)">
                </span>
            </li>
        @endif
    </ul>
@endif
