@extends('frontend.layouts.app')

@section('content')

<section class="pt-5 mb-4">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 mx-auto">
                <div class="row aiz-steps arrow-divider">
                    <div class="col active">
                        <div class="text-center text-primary">
                            <i class="la-3x mb-2 las la-shopping-cart"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block">1. Mi carrito</h3>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center">
                            <i class="la-3x mb-2 opacity-50 las la-map"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50">2. Información de compras </h3>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center">
                            <i class="la-3x mb-2 opacity-50 las la-truck"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50">3. Información de entrega</h3>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center">
                            <i class="la-3x mb-2 opacity-50 las la-credit-card"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50">Pago</h3>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center">
                            <i class="la-3x mb-2 opacity-50 las la-check-circle"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50">Confirmación</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mb-4" id="cart-summary">
    <div class="container">
       
            <div class="row">
                <div class="col-xxl-8 col-xl-10 mx-auto">
                    <div class="shadow-sm bg-white p-3 p-lg-4 rounded text-left">
                        <div class="mb-4">
                            <div class="row gutters-5 d-none d-lg-flex border-bottom mb-3 pb-3">
                                <div class="col-md-5 fw-600">Producto</div>
                                <div class="col fw-600">Precio</div>
                                <div class="col fw-600">Impuesto</div>
                                <div class="col fw-600">Cantidad </div>
                                <div class="col fw-600">Total</div>
                                <div class="col-auto fw-600">Eliminar</div>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item px-0 px-lg-3">
                                    <div class="row gutters-5">
                                            <div class="col-lg-5 d-flex">
                                                <span class="mr-2 ml-0">
                                                    <img
                                                        src="https://upload.wikimedia.org/wikipedia/commons/2/27/Camiseta_lisa.jpg"
                                                        class="img-fit size-60px rounded"
                                                        alt="Camiseta"
                                                    >
                                                </span>
                                                <span class="fs-14 opacity-60">Camiseta</span>
                                            </div>

                                            <div class="col-lg col-4 order-1 order-lg-0 my-3 my-lg-0">
                                                <span class="opacity-60 fs-12 d-block d-lg-none">Precio</span>
                                                <span class="fw-600 fs-16">$14.99</span>
                                            </div>
                                            <div class="col-lg col-4 order-2 order-lg-0 my-3 my-lg-0">
                                                <span class="opacity-60 fs-12 d-block d-lg-none">Impuesto</span>
                                                <span class="fw-600 fs-16">$0</span>
                                            </div>

                                            <div class="col-lg col-6 order-4 order-lg-0">
                                                
                                                    <div class="row no-gutters align-items-center aiz-plus-minus mr-2 ml-0">
                                                        <button class="btn col-auto btn-icon btn-sm btn-circle btn-light" type="button" data-type="minus" data-field="">
                                                            <i class="las la-minus"></i>
                                                        </button>
                                                        <input type="number" name="" class="col border-0 text-center flex-grow-1 fs-16 input-number" placeholder="1" value="" min="1" max="10" onchange=")">
                                                        <button class="btn col-auto btn-icon btn-sm btn-circle btn-light" type="button" data-type="plus" data-field="">
                                                            <i class="las la-plus"></i>
                                                        </button>
                                                    </div>
                                             
                                            </div>
                                            <div class="col-lg col-4 order-3 order-lg-0 my-3 my-lg-0">
                                                <span class="opacity-60 fs-12 d-block d-lg-none">Total</span>
                                                <span class="fw-600 fs-16 text-primary">$14.99</span>
                                            </div>
                                            <div class="col-lg-auto col-6 order-5 order-lg-0 text-right">
                                                <a href="javascript:void(0)" onclick="" class="btn btn-icon btn-sm btn-soft-primary btn-circle">
                                                    <i class="las la-trash"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                            
                            </ul>
                        </div>

                        <div class="px-3 py-2 mb-4 border-top d-flex justify-content-between">
                            <span class="opacity-60 fs-15">Total Parcial</span>
                            <span class="fw-600 fs-17">$14.99</span>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-6 text-center text-md-left order-1 order-md-0">
                                <a href="{{ route('home') }}" class="btn btn-link">
                                    <i class="las la-arrow-left"></i>
                                    Volver a la tienda
                                </a>
                            </div>
                            <div class="col-md-6 text-center text-md-right">
                                @if(Auth::check())
                                    <a href="{{ route('checkout.shipping_info') }}" class="btn btn-primary fw-600">
                                        Continuar con el envío
                                    </a>
                                @else
                                    <button class="btn btn-primary fw-600" onclick="">Continuar con el envío </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
    </div>
</section>

@endsection

@section('modal')
    <div class="modal fade" id="GuestCheckout">
        <div class="modal-dialog modal-dialog-zoom">
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
  
                                    <input type="text" class="form-control h-auto form-control-lg " value="" placeholder="Teléfono o Email" name="email" id="email">
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
                                    <a href="" class="text-reset opacity-60 fs-14">Olvidaste tu contraseña</a>
                                </div>
                            </div>

                            <div class="mb-5">
                                <button type="submit" class="btn btn-primary btn-block fw-600">Iniciar Sesión</button>
                            </div>
                        </form>

                    </div>
                    <div class="text-center mb-3">
                        <p class="text-muted mb-0">¿No tienes una cuenta?</p>
                        <a href="{{ route('user.registration') }}">Registrate Ahora</a>
                    </div>
           
                </div>
            </div>
        </div>
    </div>
@endsection
