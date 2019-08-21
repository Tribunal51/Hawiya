<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet" type="text/css">
    
    <!-- Style for Slider -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vue-slider-component@latest/theme/default.css">

    {{-- <!-- Style for Vuetify -->
    <link id="vuetify-style" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/vuetify/1.3.7/vuetify.min.css" disabled> --}}
 
</head>
<body>
    <div id="app">
        
        {{-- <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container"> --}}
            {{-- <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div> --}}
        
            {{-- </div>
        </nav> --}} 
        <navbar>
            @guest
                <li class="nav-item navItem">
                    
                    <a class="nav-item navItem" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                        
                    <li class="nav-item navItem">
                        <a class="nav-item navItem" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown navItem">
                    <a id="navbarDropdown" class="nav-item dropdown-toggle navItem" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img src="/storage/icons/yellow-logo.png" class="hawiyaUserIcon" />{{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div id="userStatusSection" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                        <a class="nav-item dropdown-item navItem" href="{{ route('home') }}">
                                {{ __('Dashboard') }}
                        </a>
                        @if(Auth::user()->admin)
                            <a class="nav-item dropdown-item navItem" href="/dashboard">
                                    {{ __('Admin Dashboard') }}
                            </a>
                        @endif
                        <a class="nav-item dropdown-item navItem" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </navbar>
        <main>
            @yield('content')            
        </main>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(function() {
            window.images = [];
            window.files = [];
            $('#my_files').on('change', function() {
                imagesPreview(this, 'div.gallery');
                
            });

            
            function dataURLtoBlob() {
                console.log('Inside dataURLtoBlob');
                var arr = dataurl.split(',');
                var mime = arr[0].match(/:(.*?);/)[1];
                var bstr = atob(arr[1]);
                var n = bstr.length;
                var u8arr = new Uint8Array(n);
                
                while(n--) {
                    u8arr[n] = bstr.charCodeAt(n);
                }
                return new Blob([u8arr], {type:mime});
            }
            
            function getBase64(file) {
                var reader = new FileReader();
                var convertedFile = '';
                reader.readAsDataURL(file);
                reader.onload = function() {
                    convertedFile = reader.result;
                    //console.log(reader.result);
                    window.files.push(reader.result);
                    //window.files.push(reader.result);
                };
                reader.onerror = function(error) {
                    
                    console.log("Error: ", error);
                };                               
                 //return convertedFile;

            }
           

            // Multiple images preview in browser
           
            function imagesPreview(input, placeToInsertImagePreview) {
            // var imagesPreview = function(input, placeToInsertImagePreview) {

                if (input.files) {   
                                    
                    var filesAmount = input.files.length;
                    console.log('Input Files', input.files);

                    window.images = input.files;
                    
                    Array.from(window.images).forEach(file => {
                        getBase64(file);
                    });
                    console.log('Window.files', window.files);
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {
                            $($.parseHTML('<img style="width: 100px; height: 100px">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                        }

                        reader.readAsDataURL(input.files[i]);
                        // console.log(input.files[i]);
                        

                        
                        

                    }
                }

            };

            
        });
    </script>
    <style scoped>
        .hawiyaUserIcon {
            width: 20px;
            height: 20px;
            margin: 5px;
        }
    </style>
</body>
</html>
