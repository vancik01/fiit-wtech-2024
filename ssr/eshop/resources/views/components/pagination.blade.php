@props(['totalPages', 'currentPage', 'onClickFunction'])

<div class="d-flex justify-content-center mt-5">
    <nav aria-label="Paginácia">
        <ul class="pagination pagination-lg">
            <li class="page-item  {{ $currentPage == 1 ? 'cursor-not-allowed disabled' : 'cursor-pointer' }}">
                <a class="page-link" aria-label="Previous"
                    onclick="{{ $currentPage == 1 ? 'return false;' : $onClickFunction . '(' . ($currentPage - 1) . ')' }};">
                    <i class="fas fa-solid fa-chevron-left"></i>
                </a>
            </li>


            @php
                $start = max($currentPage - 2, 1);
                $end = min($currentPage + 2, $totalPages);
            @endphp


            @if ($start > 1)
                <li class="page-item cursor-not-allowed disabled"><span class="page-link">...</span></li>
            @endif


            @for ($i = $start; $i <= $end; $i++)
                <li class="page-item  {{ $currentPage == $i ? 'active' : 'cursor-pointer' }}">
                    <a class="page-link"
                        onclick="{{ $onClickFunction }}({{ $i }}); return false;">{{ $i }}</a>
                </li>
            @endfor


            @if ($end < $totalPages)
                <li class="page-item cursor-not-allowed disabled"><span class="page-link">...</span></li>
            @endif


            <li class="page-item {{ $currentPage == $totalPages ? 'disabled cursor-not-allowed' : ' cursor-pointer' }}">
                <a class="page-link" aria-label="Next"
                    onclick="{{ $currentPage == $totalPages ? 'return false;' : $onClickFunction . '(' . ($currentPage + 1) . ')' }};">
                    <i class="fas fa-solid fa-chevron-right"></i>
                </a>
            </li>
        </ul>
    </nav>
</div>
