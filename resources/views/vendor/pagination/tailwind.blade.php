@if ($paginator->hasPages())
    <nav>
        <ul class="flex items-center justify-center mt-4 p-4 text-blue-700">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="bg-blue-700 text-white px-4 py-2 m-1 border border-blue-700 rounded-md" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li>
                    <a class="bg-white px-4 py-2 m-1 border border-blue-700 rounded-md hover:bg-blue-700 hover:text-white" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="bg-blue-700 text-white px-4 py-2 m-1 border border-blue-700 rounded-md" aria-current="page"><span>{{ $page }}</span></li>
                        @else
                            <li><a class="bg-white px-4 py-2 m-1 border border-blue-700 rounded-md hover:bg-blue-700 hover:text-white" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a class="bg-white px-4 py-2 m-1 border border-blue-700 rounded-md hover:bg-blue-700 hover:text-white" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="bg-blue-700 text-white px-4 py-2 text-xl m-1 border border-blue-700 rounded-md" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
