<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/dashboard') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                            <div class="title m-b-md">
                                    Heart
                                    <svg class="heart" viewBox="0 0 32 29.6">
                                    <path d="M23.6,0c-3.4,0-6.3,2.7-7.6,5.6C14.7,2.7,11.8,0,8.4,0C3.8,0,0,3.8,0,8.4c0,9.4,9.5,11.9,16,21.2
                                        c6.1-9.3,16-12.1,16-21.2C32,3.8,28.2,0,23.6,0z"/>
                                    </svg>
                                    Palpitation
                                </div>

                                <div class="d-flex justify-content-center">
                                    <div class="col-md-8">
                                        <h3>
                                            We love it and so should you!
                                        </h3>
                                        <p>
                                            We are feinds of everything caffeine here at Palpitation Inc and in our persuite to drink the most amount, we have found out that magical things happen after 500Mg of unadulterated caffeine pulsing through our vains.
                                        </p>
                                        <p>Click on <a href="/register">register</a> to create an account or visit <a href="/login">login</a> to use the test user!</p>
                                    </div>
                                </div>


                                <div class="links"style="margin-top:2em; margin-bottom:2em">
                                    <a href="/">Homepage</a>
                                    <a href="/dashboard">Dashboard</a>
                                    <a href="https://github.com/cydiasa/palpitation">Sourcecode</a>
                                    <a href="/login">Login</a>
                                    <a href="/register">Register</a>
                                </div>

                                <img src="https://media.giphy.com/media/oZEBLugoTthxS/giphy.gif" alt="Palpitation" />


                                <div class="links" style="margin-top:2em">
                                     Created by Shawn Azar for MJFreeway
                                </div>
                            </div>
                        </div>
                    </body>
                </html>
