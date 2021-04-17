<div class="pagination">
<ul>
    <!-- Previous Page Link -->
    @if ($paginator->onFirstPage())
        <li><a><i class="fa fa-angle-left"></i></a></li>
    @else
        <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fa fa-angle-left"></i></a></li>
    @endif

    <!-- Pagination Elements -->
    @foreach ($elements as $element)
        <!-- "Three Dots" Separator -->
        @if (is_string($element))
            <li><a>{{ $element }}</a></li>
        @endif

        <!-- Array Of Links -->
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="active"><a>{{ $page }}</a></li>
                @else
                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach

    <!-- Next Page Link -->
    @if ($paginator->hasMorePages())
        <li><a href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="fa fa-angle-right"></i></a></li>
    @else
        <li><a><i class="fa fa-angle-right"></i></a></li>
    @endif
</ul>
</div>