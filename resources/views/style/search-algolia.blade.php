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











    <!--section start-->
    <section class="authentication-page">
        <div class="container">
            <section class="search-block">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">

                            <!-- section end -->
                            <div id="search-box">
                                <!-- SearchBox widget will appear here -->
                            </div>



                            <div id="refinement-list">
                                <!-- RefinementList widget will appear here -->
                            </div>

                            <div id="stats-container"></div>

                            <br>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <!-- section end -->


        <div class="container">


                <div id="hits">
                    <!-- Hits widget will appear here -->


                </div>




            <div id="pagination">
                <!-- Pagination widget will appear here -->
            </div>

        </div>

    <!-- product section end -->
@stop

