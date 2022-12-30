
@if ($paginator->hasPages())
<ul class="pagination justify-content-center">
   
    @if ($paginator->onFirstPage())
        <li class="page-item"><a class="page-link paginate-link disabled" disabled>Kembali</a></li>
    @else
        <li class="page-item"><a class="page-link paginate-link" href="{{ $paginator->previousPageUrl() }}">Kembali</a></li>
    @endif

  
    @foreach ($elements as $element)
       
        @if (is_string($element))
            <li class="page-item disabled"><span>{{ $element }}</span></li>
        @endif


       
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="page-item active"><a class="page-link paginate-link" disabled>{{ $page }}</a></li>
                @else
                    <li class="page-item"><a class="page-link paginate-link" href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach


    
    @if ($paginator->hasMorePages())
        <li class="page-item"><a class="page-link paginate-link" href="{{ $paginator->nextPageUrl() }}">Lanjut</a></li>
    @else
        <li class="page-item"><a class="page-link paginate-link disabled" disabled>Lanjut</a></li>
    @endif
</ul>
@endif 