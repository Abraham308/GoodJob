<!DOCTYPE html>
<html lang="en">
<head>
    @section('head')
        <meta charset="UTF-8">
        <title>@yield('title')</title>
        <link href="{{ asset('css/index.css') }}" rel="stylesheet" type="text/css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @show
</head>
<body>
<header>
    @section('header')
        <a href="{{route('indexemployer')}}" style="text-decoration: none">
            <div class="logo" >
                <span class="logo-black">Good</span><span class="logo-red">Job</span>
            </div>
        </a>
        <form class="search" method="get" action="{{route('searchh')}}">
            <input type="text" placeholder="Найдите именно того, кто вам подходит" name="search">
            <button type="submit">Найти</button>
        </form>
        @if(Auth::guard('employers')->user())
            <div class="user-info">
                <span>{{Auth::guard('employers')->user()->name}}</span>
                <a href="{{route('add-vac')}}" style="text-decoration:none;">Добавить вакансию</a>
                <a href="{{route('rabprofile-page')}}" class="user-profile" style="text-decoration: none">Мой профиль</a>
                <a href="{{route('rablogout')}}" class="user-logout" style="text-decoration: none">Выход</a>
            </div>
        @else
            <div class="buttons">
                <a href="{{route('rab-page')}}" style="text-decoration: none">Работодателю</a>
                <a href="{{route('login-page')}}" style="text-decoration: none" class="login">Вход</a>
                <a href="{{route('signup-page')}}" class="register" style="text-decoration: none">Регистрация</a>
            </div>
        @endif
    @show
</header>

<main>
    @yield('page-content')
</main>

<footer>
    @section('footer')
        <div class="footer">
            <div class="row">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-youtube"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
            </div>
            <div class="row">
                College "Tsarytsino" Copyright © 2023 College "Tsarytsino" All rights reserved || Designed By: Abraham
            </div>
        </div>
    @show
</footer>
</body>
</html>
