@if ($paginator->hasPages())
	<nav class="pagination" role="navigation" aria-label="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
			<a class="pagination-previous" disabled>Previous</a>
		@else
			<a class="pagination-previous" href="{{ $paginator->previousPageUrl() }}" rel="prev">Previous</a>
        @endif

		<ul class="pagination-list">
			{{-- Pagination Elements --}}
			@foreach ($elements as $element)
				<li>
					{{-- "Three Dots" Separator --}}
					@if (is_string($element))
						<a class="pagination-link" disabled>{{ $element }}</li>
					@endif

					{{-- Array Of Links --}}
					@if (is_array($element))
						@foreach ($element as $page => $url)
							@if ($page == $paginator->currentPage())
								<a href="{{$url}}" class="pagination-link is-current" aria-label="Goto page {{$page}}" aria-current="page">{{$page}}</a>
							@else
								<a href="{{$url}}" class="pagination-link" aria-label="Goto page {{$page}}" aria-current="page">{{$page}}</a>
							@endif
						@endforeach
					@endif
				</li>
			@endforeach
		</ul>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
			<a class="pagination-next" href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a>
		@else
			<a class="pagination-next" disabled>Next</a>			
        @endif
    </ul>
@endif
