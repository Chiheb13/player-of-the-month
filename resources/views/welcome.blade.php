<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layouts.dashboard.header')
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>acceuil</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        

        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-image: url("/vendors/images/backgoundacceuilpage.jpeg");
                background-size: cover;
                background-position: center;
                }
    .custom-navbar {
        max-height: 55px; /* Set your desired width */
    }
</style>
            
        </style>
    </head>
    <body class="antialiased ">
        <nav class=" custom-navbar navbar navbar-expand-md " style="background-color: rgba(0, 0, 0, 0.3); border-color: rgba(0, 0, 0, 0.3);">
        
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class=" btn btn-success text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class=" btn btn-success text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class=" btn btn-success ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                    
                    <img src="{{ asset('vendors/images/logocompitition.png') }}" 
                        class="brand-image img-circle elevation-3"
                        style="position: absolute; top: 2px; right: 100px; height: 50px; width: 50px; border-radius: 50%;" 
                        alt="">
                </div>
            @endif

        
        </nav><br><br>
        <center><a class="h1" style="color:black;font-size:70px;" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a></center>
    </body>
</html>
