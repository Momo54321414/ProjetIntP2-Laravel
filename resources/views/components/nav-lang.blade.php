<div>
@php
    $currentRoute = \Illuminate\Support\Facades\Route::current();
    $currentRouteName = $currentRoute->getName();
    $currentRouteParameters = $currentRoute->parameters;
@endphp
@foreach (config('app.available_locales') as $locale)
    <x-nav-link  href="{{ route($currentRouteName, array_merge($currentRouteParameters, ['locale' => $locale])) }}" :active="app()->getLocale() == $locale">
        {{ strtoupper($locale) }}
    </x-nav-link>
@endforeach
</div>