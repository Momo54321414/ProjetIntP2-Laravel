<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Alerts log') }}
        </h2>
    </header>

        @if ($alerts->isEmpty())
            <div class="text-gray-500 text-center">
                {{ __('No alerts to show yet') }}
            </div>
        @else
            @foreach ($alerts as $alert)
                <div class=" w-full max-w-md flex flex-col">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="text-md font-bold"> {{ $alert->medicationName }}</div>
                            <div class="text-gray-500 font-bold text-sm"> {{ $alert->id }} </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="text-gray-500 hover:text-gray-300 cursor-pointer">

                            </div>
                            <div class="mt-4 text-gray-500 font-bold text-sm">
                                <div>Status:</div>
                                @if($alert->isTheMedicationTaken == 0)
                                    <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                                @else
                                    <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                    @endif
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 text-gray-500 font-bold text-sm">
                        {{ $alert->dateOfIntake }} {{ $alert->hourOfIntake }}
                    </div>
                    <div class="mt-5">
                       

                        @if($alert->isTheMedicationTaken == 0 )
                        @if ($alert->dateOfIntake == date('Y-m-d'))
                            
                        
                        <a>
                        <form action="{{ route('alerts.update', $alert->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="isTheMedicationTaken" value="1">
                            <x-primary-button>Take now</x-primary-button>
                        </form>
                        </a>
                        @endif
                        @endif
                    </div>
                    <br>
                    <hr>
                    <br>
                </div>
            @endforeach
        @endif

</section>
