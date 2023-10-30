<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/scss/main.scss', 'resources/scss/nav.scss', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <header>
            <nav class="navbar" id="navbar">
                <div class="logo">
                   <a href="/"><img src="{{asset('images/logo.png')}}" alt=""></span></a>
                </div>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="#about">About Us</a> </li>
                    <li><a href="#courses">Our Courses</a></li>
                    <li><a href="#courses">Events</a></li>
                    <li><a href="#contact-us">Contact Us</a></li>
                    <li><a href="/gallery.html">Gallery</a></li><br>
                </ul> 
                <div class="nav-cta">
                    <a href=""><button>
                        <span>Shop now</span>
                        <svg width="34" height="34" viewBox="0 0 74 74" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="37" cy="37" r="35.5" stroke="#FFCE63" stroke-width="4"></circle>
                            <path d="M25 35.5C24.1716 35.5 23.5 36.1716 23.5 37C23.5 37.8284 24.1716 38.5 25 38.5V35.5ZM49.0607 38.0607C49.6464 37.4749 49.6464 36.5251 49.0607 35.9393L39.5147 26.3934C38.9289 25.8076 37.9792 25.8076 37.3934 26.3934C36.8076 26.9792 36.8076 27.9289 37.3934 28.5147L45.8787 37L37.3934 45.4853C36.8076 46.0711 36.8076 47.0208 37.3934 47.6066C37.9792 48.1924 38.9289 48.1924 39.5147 47.6066L49.0607 38.0607ZM25 38.5L48 38.5V35.5L25 35.5V38.5Z" fill="#F2F7FF"></path>
                        </svg>
                    </button></a>
                </div>
                <div class="menu-btn">
                    <div class="menu-btn_burger"></div>
                </div>
            </nav>
        
            <nav class="side-navbar" id="side-navbar">
                <ul>
                    <li><a href="#about">About Us</a> </li>
                    <li><a href="#team">Our Team</a> </li>
                    <li><a href="#services">Our Services</a> </li>
                    <li><a href="#clients">Our Clients</a> </li>
                    <li><a href="#contact-us">Contact Us</a> </li><br>
                </ul>
                <div class="nav-cta">
                    <a href=""><button>
                        <span>Shop now</span>
                        <svg width="34" height="34" viewBox="0 0 74 74" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="37" cy="37" r="35.5" stroke="#FFCE63" stroke-width="4"></circle>
                            <path d="M25 35.5C24.1716 35.5 23.5 36.1716 23.5 37C23.5 37.8284 24.1716 38.5 25 38.5V35.5ZM49.0607 38.0607C49.6464 37.4749 49.6464 36.5251 49.0607 35.9393L39.5147 26.3934C38.9289 25.8076 37.9792 25.8076 37.3934 26.3934C36.8076 26.9792 36.8076 27.9289 37.3934 28.5147L45.8787 37L37.3934 45.4853C36.8076 46.0711 36.8076 47.0208 37.3934 47.6066C37.9792 48.1924 38.9289 48.1924 39.5147 47.6066L49.0607 38.0607ZM25 38.5L48 38.5V35.5L25 35.5V38.5Z" fill="#10316B"></path>
                        </svg>
                    </button></a>
                </div>
            </nav>
            @vite(['resources/js/nav.js'])
        </header>

        {{ $slot }}

        <footer>
            <h3>&copy 2023 tripletap.com ALL RIGHTS RESERVED</h3>
            <h3>Terms & Conditions</h3>
            <h3>Our Policies</h3>
        </footer>

    </body>
</html>
