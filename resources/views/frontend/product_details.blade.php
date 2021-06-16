@extends('frontend.layouts.app')


@section('meta')
    
@endsection

@section('content')
    <section class="mb-4 pt-3">
        <div class="container">
            <div class="bg-white shadow-sm rounded p-3">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 mb-4">
                        <div class="sticky-top z-3 row gutters-10">
                            <div class="col order-1 order-md-2">
                                <div class="aiz-carousel product-gallery" data-nav-for='.product-gallery-thumb' data-fade='true' data-auto-height='true'>
                                    
                                    @foreach ($imagenProducto as $imagenProduct)
                                        <div class="carousel-box img-zoom rounded">
                                            <img
                                                class="img-fluid lazyload"
                                                src="data:image/jpg;base64,{{ chunk_split(base64_encode($imagenProduct->imagen)) }}"
                                                data-src="">
                                        </div>
                                    @endforeach
                                    
                                    
                                </div>
                            </div>
                            <div class="col-12 col-md-auto w-md-80px order-2 order-md-1 mt-3 mt-md-0">
                                <div class="aiz-carousel product-gallery-thumb" data-items='5' data-nav-for='.product-gallery' data-vertical='true' data-vertical-sm='false' data-focus-select='true' data-arrows='true'>
                                    @foreach ($imagenProducto as $imagenProduct)    
                                    <div class="carousel-box c-pointer border p-1 rounded">
                                        <img
                                                class="img-fluid lazyload"
                                                src="data:image/jpg;base64,{{ chunk_split(base64_encode($imagenProduct->imagen)) }}"
                                                data-src=""
                                        >
                                    </div>
                                  @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-7 col-lg-6">
                        <div class="text-left">
                            <h1 class="mb-2 fs-20 fw-600">
                                {{$detallesProducto->descripcion}}
                            </h1>

                            <div class="row align-items-center">
                                <div class="col-6">
                                   
                                    <span class="rating">
                                        Rating
                                    </span>
                                    <span class="ml-1 opacity-50">0 Reseñas</span>
                                </div>
                                <div class="col-6 text-right">
                                    <span class="badge badge-md badge-inline badge-pill badge-success">En Stock</span>

                                </div>
                               
                                <div class="col-auto">
                                    <small class="mr-2 opacity-50">Tiempo estimado de llegada: </small> 7 Días
                                </div>
                             
                            </div>

                            <hr>

                               <div class="row no-gutters mt-3">
                                    <div class="col-sm-2">
                                        <div class="opacity-50 my-2">Precio:</div>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="fs-20 opacity-60">
                                            <del>
                                                {{$precioProducto->precio}}
                                                <span>/Unidad</span>
                                             
                                            </del>
                                        </div>
                                    </div>
                                </div>

                                <div class="row no-gutters my-2">
                                    <div class="col-sm-2">
                                        <div class="opacity-50">Precio de descuento:</div>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="">
                                            <strong class="h2 fw-600 text-primary">
                                                {{$precioProducto->precio}}
                                            </strong>
                                           
                                                <span class="opacity-70">/unidad</span>
                                         
                                        </div>
                                    </div>
                                </div>
                       
                           
                                <div class="row no-gutters mt-4">
                                    <div class="col-sm-2">
                                        <div class="opacity-50 my-2">Puntos:</div>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="d-inline-block rounded px-2 bg-soft-primary border-soft-primary border">
                                            <span class="strong-700">5</span>
                                        </div>
                                    </div>
                                </div>
                          

                            <hr>

                            <form id="option-choice-form">
                                @csrf
                                <input type="hidden" name="id" value="">

                                
                               <!-- Quantity + Add to cart -->
                                <div class="row no-gutters">
                                    <div class="col-sm-2">
                                        <div class="opacity-50 my-2">Cantidad:</div>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="product-quantity d-flex align-items-center">
                                            <div class="row no-gutters align-items-center aiz-plus-minus mr-3" style="width: 130px;">
                                                <button class="btn col-auto btn-icon btn-sm btn-circle btn-light" type="button" data-type="minus" data-field="quantity" disabled="">
                                                    <i class="las la-minus"></i>
                                                </button>
                                                <input type="number" name="quantity" class="col border-0 text-center flex-grow-1 fs-16 input-number" placeholder="1" value="" min="" max="10">
                                                <button class="btn  col-auto btn-icon btn-sm btn-circle btn-light" type="button" data-type="plus" data-field="quantity">
                                                    <i class="las la-plus"></i>
                                                </button>
                                            </div>
                                            <div class="avialable-amount opacity-60">
                                                
                                                (<span id="available-quantity">6</span>Disponible)
                                             
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="row no-gutters pb-3 d-none" id="chosen_price_div">
                                    <div class="col-sm-2">
                                        <div class="opacity-50 my-2">Precio Total:</div>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="product-price">
                                            <strong id="chosen_price" class="h4 fw-600 text-primary">

                                            </strong>
                                        </div>
                                    </div>
                                </div>

                            </form>

                            <div class="mt-3">
                               
                                    <button type="button" class="btn btn-soft-primary mr-2 add-to-cart fw-600" onclick="">
                                        <i class="las la-shopping-bag"></i>
                                        <span class="d-none d-md-inline-block"> Añadir al carrito</span>
                                    </button>
                                    <button type="button" class="btn btn-primary buy-now fw-600" onclick="">
                                        <i class="la la-shopping-cart"></i> Comprar Ahora
                                    </button>
                            
                            </div>



                            <div class="d-table width-100 mt-3">
                                <div class="d-table-cell">
                                    <!-- Add to wishlist button -->
                                    <button type="button" class="btn pl-0 btn-link fw-600" onclick="">
                                      Añadir a lista de deseos
                                    </button>
                                </div>
                            </div>     
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mb-4">
        <div class="container">
            <div class="row gutters-10">
                <div class="col-xl-3 order-1 order-xl-0">
                    <div class="bg-white shadow-sm mb-3">
                        <div class="position-relative p-3 text-left">
                           
                                <div class="absolute-top-right p-2 bg-white z-1">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" viewBox="0 0 287.5 442.2" width="22" height="34">
                                        <polygon style="fill:#F8B517;" points="223.4,442.2 143.8,376.7 64.1,442.2 64.1,215.3 223.4,215.3 "/>
                                        <circle style="fill:#FBD303;" cx="143.8" cy="143.8" r="143.8"/>
                                        <circle style="fill:#F8B517;" cx="143.8" cy="143.8" r="93.6"/>
                                        <polygon style="fill:#FCFCFD;" points="143.8,55.9 163.4,116.6 227.5,116.6 175.6,154.3 195.6,215.3 143.8,177.7 91.9,215.3 111.9,154.3
                                        60,116.6 124.1,116.6 "/>
                                    </svg>
                                </div>
         
                                <a href="" class="text-reset d-block fw-600">
                                    <span class="ml-2"><i class="fa fa-check-circle" style="color:green"></i></span>

                                </a>
                                <div class="location opacity-70">Direccion</div>
                     
                           
                            

                            <div class="text-center border rounded p-2 mt-3">
                                <div class="rating">
                                   
                                      RATING

                                </div>
                                <div class="opacity-60 fs-12">3 Opiniones de Usuarios</div>
                            </div>
                        </div>
                       
                            <div class="row no-gutters align-items-center border-top">
                                <div class="col">
                                    <a href="" class="d-block btn btn-soft-primary rounded-0">Visitar Tienda</a>
                                </div>
                               
                            </div>
                     
                    </div>
                    <div class="bg-white rounded shadow-sm mb-3">
                        <div class="p-3 border-bottom fs-16 fw-600">
                            Top Productos más vendidos
                        </div>
                        <div class="p-3">
                            <ul class="list-group list-group-flush">
                              
                                <li class="py-3 px-0 list-group-item border-light">
                                    <div class="row gutters-10 align-items-center">
                                        <div class="col-5">
                                            <a href="" class="d-block text-reset">
                                                <img
                                                    class="img-fit lazyload h-xxl-110px h-xl-80px h-120px"
                                                    src="https://swat-store.com/182-large_default/pantalon-tactico-color-kaki-.jpg"
                                                    data-src=""
                                                    alt="Pantalon"
                                                   
                                                >
                                            </a>
                                        </div>
                                        <div class="col-7 text-left">
                                            <h4 class="fs-13 text-truncate-2">
                                                <a href="">Pantalon</a>
                                            </h4>
                                            <div class="rating rating-sm mt-1">
                                              RATING
                                            </div>
                                            <div class="mt-2">
                                                <span class="fs-17 fw-600 text-primary">$10</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 order-0 order-xl-1">
                    <div class="bg-white mb-3 shadow-sm rounded">
                        <div class="nav border-bottom aiz-nav-tabs">
                            <a href="#tab_default_1" data-toggle="tab" class="p-3 fs-16 fw-600 text-reset active show">Descripción</a>
                            
                                <a href="#tab_default_2" data-toggle="tab" class="p-3 fs-16 fw-600 text-reset">Video</a>
                           
                         
                                <a href="#tab_default_4" data-toggle="tab" class="p-3 fs-16 fw-600 text-reset">Reseñas</a>
                        </div>

                        <div class="tab-content pt-0">
                            <div class="tab-pane fade active show" id="tab_default_1">
                                <div class="p-4">
                                    <div class="mw-100 overflow-hidden text-left aiz-editor-data">
                                        Descripción
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="tab_default_2">
                                <div class="p-4">
                                    <div class="embed-responsive embed-responsive-16by9">
                                      
                                            <iframe class="embed-responsive-item" src="https://www.youtube.com/"></iframe>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab_default_3">
                                <div class="p-4 text-center ">
                                    <a href="" class="btn btn-primary">Descargar</a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab_default_4">
                                <div class="p-4">
                                    <ul class="list-group list-group-flush">
                                       
                                            <li class="media list-group-item d-flex">
                                                <span class="avatar avatar-md mr-3">
                                                    <img
                                                        class="lazyload"
                                                        src="https://swat-store.com/182-large_default/pantalon-tactico-color-kaki-.jpg"
                                                        
                                                    
                                                            data-src="https://swat-store.com/182-large_default/pantalon-tactico-color-kaki-.jpg"
                                                      
                                                    >
                                                </span>
                                                <div class="media-body text-left">
                                                    <div class="d-flex justify-content-between">
                                                        <h3 class="fs-15 fw-600 mb-0">Leidy</h3>
                                                        <span class="rating rating-sm">
                                                          
                                                                <i class="las la-star active"></i>
                                                           
                                                         
                                                        </span>
                                                    </div>
                                                    <div class="opacity-60 mb-2">fecha</div>
                                                    <p class="comment-text">
                                                       Muy buen produtci
                                                    </p>
                                                </div>
                                            </li>
                                         
                                    </ul>

                                    
                                            <div class="pt-4">
                                                <div class="border-bottom mb-4">
                                                    <h3 class="fs-17 fw-600">
                                                       Escribir una reseña
                                                    </h3>
                                                </div>
                                                <form class="form-default" role="form" action="" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="" class="text-uppercase c-gray-light">Tu nombre</label>
                                                                <input type="text" name="name" value="" class="form-control" disabled required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="" class="text-uppercase c-gray-light">Email</label>
                                                                <input type="text" name="email" value="" class="form-control" required disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="opacity-60">RATING</label>
                                                        <div class="rating rating-input">
                                                            <label>
                                                                <input type="radio" name="rating" value="1" required>
                                                                <i class="las la-star"></i>
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="rating" value="2">
                                                                <i class="las la-star"></i>
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="rating" value="3">
                                                                <i class="las la-star"></i>
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="rating" value="4">
                                                                <i class="las la-star"></i>
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="rating" value="5">
                                                                <i class="las la-star"></i>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="opacity-60">Comentario</label>
                                                        <textarea class="form-control" rows="4" name="comment" placeholder="Tu reseña" required></textarea>
                                                    </div>

                                                    <div class="text-right">
                                                        <button type="submit" class="btn btn-primary mt-3">
                                                           Enviar Reseña
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="bg-white rounded shadow-sm">
                        <div class="border-bottom p-3">
                            <h3 class="fs-16 fw-600 mb-0">
                                <span class="mr-4">Productos Relacionados</span>
                            </h3>
                        </div>
                        <div class="p-3">
                            <div class="aiz-carousel gutters-5 half-outside-arrow" data-items="5" data-xl-items="3" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true' data-infinite='true'>
                                
                                <div class="carousel-box">
                                    <div class="aiz-card-box border border-light rounded hov-shadow-md my-2 has-transition">
                                        <div class="">
                                            <a href="" class="d-block">
                                                <img
                                                    class="img-fit lazyload mx-auto h-140px h-md-210px"
                                                    src="https://swat-store.com/182-large_default/pantalon-tactico-color-kaki-.jpg"
                                                    data-src=""
                                                    alt=""
                                                   
                                                >
                                            </a>
                                        </div>
                                        <div class="p-md-3 p-2 text-left">
                                            <div class="fs-15">
                                              
                                                    <del class="fw-600 opacity-50 mr-1">$1000</del>
                                               
                                            </div>
                                            <div class="rating rating-sm mt-1">
                                                Rating
                                            </div>
                                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
                                                <a href="" class="d-block text-reset">Producto relacionado pantalon</a>
                                            </h3>
                                           
                                        </div>
                                    </div>
                                </div>
                           
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 
@endsection

