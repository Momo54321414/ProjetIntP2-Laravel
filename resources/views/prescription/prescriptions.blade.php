<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Prescription list') }}
        </h2>
    </header>

    <div class="overflow-y-scroll max-h-64">
        @foreach ($prescriptions as $prescription)
            <div class=" w-full max-w-md flex flex-col">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="text-md font-bold"> {{ $prescription->nameOfPrescription }}</div>

                    </div>
                    <div class="flex items-center space-x-4">
                        <div>
                            {{ $prescription->dateOfPrescription }}
                        </div>
                        <div class="text-gray-500 hover:text-gray-300 cursor-pointer">

                            <x-secondary-button x-data=""
                                x-on:click="$dispatch('open-modal','edit-prescription-modal', '{id: {{ $prescription->prescriptionId }} }' )">
                                <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12 20H20.5M18 10L14 6M18 10L21 7L17 3L14 6M18 10L17 11M14 6L7.5 12.5M5 15L4 16V20H8L14 14"
                                        stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </x-secondary-button>
                        </div>
                        <div class="text-gray-500 hover:text-gray-300 cursor-pointer">
                            <x-danger-button x-data=""
                                x-on:click="$dispatch('open-modal','delete-prescription-modal', {id: {{ $prescription->prescriptionId }}})">

                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24"
                                    viewBox="0 0 48 48">
                                    <path
                                        d="M 20.5 4 A 1.50015 1.50015 0 0 0 19.066406 6 L 14.640625 6 C 12.803372 6 11.082924 6.9194511 10.064453 8.4492188 L 7.6972656 12 L 7.5 12 A 1.50015 1.50015 0 1 0 7.5 15 L 8.2636719 15 A 1.50015 1.50015 0 0 0 8.6523438 15.007812 L 11.125 38.085938 C 11.423352 40.868277 13.795836 43 16.59375 43 L 31.404297 43 C 34.202211 43 36.574695 40.868277 36.873047 38.085938 L 39.347656 15.007812 A 1.50015 1.50015 0 0 0 39.728516 15 L 40.5 15 A 1.50015 1.50015 0 1 0 40.5 12 L 40.302734 12 L 37.935547 8.4492188 C 36.916254 6.9202798 35.196001 6 33.359375 6 L 28.933594 6 A 1.50015 1.50015 0 0 0 27.5 4 L 20.5 4 z M 14.640625 9 L 33.359375 9 C 34.196749 9 34.974746 9.4162203 35.439453 10.113281 L 36.697266 12 L 11.302734 12 L 12.560547 10.113281 A 1.50015 1.50015 0 0 0 12.5625 10.111328 C 13.025982 9.4151428 13.801878 9 14.640625 9 z M 11.669922 15 L 36.330078 15 L 33.890625 37.765625 C 33.752977 39.049286 32.694383 40 31.404297 40 L 16.59375 40 C 15.303664 40 14.247023 39.049286 14.109375 37.765625 L 11.669922 15 z">
                                    </path>
                                </svg>
                            </x-danger-button>
                        </div>
                    </div>
                </div>
                <div class="text-gray-500 font-bold"> {{ __('MedicationName') }} {{ $prescription->medicationName }}
                </div>
                <div class="mt-4 text-gray-500 font-bold text-sm">
                    {{ __('MedicationFunction') }} {{ $prescription->medicationFunction }}
                </div>
                <div class="mt-4 text-gray-500 font-bold text-sm">
                    {{ __('DurationOfPrescriptionInDays') }}
                    {{ $prescription->durationOfPrescriptionInDays }}

                </div>
                <br>
                <hr>
                <br>
            </div>
        @endforeach

    </div>


    <div class="flex items-center gap-4">
        {{-- <x-primary-button>{{ __('Save') }}</x-primary-button> --}}

        {{-- @if (session('status') === 'password-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
        @endif --}}

        <x-secondary-button x-data=""
            x-on:click="$dispatch('open-modal','add-prescription-modal')">{{ __('Add') }}</x-secondary-button>

        <x-modal id="add-prescription-modal" name="add-prescription-modal" focusable>
            <form method="POST" action="{{ route('prescriptions.store') }}" class="p-6">
                @csrf

                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Add prescription') }}
                </h2>


                <div class="mt-6">
                    <x-input-label for="nameOfPrescription" value="{{ __('Prescription name') }}" />

                    <x-text-input id="nameOfPrescription" name="nameOfPrescription" type="text"
                        class="mt-1 block w-3/4" placeholder="{{ __('Prescription') }}" />

                    <x-input-error :messages="$errors->userDeletion->get('nameOfPrescription')" class="mt-2" />
                </div>

                <div class="mt-6">
                    <x-input-label for="dateOfPrescription" value="{{ __('Prescription date') }}" />

                    <x-text-input id="dateOfPrescription" name="dateOfPrescription" type="date"
                        class="mt-1 block w-3/4" min="{{ $maxDate }}" max="{{ $minDate }}" />

                    <x-input-error :messages="$errors->userDeletion->get('dateOfPrescription')" class="mt-2" />
                </div>

                <div class="mt-6">
                    <x-input-label for="dateOfStart" value="{{ __('Date of start') }}" />

                    <x-text-input id="dateOfStart" name="dateOfStart" type="date" class="mt-1 block w-3/4"
                        min="{{ $minDate }}" max="{{ $maxDateForStart }}" />

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
        <x-modal id="edit-prescription-modal" name="edit-prescription-modal" focusable>
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('EditPrescription') }}
                </h2>
            <form method="POST" action="{{ route('prescriptions.update', [$prescription->prescriptionId]) }}"
                class="p-6">
                @csrf
                @method('put')

                <input type="hidden" name="id" id="id" value="">

                <div class="mt-6">
                    <x-input-label for="nameOfPrescription" value="{{ __('PrescriptionName') }}" />

                    <x-text-input id="nameOfPrescription" name="nameOfPrescription" type="text"
                        class="mt-1 block w-3/4" placeholder="{{ __('Prescription') }}"
                        value="{{ $prescription->nameOfPrescription }}" />

                    <x-input-error :messages="$errors->userDeletion->get('nameOfPrescription')" class="mt-2" />
                </div>

                <div class="mt-6">
                    <x-input-label for="dateOfPrescription" value="{{ __('PrescriptionDate') }}" />

                    <x-text-input id="dateOfPrescription" name="dateOfPrescription" type="date"
                        class="mt-1 block w-3/4" min="{{ $maxDate }}" max="{{ $minDate }}"
                        value="{{ $prescription->dateOfPrescription }}" />

                    <x-input-error :messages="$errors->userDeletion->get('dateOfPrescription')" class="mt-2" />
                </div>

                <div class="mt-6">
                    <x-input-label for="dateOfStart" value="{{ __('PrescriptionDateOfStart') }}" />

                    <x-text-input id="dateOfStart" name="dateOfStart" type="date" class="mt-1 block w-3/4"
                        min="{{ $minDate }}" max="{{ $maxDateForStart }}"
                        value="{{ $prescription->dateOfStart }}" />

                    <x-input-error :messages="$errors->userDeletion->get('dateOfStart')" class="mt-2" />
                </div>

                <div class="mt-6">
                    <x-input-label for="durationOfPrescriptionInDays"
                        value="{{ __('DurationOfThePrescriptionInDays') }}" />

                    <x-text-input id="durationOfPrescriptionInDays" name="durationOfPrescriptionInDays"
                        type="number" class="mt-1 block w-3/4" placeholder="{{ __(30) }}"
                        value="{{ $prescription->durationOfPrescriptionInDays }}" />

                    <x-input-error :messages="$errors->userDeletion->get('durationOfPrescriptionInDays')" class="mt-2" />
                </div>
                <div class="mt-6">
                    <x-input-label for="durationOfPrescriptionInDays"
                        value="{{ __('DurationOfPrescriptionInDays') }}" />

                    <x-text-input id="durationOfPrescriptionInDays" name="durationOfPrescriptionInDays"
                        type="number" class="mt-1 block w-3/4" placeholder="{{ __(30) }}"
                        value="{{ $prescription->durationOfPrescriptionInDays }}" />

                    <x-input-error :messages="$errors->userDeletion->get('durationOfPrescriptionInDays')" class="mt-2" />
                </div>

                <div class="mt-6">
                    <x-input-label for="frequencyBetweenDosesInHours"
                        value="{{ __('PrescriptionFrequencyBetweenDosesInHours') }}" />

                    <x-text-input id="frequencyBetweenDosesInHours" name="frequencyBetweenDosesInHours"
                        type="number" class="mt-1 block w-3/4" placeholder="{{ __(12) }}"
                        value="{{ $prescription->frequencyBetweenDosesInHours }}" />

                    <x-input-error :messages="$errors->userDeletion->get('frequencyBetweenDosesInHours')" class="mt-2" />
                </div>

                <div class="mt-6">
                    <x-input-label for="frequencyPerDay" value="{{ __('PrescriptionFrequencyPerDay') }}" />

                    <x-text-input id="frequencyPerDay" name="frequencyPerDay" type="number"
                        class="mt-1 block w-3/4" placeholder="{{ __(1) }}" 
                        value="{{$prescription->frequencyPerDay}}"/>

                    <x-input-error :messages="$errors->userDeletion->get('frequencyPerDay')" class="mt-2" />
                </div>

                <div class="mt-6">
                    <x-input-label for="medication_id" value="{{ __('Medication') }}" />
                    <select name="medication_id" id="medication_id" class="mt-1 block w-3/4">

                        @foreach ($medications as $medication)
                            <option value="{{ $medication->id }}" {{$prescription->medicationId == $medication->id ? 'selected': ''}} >{{ $medication->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->userDeletion->get('medication_id')" class="mt-2" />
                </div>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-primary-button class="ms-3">
                        {{ __('Update') }}
                    </x-primary-button>
                </div>
            </form>
            </div>
        </x-modal>
        <x-modal id="delete-prescription-modal" name="delete-prescription-modal" focusable>
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100"
            <form method="post"
                action="{{ route('prescriptions.destroy', ['prescription' => $prescription->prescriptionId]) }}>
                @csrf
                @method('delete')

                <h2 class="text-lg
                font-medium text-gray-900 dark:text-gray-100">
                {{ __('AreYouSureYouWantToDeleteThisPrescription') }}
                </h2>
                <div class="mt-6 flex justify-center">

                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>
                <x-danger-button class="ms-3" type="submit">
                    {{ __('Delete') }}
                </x-danger-button>
                </div>
            </form>
            </div>
        </x-modal>





    </div>

</section>
