<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CHANEL SHOP</title>
    <link rel="icon" href="{{url('/img/logo.jpg')}}" type="image/gif" sizes="16x16">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="/css/style.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="{{url('themify-icons-font/themify-icons/themify-icons.css')}}">
    {{-- <link rel="stylesheet" href="{{url("/assets/login.css")}}> --}}
    @stack('login')
    @stack('register')
    @stack('profile')
    @stack('cssSelect')
    @stack('cssProductIndex')
    @stack('detail')
    @stack('cart')


</head>

<body>

    {{-- Header --}}
    @include('layouts.app._header')
    {{-- End header --}}

    @yield('content')

    {{-- Footer --}}


    @include('layouts.app._footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @stack('js')
</body>

</html>
