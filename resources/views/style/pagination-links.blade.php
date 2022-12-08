{{--<div>--}}
{{--    @if ($paginator->hasPages())--}}
{{--        <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">--}}
{{--            <span>--}}
{{--                --}}{{-- Previous Page Link --}}
{{--                @if ($paginator->onFirstPage())--}}
{{--                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">--}}
{{--                        {!! __('pagination.previous') !!}--}}
{{--                    </span>--}}
{{--                @else--}}
{{--                    <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">--}}
{{--                        {!! __('pagination.previous') !!}--}}
{{--                    </button>--}}
{{--                @endif--}}
{{--            </span>--}}


{{--            @foreach ($elements as $element)--}}
{{--                --}}{{-- "Three Dots" Separator --}}
{{--                @if (is_string($element))--}}
{{--                    <li class="page-item disabled d-none d-md-block" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>--}}
{{--                @endif--}}

{{--                --}}{{-- Array Of Links --}}
{{--                @if (is_array($element))--}}
{{--                    @foreach ($element as $page => $url)--}}
{{--                        @if ($page == $paginator->currentPage())--}}
{{--                            <li class="page-item active d-none d-md-block" aria-current="page"><span class="page-link">{{ $page }}</span></li>--}}
{{--                        @else--}}
{{--                            <li class="page-item d-none d-md-block"><button type="button" class="page-link" wire:click="gotoPage({{ $page }})">{{ $page }}</button></li>--}}
{{--                        @endif--}}
{{--                    @endforeach--}}
{{--                @endif--}}
{{--            @endforeach--}}

{{--            <span>--}}
{{--                --}}{{-- Next Page Link --}}
{{--                @if ($paginator->hasMorePages())--}}
{{--                    <button wire:click="nextPage" wire:loading.attr="disabled" rel="next" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">--}}
{{--                        {!! __('pagination.next') !!}--}}
{{--                    </button>--}}
{{--                @else--}}
{{--                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">--}}
{{--                        {!! __('pagination.next') !!}--}}
{{--                    </span>--}}
{{--                @endif--}}
{{--            </span>--}}
{{--        </nav>--}}
{{--    @endif--}}
{{--</div>--}}
@if ($paginator->hasPages())

                                    <nav aria-label="Page navigation">
                                        <ul class="pagination">

                                                @if ($paginator->onFirstPage())
                                                    <li class="page-item">
                                                        <button wire:ignore.self class="page-link" href="#" aria-label="Previous">
                                                        <span aria-hidden="true">
                                                            @if (session('lang')=='ar')
                                                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                                            @else
                                                            <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                                            @endif
                                                        </span>
                                                            <span class="sr-only">   {!! __('pagination.previous') !!}</span>
                                                        </button>
                                                    </li>
                                                @else
                                                    <li class="page-item">
                                                        <button wire:ignore.self class="page-link"  aria-label="Previous" wire:click="previousPage" wire:loading.attr="disabled">
                                                        <span aria-hidden="true">
                                                          @if (session('lang')=='ar')
                                                                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                                            @else
                                                                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                                            @endif
                                                        </span>
                                                            <span class="sr-only">{!! __('pagination.previous') !!}</span>
                                                        </button>
                                                    </li>

                                                @endif


{{--                                                @foreach ($elements as $element)--}}

{{--                                                    @if (is_string($element))--}}
{{--                                                        <li class="page-item active">--}}
{{--                                                            <button class="page-link disabled" >{{ $element }}</button>--}}
{{--                                                        </li>--}}
{{--                                                    @endif--}}


{{--                                                    @if (is_array($element))--}}
{{--                                                        @foreach ($element as $page => $url)--}}
{{--                                                            @if ($page == $paginator->currentPage())--}}
{{--                                                                <li class="page-item active">--}}
{{--                                                                    <button class="page-link active" >{{ $page }}</button>--}}
{{--                                                                </li>--}}
{{--                                                            @else--}}
{{--                                                                <li class="page-item ">--}}
{{--                                                                    <button class="page-link " wire:click="gotoPage({{ $page }})" >{{ $page }}</button>--}}
{{--                                                                </li>--}}
{{--                                                            @endif--}}
{{--                                                        @endforeach--}}
{{--                                                    @endif--}}
{{--                                                @endforeach--}}


                                                @if ($paginator->hasMorePages())
                                                    <li class="page-item">
                                                        <button wire:ignore.self class="page-link" aria-label="Next" wire:click="nextPage" wire:loading.attr="disabled">
                                                    <span aria-hidden="true">
                                                       @if (session('lang')=='ar')
                                                            <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                                        @else
                                                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                                        @endif

                                                    </span>
                                                            <span class="sr-only"> {!! __('pagination.next') !!}</span>
                                                        </button>
                                                    </li>
{{--                                                    <button wire:click="nextPage" wire:loading.attr="disabled" rel="next" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">--}}
{{--                                                        {!! __('pagination.next') !!}--}}
{{--                                                    </button>--}}
                                                @else
                                                    <li class="page-item">
                                                        <button wire:ignore.self class="page-link" href="#" aria-label="Next">
                                                    <span aria-hidden="true">
                                                          @if (session('lang')=='ar')
                                                            <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                                        @else
                                                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                                        @endif
                                                    </span>
                                                            <span class="sr-only">      {!! __('pagination.next') !!}</span>
                                                        </button>
                                                    </li>

                                                @endif

                                        </ul>
                                    </nav>

@endif
