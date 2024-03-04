<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Add prescription') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="mt-6 ">
                    <x-hrefbutton href="{{ route('profile.edit') }}" class="btn">
                        {{ __('Back') }}
                    </x-hrefbutton>
                    <form method="POST" action="{{ route('prescriptions.store') }}" class="p-6">
                        @csrf

                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Add prescription') }}
                        </h2>


                        <div class="mt-6">
                            <x-input-label for="nameOfPrescription" value="{{ __('PrescriptionName') }}" />

                            <x-text-input id="nameOfPrescription" name="nameOfPrescription" type="text"
                                class="mt-1 block w-3/4" placeholder="{{ __('Prescription') }}" />

                            <x-input-error :messages="$errors->get('nameOfPrescription')" class="mt-2" />
                        </div>

                        <div class="mt-6">
                            <x-input-label for="medication_id" value="{{ __('Medication') }}" />

                            <select name="medication_id" id="medication_id"
                                class="mt-1 block w-3/4 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                @foreach ($medications as $medication)
                                    <option value="{{ $medication->id }}">{{ $medication->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('medication_id')" class="mt-2" />
                        </div>

                        <div class="mt-6">
                            <x-input-label for="dateOfPrescription" value="{{ __('PrescriptionDate') }}" />

                            <x-text-input id="dateOfPrescription" name="dateOfPrescription" type="date"
                                class="mt-1 block w-3/4" min="{{ $minDate }}" max="{{ $maxDate }}" />

                            <x-input-error :messages="$errors->get('dateOfPrescription')" class="mt-2" />
                        </div>

                        <div class="mt-6">
                            <x-input-label for="dateOfStart" value="{{ __('PrescriptionDateOfStart') }}" />

                            <x-text-input id="dateOfStart" name="dateOfStart" type="date" class="mt-1 block w-3/4"
                                min="{{ $minDate }}" max="{{ $maxDateForStart }}" />

                            <x-input-error :messages="$errors->get('dateOfStart')" class="mt-2" />
                        </div>

                        <div class="mt-6">
                            <x-input-label for="durationOfPrescriptionInDays"
                                value="{{ __('Duration of the prescription in days') }}" />

                            <x-text-input id="durationOfPrescriptionInDays" name="durationOfPrescriptionInDays"
                                type="number" class="mt-1 block w-3/4" placeholder="{{ __(30) }}" />

                            <x-input-error :messages="$errors->get('durationOfPrescriptionInDays')" class="mt-2" />
                        </div>

                        <div class="mt-6">
                            <x-input-label for="frequencyBetweenDosesInHours"
                                value="{{ __('Frequency between hours') }}" />

                            <x-text-input id="frequencyBetweenDosesInHours" name="frequencyBetweenDosesInHours"
                                type="number" class="mt-1 block w-3/4" placeholder="{{ __(12) }}" />

                            <x-input-error :messages="$errors->get('frequencyBetweenDosesInHours')" class="mt-2" />
                        </div>
                        <!--Ajouter ici le prochain input de type date selon la branche CreateTriggers -->



                        <div class="mt-6 flex justify-end">
                       <x-hrefbutton href="{{ route('profile.edit') }}" class="btn ">
                            {{ __('Cancel') }}
                        </x-hrefbutton>
                            

                            <x-primary-button class="ms-3">
                                {{ __('Add') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

</x-app-layout>
