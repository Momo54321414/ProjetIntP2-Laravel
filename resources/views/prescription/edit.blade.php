<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('EditPrescription') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="mt-6 ">
                    <x-hrefbutton href="{{ route('prescriptions.index') }}" class="btn">
                        {{ __('Return') }}
                    </x-hrefbutton>
                    <div class="p-6">
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('EditPrescription') }}
                        </h2>
                        <form method="POST" action="{{ route('prescriptions.update', [$prescription->id]) }}"
                            class="p-6">
                            @csrf
                            @method('PATCH')

                            <input type="hidden" name="id" id="id" value="">

                            <div class="mt-6">
                                <x-input-label for="nameOfPrescription" value="{{ __('PrescriptionName') }}" />

                                <x-text-input id="nameOfPrescription" name="nameOfPrescription" type="text"
                                    class="mt-1 block w-3/4" placeholder="{{ __('Prescription') }}"
                                    value="{{ $prescription->nameOfPrescription }}" />

                                <x-input-error :messages="$errors->get('nameOfPrescription')" class="mt-2" />
                            </div>

                            <div class="mt-6">
                                <x-input-label for="medication_id" value="{{ __('Medication') }}" />
                                <select name="medication_id" id="medication_id"
                                    class="mt-1 block w-3/4 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">

                                    @foreach ($medications as $medication)
                                        <option value="{{ $medication->id }}"
                                            {{ $prescription->medicationId == $medication->id ? 'selected' : '' }}>
                                            {{ $medication->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('medication_id')" class="mt-2" />
                            </div>

                            <div class="mt-6">
                                <x-input-label for="dateOfPrescription" value="{{ __('PrescriptionDate') }}" />

                                <x-text-input id="dateOfPrescription" name="dateOfPrescription" type="date"
                                    class="mt-1 block w-3/4" min="{{ $minDate }}" max="{{ $maxDate }}"
                                    value="{{ $prescription->dateOfPrescription }}" />

                                <x-input-error :messages="$errors->get('dateOfPrescription')" class="mt-2" />
                            </div>

                            <div class="mt-6">
                                <x-input-label for="dateOfStart" value="{{ __('PrescriptionDateOfStart') }}" />

                                <x-text-input id="dateOfStart" name="dateOfStart" type="date"
                                    class="mt-1 block w-3/4" min="{{ $minDate }}" max="{{ $maxDateForStart }}"
                                    value="{{ $prescription->dateOfStart }}" />

                                <x-input-error :messages="$errors->get('dateOfStart')" class="mt-2" />
                            </div>

                            <div class="mt-6">
                                <x-input-label for="durationOfPrescriptionInDays"
                                    value="{{ __('DurationOfPrescriptionInDays') }}" />

                                <x-text-input id="durationOfPrescriptionInDays" name="durationOfPrescriptionInDays"
                                    type="number" class="mt-1 block w-3/4" placeholder="{{ __(30) }}"
                                    value="{{ $prescription->durationOfPrescriptionInDays }}" />

                                <x-input-error :messages="$errors->get('durationOfPrescriptionInDays')" class="mt-2" />
                            </div>
                            <div class="mt-6">
                                <x-input-label for="frequencyOfIntakeInDays"
                                    value="{{ __('frequencyOfIntakeInDays') }}" />

                                <x-text-input id="frequencyOfIntakeInDays" name="frequencyOfIntakeInDays" type="number"
                                    class="mt-1 block w-3/4" placeholder="{{ __('PrescriptionEnterFIID') }}"
                                    value="{{ $prescription->frequencyOfIntakeInDays }}" />

                                <x-input-error :messages="$errors->get('frequencyOfIntakeInDays')" class="mt-2" />
                            </div>
                            <div class="mt-6">
                                <x-input-label for="firstIntakeHour" value="{{ __('FirstIntakeHour') }}" />

                                <x-text-input id="firstIntakeHour" name="firstIntakeHour" type="time"
                                    class="mt-1 block w-3/4" placeholder="{{ __('PrescriptionEnterFIID') }}"
                                    value="{{ $prescription->firstIntakeHour = date('H:i', strtotime($prescription->firstIntakeHour)) }}" />

                                <x-input-error :messages="$errors->get('durationOfPrescriptionInDays')" class="mt-2" />
                            </div>

                            <div class="mt-6">
                                <x-input-label for="frequencyBetweenDosesInHours"
                                    value="{{ __('PrescriptionFrequencyBetweenDosesInHours') }}" />

                                <x-text-input id="frequencyBetweenDosesInHours" name="frequencyBetweenDosesInHours"
                                    type="number" class="mt-1 block w-3/4"
                                    placeholder="{{ __('PrescriptionEnterFBDIH') }}"
                                    value="{{ $prescription->frequencyBetweenDosesInHours }}" />

                                <x-input-error :messages="$errors->get('frequencyBetweenDosesInHours')" class="mt-2" />
                            </div>

                            <div class="mt-6">
                                <x-input-label for="frequencyPerDay" value="{{ __('PrescriptionFrequencyPerDay') }}" />

                                <x-text-input id="frequencyPerDay" name="frequencyPerDay" type="number"
                                    class="mt-1 block w-3/4 disabled:bg-slate-50"
                                    value="{{ $prescription->frequencyPerDay }}" readonly disabled />
                            </div>


                            <div class="mt-6 flex justify-end">
                                <x-hrefbutton href="{{ route('prescriptions.index') }}" class="btn">
                                    {{ __('Cancel') }}
                                </x-hrefbutton>

                                <x-primary-button class="ms-3">
                                    {{ __('Update') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
