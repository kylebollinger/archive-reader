<?php $total_pages = ceil($paginator->total()/$paginator->perPage()); ?>

{{-- @if ($paginator->hasPages()) --}}
  <nav class="paginator" data-total-results="{{$paginator->total()}}" data-total-pages="{{$total_pages}}" data-current-page="{{$paginator->currentPage()}}">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
      <a id="prevPage" class="disabled button button--sm button--icon button--outline-secondary" href="{{ $paginator->previousPageUrl() }}" rel="prev" data-direction="prev" aria-disabled="true" aria-label="@lang('pagination.previous')">{!! __('pagination.previous') !!}</a>
    @else
      <a id="prevPage" class="button button--sm button--icon button--outline-secondary" href="{{ $paginator->previousPageUrl() }}" rel="prev" data-direction="prev" aria-label="@lang('pagination.previous')">{!! __('pagination.previous') !!}</a>
    @endif

    {{-- Pagination Elements --}}
    <ul class="paginator--links">
      @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
          <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
        @endif
        {{-- Array Of Links --}}
        @if (is_array($element))
          @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
              <li data-page="{{$page}}" aria-current="page">
                <a href="#" class="page--link active" data-page="{{$page}}">{{ $page }}</a>
              </li>
            @else
              <li data-page="{{$page}}">
                <a href="{{ $url }}" class="page--link" data-page="{{$page}}">{{ $page }}</a>
              </li>
            @endif
          @endforeach
        @endif
      @endforeach
    </ul>

    {{-- Mobile Pagination Info --}}
    <div class="paginator--info">
      <span>Page {{$paginator->currentPage()}} of {{$total_pages}} </span>
    </div>

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
      <a id="nextPage" class="button button--sm button--icon button--outline-secondary" href="{{ $paginator->nextPageUrl() }}" rel="next" data-direction="next" aria-label="@lang('pagination.next')">{!! __('pagination.next') !!}</a>
    @else
      <a id="nextPage" class="disabled button button--sm button--icon button--outline-secondary" href="{{ $paginator->nextPageUrl() }}" rel="next" data-direction="next" aria-disabled="true" aria-label="@lang('pagination.next')">{!! __('pagination.next') !!}</a>
    @endif
  </nav>

{{-- @endif --}}
