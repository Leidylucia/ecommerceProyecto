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
                                    <form  class="form-default"  action="{{route('register.post')}}" method="POST">
                                        @csrf
                                       
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="" placeholder="Cédula o Ruc" name="cedula" minlength="10" maxlength="13" pattern="[0-9]+" onkeypress="return validarNumero(event)" required>
                                       
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" placeholder="Nombres Completos" name="name" required>
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group email-form-group  ">
                                            <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="Email" name="email"  autocomplete="off" required>
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong> El email ya ha sido registrado</strong>
                                                    </span>
                                                @endif
                                        </div>

                                        <div class="form-group phone-form-group">
                                            <input type="tel" id="phone-code" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ old('phone') }}" placeholder="Celular" name="phone" autocomplete="off" minlength="7" maxlength="10" pattern="[0-9]+" onkeypress="return validarNumero(event)" required>
        
                                        </div>
                                           

                                        <div class="form-group">
                                            <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Contraseña" name="password"  minlength="6" maxlength="15" required>
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>La confirmación de la contraseña no coincide</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Confirme Contraseña" name="password_confirmation"  minlength="6" maxlength="15" required>
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
        function validarNumero(e) {
        tecla = (document.all) ? e.keyCode : e.which;
        if (tecla==8) return true; 
        patron =/[0-9]/;
        te = String.fromCharCode(tecla); 
        return patron.test(te); 
    }
        
    </script>
@endsection
