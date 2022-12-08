<div class="col-sm-3 collection-filter">

    <div class="collection-filter-block">
        <!-- brand filter start -->
        <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left"
                                                                         aria-hidden="true"></i> {{ trans('user.back') }}</span></div>


        <div class="collection-collapse-block open">
            <h3 class="collapse-block-title">{{ trans('user.price') }}</h3>
            <div class="collection-collapse-block-content">
                <div class="collection-brand-filter">
                    @foreach($prices as $index => $price)
                    <div class="form-check collection-filter-checkbox">
                        <input type="checkbox" class="form-check-input" id="price{{ $index }}" value="{{ $index }}" wire:model="selected.prices">
                        <label class="form-check-label" for="price{{ $index }}">
                            {{ $price['name'] }}
                        </label>
                    </div>
                    @endforeach

                </div>

            </div>
        </div>
        <!-- size filter start here -->
        <div class="collection-collapse-block border-0 open">
            <h3 class="collapse-block-title">{{ trans('user.shops') }}</h3>
            <div class="collection-collapse-block-content">
                <div class="collection-brand-filter">
                    @foreach($stores as $index => $store)
                    <div class="form-check collection-filter-checkbox">
                        <input type="checkbox" class="form-check-input" id="store{{ $index }}" value="{{ $store->id }}" wire:model="selected.stores">
                        <label class="form-check-label" for="store{{ $index }}">
                            {{ $store['name'] }}
                        </label>
                    </div>

                    @endforeach

                </div>
            </div>
        </div>
        <!-- price filter start here -->
       <div class="collection-collapse-block border-0 open">
           <h3 class="collapse-block-title">{{ trans('user.colors') }}</h3>
           <div class="collection-collapse-block-content">
               <div class="collection-brand-filter">
                   @foreach($colors as $index => $color)
                   <div class="form-check collection-filter-checkbox">
                       <input type="checkbox" class="form-check-input" id="color{{ $index }}" value="{{ $color->id }}" wire:model="selected.colors">
                       <label class="form-check-label" for="color{{ $index }}">
                           {{session('lang') == 'ar' ?$color['name_ar']:$color['name_en'] }}
                       </label>
                   </div>
                   @endforeach
               </div>
           </div>
       </div>


    </div>
</div>
