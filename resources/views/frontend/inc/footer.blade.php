<section class="bg-white border-top mt-auto">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-3 col-md-6">
                <a class="text-reset border-left text-center p-4 d-block" href="{{route('terms')}}">
                    <i class="la la-file-text la-3x text-primary mb-2"></i>
                    <h4 class="h6">Términos y Condiciones</h4>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a class="text-reset border-left text-center p-4 d-block" href="{{ route('returnpolicy') }}">
                    <i class="la la-mail-reply la-3x text-primary mb-2"></i>
                    <h4 class="h6">Política de devoluciones</h4>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a class="text-reset border-left text-center p-4 d-block" href="{{route('supportpolicy')}}">
                    <i class="la la-support la-3x text-primary mb-2"></i>
                    <h4 class="h6">Política de Soporte</h4>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a class="text-reset border-left border-right text-center p-4 d-block" href="{{route('privacypolicy')}}">
                    <i class="las la-exclamation-circle la-3x text-primary mb-2"></i>
                    <h4 class="h6">Política de Privacidad</h4>
                </a>
            </div>
        </div>
    </div>
</section>
<section class="bg-dark py-5 text-light footer-widget">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-xl-4 text-center text-md-left">
                <div class="mt-4">
                    <a href="" class="d-block">
                        <img class="lazyload" src="https://dircomfidencial.com/wp-content/uploads/2016/11/logo-1330779_960_720.png" data-src="" alt="Logo" height="44">
                    </a>
                    <div class="my-3">
 
                    </div>
                    <div class="d-inline-block d-md-block mb-4">
                        <form class="form-inline" method="POST" action="">
                            @csrf
                            <div class="form-group mb-0">
                                <input type="email" class="form-control" placeholder="Escriba su correo electrónico" name="email" required>
                            </div>
                            <button type="submit" class="btn btn-primary">
                               Suscribirse
                            </button>
                        </form>
                    </div>
                    <div class="w-300px mw-100 mx-auto mx-md-0">                  
                        <a href="" target="_blank" class="d-inline-block mr-3 ml-0">
                            <img src="https://www.tuexpertoapps.com/wp-content/uploads/2019/04/google-play-store-ninos-01-1200x1085.jpg.webp" class="mx-100 h-40px">
                        </a>
                        <a href="" target="_blank" class="d-inline-block">
                            <img src="https://i.ytimg.com/vi/xFhynRaUEgM/maxresdefault.jpg" class="mx-100 h-40px">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 ml-xl-auto col-md-4 mr-0">
                <div class="text-center text-md-left mt-4">
                    <h4 class="fs-13 text-uppercase fw-600 border-bottom border-gray-900 pb-2 mb-4">
                        DATOS DE CONTACTO
                    </h4>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                           <span class="d-block opacity-30">Dirección:</span>
                           <span class="d-block opacity-70">Santo Domingo</span>
                        </li>
                        <li class="mb-2">
                           <span class="d-block opacity-30">Teléfono:</span>
                           <span class="d-block opacity-70">0939564579</span>
                        </li>
                        <li class="mb-2">
                           <span class="d-block opacity-30">Email:</span>
                           <span class="d-block opacity-70">
                               <a href="mailto:" class="text-reset">llucia01394@gmail.com</a>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4 col-lg-2">
                <div class="text-center text-md-left mt-4">
                    <h4 class="fs-13 text-uppercase fw-600 border-bottom border-gray-900 pb-2 mb-4">
                        Mi cuenta
                    </h4>
                    <ul class="list-unstyled">

                            <li class="mb-2">
                                <a class="opacity-50 hov-opacity-100 text-reset" href="">
                                   Entrar
                                </a>
                            </li>
                        
                        <li class="mb-2">
                            <a class="opacity-50 hov-opacity-100 text-reset" href="">
                               Historial de Compras
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="opacity-50 hov-opacity-100 text-reset" href="">
                               Mi Lista de Deseos
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="opacity-50 hov-opacity-100 text-reset" href="">
                                Rastrear Orden
                            </a>
                        </li>
                      
                    </ul>
                </div>
               
            </div>
        </div>
    </div>
</section>
<div class="aiz-mobile-bottom-nav d-xl-none fixed-bottom bg-white shadow-lg border-top">
    <div class="d-flex justify-content-around align-items-center">
        <a href="{{ route('home') }}" class="text-reset flex-grow-1 text-center py-3 border-right {{ areActiveRoutes(['home'],'bg-soft-primary')}}">
            <i class="las la-home la-2x"></i>
        </a>
        <a href="{{ route('categories.all') }}" class="text-reset flex-grow-1 text-center py-3 border-right {{ areActiveRoutes(['categories.all'],'bg-soft-primary')}}">
            <span class="d-inline-block position-relative px-2">
                <i class="las la-list-ul la-2x"></i>
            </span>
        </a>
        <a href="" class="text-reset flex-grow-1 text-center py-3 border-right ">
            <span class="d-inline-block position-relative px-2">
                <i class="las la-shopping-cart la-2x"></i>
               
                    <span class="badge badge-circle badge-primary position-absolute absolute-top-right" id="cart_items_sidenav"></span>
                
            </span>
        </a>
       
                <a href="javascript:void(0)" class="text-reset flex-grow-1 text-center py-2 mobile-side-nav-thumb" data-toggle="class-toggle" data-target=".aiz-mobile-side-nav">
                    <span class="avatar avatar-sm d-block mx-auto">
                        
                        <img src="https://imgv3.fotor.com/images/homepage-feature-card/one-tap-photo-enhancer.jpg">
                      
                    </span>
                </a>
            
        
           
        
    </div>
</div>
