<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="app-url" content="http://localhost/ecommerceProyecto">
    @yield('meta')
   
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ static_asset('assets/css/vendors.css') }}">
    <link rel="stylesheet" href="{{ static_asset('assets/css/aiz-core.css') }}">
    <link rel="stylesheet" href="{{ static_asset('assets/css/custom-style.css') }}">

    <script>
        var AIZ = AIZ || {};
        AIZ.local = {
            nothing_selected: 'Nada seleccionado',
            nothing_found: 'No se ha encontrado',
            choose_file: 'Escoja un archivo',
            file_selected: 'Archivo seleccionado',
            files_selected: 'Archivos seleccionados',
            add_more_files: 'Añadir mas archivos',
            adding_more_files: 'Añadiendo archivos',
            drop_files_here_paste_or: 'Soltar archivos aqui',
            browse: 'Navegar',
            upload_complete: 'Carga completa',
            upload_paused: 'Carga pausada',
            resume_upload: 'Continuar con la carga',
            pause_upload: 'Pausar carga',
            retry_upload: 'Reintentar carga',
            cancel_upload: 'Carga cancelada',
            uploading: 'Subiendo',
            processing: 'Procesando',
            complete: 'Completo',
            file: 'Archivo',
            files: 'Archivos',
        }
    </script>

    <style>
        body{
            font-family: 'Open Sans', sans-serif;
            font-weight: 400;
        }
        
    </style>

</head>
<body>
    <div class="aiz-main-wrapper d-flex flex-column">

      
        @include('frontend.inc.nav')
        @yield('content')
        @include('frontend.inc.footer')

    </div>
    @include('frontend.partials.modal')

    <div class="modal fade" id="addToCart">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
            <div class="modal-content position-relative">
                <div class="c-preloader text-center p-3">
                    <i class="las la-spinner la-spin la-3x"></i>
                </div>
                <button type="button" class="close absolute-top-right btn-icon close z-1" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="la-2x">&times;</span>
                </button>
                <div id="addToCart-modal-body">

                </div>
            </div>
        </div>
    </div>

    @yield('modal')
    
    <script src="{{ static_asset('assets/js/vendors.js') }}"></script>
    <script src="{{ static_asset('assets/js/aiz-core.js') }}"></script>
    <script>
        function addToWishList(id){
          
            
        }

        function showAddToCartModal(id){
            if(!$('#modal-size').hasClass('modal-lg')){
                $('#modal-size').addClass('modal-lg');
            }
            $('#addToCart-modal-body').html(null);
            $('#addToCart').modal();
            $('.c-preloader').show();
            $.post('{{ route('cart.showCartModal') }}', {_token: AIZ.data.csrf, id:id}, function(data){
                console.log('aguagjsags')
                $('.c-preloader').hide();
                $('#addToCart-modal-body').html(data);
                AIZ.plugins.slickCarousel();
                AIZ.plugins.zoom();
                AIZ.extra.plusMinus();
                getVariantPrice();
            });
        }

    </script>

    @yield('script')

</body>
</html>