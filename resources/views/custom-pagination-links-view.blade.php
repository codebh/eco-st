@if ($paginator->hasPages())
    <div class="product-pagination">
        <div class="theme-paggination-block">
            <div class="row">
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            @if ($paginator->onFirstPage())
                                {{--                            <li class="w-16 px-2 py-1 text-center rounded border bg-gray-200">Prev</li>--}}

                                <li class="page-item">
                                    <a class="page-link" href="javascript:void(1)"
                                       aria-label="Previous">
                                <span aria-hidden="true">
                                      @if(direction()=='ltr')
                                        <i class="fa fa-chevron-left"
                                           aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-chevron-right"
                                           aria-hidden="true"></i>
                                    @endif
                                </span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>

                            @else

                                <li class="page-item">
                                    <a class="page-link" href="javascript:void(1)" wire:click="previousPage"
                                      aria-label="Previous">
                                <span aria-hidden="true">
                                   @if(direction()=='ltr')
                                        <i class="fa fa-chevron-left"
                                           aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-chevron-right"
                                           aria-hidden="true"></i>
                                    @endif
                                </span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>

                            @endif


                            @foreach ($elements as $element)

                                @if (is_array($element))
                                    @foreach ($element as $page => $url)
                                        @if ($page == $paginator->currentPage())

                                            <li class="page-item active" wire:click="gotoPage({{$page}})"><a
                                                    class="page-link" style="pointer-events: none; cursor: default"
                                                    href="javascript:void(0)">{{$page}}</a>
                                            </li>
                                        @else
                                            <li class="page-item " wire:click="gotoPage({{$page}})"><a class="page-link"
                                                                                                       style="pointer-events: none; cursor: default"
                                                                                                       href="javascript:void(0)">{{$page}}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                @endif

                            @endforeach




                            @if ($paginator->hasMorePages())
                                {{--                                <li class="w-16 px-2 py-1 text-center rounded border shadow bg-white cursor-pointer" wire:click="nextPage">Next</li>--}}
                                <li class="page-item">
                                    <a  class="page-link" href="javascript:void(0)" wire:click="nextPage"  aria-label="Next">
                                        <span aria-hidden="true">
                                               @if(direction()=='ltr')
                                                <i class="fa fa-chevron-right"
                                                   aria-hidden="true"></i>
                                                  @else
                                                <i class="fa fa-chevron-left"
                                                   aria-hidden="true"></i>
                                                @endif
                                        </span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            @else
                                <li class="page-item">
                                    <a  class="page-link" href="javascript:void(0)" aria-label="Next">
                                        <span aria-hidden="true">
                                             @if(direction()=='ltr')
                                                <i class="fa fa-chevron-right"
                                                   aria-hidden="true"></i>
                                            @else
                                                <i class="fa fa-chevron-left"
                                                   aria-hidden="true"></i>
                                            @endif
                                        </span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </nav>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="product-search-count-bottom">
                        <h5>Showing Products 1-24 of 10 Result</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
