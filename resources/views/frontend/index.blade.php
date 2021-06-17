@extends('frontend.layouts.app')
@section('content')
    <div class="home-banner-area mb-4 pt-3">
        <div class="container">
            <div class="row gutters-10 position-relative">
                <div class="col-lg-3 position-static d-none d-lg-block">
                    @include('frontend.partials.category_menu')
                </div>
                @php
                $featured_categories = \App\Category::get();
            @endphp
                <div class="col-lg-7">

                    <div class="aiz-carousel dots-inside-bottom mobile-img-auto-height" data-arrows="true" data-dots="true"
                        data-autoplay="true">
                        <div class="carousel-box">
                            <a href="">
                                <img
                                    class="d-block mw-100 img-fit rounded shadow-sm"
                                    src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/youtube-banner-design-template-33eb7fdcdf93092eaf0b13489c4e56ea_screen.jpg?ts=1596175194"
                                    alt="promo"
                                    @if(count($featured_categories) == 0)
                                    height="457"
                                    @else
                                    height="315"
                                    @endif
                                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';"
                                >
                            </a>
                        </div>
                    </div>
                    @if (count($featured_categories) > 0)
                        <ul class="list-unstyled mb-0 row gutters-5">
                            @foreach ($featured_categories as $key => $category)
                                <li class="minw-0 col-4 col-md mt-3">
                                    <a href="{{ route('products.category', $category->productos_categoriasid) }}" class="d-block rounded bg-white p-2 text-reset shadow-sm">
                                        <img src="data:image/jpg;base64,{{ chunk_split(base64_encode($category->imagen)) }}"
                                            alt="{{$category->descripcion}}"
                                            class="lazyload img-fit"
                                            height="78"
                                            onerror="this.onerror=null;this.src='{{ static_asset('/assets/img/placeholder.jpg') }}';"
                                        >

                                        <div class="text-truncate fs-12 fw-600 mt-2 opacity-70">{{$category->descripcion}}</div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="col-lg-2 order-3 mt-3 mt-lg-0">
                    <div class="bg-white rounded shadow-sm">
                        <div class="bg-soft-primary rounded-top p-3 d-flex align-items-center justify-content-center">
                            <span class="fw-600 fs-16 mr-2 text-truncate">
                                Oferta
                            </span>
                            <span class="badge badge-primary badge-inline">Solo hoy</span>
                        </div>
                        <div class="c-scrollbar-light overflow-auto h-lg-400px p-2 bg-primary rounded-bottom">
                            <div class="gutters-5 lg-no-gutters row row-cols-2 row-cols-lg-1">
                                <div class="col mb-2">
                                    <a href="" class="d-block p-2 text-reset bg-white h-100 rounded">
                                        <div class="row gutters-5 align-items-center">
                                            <div class="col-xxl">
                                                <div class="img">
                                                    <img class="lazyload img-fit h-140px h-lg-80px"
                                                        src="https://codegeek.es/wp-content/uploads/2018/09/mbank171713_w1400_h1400.jpg"
                                                        data-src="https://codegeek.es/wp-content/uploads/2018/09/mbank171713_w1400_h1400.jpg"
                                                        alt="Mochila">
                                                </div>
                                            </div>
                                            <div class="col-xxl">
                                                <div class="fs-16">
                                                    <span class="d-block text-primary fw-600">$30.99</span>

                                                    <del class="d-block opacity-70">$55</del>

                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col mb-2">
                                    <a href="" class="d-block p-2 text-reset bg-white h-100 rounded">
                                        <div class="row gutters-5 align-items-center">
                                            <div class="col-xxl">
                                                <div class="img">
                                                    <img class="lazyload img-fit h-140px h-lg-80px"
                                                        src="https://i.blogs.es/98cdc8/voge-500r-1/450_1000.jpg"
                                                        data-src="https://i.blogs.es/98cdc8/voge-500r-1/450_1000.jpg"
                                                        alt="Mochila">
                                                </div>
                                            </div>
                                            <div class="col-xxl">
                                                <div class="fs-16">
                                                    <span class="d-block text-primary fw-600">$1130.99</span>

                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col mb-2">
                                    <a href="" class="d-block p-2 text-reset bg-white h-100 rounded">
                                        <div class="row gutters-5 align-items-center">
                                            <div class="col-xxl">
                                                <div class="img">
                                                    <img class="lazyload img-fit h-140px h-lg-80px"
                                                        src="https://i.blogs.es/98cdc8/voge-500r-1/450_1000.jpg"
                                                        data-src="https://i.blogs.es/98cdc8/voge-500r-1/450_1000.jpg"
                                                        alt="Mochila">
                                                </div>
                                            </div>
                                            <div class="col-xxl">
                                                <div class="fs-16">
                                                    <span class="d-block text-primary fw-600">$199</span>

                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col mb-2">
                                    <a href="" class="d-block p-2 text-reset bg-white h-100 rounded">
                                        <div class="row gutters-5 align-items-center">
                                            <div class="col-xxl">
                                                <div class="img">
                                                    <img class="lazyload img-fit h-140px h-lg-80px"
                                                        src="https://i.blogs.es/98cdc8/voge-500r-1/450_1000.jpg"
                                                        data-src="https://i.blogs.es/98cdc8/voge-500r-1/450_1000.jpg"
                                                        alt="Mochila">
                                                </div>
                                            </div>
                                            <div class="col-xxl">
                                                <div class="fs-16">
                                                    <span class="d-block text-primary fw-600">$9</span>

                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
 {{-- Featured Section --}}
