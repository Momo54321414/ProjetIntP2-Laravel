<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Add prescription') }}
        </h2>
    </header>
        <form method="post" action="{{ route('prescription.store') }}" class="p-6">
        @csrf
        @method('store')

        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Add prescription') }}
        </h2>


        <div class="mt-6">
            <x-input-label for="nameOfPrescription" value="{{ __('Prescription name') }}" class="sr-only" />

            <x-text-input
                id="nameOfPrescription"
                name="nameOfPrescription"
                type="text"
                class="mt-1 block w-3/4"
                placeholder="{{ __('Prescription') }}"
            />

            <x-input-error :messages="$errors->userDeletion->get('nameOfPrescription')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-input-label for="dateOfPrescription" value="{{ __('Prescription date') }}" class="sr-only" />

            <x-text-input
                id="dateOfPrescription"
                name="dateOfPrescription"
                type="date"
                class="mt-1 block w-3/4"
            />

            <x-input-error :messages="$errors->userDeletion->get('dateOfPrescription')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-input-label for="dateOfStart" value="{{ __('Date of start') }}" class="sr-only" />

            <x-text-input
                id="dateOfStart"
                name="dateOfStart"
                type="date"
                class="mt-1 block w-3/4"
            />

            <x-input-error :messages="$errors->userDeletion->get('dateOfStart')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-input-label for="durationOfPrescriptionInDays" value="{{ __('Duration of the prescription in days') }}" class="sr-only" />

            <x-text-input
                id="durationOfPrescriptionInDays"
                name="durationOfPrescriptionInDays"
                type="number"
                class="mt-1 block w-3/4"
                placeholder="{{ __(30) }}"
            />

            <x-input-error :messages="$errors->userDeletion->get('durationOfPrescriptionInDays')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-input-label for="frequencyBetweenHours" value="{{ __('Frequency between hours') }}" class="sr-only" />

            <x-text-input
                id="frequencyBetweenHours"
                name="frequencyBetweenHours"
                type="number"
                class="mt-1 block w-3/4"
                placeholder="{{ __(12) }}"
            />

            <x-input-error :messages="$errors->userDeletion->get('frequencyBetweenHours')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-input-label for="frequencyPerDay" value="{{ __('Frequency per day') }}" class="sr-only" />

            <x-text-input
                id="frequencyPerDay"
                name="frequencyPerDay"
                type="number"
                class="mt-1 block w-3/4"
                placeholder="{{ __(1) }}"
            />

            <x-input-error :messages="$errors->userDeletion->get('frequencyPerDay')" class="mt-2" />
        </div>

        @foreach ( $medications as $medication )
            <div class="mt-6">
                <x-input-label for="medication" value="{{ __('Medication') }}" class="sr-only" />

                <x-select
                    id="medication"
                    name="medication"
                    class="mt-1 block w-3/4"
                >
                    <option value="{{ $medication->id }}">{{ $medication->name }}</option>
                </x-select>

                <x-input-error :messages="$errors->userDeletion->get('medication')" class="mt-2" />
            </div> 
        @endforeach

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-primary-button class="ms-3">
                {{ __('Add') }}
            </x-primary-button>
        </div>
    </form>
</section>