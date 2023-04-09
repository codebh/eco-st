@extends('style.newIndex')
@push('search-js')
<script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
<script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/instantsearch.js@2.6.0"></script>
    <script>
          function openSearch() {
        document.getElementById("search-overlay").style.display = "block";
    }

    function closeSearch() {
        document.getElementById("search-overlay").style.display = "none";
    }

    (function () {

        var client = algoliasearch('OYTC0HANQN', '1755931180d4f8463426a9fe3cc4e3d3');
        var index = client.initIndex('products');


        var enterPressed = false;

        //initialize autocomplete on search input (ID selector must match)
        autocomplete('#aa-search-input',
            {hint: false}, {
                source: autocomplete.sources.hits(index, {hitsPerPage: 5}),
                //value to be displayed in input control after user's suggestion selection
                displayKey: 'name',
                //hash of templates used when rendering dataset
                templates: {
                    //'suggestion' templating function used to render a single suggestion
                    suggestion: function (suggestion) {
                        const markup = `
                            <div class="algolia-result">
                             <span>
                                <img src="https://tafseel.sgp1.digitaloceanspaces.com/${suggestion.main_image}" alt="img" class="algolia-thumb ">
                                ${suggestion._highlightResult.title.value}
                            </span>
                       {{-- <span>${(suggestion.price ).toFixed(2)}BHD</span> --}}
                        <span>${suggestion._highlightResult.category_id.value}</span>
                            </div>

                            {{-- <div class="algolia-details">
                                <span>${suggestion._highlightResult.category_id.value}</span>
                            </div> --}}
                        <div class="algolia-details">
                            <span>${suggestion._highlightResult.store_id.value}</span>
                            </div>
                        `;

                        return markup;
                    },
                    empty: function (result) {
                        return 'Sorry, we did not find any results for "' + result.query + '"';
                    }
                }
            }).on('autocomplete:selected', function (event, suggestion, dataset) {
            window.location.href = window.location.origin + '/all-products/' + suggestion.title;
            enterPressed = true;
        }).on('keyup', function (event) {
            if (event.keyCode == 13 && !enterPressed) {
                window.location.href = window.location.origin + '/search-algolia?q=' + document.getElementById('aa-search-input').value;
            }
        });

    })();
    (function () {
        const search = instantsearch({
            appId: 'OYTC0HANQN',
            apiKey: '1755931180d4f8463426a9fe3cc4e3d3',
            indexName: 'products',
            urlSync: true
        });

        search.addWidget(
            instantsearch.widgets.hits({
                container: '#hits',
                templates: {
                    empty: 'No results',
                    item: function (item) {
                        return `

                         <a href="${window.location.origin}/all-products/${item.title}">
             <div class="media border ">
                        <img class="mr-3" src="https://tafseel.sgp1.digitaloceanspaces.com/${(item.main_image )}" style="height: 200px;" alt="Generic placeholder image">
                        <div class="media-body p-2">
                            <h5 class="mt-0 ">${(item.title )}</h5>

                            <h5 class="mt-0 ">${(item.category_id )}</h5>
                            <h5 class="mt-0 ">${(item.store_id )}</h5>
                            <h5 class="mt-0 ">${(item.color_id )}</h5>


                              {{-- <h4> ${(item.price ).toFixed(2)}BHD</h4> --}}

                        {{-- <h4> ${(item.price_offer ).toFixed(2)}BHD</h4> --}}



                        </div>
                    </div>
</a>
                    <br>

                                     `;
                    }
                }
            })
        );
        search.addWidget(
            instantsearch.widgets.searchBox({
                container: '#search-box',
                placeholder: 'Search for products only English',




            })
        );

        search.addWidget(
            instantsearch.widgets.pagination({
                container: '#pagination',
                padding: 2,
                maxPages: 20,


            })
        );
        search.addWidget(
            instantsearch.widgets.stats({
                container: '#stats-container'
            })
        );
        search.addWidget(
            instantsearch.widgets.refinementList({
                container: '#refinement-list',
                attributeName: 'category_id',
            })
        );


        search.start();
    })();
    </script>

@endpush

@section('content')

    <!-- breadcrumb start -->
        <div class="breadcrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="page-title">
                            <h2>{{ trans('user.search') }}</h2>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <nav aria-label="breadcrumb" class="theme-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">{{ trans('user.home_page') }}</a></li>/
                                <span class="">{{ trans('user.search') }}</span>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb End -->

    <br>

    <div class="aa-input-container" id="aa-input-container">
        <input type="search" id="aa-search-input" class="aa-input-search" placeholder="Search for items  only English..." name="search"
               autocomplete="off" />
{{--        <svg class="aa-input-icon" viewBox="654 -372 1664 1664">--}}
{{--            <path d="M1806,332c0-123.3-43.8-228.8-131.5-316.5C1586.8-72.2,1481.3-116,1358-116s-228.8,43.8-316.5,131.5  C953.8,103.2,910,208.7,910,332s43.8,228.8,131.5,316.5C1129.2,736.2,1234.7,780,1358,780s228.8-43.8,316.5-131.5  C1762.2,560.8,1806,455.3,1806,332z M2318,1164c0,34.7-12.7,64.7-38,90s-55.3,38-90,38c-36,0-66-12.7-90-38l-343-342  c-119.3,82.7-252.3,124-399,124c-95.3,0-186.5-18.5-273.5-55.5s-162-87-225-150s-113-138-150-225S654,427.3,654,332  s18.5-186.5,55.5-273.5s87-162,150-225s138-113,225-150S1262.7-372,1358-372s186.5,18.5,273.5,55.5s162,87,225,150s113,138,150,225  S2062,236.7,2062,332c0,146.7-41.3,279.7-124,399l343,343C2305.7,1098.7,2318,1128.7,2318,1164z" />--}}
{{--        </svg>--}}
    </div>

{{--    <form action="{{ route('search') }}" method="GET" class="search-form">--}}
{{--        <i class="fa fa-search search-icon"></i>--}}
{{--        <input type="text" name="query" id="query" value="{{ request()->input('query') }}" class="search-box" placeholder="Search for product" required>--}}
{{--    </form>--}}

        <!-- section end -->


        <!-- product section start -->
        <section class="section-b-space ratio_asos">
            <div class="container">
                <div class="row search-product">

                    <div class="col-xl-2 col-md-4 col-6">

                    </div>

            </div>
        </section>
        <!-- product section end -->

@stop

