<!doctype html>
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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/styles/css/themes/lite-purple.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/common-bundle-script.js')}}"></script>

    <script src="{{asset('assets/js/script.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
     

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <span class="logo">LC</span> Learncode
                    {{-- <img src="{{asset('assets/images/logo.png')}}" height="50px" alt=""> --}}
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                </a>
            
                      
                       <!-- Authentication Links -->
                       @guest
                      
                       <div >
                        <button class="btn btn-light " type="button" >
                            <a style="color: black" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </button>
                     
                       @if (Route::has('register'))
                         
                            <button class="btn btn-light " type="button" >

                               <a style="color: black"  href="{{ route('register') }}">{{ __('Register') }}</a>

                            </button>
                  
                       @endif
                       </div>
                        
                   @else
                  
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <form class="form-inline my-2 my-lg-0 search-form">
                            <input placeholder="find your course..." class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        </form>
                      <ul class="navbar-nav">
                        <li class="nav-item active">
                          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Tracks</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="/course/{slug}">Courses</a>
                        </li>
                       
                      </ul>
                    </div>
                
                   <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdown"> 
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                </form>
                                
                            </li>
                            <li>
                                <a class="dropdown-item" href="#"> {{ __('My Profile') }}</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#"> {{ __('My Courses') }}</a>
                            </li>
                        </ul>  
                   </div> 
                   @endguest
                   
            </div>
        </nav>

        <main class="py-0">
            
            @yield('content')
            @include('includes.footer')
        </main>
    </div>
</body>
</html>
