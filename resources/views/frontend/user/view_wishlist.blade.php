@extends('frontend.layouts.user_panel')

@section('panel_content')
    <div class="aiz-titlebar mt-2 mb-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <b class="h4">Lista de deseos</b>
            </div>
        </div>
    </div>

    <div class="row gutters-5">

                <div class="col-xxl-3 col-xl-4 col-lg-3 col-md-4 col-sm-6" id="">
                    <div class="card mb-2 shadow-sm">
                        <div class="card-body">
                            <a href="" class="d-block mb-3">
                                <img src="https://resource.logitechg.com/e_trim/w_652,h_710,c_limit,q_auto:best,f_auto,dpr_auto,dpr_1.0/content/dam/gaming/en/products/refreshed-g203/g203-hero.png?v=1" class="img-fit h-140px h-md-200px">
                            </a>

                            <h5 class="fs-14 mb-0 lh-1-5 fw-600 text-truncate-2">
                                <a href="" class="text-reset">Mouse</a>
                            </h5>
                            <div class="rating rating-sm mb-1">
                               
                            </div>
                            <div class=" fs-14">
                                  
                                      <del class="opacity-60 mr-1">$16</del>
                               
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="link link--style-3" data-toggle="tooltip" data-placement="top" title="Remove from wishlist" onclick="">
                                <i class="la la-trash la-2x"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-block btn-primary ml-3" onclick=")">
                                <i class="la la-shopping-cart mr-2"></i>Añadir al Carrito
                            </button>
                        </div>
                    </div>
                </div>
       
    </div>
    <div class="aiz-pagination">
      
    </div>
@endsection

@section('modal')

<div class="modal fade" id="addToCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
        <div class="modal-content position-relative">
            <div class="c-preloader">
                <i class="fa fa-spin fa-spinner"></i>
            </div>
            <button type="button" class="close absolute-close-btn" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div id="addToCart-modal-body">

            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script type="text/javascript">
       
        }
    </script>
@endsection
