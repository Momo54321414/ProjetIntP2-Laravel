<x-modal id="add-prescription-modal" name="add-prescription-modal" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <form method="POST" action="{{ route('prescription.store') }}" class="p-6">
        @csrf

        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Add prescription') }}
        </h2>


        <div class="mt-6">
            <x-input-label for="nameOfPrescription" value="{{ __('Prescription name') }}" />

            <x-text-input id="nameOfPrescription" name="nameOfPrescription" type="text" class="mt-1 block w-3/4"
                placeholder="{{ __('Prescription') }}" />

            <x-input-error :messages="$errors->userDeletion->get('nameOfPrescription')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-input-label for="dateOfPrescription" value="{{ __('Prescription date') }}" />

            <x-text-input id="dateOfPrescription" name="dateOfPrescription" type="date" class="mt-1 block w-3/4" 
            />

            <x-input-error :messages="$errors->userDeletion->get('dateOfPrescription')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-input-label for="dateOfStart" value="{{ __('Date of start') }}" />

            <x-text-input id="dateOfStart" name="dateOfStart" type="date" class="mt-1 block w-3/4" />

            <x-input-error :messages="$errors->userDeletion->get('dateOfStart')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-input-label for="durationOfPrescriptionInDays"
                value="{{ __('Duration of the prescription in days') }}" />

            <x-text-input id="durationOfPrescriptionInDays" name="durationOfPrescriptionInDays" type="number"
                class="mt-1 block w-3/4" placeholder="{{ __(30) }}" />

            <x-input-error :messages="$errors->userDeletion->get('durationOfPrescriptionInDays')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-input-label for="frequencyBetweenDosesInHours" value="{{ __('Frequency between hours') }}" />

            <x-text-input id="frequencyBetweenDosesInHours" name="frequencyBetweenDosesInHours" type="number"
                class="mt-1 block w-3/4" placeholder="{{ __(12) }}" />

            <x-input-error :messages="$errors->userDeletion->get('frequencyBetweenDosesInHours')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-input-label for="frequencyPerDay" value="{{ __('Frequency per day') }}" />

            <x-text-input id="frequencyPerDay" name="frequencyPerDay" type="number" class="mt-1 block w-3/4"
                placeholder="{{ __(1) }}" />

            <x-input-error :messages="$errors->userDeletion->get('frequencyPerDay')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-input-label for="medication_id" value="{{ __('Medication') }}" />
            <select name="medication_id" id="medication_id" class="mt-1 block w-3/4">
                @foreach ($medications as $medication)
                    <option value="{{ $medication->id }}">{{ $medication->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->userDeletion->get('medication_id')" class="mt-2" />
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-primary-button class="ms-3">
                {{ __('Add') }}
            </x-primary-button>
        </div>
    </form>
</x-modal>