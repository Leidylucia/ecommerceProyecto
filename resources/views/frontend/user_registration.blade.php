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
                                               
                                                <input id="inputCedula" type="text" class="form-control {{ $errors->has('cedula') ? ' is-invalid' : '' }}" value="{{ old('cedula') }}" placeholder="Cédula o Ruc" name="cedula" minlength="10" maxlength="13" pattern="[0-9]+" onkeypress="return validarNumero(event)" required>
                                                
                                                @if ($errors->has('cedula'))
                                               
                                                    <span class="invalid-feedback" style="font-weight:bold;" role="alert">
                                                        <span>La cédula o RUC ya existe</span>
                                                    </span>
                                                @endif
                                             
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
                                            <button id="buttonCrear" type="submit" class="btn btn-primary btn-block fw-600">Crear Cuenta</button>
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

        $( "#buttonCrear" ).click(function() {                  
            var cad = document.getElementById("inputCedula").value.trim();
            var total = 0;
            var longitud = cad.length;
            var longcheck = longitud - 1;
            var digitos = cad.split('').map(Number);
            var codigo_provincia = digitos[0] * 10 + digitos[1];
            if (cad !== "" && longitud === 10){
                
                if ( cad != '2222222222' && codigo_provincia >= 1 && (codigo_provincia <= 24 || codigo_provincia == 30 )) 
                {
                    for(i = 0; i < longcheck; i++){
                        if (i%2 === 0) {
                        var aux = cad.charAt(i) * 2;
                        if (aux > 9) aux -= 9;
                        total += aux;
                        } else {
                        total += parseInt(cad.charAt(i)); // parseInt o concatenará en lugar de sumar
                        }
                    }
                    total = total % 10 ? 10 - total % 10 : 0;

                    if (cad.charAt(longitud-1) == total) {
                      
                    }else{
                        event.preventDefault();
                                
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "bottom-left",
                            width:"350px",
                            timer: 3000,
                            timerProgressBar: true,
                            showConfirmButton: false,
                            background:"#df4759",
                        });
                        Toast.fire({
                            title: '<span style="color:#ffffff">La cédula no es válida<span>'
                        })
                    }
                }else{
                    event.preventDefault();
                                
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "bottom-left",
                            width:"350px",
                            timer: 3000,
                            timerProgressBar: true,
                            showConfirmButton: false,
                            background:"#df4759",
                        });
                        Toast.fire({
                            title: '<span style="color:#ffffff">La cédula no es válida<span>'
                        })

                }                    
            }else 
            if(longitud == 13 )
                {
                    var controlador=1;
                    var valor = 0;
                    valor =  valor + ((cad.substr(0,1)) * 4);
                   
                    valor =  valor + ((cad.substr(1,1)) * 3);
                      
                    valor =  valor + ((cad.substr(2,1)) * 2);
                              
          
                    valor =  valor + ((cad.substr(3,1)) * 7);
                                   
                    valor =  valor + ((cad.substr(4,1)) * 6);
                   
                    valor =  valor + ((cad.substr(5,1)) * 5);
                                               
                    valor =  valor + ((cad.substr(6,1)) * 4);
                                     
                    valor =  valor + ((cad.substr(7,1)) * 3);
                                     
                    valor =  valor + ((cad.substr(8,1)) * 2);

                    valor = 11 - ((valor % 11) == 0 ?  11 : (valor % 11));

                    if (valor == (cad.substr(9,1)) && (cad.substr(10,3)) == "001"){
                        controlador = 2;
                    }else{
                        valor = 0;
                        valor = valor + cad.substr(0,1) * 3;
                        valor = valor + cad.substr(1,1) * 2;
                        valor = valor + cad.substr(2,1) * 7;
                        valor = valor + cad.substr(3,1) * 6;
                        valor = valor + cad.substr(4,1) * 5;
                        valor = valor + cad.substr(5,1) * 4;
                        valor = valor + cad.substr(6,1) * 3;
                        valor = valor + cad.substr(7,1) * 2;
                        valor = 11 - ((valor % 11) == 0 ?  11 :  (valor % 11));

                        if (valor == (cad.substr(8,1)) && (cad.substr(9,4)) == "0001"){
                            controlador = 2;
                        }else
                        {
                            valor = 0;
                            valor = valor + (cad.substr(0,1) * 2 > 9 ? ((cad.substr(0,1)) * 2) - 9 : (cad.substr(0,1)) * 2);
                            valor = valor + (cad.substr(1,1) * 1 > 9 ? ((cad.substr(1,1)) * 1) - 9 : (cad.substr(1,1)) * 1);
                            valor = valor + (cad.substr(2,1) * 2 > 9 ? ((cad.substr(2,1)) * 2) - 9 : (cad.substr(2,1)) * 2);
                            valor = valor + (cad.substr(3,1) * 1 > 9 ? ((cad.substr(3,1)) * 1) - 9 : (cad.substr(3,1)) * 1);
                            valor = valor + (cad.substr(4,1) * 2 > 9 ? ((cad.substr(4,1)) * 2) - 9 : (cad.substr(4,1)) * 2);
                            valor = valor + (cad.substr(5,1) * 1 > 9 ? ((cad.substr(5,1)) * 1) - 9 : (cad.substr(5,1)) * 1);
                            valor = valor + (cad.substr(6,1) * 2 > 9 ? ((cad.substr(6,1)) * 2) - 9 : (cad.substr(6,1)) * 2);
                            valor = valor + (cad.substr(7,1) * 1 > 9 ? ((cad.substr(7,1)) * 1) - 9 : (cad.substr(7,1)) * 1);
                            valor = valor + (cad.substr(8,1) * 2 > 9 ? ((cad.substr(8,1)) * 2) - 9 : (cad.substr(8,1)) * 2);
                            valor = 10 - ((valor % 10) == 0 ?  10 : (valor % 10))
                            if (valor == (cad.substr(9,1)) && (cad.substr(10,3)) == "001"){
                                controlador = 2;
                            }else{

                                event.preventDefault();
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: "bottom-left",
                                    width:"350px",
                                    timer: 3000,
                                    timerProgressBar: true,
                                    showConfirmButton: false,
                                    background:"#df4759",
                                });
                                Toast.fire({
                                    title: '<span style="color:#ffffff"> El RUC no es válido<span>'
                                })
        
                            }
                        }
                    }
                
                }else
                {
                    event.preventDefault();
                    const Toast = Swal.mixin({
                    toast: true,
                    position: "bottom-left",
                    width:"350px",
                    timer: 3000,
                    timerProgressBar: true,
                    showConfirmButton: false,
                    background:"#df4759",
                    });
                    Toast.fire({
                        title: '<span style="color:#ffffff"> Ingrese una cédula o RUC válida <span>'
                    })

                }

              

                
            /* var cedula = document.getElementById("inputCedula").value.trim()
          
            if (typeof(cedula) == 'string' && cedula.length == 10 && /^\d+$/.test(cedula)) 
            {
                var digitos = cedula.split('').map(Number);
                var codigo_provincia = digitos[0] * 10 + digitos[1];
                               
                if (codigo_provincia >= 1 && (codigo_provincia <= 24 || codigo_provincia == 30)) 
                {
                    var digito_verificador = digitos.pop();
                
                    var digito_calculado = digitos.reduce(
                    function (valorPrevio, valorActual, indice) 
                    {
                        return valorPrevio - (valorActual * (2 - indice % 2)) % 9 - (valorActual == 9) * 9;
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "bottom-left",
                            width:"350px",
                            timer: 3000,
                            timerProgressBar: true,
                            showConfirmButton: false,
                            background:"#df4759",
                        });
                        Toast.fire({
                            title: '<span style="color:#ffffff">La cédula no es válida<span>'
                        })
                        event.preventDefault();
                        
                    }, 1000) % 10;
                    return digito_calculado === digito_verificador;
                        
                }
               
                const Toast = Swal.mixin({
                    toast: true,
                    position: "bottom-left",
                    width:"350px",
                    timer: 3000,
                    timerProgressBar: true,
                    showConfirmButton: false,
                    background:"#df4759",
                });
                Toast.fire({
                    title: '<span style="color:#ffffff">La cédula no es válida<span>'
                })
                event.preventDefault();
                
            }
            const Toast = Swal.mixin({
                    toast: true,
                    position: "bottom-left",
                    width:"350px",
                    timer: 3000,
                    timerProgressBar: true,
                    showConfirmButton: false,
                    background:"#df4759",
            });
            Toast.fire({
                title: '<span style="color:#ffffff">La cédula no es válida<span>'
            })
            event.preventDefault(); */
        });
  
    </script>
@endsection
