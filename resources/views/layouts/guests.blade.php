<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="stylesheet" href="main.css">
        <link rel="stylesheet" href="nav.css">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/scss/main.css', 'resources/scss/nav.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <header>
            <nav class="navbar" id="navbar">
                <div class="logo">
                   <a href="/"><img src="/logo4.jpg" alt=""></span></a>
                </div>
                <ul>
                    <li><a href="#about">About Us</a> </li>
                    <li><a href="#courses">Our Courses</a></li>
                    <li><a href="#contact-us">Contact Us</a></li>
                    <li><a href="/gallery.html">Gallery</a></li><br>
                </ul> 
                <div class="nav-cta">
                    <a href="">Subscribe</a>
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
