<div class="position-relative top-banner removable-session z-1035 d-none" data-key="top-banner" data-value="removed">
    <a href="" class="d-block text-reset">
        <img src="https://dircomfidencial.com/wp-content/uploads/2016/11/logo-1330779_960_720.png"
            class="w-100 mw-100 h-50px h-lg-auto img-fit">
    </a>
    <button class="btn text-white absolute-top-right set-session" data-key="top-banner" data-value="removed"
        data-toggle="remove-parent" data-parent=".top-banner">
        <i class="la la-close la-2x"></i>
    </button>
</div>

{{-- TOP BAR --}}

<div class="top-navbar bg-white border-bottom border-soft-secondary z-1035">
    <div class="container">
        <div class="row">
                <div class="col-12 text-right d-none d-lg-block">
                <ul class="list-inline mb-0">
                    @auth
                        @if (isAdmin())
                            
                        @else
                            
                        @endif
                        <li class="list-inline-item">
                            <a href="" class="text-reset py-2 d-inline-block opacity-60">Cerrar Sesión</a>
                        </li>
                    @else
                        <li class="list-inline-item mr-3">
                            <a href="{{route('user.login')}}" class="text-reset py-2 d-inline-block opacity-60">Ingresar</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{route('user.registration')}}" class="text-reset py-2 d-inline-block opacity-60">Registrarse</a>
                        </li>
                            
                    @endauth
                        

                </ul>
            </div>
        </div>
    </div>
</div>
{{-- END TO BARR --}}

<header class="sticky-top z-1020 bg-white border-bottom shadow-sm">
    <div class="position-relative logo-bar-area z-1">
        <div class="container">
            <div class="d-flex align-items-center">
                <div class="col-auto col-xl-3 pl-0 pr-3 d-flex align-items-center">
                    <a class="d-block py-20px mr-3 ml-0" href="{{route('home')}}">

                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/7e/Falanster_logo_300x300.png"
                            class="mw-100 h-30px h-md-40px" height="40">

                    </a>
                    @if (Route::currentRouteName() != 'home')
                        <div class="d-none d-xl-block align-self-stretch category-menu-icon-box ml-auto mr-0">
                            <div class="h-100 d-flex align-items-center" id="category-menu-icon">
                                <div class="dropdown-toggle navbar-light bg-light h-40px w-50px pl-2 rounded border c-pointer">
                                    <span class="navbar-toggler-icon"></span>
                                </div>
                            </div>
                        </div>
                    @endif 
                </div>
                <div class="d-lg-none ml-auto mr-0">
                    <a class="p-2 d-block text-reset" href="javascript:void(0);" data-toggle="class-toggle"
                        data-target=".front-header-search">
                        <i class="las la-search la-flip-horizontal la-2x"></i>
                    </a>
                </div>

                <div class="flex-grow-1 front-header-search d-flex align-items-center bg-white">
                    <div class="position-relative flex-grow-1">
                        <form action="" method="GET" class="stop-propagation">
                            <div class="d-flex position-relative align-items-center">
                                <div class="d-lg-none" data-toggle="class-toggle" data-target=".front-header-search">
                                    <button class="btn px-2" type="button"><i
                                            class="la la-2x la-long-arrow-left"></i></button>
                                </div>
                                <div class="input-group">
                                    <input type="text" class="border-0 border-lg form-control" id="search" name="q"
                                        placeholder="Buscar" autocomplete="off">
                                    <div class="input-group-append d-none d-lg-block">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="la la-search la-flip-horizontal fs-18"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="typed-search-box stop-propagation document-click-d-none d-none bg-white rounded shadow-lg position-absolute left-0 top-100 w-100"
                            style="min-height: 200px">
                            <div class="search-preloader absolute-top-center">
                                <div class="dot-loader">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                            </div>
                            <div class="search-nothing d-none p-3 text-center fs-16">

                            </div>
                            <div id="search-content" class="text-left">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-none d-lg-none ml-3 mr-0">
                    <div class="nav-search-box">
                        <a href="#" class="nav-box-link">
                            <i class="la la-search la-flip-horizontal d-inline-block nav-box-icon"></i>
                        </a>
                    </div>
                </div>


                 <div class="d-none d-lg-block ml-3 mr-0">
                    <div class="" id="wishlist">
                        @include('frontend.partials.wishlist')
                    </div>
                </div>

                <div class="d-none d-lg-block  align-self-stretch ml-3 mr-0" data-hover="dropdown">
                    <div class="nav-cart-box dropdown h-100" id="cart_items">
                        @include('frontend.partials.cart')
                    </div>
                </div> 

            </div>
        </div>     
        @if(Route::currentRouteName() != 'home')
            <div class="hover-category-menu position-absolute w-100 top-100 left-0 right-0 d-none z-3" id="hover-category-menu">
                <div class="container">
                    <div class="row gutters-10 position-relative">
                        <div class="col-lg-3 position-static">
                            @include('frontend.partials.category_menu')
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</header>
