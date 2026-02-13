@if ($paginator->hasPages())
<ul class="pagination d-flex flex-wrap align-items-center gap-2 justify-content-center">

    {{-- Previous --}}
    @if ($paginator->onFirstPage())
        <li class="page-item disabled">
            <span class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px">
                <iconify-icon icon="ep:d-arrow-left"></iconify-icon>
            </span>
        </li>
    @else
        <li class="page-item">
            <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px"
               href="{{ $paginator->previousPageUrl() }}">
                <iconify-icon icon="ep:d-arrow-left"></iconify-icon>
            </a>
        </li>
    @endif

    {{-- Pages --}}
    @foreach ($elements as $element)
        @if (is_string($element))
            <li class="page-item disabled">
                <span class="page-link">{{ $element }}</span>
            </li>
        @endif

        @if (is_array($element))
            @foreach ($element as $page => $url)
                <li class="page-item">
                    <a class="page-link fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px
                        {{ $page == $paginator->currentPage()
                            ? 'bg-primary-600 text-white'
                            : 'bg-neutral-200 text-secondary-light' }}"
                       href="{{ $url }}">
                        {{ $page }}
                    </a>
                </li>
            @endforeach
        @endif
    @endforeach

    {{-- Next --}}
    @if ($paginator->hasMorePages())
        <li class="page-item">
            <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px"
               href="{{ $paginator->nextPageUrl() }}">
                <iconify-icon icon="ep:d-arrow-right"></iconify-icon>
            </a>
        </li>
    @else
        <li class="page-item disabled">
            <span class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px">
                <iconify-icon icon="ep:d-arrow-right"></iconify-icon>
            </span>
        </li>
    @endif

</ul>
@endif
