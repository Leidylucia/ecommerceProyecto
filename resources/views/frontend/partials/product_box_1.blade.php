<div class="aiz-card-box border border-light rounded hov-shadow-md mt-1 mb-2 has-transition bg-white">
    <div class="position-relative">
        <a href="{{route('product',$product->productosid)}}" class="d-block">
            <img class="img-fit lazyload mx-auto h-140px h-md-210px"
                src="data:image/jpg;base64,{{ chunk_split(base64_encode($product->imagen)) }}"
                alt="{{$product->descripcion}}"
                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                >
        </a>
        <div class="absolute-top-right aiz-p-hov-icon">
            <a href="javascript:void(0)" onclick="" data-toggle="tooltip" data-title="" data-placement="left">
                <i class="la la-heart-o"></i>
            </a>
            <a href="javascript:void(0)" onclick="" data-toggle="tooltip" data-title="" data-placement="left">
                <i class="las la-sync"></i>
            </a>
            <a href="javascript:void(0)" onclick="showAddToCartModal({{ $product->productosid}})" data-toggle="tooltip" data-title="" data-placement="left">
                <i class="las la-shopping-cart"></i>
            </a>
        </div>
    </div>
    <div class="p-md-3 p-2 text-left">
        <div class="fs-15">
        
            <a class="fw-600 opacity-50 mr-1">$ {{round($product->precio,2)}}</a>
   
        </div>
        <div class="rating rating-sm mt-1">
           1
        </div>
        <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
            <a href=""
                class="d-block text-reset">{{$product->descripcion }}</a>
        </h3>
       
            
    </div>
</div>
