<div class="modal-body p-4 c-scrollbar-light">
    <div class="row">
        <div class="col-lg-6">
            <div class="row gutters-10 flex-row-reverse">
                <div class="col">
                    <div class="aiz-carousel product-gallery" data-nav-for='.product-gallery-thumb' data-fade='true' data-auto-height='true'>
                        @foreach ($imagenProducto  as $key => $imagenP)
                            
                                <div class="carousel-box img-zoom rounded">
                                    <img
                                        class="img-fluid lazyload"
                                        src="data:image/jpg;base64,{{ chunk_split(base64_encode($imagenP->imagen)) }}"
                                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                    >
                                </div>
                        @endforeach


                    </div>
                </div>
                 <div class="col-auto w-90px">
                    <div class="aiz-carousel carousel-thumb product-gallery-thumb" data-items='5' data-nav-for='.product-gallery' data-vertical='true' data-focus-select='true'>
                        @foreach ($imagenProducto  as $key => $imagenP)
                         
                        <div class="carousel-box c-pointer border p-1 rounded">
                                    <img
                                        class="lazyload mw-100 size-50px mx-auto"
                                        src="data:image/jpg;base64,{{ chunk_split(base64_encode($imagenP->imagen)) }}"
                                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                    >
                         </div>
                           
                        @endforeach
                        
                    </div>
                </div> 
            </div>
        </div>

        <div class="col-lg-6">
            <div class="text-left">
                <h2 class="mb-2 fs-20 fw-600">
                    {{  $product->descripcion  }}
                </h2> 

                    <div class="row no-gutters mt-3">
                        <div class="col-2">
                            <div class="opacity-50">Precio:</div>
                        </div>
                        <div class="col-10">
                            <div class="">
                                <strong class="h2 fw-600 text-primary">
                                    $ {{round(($precioProducto->precio),2)}}
                                </strong>
                                <span class="opacity-70">/Unidad</span>
                            </div>
                        </div>
                    </div>
                    <div class="row no-gutters mt-2">
                        <div class="col-sm-2">
                            <div class="opacity-50 my-2">Medidas:</div>
                        </div>
                       
                        <div class="container d-inline-block " >
                            <div class="row">
                              <div class="col-sm-12 mb-1 ml-5">
                                <button type="button" class="btn btn-soft-primary fw-500" onclick="">
                                    Medida 1
                               </button>
                              </div>
                              <div class="col-sm-12 mb-1 ml-5">
                                <button type="button" class="btn btn-soft-primary fw-500" onclick="">
                                    Medida 2
                                </button>
                              </div>
                              <div class="col-sm-12 mb-1 ml-5">
                                <button type="button" class="btn btn-soft-primary fw-500" onclick="">
                                    Medida 3
                               </button> 
                              </div>
                            </div>
                        </div>
                    </div>
              
               
                <hr>

                @php
                    $qty = 0;
                    
                @endphp

                <form id="option-choice-form">
                    @csrf
                    <input type="hidden" name="id" value="{{$product->productosid}}">

                    <!-- Quantity + Add to cart -->
                    <div class="row no-gutters">
                        <div class="col-2">
                            <div class="opacity-50 mt-2">Cantidad:</div>
                        </div>
                        <div class="col-10 ml-3">
                            <div class="product-quantity d-flex align-items-center">
                                <div class="row no-gutters align-items-center aiz-plus-minus mr-3" style="width: 130px;">
                                    <button class="btn col-auto btn-icon btn-sm btn-circle btn-light" type="button" data-type="minus" data-field="quantity" disabled="">
                                        <i class="las la-minus"></i>
                                    </button>
                                    <input type="text" name="quantity" class="col border-0 text-center flex-grow-1 fs-16 input-number" placeholder="1" value="{{ $min_qty }}" min="{{ $min_qty }}" max="10">
                                    <button class="btn  col-auto btn-icon btn-sm btn-circle btn-light" type="button" data-type="plus" data-field="quantity">
                                        <i class="las la-plus"></i>
                                    </button>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="row no-gutters pt-3 pb-3 d-none" id="chosen_price_div">
                        <div class="col-2">
                            <div class="opacity-50">Precio Total:</div>
                        </div>
                        <div class="col-10">
                            <div class="product-price">
                                <strong id="chosen_price" class="h4 fw-600 text-primary">

                                </strong>
                            </div>
                        </div>
                    </div>
                    <div class="avialable-amount opacity-60">(<span id="available-quantity">{{$min_qty }}</span>  Disponible)</div>

                </form> 
                <div class="mt-3">
                  
                        <button type="button" class="btn btn-primary buy-now fw-600 add-to-cart" onclick="">
                            <i class="la la-shopping-cart"></i>
                            <span class="d-none d-md-inline-block"> Añadir al Carrito</span>
                        </button>
                   
                </div>

            </div>
        </div> 
    </div>
</div>
<script>
    $('#option-choice-form input').on('change', function () {
        if($('#option-choice-form input[name=quantity]').val() > 0){
                $.ajax({
                   type:"POST",
                   url: '{{ route('products.variant_price') }}',
                   data: $('#option-choice-form').serializeArray(),
                   
                   success: function(data){
                     $('#option-choice-form #chosen_price_div').removeClass('d-none');
                       $('#option-choice-form #chosen_price_div #chosen_price').html(data.price);
                       $('#available-quantity').html(data.quantity);
                       $('.input-number').prop('max', data.quantity);
                       if(parseInt(data.quantity) < 1){
                           $('.buy-now').hide();
                           $('.add-to-cart').hide();
                       }
                       else{
                           $('.buy-now').show();
                           $('.add-to-cart').show();
                       } 
                   }
               });
            } 
    });
</script>


