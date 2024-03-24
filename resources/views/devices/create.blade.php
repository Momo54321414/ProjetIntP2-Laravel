<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('AddNewDevice') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="mt-6 ">
                    <x-hrefbutton href="{{ route('devices.index') }}" class="btn">
                        {{ __('Return') }}
                    </x-hrefbutton>
                    <form method="POST" action="{{ route('devices.store') }}" class="p-6">
                        @csrf

                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('AddNewDevice') }}
                        </h2>
                        <div class="mt-6">
                            <x-input-label for="noSerie" value="{{ __('DeviceNoSerie') }}" />

                            <x-text-input id="noSerie" name="noSerie" type="text" class="mt-1 block w-3/4"
                                placeholder="{{ __('EnterNoSerie') }}" />

                            <x-input-error :messages="$errors->get('noSerie')" class="mt-2" />
                        </div>

                        <div class="mt-6">
                            <x-input-label for="associatedPatientFullName"
                                value="{{ __('DeviceAssociatedPatientFullName') }}" />

                            <x-text-input id="associatedPatientFullName" name="associatedPatientFullName" type="text"
                                class="mt-1 block w-3/4" placeholder="{{ __('EnterAssociatedPatientFullName') }}" />

                            <x-input-error :messages="$errors->get('associatedPatientFullName')" class="mt-2" />
                        </div>

                        <div class="mt-6 flex justify-end">
                            <x-hrefbutton href="{{ route('devices.index') }}" class="btn ">
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
