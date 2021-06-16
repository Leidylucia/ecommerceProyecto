@extends('frontend.layouts.app')

@section('content')
    <section class="gry-bg py-4">
        <div class="profile">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8 mx-auto">
                        <div class="card">
                            <div class="text-center pt-4">
                                <h1 class="h4 fw-600">
                                   Crea una cuenta
                                </h1>
                            </div>
                            <div class="px-4 py-3 py-lg-4">
                                <div class="">
                                    <form id="reg-form" class="form-default" role="form" action="" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="" placeholder="Nombres Completos" name="name">
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>error</strong>
                                                </span>
                                            @endif
                                        </div>

                                        
                                            <div class="form-group phone-form-group mb-1">
                                                <input type="tel" id="phone-code" class="form-control" value="" placeholder="Teléfono" name="phone" autocomplete="off">
                                            </div>

                                            <input type="hidden" name="country_code" value="">

                                            <div class="form-group email-form-group mb-1 d-none">
                                                <input type="email" class="form-control " value="" placeholder="Email" name="email"  autocomplete="off">
                                                
                                            </div>

                                            <div class="form-group text-right">
                                                <button class="btn btn-link p-0 opacity-50 text-reset" type="button" onclick="">Utilice el correo electrónico en su lugar</button>
                                            </div>
                                       
                                           

                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Contraseña" name="password">
                                            
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Confirme Contraseña" name="password_confirmation">
                                        </div>


                                        <div class="mb-3">
                                            <label class="aiz-checkbox">
                                                <input type="checkbox" name="checkbox_example_1" required>
                                                <span class=opacity-60>Al registrarse, acepta nuestros términos y condiciones</span>
                                                <span class="aiz-square-check"></span>
                                            </label>
                                        </div>

                                        <div class="mb-5">
                                            <button type="submit" class="btn btn-primary btn-block fw-600">Crear Cuenta</button>
                                        </div>
                                    </form>
                               
                                </div>
                                <div class="text-center">
                                    <p class="text-muted mb-0">¿Ya tienes una cuenta?</p>
                                    <a href="{{ route('user.login') }}">Iniciar Sesión</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection


@section('script')
 
    <script type="text/javascript">

        
    </script>
@endsection
