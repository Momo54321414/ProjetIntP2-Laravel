<!DOCTYPE html><html lang="en"><head><title>@yield('title')</title><link rel="stylesheet" href="{{asset('style.css')}}"><meta charset="UTF-8" http-equiv="X-UA-Compatible" name="viewport" content="width=device-width, initial-scale=1.0"></head><body>

<nav>
    <img id="logo" src="{{asset('img/logo_crop.svg')}}">
    <a href="{{route('dashboard')}}">Dashboard</a>
    <a href="{{route('doc')}}" style="{{Request::is('doc') ? 'border-bottom: 2px solid #4F46E5' : ''}}">Documentation</a>
</nav>

@yield('content')

</body></html>