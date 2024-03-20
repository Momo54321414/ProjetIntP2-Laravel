<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('AddNewPrescription') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="mt-6 ">
                    <x-hrefbutton href="{{ route('profile.edit') }}" class="btn">
                        {{ __('Return') }}
                    </x-hrefbutton>
                    <form method="POST" action="{{ route('prescriptions.store') }}" class="p-6">
                        @csrf

                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('AddNewPrescription') }}
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
                                value="{{ __('DurationOfPrescriptionInDays') }}" />

                            <x-text-input id="durationOfPrescriptionInDays" name="durationOfPrescriptionInDays"
                                type="number" class="mt-1 block w-3/4"
                                placeholder="{{ __('PrescriptionEnterDOPID') }}" />

                            <x-input-error :messages="$errors->get('durationOfPrescriptionInDays')" class="mt-2" />
                        </div>
                        <div class="mt-6">
                            <x-input-label for="frequencyOfIntakeInDays" value="{{ __('frequencyOfIntakeInDays') }}" />

                            <x-text-input id="frequencyOfIntakeInDays" name="frequencyOfIntakeInDays" type="number"
                                class="mt-1 block w-3/4" placeholder="{{ __('PrescriptionEnterFIID') }}" />

                            <x-input-error :messages="$errors->get('frequencyOfIntakeInDays')" class="mt-2" />
                        </div>
                        <div class="mt-6">
                            <x-input-label for="firstIntakeHour" value="{{ __('FirstIntakeHour') }}" />

                            <x-text-input id="firstIntakeHour" name="firstIntakeHour" type="time"
                                class="mt-1 block w-3/4" />

                            <x-input-error :messages="$errors->get('firstIntakeHour')" class="mt-2" />
                        </div>

                        <div class="mt-6">
                            <x-input-label for="frequencyBetweenDosesInHours"
                                value="{{  __('PrescriptionEnterFBDIH')  }}" />

                            <x-text-input id="frequencyBetweenDosesInHours" name="frequencyBetweenDosesInHours"
                                type="number" class="mt-1 block w-3/4"
                                placeholder="{{ __('PrescriptionEnterFBDIH') }}" />

                            <x-input-error :messages="$errors->get('frequencyBetweenDosesInHours')" class="mt-2" />
                        </div>


                        <div class="mt-6 flex justify-end">
                            <x-hrefbutton href="{{ route('prescriptions.index') }}" class="btn ">
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
