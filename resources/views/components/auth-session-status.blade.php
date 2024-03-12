@props(['status'])

@php

switch($status){
case 'status':
$bg = 'bg-green-100';
$border = 'border-green-400';
$text = 'text-green-700';
$icon = 'text-green-500';
break;
case 'error':
$bg = 'bg-red-100';
$border = 'border-red-400';
$text = 'text-red-700';
$icon = 'text-red-500';
break;
case 'warning':
$bg = 'bg-yellow-100';
$border = 'border-yellow-400';
$text = 'text-yellow-700';
$icon = 'text-yellow-500';
break;
default:
$bg = 'bg-teal-100';
$border = 'border-teal-500';
$text = 'text-teal-700';
$icon = 'text-teal-500';
break;

}
@endphp



@if ($status)
    {{-- <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
    <span {{ $attributes->merge(['class' => 'font-medium text-sm text-black-500 dark:text-white-400']) }}>
        {{ $status }}
    </span>
</div> --}}

    <div class="  {{$bg}} border-t-4 {{$border}} rounded-b {{$text}} px-4 py-3 shadow-md  " role="alert">
        <div class="py-1">
            <svg class="fill-current h-6 w-6 {{$icon}} mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path
                    d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
            </svg>
        </div>
        <div>
            <p class="font-bold">{{ __('Information') }}</p>
            <p class="text-sm"> {{ $status }}</p>

        </div>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 " role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path
                    d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
            </svg>
        </span>

    </div>
@endif
