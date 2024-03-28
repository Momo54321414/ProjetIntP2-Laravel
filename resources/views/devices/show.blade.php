<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('ZoomDevice') }}
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
                        <div class=" w-full max-w-md flex flex-col">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-4">
                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                        {{ __('ZoomDevice') }}
                                    </h2>
                                    <x-hrefbutton :href="route('devices.edit', [$device->id])" class="dark:text-gray-100">
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
                            <x-input-label for="noSerie" value="{{ __('DeviceNoSerie') }}" />

                            <x-text-input id="noSerie" name="noSerie" type="text"
                                class="mt-1 block w-3/4 disabled:bg-slate-50  dark:text-gray-700"
                                placeholder="{{ __('DeviceNoSerie') }}" value="{{ $device->noSerie }}" readonly
                                disabled />
                        </div>

                        <div class="mt-6">
                            <x-input-label for="associatedPatientFullName"
                                value="{{ __('DeviceAssociatedPatientFullName') }}" />

                            <x-text-input id="associatedPatientFullName" name="associatedPatientFullName" type="text"
                                class="mt-1 block w-3/4 disabled:bg-slate-50  dark:text-gray-700"
                                placeholder="{{ __('DeviceAssociatedPatientFullName') }}"
                                value="{{ $device->associatedPatientFullName }}" readonly disabled />

                        </div>

                        <div class="mt-6 flex justify-end">
                            <x-hrefbutton href="{{ route('devices.index') }}" class="btn">
                                {{ __('Return') }}
                            </x-hrefbutton>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
