@extends('layouts.app')

@section('content')
<div class="container mt-4 mb-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrati') }}</div>

                <div class="card-body">
                    <form method="POST" id="registrationForm" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')


                        <div class="mb-4 row justify-content-center">
                            <label for="firstName" class="col-md-4 col-form-label  form-label">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="firstName" type="text" class="form-control" name="firstName" value="{{ old('firstName') }}">
                                <span id="firstNameError" class="text-danger d-none">Inserisci il tuo nome correttamente</span>
                                {{-- @error('firstName')
                                    <span class='error'>
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        <div class="mb-4 row justify-content-center">
                            <label for="lastName" class="col-md-4 col-form-label  form-label">{{ __('Cognome') }}</label>

                            <div class="col-md-6">
                                <input id="lastName" type="text" class="form-control" name="lastName" value="{{ old('lastName') }}">
                                <span id="lastNameError" class="text-danger d-none">Inserisci il tuo cognome correttamente</span>

                                {{-- @error('lastName')
                                    <span class='error'>
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        <div class="mb-4 row justify-content-center">
                            <label for="email" class="col-md-4 col-form-label  form-label">{{ __('Indirizzo E-mail ') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email">
                                <span id="emailError" class="text-danger d-none">Inserisci la tua mail correttamente</span>
                            </div>
                        </div>

                        <div class="mb-4 row justify-content-center">
                            <label for="password" class="col-md-4 col-form-label  form-label">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">
                                <span id="passwordError" class="text-danger d-none">Inserisci una password piu' lunga di 8 caratteri</span>
                                @error('password')
                                    <span class='error'>
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row justify-content-center">
                            <label for="password-confirm" class="col-md-4 col-form-label  form-label">{{ __('Conferma Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                <span id="password-confirm-error" class="text-danger d-none">la password è errata</span>
                            </div>
                        </div>


                        <!-- input restaurant name -->
                        <div class="mb-4 row justify-content-center">
                            <label for="name" class="col-md-4 col-form-label  form-label" >Nome ristorante</label>

                            <div class="col-md-6">
                                <input type="text" name="name" id="nameRestaurant" class="form-control ">
                                <span id="nameRestaurantError" class="text-danger d-none">Inserisci il nome del ristorante correttamente</span>
                                @error('name')
                                    <span class='error'>
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- input restaurant adress -->
                        <div class="mb-4 row justify-content-center">
                            <label for="adress" class="col-md-4 col-form-label  form-label">{{__('Indirizzo Ristorante')}}</label>

                            <div class="col-md-6">
                                <input type="text" name="adress" id="adressRestaurant" class="form-control">
                                <span id="adressRestaurantError" class="text-danger d-none">Inserisci l'indirizzo del ristorante correttamente</span>
                                @error('adress')
                                    <span class='error'>
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- input restaurant logo -->
                        <div class="mb-4 row justify-content-center">
                            <label for="logo" class="col-md-4 col-form-label  form-label">{{__('Logo ristorante')}}</label>

                            <div class="col-md-6">
                                <input type="file" name="logo" id="logo" class="form-control" accept="image/png, image/svg">
                                <span id="logoError" class="text-danger d-none"></span>
                                @error('logo')
                                    <span class='error'>
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- input restaurant wallpaper -->
                        <div class="mb-4 row justify-content-center">
                            <label for="wallpaper" class="col-md-4 col-form-label  form-label">{{__('Wallpaper ristorante')}}</label>
                            <div class="col-md-6">
                                <input type="file" name="wallpaper" id="wallpaper" class="form-control" accept="image/png, image/svg">
                                <span id="wallpaperError" class="text-danger d-none"></span>
                                @error('wallpaper')
                                    <span class='error'>
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- input restaurant vat num -->
                        <div class="mb-4 row justify-content-center">
                            <label for="vat_num" class="col-md-4 col-form-label  form-label">{{__('P.iva ristorante')}}</label>
                            <div class="col-md-6">
                                <input type="number" name="vat_num" id="vat_num" class="form-control">
                                <span id="vat_num_error" class="text-danger d-none">Inserisci la partita iva correttamente</span>
                                @error('vat_num')
                                    <span class='error'>
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <!-- input for choose category -->
                        <div class="mb-4 row  justify-content-center">
                            <label for="category" class="col-md-4 col-form-label  form-label d-flex align-items-center">{{__('Categoria ristorante')}}</label>
                            <div class="col-md-6 d-flex justify-content-around flex-wrap p-1" style="min-height: 100px; gap: 5px;border: 1px solid #dee2e6; border-radius: 10px">
                                @foreach ($categories as $category)
                                    <div style="margin:5px">
                                        <input
                                            type="checkbox"
                                            name="category_id[]"
                                            id="{{ 'category_id_' . $category->id }}"
                                            value="{{ $category->id }}"
                                        >
                                        <label
                                            for="{{ 'category_id_' . $category->id }}">
                                            {{ $category->name }}
                                        </label>
                                    </div>
                                @endforeach
                                <span class="text-danger d-none" id="catError">Inserisci almeno una categoria</span>
                                @error('category_id')
                                    <span class='error'>
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- input for visibility --}}
                        <div class="mb-4 row justify-content-center">
                            <label class="col-md-4 col-form-label" for="visibility">Visibilità</label>
                            <div class="col-md-6">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Visibile
                                <input class="form-check-input mx-1" type="radio" name="visibility" value="1"><br>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Non visibile
                                <input class="form-check-input mx-1" type="radio" name="visibility" value="0"><br>
                                <span class="text-danger d-none" id="visError">Inserisci la Visibilità</span>
                                @error('visibility')
                                    <span class='error'>
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 w-100 mb-0">
                            <div class="d-flex justify-content-center">
                                <button type="submit" id="butSubmit" class="btn btn-primary">
                                    {{ __('Registrati') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Aggiungi un event listener per il click sul pulsante di registrazione
    document.getElementById('butSubmit').addEventListener('click', function (event) {
        // Evita il comportamento predefinito del pulsante di invio
        event.preventDefault();

        // Ottieni i valori dei campi del form
        var email = document.getElementById('email').value;
        var firstName = document.getElementById('firstName').value;
        var lastName = document.getElementById('lastName').value;
        var password = document.getElementById('password').value;
        var confPassword = document.getElementById('password-confirm').value;
        var nameRestaurant = document.getElementById('nameRestaurant').value;
        var adressRestaurant = document.getElementById('adressRestaurant').value;
        var logoInput = document.getElementById('logo');
        var wallpaperInput = document.getElementById('wallpaper');
        var partIva = document.getElementById('vat_num').value;
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        var radioButtons = document.querySelectorAll('input[type="radio"]');
        var logoError = document.getElementById('logoError');
        var wallpaperError = document.getElementById('wallpaperError');

        // Verifica del nome
        if (firstName.trim() === '' || firstName.trim().length > 255) {
            document.getElementById('firstNameError').classList.remove('d-none');
            return;
        }else{
            document.getElementById('firstNameError').classList.add('d-none');
        }

        //verifica del cognome
        if (lastName.trim() === '' || firstName.trim().length > 255) {
            document.getElementById('lastNameError').classList.remove('d-none');
            return;
        }else{
            document.getElementById('lastNameError').classList.add('d-none');
        }

        // Verifica dell'email
        if (!validateEmail(email) || email.length > 255) {
  
            document.getElementById('emailError').classList.remove('d-none');
            return;
        }else{
            document.getElementById('emailError').classList.add('d-none');
        }

        //verifica password
        if (password.length < 8) {
            document.getElementById('passwordError').classList.remove('d-none');
            return;
        }else{
            document.getElementById('passwordError').classList.add('d-none');
        }

        //verifica controllo password
        if (confPassword != password) {
            document.getElementById('password-confirm-error').classList.remove('d-none');
            return;
        }else{
            document.getElementById('password-confirm-error').classList.add('d-none');
        }


        //verifica nome ristorante
        if (nameRestaurant.trim() === '' || nameRestaurant.trim().length > 64) {
            document.getElementById('nameRestaurantError').classList.remove('d-none');
            return; 
        }else{
            document.getElementById('nameRestaurantError').classList.add('d-none');
        }


        //verifica indirizzo ristorante
        if (adressRestaurant.trim() === '' || adressRestaurant.trim().length > 128) {
            document.getElementById('adressRestaurantError').classList.remove('d-none');
            return;
        }else{
            document.getElementById('adressRestaurantError').classList.add('d-none');
        }

        //verifica inserimento logo
        if (logoInput.files.length > 0) {
            var logoFile = logoInput.files[0];
            console.log('ciaoo')
            
            if (logoFile && logoFile.size > 100 * 1024) {
                logoError.classList.remove('d-none');
                logoError.innerHTML = 'Il logo non deve essere più pesante di 100 KB';
                
                
                event.preventDefault();
                return;
            }else{
                logoError.innerHTML = 'Inserisci il logo';
                return;
            }
        }else{
            logoError.classList.add('d-none');
            return;
        }

        // Controlla il wallpaper del ristorante
        if (wallpaperInput.files.length > 0) {
            var wallpaperFile = wallpaperInput.files[0];
            

            if (wallpaperFile.size > 100 * 1024) { 
                wallpaperError.classList.remove('d-none');
                wallpaperError.innerHTML = 'Lo sfondo non deve essere più pesante di 100 KB';


                event.preventDefault();
                return;
            }else{
                wallpaperError.innerHTML = 'Inserisci uno sfondo';
                return;
            }
        }else{
            wallpaperError.classList.add('d-none');
            return;
        }


        //controllo partita iva
        if (partIva.trim() === '' || partIva.trim().length > 16) {
            document.getElementById('vat_num_error').classList.remove('d-none');
            return;
        }else{
            document.getElementById('vat_num_error').classList.add('d-none');
        }

        //controllo checkbox
        var atLeastOneCheckboxSelected = Array.from(checkboxes).some(function(checkbox) {
            return checkbox.checked;
        });
        if (!atLeastOneCheckboxSelected) {
            document.getElementById('catError').classList.remove('d-none');
            return; 
        }else{
            document.getElementById('catError').classList.add('d-none');
        }


        //controllo radio
        var isRadioButtonSelected = Array.from(radioButtons).some(function(radioButton) {
            return radioButton.checked;
        });
        if (!isRadioButtonSelected) {
            document.getElementById('visError').classList.remove('d-none');
            return;
        }else{
            document.getElementById('visError').classList.add('d-none');
        }


        // invio modulo
        document.getElementById('registrationForm').submit();
    });

    // Funzione per verificare se l'email è valida
    function validateEmail(email) {
       
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
});
</script>
@endsection
