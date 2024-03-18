<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('ZoomPrescription') }}
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
                        <div class=" w-full max-w-md flex flex-col">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-4">
                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                        {{ __('ZoomPrescription') }}
                                    </h2>
                                    <x-hrefbutton :href="route('prescriptions.edit', [$prescription->id])" class="dark:text-gray-100">
                                        <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="hover:fill-teal-500 ">
                                            <path
                                                d="M12 20H20.5M18 10L14 6M18 10L21 7L17 3L14 6M18 10L17 11M14 6L7.5 12.5M5 15L4 16V20H8L14 14"
                                                stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </x-hrefbutton>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <x-input-label for="nameOfPrescription" value="{{ __('PrescriptionName') }}" />

                            <x-text-input id="nameOfPrescription" name="nameOfPrescription" type="text"
                                class="mt-1 block w-3/4 disabled:bg-slate-50  dark:text-gray-700" placeholder="{{ __('Prescription') }}"
                                value="{{ $prescription->nameOfPrescription }}" readonly disabled />
                        </div>

                        <div class="mt-6">
                            <x-input-label for="medication_id" value="{{ __('Medication') }}" />
                            <select name="medication_id" id="medication_id" readonly disabled
                                class="mt-1 block w-3/4 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-500 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm disabled:bg-slate-50 disabled:text-black">

                                @foreach ($medications as $medication)
                                    <option value="{{ $medication->id }}"
                                        {{ $prescription->medicationId == $medication->id ? 'selected' : '' }}>
                                        {{ $medication->name }}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="mt-6">
                            <x-input-label for="dateOfPrescription" value="{{ __('PrescriptionDate') }}" />

                            <x-text-input id="dateOfPrescription" name="dateOfPrescription" type="date"
                                class="mt-1 block w-3/4 disabled:bg-slate-50 dark:text-gray-700"
                                value="{{ $prescription->dateOfPrescription }}" readonly disabled />
                        </div>

                        <div class="mt-6">
                            <x-input-label for="dateOfStart" value="{{ __('PrescriptionDateOfStart') }}" />

                            <x-text-input id="dateOfStart" name="dateOfStart" type="date"
                                class="mt-1 block w-3/4 disabled:bg-slate-50 dark:text-gray-700" value="{{ $prescription->dateOfStart }}"
                                readonly disabled />
                        </div>

                        <div class="mt-6">
                            <x-input-label for="durationOfPrescriptionInDays"
                                value="{{ __('DurationOfPrescriptionInDays') }}" />

                            <x-text-input id="durationOfPrescriptionInDays" name="durationOfPrescriptionInDays"
                                type="number" class="mt-1 block w-3/4 disabled:bg-slate-50 dark:text-gray-700"
                                placeholder="{{ __(30) }}"
                                value="{{ $prescription->durationOfPrescriptionInDays }}" readonly disabled />
                        </div>

                        <div class="mt-6">
                            <x-input-label for="frequencyOfIntakeInDays" value="{{ __('frequencyOfIntakeInDays') }}" />

                            <x-text-input id="frequencyOfIntakeInDays" name="frequencyOfIntakeInDays" type="number"
                                class="mt-1 block w-3/4 disabled:bg-slate-50 dark:text-gray-700"
                                value="{{ $prescription->frequencyOfIntakeInDays }}" readonly disabled />
                        </div>
                        <div class="mt-6">
                            <x-input-label for="frequencyBetweenDosesInHours"
                                value="{{ __('PrescriptionFrequencyBetweenDosesInHours') }}" />

                            <x-text-input id="frequencyBetweenDosesInHours" name="frequencyBetweenDosesInHours"
                                type="number" class="mt-1 block w-3/4 disabled:bg-slate-50 dark:text-gray-700"
                                placeholder="{{ __(12) }}"
                                value="{{ $prescription->frequencyBetweenDosesInHours }}" readonly disabled />
                        </div>
                        <div class="mt-6">
                            <x-input-label for="firstIntakeHour" value="{{ __('FirstIntakeHour') }}" />

                            <x-text-input id="firstIntakeHour" name="firstIntakeHour" type="time"
                                class="mt-1 block w-3/4 disabled:bg-slate-50 dark:text-gray-700" placeholder="{{ __(30) }}"
                                value="{{ $prescription->firstIntakeHour }}" readonly disabled />

                        </div>
                        <div class="mt-6">
                            <x-input-label for="frequencyPerDay" value="{{ __('PrescriptionFrequencyPerDay') }}" />

                            <x-text-input id="frequencyPerDay" name="frequencyPerDay" type="number"
                                class="mt-1 block w-3/4 disabled:bg-slate-50 dark:text-gray-700"
                                value="{{ $prescription->frequencyPerDay }}" readonly disabled />
                        </div>


                        <div class="mt-6 flex justify-end">
                            <x-hrefbutton href="{{ route('prescriptions.index') }}" class="btn">
                                {{ __('Return') }}
                            </x-hrefbutton>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
