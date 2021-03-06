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
    <script src="https://apis.google.com/js/platform.js" defer></script>
    <meta name="google-signin-client_id" content={{ config('services.google.client_id')}}>

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
        
    @stack('head')
</head>
<body>
    {{-- <div id="react">

    </div> --}}
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
        <navbar lang={{session('locale') ? session('locale') : 'en'}}>
            {{-- @guest
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
            @endguest --}}
            <template v-slot:navbar>
                @guest                  
                    <a class="newItem" href="{{ route('login') }}">{{ __('Login') }}</a>
                    
                    @if (Route::has('register'))
                            
                        
                        <a class="newItem" href="{{ route('register') }}">{{ __('Register') }}</a>
                    
                    @endif
                @else
                    <div class="dropdown">
                        <a id="navbarDropdown" class="dropdown-toggle newItem navUsernameSection" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img src="/storage/icons/yellow-logo.png" class="hawiyaUserIcon" />{{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div id="userStatusSection" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item alignLang" href="{{ route('home') }}">
                                    {{ __('Dashboard') }}
                            </a>
                            @if(Auth::user()->admin)
                                <a class="dropdown-item alignLang" href="/dashboard/admin">
                                        {{ __('Admin Dashboard') }}
                                </a>
                            @endif
                            @if(Auth::user()->designer)
                                <a class="dropdown-item alignlang" href="/dashboard/designer">
                                    {{ __('Designer Dashboard') }}
                                </a> 
                            @endif 
                            @if(Auth::user()->printing_admin)
                                <a class="dropdown-item alignLang" href="/dashboard/printing">
                                    {{ __('Printing Dashboard') }}
                                </a> 
                            @endif 
                            @if(Auth::user()->store_admin)
                                <a class="dropdown-item alignLang" href="/dashboard/store">
                                    {{ __('Store Dashboard') }}
                                </a> 
                            @endif 
                            @if(Auth::user()->sales_admin)
                                <a class="dropdown-item alignLang" href="/dashboard/sales">
                                    {{ __('Sales Dashboard') }}
                                </a> 
                            @endif 
                            <a class="dropdown-item alignLang" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endguest
            </template>

            <template v-slot:drawer>
                @guest   
                    <v-list-tile>    
                        <v-list-tile-action>           
                            <a class="drawerItem" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </v-list-tile-action>
                    </v-list-tile>
                    @if (Route::has('register'))    
                        <v-list-tile>
                            <v-list-tile-action>
                                <a class="drawerItem" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </v-list-tile-action>
                        </v-list-tile>
                    @endif
                @else
                    <v-list-tile>
                        <v-list-tile-action>
                            <div class="dropdown">
                                <a id="navbarDropdown" class="dropdown-toggle drawerItem navUsernameSection" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="/storage/icons/yellow-logo.png" class="hawiyaUserIcon" />{{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div id="userStatusSection" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('home') }}">
                                            {{ __('Dashboard') }}
                                    </a>
                                    @if(Auth::user()->admin)
                                        <a class="dropdown-item alignLang" href="/dashboard/admin">
                                                 {{ __('Admin Dashboard') }}
                                        </a>
                                    @endif
                                    @if(Auth::user()->designer)
                                        <a class="dropdown-item alignLang" href="/dashboard/designer">
                                            {{ __('Designer Dashboard') }}
                                        </a> 
                                    @endif 
                                    @if(Auth::user()->printing_admin)
                                        <a class="dropdown-item alignLang" href="/dashboard/printing">
                                            {{ __('Printing Dashboard') }}
                                        </a> 
                                    @endif 
                                    @if(Auth::user()->store_admin)
                                        <a class="dropdown-item alignLang" href="/dashboard/store">
                                            {{ __('Store Dashboard') }}
                                        </a> 
                                    @endif 
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                         {{ __('Logout') }}
                                    </a>
                                    

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </v-list-tile-action>
                    </v-list-tile>
                @endguest
            </template>
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
                imagesPreview(this, 'div.gallery', 'multiple');
                
            });

            $('#my_file').on('change', function() {
                imagesPreview(this, 'div.gallery', 'single')
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
           
            function imagesPreview(input, placeToInsertImagePreview, file_count) {
            // var imagesPreview = function(input, placeToInsertImagePreview) {
                console.log('Inside');
                if(input.files.length !== window.images.length) {
                    $(placeToInsertImagePreview).empty();
                }

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
                            // $($.parseHTML('<img style="width: 100px; height: 100px">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                            console.log('file_count', file_count, placeToInsertImagePreview);
                            switch(file_count) {
                                case 'single': 
                                    console.log('single', $(placeToInsertImagePreview));
                                    $(placeToInsertImagePreview).empty();
                                    $($.parseHTML('<img class="small-img" />')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                                break; 

                                case 'multiple':
                                    console.log('multiple');
                                    $($.parseHTML('<img class="small-img" />')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                                break; 

                                default: $($.parseHTML('<img class="small-img"')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);

                            }
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
            /* margin: 3px; */
            margin-right: 3px;
        }

        .newItem {
            text-decoration: none;
            font-size: 0.7rem;
            margin: 1rem;
            color: #333;
            /* background-color: red; */
        }

        .newItem:hover {
            color: black;
            cursor: pointer;
            text-decoration: none;
        }

        .navUsernameSection {
            display: flex;
            align-items: center;
            /* background-color: green; */
        }

        .drawerItem {
            color: #333;
            text-decoration: none;
            cursor: pointer;
            
            /* margin: 1rem; */
        }
        

        .drawerItem:hover {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .small-img {
            max-height: 200px;
            max-width: 200px;
            width: auto;
        }

        html[dir="ltr"] .alignLang {
            text-align: left;
        }

        html[dir="rtl"] .alingLang {
            text-align: right;
        }

        html[dir="ltr"] .alignLangOpposite {
            text-align: right;
        }

        html[dir="rtl"] .alignLangOpposite {
            text-align: left;
        }

        @media(max-width: 767px) {

            html[dir="ltr"] .alignLangOpposite {
                text-align: left;
            }

            html[dir="rtl"] .alignLangOpposite {
                text-align: right;
            }
        }


        table {
            /* table-layout: fixed; */
        }

        th, td {
            /* border-style: solid; */
            /* border-width: 5px; */
            /* border-color: #BCBCBC */
            /* word-wrap: break-word; */
        }
    </style>
</body>
</html>
