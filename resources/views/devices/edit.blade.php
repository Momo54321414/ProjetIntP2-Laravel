<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('EditDevice') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="mt-6 ">
                    <x-hrefbutton href="{{ route('devices.index') }}" class="btn">
                        {{ __('Return') }}
                    </x-hrefbutton>
                    <div class="p-6">
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('EditDevice') }}
                        </h2>
                        <form method="POST" action="{{ route('devices.update', [$device->id]) }}" class="p-6">
                            @csrf
                            @method('PATCH')

                            <input type="hidden" name="id" id="id" value="">
                            <div class="mt-6">
                                <x-input-label for="noSerie" value="{{ __('DeviceNoSerie') }}" />

                                <x-text-input id="noSerie" name="noSerie" type="text" class="mt-1 block w-3/4"
                                    placeholder="{{ __('EnterNoSerie') }}" value="{{ $device->noSerie }}" />

                                <x-input-error :messages="$errors->get('noSerie')" class="mt-2" />
                            </div>

                            <div class="mt-6">
                                <x-input-label for="associatedPatientFullName"
                                    value="{{ __('DeviceAssociatedPatientFullName') }}" />

                                <x-text-input id="associatedPatientFullName" name="associatedPatientFullName"
                                    type="text" class="mt-1 block w-3/4"
                                    placeholder="{{ __('EnterAssociatedPatientFullName') }}"
                                    value="{{ $device->associatedPatientFullName }}" />

                                <x-input-error :messages="$errors->get('associatedPatientFullName')" class="mt-2" />
                            </div>

                            <div class="mt-6 flex justify-end">
                                <x-hrefbutton href="{{ route('devices.index') }}" class="btn ">
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

</x-app-layout>
