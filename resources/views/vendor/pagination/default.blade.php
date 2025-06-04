@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="prev disabled">
                <a href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                    <i class="w-icon-long-arrow-left"></i>Prev
                </a>
            </li>
        @else
            <li class="prev">
                <a href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                    <i class="w-icon-long-arrow-left"></i>Prev
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @php
            $currentPage = $paginator->currentPage();
            $lastPage = $paginator->lastPage();
            $start = max($currentPage - 4, 1);
            $end = min($currentPage + 4, $lastPage);
        @endphp

        {{-- Page Numbers --}}
        @for ($i = $start; $i <= $end; $i++)
            @if ($i == $currentPage)
                <li class="page-item active"><a class="page-link" href="#">{{ $i }}</a></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
            @endif
        @endfor

        {{-- Add dots at start --}}
        @if ($start > 1)
            <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
            <li class="page-item"><a class="page-link" href="{{ $paginator->url(1) }}">1</a></li>
        @endif

        {{-- Add dots at end --}}
        @if ($end < $lastPage)
            <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
            <li class="page-item"><a class="page-link" href="{{ $paginator->url($lastPage) }}">{{ $lastPage }}</a>
            </li>
        @endif


        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="next">
                <a href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                    Next<i class="w-icon-long-arrow-right"></i>
                </a>
            </li>
        @else
            <li class="next disabled">
                <a href="#" aria-label="Next" tabindex="-1" aria-disabled="true">
                    Next<i class="w-icon-long-arrow-right"></i>
                </a>
            </li>
        @endif
    </ul>
@endif
