<a href="javascript:void(0)" class="d-flex align-items-center text-reset h-100" data-toggle="dropdown"
    data-display="static">
    <i class="la la-shopping-cart la-2x opacity-80"></i>
    <span class="flex-grow-1 ml-1">
        <span class="badge badge-primary badge-inline badge-pill">
            1
        </span>
        <span class="nav-box-text d-none d-xl-block opacity-70">Carrito</span>
    </span>
</a>
<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg p-0 stop-propagation">

    <div class="p-3 fs-15 fw-600 p-3 border-bottom">
        Items del Carrito
    </div>
    <ul class="h-250px overflow-auto c-scrollbar-light list-group list-group-flush">

        <li class="list-group-item">
            <span class="d-flex align-items-center">
                <a href="" class="text-reset d-flex align-items-center flex-grow-1">
                    <img src="https://www.tecnologia-informatica.com/wp-content/uploads/2018/08/caracteristicas-de-las-computadoras.jpg"
                        class="img-fit lazyload size-60px rounded" alt="Computadora">
                    <span class="minw-0 pl-2 flex-grow-1">
                        <span class="fw-600 mb-1 text-truncate-2">
                            Computadora de Escritorio
                        </span>
                        <span class="">1 x </span>
                        <span class="">$550.99</span>
                    </span>
                </a>
                <span class="">
                    <button onclick="" class="btn btn-sm btn-icon stop-propagation">
                        <i class="la la-close"></i>
                    </button>
                </span>
            </span>
        </li>


    </ul>
    <div class="px-3 py-2 fs-15 border-top d-flex justify-content-between">
        <span class="opacity-60">Total Parcial</span>
        <span class="fw-600">$550.99</span>
    </div>
    <div class="px-3 py-2 text-center border-top">
        <ul class="list-inline mb-0">
            <li class="list-inline-item">
                <a href=" {{route('cart')}} " class="btn btn-soft-primary btn-sm">
                    Ver el carrito
                </a>
            </li>
            <li class="list-inline-item">
                <a href="" class="btn btn-primary btn-sm">
                 Verificar
                </a>
            </li>
        </ul>
    </div>

</div>
