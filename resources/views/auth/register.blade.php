@extends('layouts.auth')

@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">{{ __('Register') }}</h1>
                                </div>

                                @if ($errors->any())
                                    <div class="alert alert-danger border-left-danger" role="alert">
                                        <ul class="pl-4 my-2">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('register') }}" class="user">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="name" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="last_name" placeholder="{{ __('Last Name') }}" value="{{ old('last_name') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required>
                                    </div>
                                    <div class="form-group">
                                    <select name ="state_id" id="iller-dd" class="form-control form-control-user" >
                                            <option value="Internet Explorer">Internet Explorer</option>
                                            <option value="Chrome">Chrome</option>
                                    </select>
                                    </div>
                                    <div class="form-group">
                                        <input  autocomplete="off" role="combobox" list="" id="input" name="browsers" placeholder="Select your fav browser">
                                        <datalist id="browsers" role="listbox" >
                                            <option value="Internet Explorer">Internet Explorer</option>
                                            <option value="Chrome">Chrome</option>
                                            <option value="Safari">Safari</option>
                                            <option value="Microsoft Edge">Microsoft Edge</option>
                                            <option value="Firefox">Firefox</option><option value="Microsoft Edge">Microsoft Edge</option>
                                        </datalist>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="school_id" placeholder="{{ __('Okul IDsini yazın') }}" value="{{ old('okul_id') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="school_id" placeholder="{{ __('Okul IDsini yazın') }}" value="{{ old('okul_id') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password" placeholder="{{ __('Password') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </form>

                                <hr>

                                <div class="text-center">
                                    <a class="small" href="{{ route('login') }}">
                                        {{ __('Already have an account? Login!') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script type="text/javascript">
        input.onfocus = function () {
        browsers.style.display = 'block';
        input.style.borderRadius = "5px 5px 0 0";
        };
        for (let option of browsers.options) {
        option.onclick = function () {
        input.value = option.value;
        browsers.style.display = 'none';
        input.style.borderRadius = "5px";
        }
        };

        input.oninput = function() {
        currentFocus = -1;
        var text = input.value.toUpperCase();
        for (let option of browsers.options) {
        if(option.value.toUpperCase().indexOf(text) > -1){
            option.style.display = "block";
        }else{
            option.style.display = "none";
        }
        };
        }
        var currentFocus = -1;
        input.onkeydown = function(e) {
            if(e.keyCode == 40){
                currentFocus++
                addActive(browsers.options);
            }
            else if(e.keyCode == 38){
                currentFocus--
                addActive(browsers.options);
            }
            else if(e.keyCode == 13){
                e.preventDefault();
                if (currentFocus > -1) {
                    /*and simulate a click on the "active" item:*/
                    if (browsers.options) browsers.options[currentFocus].click();
                }
            }
        }

        function addActive(x) {
            if (!x) return false;
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            x[currentFocus].classList.add("active");
        }
        function removeActive(x) {
            for (var i = 0; i < x.length; i++) {
                x[i].classList.remove("active");
            }
        }</script>
@endsection