@section('modal')
    <div class="modal fade" id="chat_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
            <div class="modal-content position-relative">
                <div class="modal-header">
                    <h5 class="modal-title fw-600 h5">Cualquier consulta sobre este producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="product_id" value="">
                    <div class="modal-body gry-bg px-3 pt-3">
                        <div class="form-group">
                            <input type="text" class="form-control mb-3" name="title" value="" placeholder="Nombre del Producto" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="8" name="message" required placeholder="¿Alguna pregunta?">Camiseta</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary fw-600" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary fw-600">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-zoom" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title fw-600">Iniciar Sesión</h6>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="p-3">
                        <form class="form-default" role="form" action="" method="POST">
                            @csrf
                            <div class="form-group">
                                
                                    <input type="text" class="form-control h-auto form-control-lg" value="" placeholder="Telefono o Email" name="email" id="email">
                             
                               
                                    <span class="opacity-60">Usar código de la ciudad</span>
                              
                            </div>

                            <div class="form-group">
                                <input type="password" name="password" class="form-control h-auto form-control-lg" placeholder="Contraseña">
                            </div>

                            <div class="row mb-2">
                                <div class="col-6">
                                    <label class="aiz-checkbox">
                                        <input type="checkbox" name="remember" >
                                        <span class=opacity-60>Recuerdame</span>
                                        <span class="aiz-square-check"></span>
                                    </label>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="" class="text-reset opacity-60 fs-14">Olvidaste tu Contraseña</a>
                                </div>
                            </div>

                            <div class="mb-5">
                                <button type="submit" class="btn btn-primary btn-block fw-600">Iniciar Sesión</button>
                            </div>
                        </form>

                        <div class="text-center mb-3">
                            <p class="text-muted mb-0">¿No tienes una cuenta?</p>
                            <a href="{{ route('user.registration') }}">Registrate Ahora</a>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
     AIZ.plugins.slickCarousel();
     AIZ.plugins.zoom();
        
        function show_chat_modal(){
            @if (Auth::check())
                $('#chat_modal').modal('show');
            @else
                $('#login_modal').modal('show');
            @endif
        }

    </script>
@endsection
