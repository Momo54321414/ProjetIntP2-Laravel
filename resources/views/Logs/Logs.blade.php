<?php
use Carbon\Carbon;
?>
<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Logs') }}
        </h2>
    </header>

    <div class="overflow-y-scroll max-h-64">
        @if ($logs->isEmpty())
            <div class="text-gray-500 text-center">
                {{ __('Logs_Empty') }}
            </div>
        @else
            @foreach ($logs as $log)
                <div class=" w-full max-w-md flex flex-col">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="text-md font-bold"> {{ $log->noSerie }}</div>

                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="text-gray-500 hover:text-gray-300 cursor-pointer">

                            </div>
                            <div class="mt-4 text-gray-500 font-bold text-sm">    
                                {{Carbon::create ($log->actionTimestamp)->format(' F j Y h:i A');}}
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 text-gray-500 font-bold text-sm">
                        {{ $log->action }}
                    </div>
                    <br>
                    <hr>
                    <br>
                </div>
            @endforeach
        @endif

    </div>






</section>