<div id="section_featured">

</div>

{{-- Best Selling  --}}
<div id="section_best_selling">
</div>

 {{-- Top 10 categories and Brands --}}
 
<section class="mb-4">
     <div class="container">
         <div class="row gutters-10 ">
                 <div class="col-lg-12">
                   <div class="d-flex mb-3 align-items-baseline border-bottom">
                         <h3 class="h5 fw-700 mb-0">
                             <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">Top 10 Categorías</span>
                         </h3>
                         <a href="{{ route('search') }}" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md">Ver todas las categorías</a>
                     </div>
                    <div class="row gutters-5">
                        <div class="col-sm-3">
                            <a href="" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2">
                                <div class="row align-items-center no-gutters">
                                    <div class="col-3 text-center">
                                        <img
                                            src="https://conceptodefinicion.de/wp-content/uploads/2021/01/tecnologia-.jpg"
                                            data-src=""
                                            alt="Teconologia"
                                            class="img-fluid img lazyload h-60px"
                                       
                                        >
                                    </div>
                                    <div class="col-7">
                                        <div class="text-truncat-2 pl-3 fs-14 fw-600 text-left">Teconologia</div>
                                    </div>
                                    <div class="col-2 text-center">
                                       <i class="la la-angle-right text-primary"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-3">
                            <a href="" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2">
                               <div class="row align-items-center no-gutters">
                                    <div class="col-3 text-center">
                                        <img
                                            src="https://dam.vanidades.com/wp-content/uploads/2018/10/tendencias-770x513.jpg"
                                            data-src=""
                                            alt="Moda"
                                            class="img-fluid img lazyload h-60px"
                                      
                                        >
                                    </div>
                                    <div class="col-7">
                                        <div class="text-truncat-2 pl-3 fs-14 fw-600 text-left">Moda</div>
                                    </div>
                                    <div class="col-2 text-center">
                                        <i class="la la-angle-right text-primary"></i>
                                    </div>
                                </div>
                             </a>
                        </div>
                        <div class="col-sm-3">
                            <a href="" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2">
                                <div class="row align-items-center no-gutters">
                                    <div class="col-3 text-center">
                                        <img
                                            src="https://conceptodefinicion.de/wp-content/uploads/2021/01/tecnologia-.jpg"
                                            data-src=""
                                            alt="Teconologia"
                                            class="img-fluid img lazyload h-60px"
                                       
                                        >
                                    </div>
                                    <div class="col-7">
                                        <div class="text-truncat-2 pl-3 fs-14 fw-600 text-left">Juegos</div>
                                    </div>
                                    <div class="col-2 text-center">
                                       <i class="la la-angle-right text-primary"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-3">
                            <a href="" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2">
                                <div class="row align-items-center no-gutters">
                                    <div class="col-3 text-center">
                                        <img
                                            src="https://conceptodefinicion.de/wp-content/uploads/2021/01/tecnologia-.jpg"
                                            data-src=""
                                            alt="Teconologia"
                                            class="img-fluid img lazyload h-60px"
                                       
                                        >
                                    </div>
                                    <div class="col-7">
                                        <div class="text-truncat-2 pl-3 fs-14 fw-600 text-left">Teconologia</div>
                                    </div>
                                    <div class="col-2 text-center">
                                       <i class="la la-angle-right text-primary"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-3">
                            <a href="" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2">
                                <div class="row align-items-center no-gutters">
                                    <div class="col-3 text-center">
                                        <img
                                            src="https://conceptodefinicion.de/wp-content/uploads/2021/01/tecnologia-.jpg"
                                            data-src=""
                                            alt="Teconologia"
                                            class="img-fluid img lazyload h-60px"
                                       
                                        >
                                    </div>
                                    <div class="col-7">
                                        <div class="text-truncat-2 pl-3 fs-14 fw-600 text-left">Alimentación</div>
                                    </div>
                                    <div class="col-2 text-center">
                                       <i class="la la-angle-right text-primary"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
         </div>
     </div>
 </section>


@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $.post('{{ route('home.section.featured') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_featured').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('{{ route('home.section.best_selling') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_best_selling').html(data);
                AIZ.plugins.slickCarousel();
            });

        });
    </script>
@endsection