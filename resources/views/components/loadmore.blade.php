<div id="loadmore-content">
    @foreach($paginator as $item)
        @include($view, ['item' => $item])
    @endforeach
</div>

@if($paginator->hasMorePages())
   <div id="loadmore-button-wrapper" class="text-center mt-3">
      <button id="load-more-button" data-url="{{ $paginator->nextPageUrl() }}" data-container="{{ $containerId }}" class="px-6 py-2 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition duration-150">
        Load More
      </button>
   </div>
@endif