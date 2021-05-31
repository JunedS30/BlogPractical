<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

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
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
        @extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center mb-5">
        <h2 class="display-20 display-md-18 display-lg-16">Site Blogs</h2>
    </div>
    <a href="{{ route('home')}}" class="btn btn-success">Dashboard</a>
    <div class="row">
    @foreach($blogs as $blogs_data)
        <div class="col-lg-4 col-md-6 mb-2-6">
            <article class="card card-style2">
                <div class="card-img">
                    <img class="rounded-top" src="https://via.placeholder.com/350x280/6A5ACD/000000" alt="...">
                    <?php /* <img class="rounded-top" src="{{asset('/blog/'.$blogs_data->image)}}" alt="..."> */ ?>
                    <div class="date">{{$blogs_data->start_Date}}</div>
                </div>
                <div class="card-body">
                    <h3 class="h5"><a href="#!">{{ $blogs_data->blog_Name }}</a></h3>
                    <p class="display-30">{{ $blogs_data->blog_Description }}</p>
                    <a href="#!" class="read-more">read more</a>
                </div>
            </article>
        </div>
    @endforeach
    </div>
</div>
@endsection
    </body>
</html>
