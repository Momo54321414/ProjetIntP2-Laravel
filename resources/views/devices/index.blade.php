<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('DeviceList') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                @if ($devices->isEmpty())
                    <div class="text-gray-500 dark:text-gray-400">
                        {{ __('No Device found.') }}
                    </div>
                @else
                    @foreach ($devices as $device)
                        <div class=" w-full max-w-md flex flex-col">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-4">

                                    <div class="cursor-pointer">

                                        <x-hrefbutton :href="route('devices.show', [$devices->id])">
                                            <div class="text-black dark:text-gray-200 text-lg font-bold">
                                                {{ $devices->noSerie }}</div>
                                        </x-hrefbutton>
                                    </div>

                                </div>
                                <div class="flex items-center space-x-4">


                                    <div class="text-gray-500 hover:text-gray-300 cursor-pointer">

                                        <x-hrefbutton :href="route('devices.edit', [$devices->id])">
                                            <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg" class="hover:fill-teal-500">
                                                <path
                                                    d="M12 20H20.5M18 10L14 6M18 10L21 7L17 3L14 6M18 10L17 11M14 6L7.5 12.5M5 15L4 16V20H8L14 14"
                                                    stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </x-hrefbutton>
                                    </div>
                                    <div class="text-gray-500 hover:text-gray-300 cursor-pointer">
                                        <button x-data=""
                                            x-on:click.prevent="$dispatch('open-modal', 'delete-device-modal-{{ $devices->id }}')">
                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24"
                                                height="24" viewBox="0 0 48 48" class="hover:fill-red-500">
                                                <path
                                                    d="M 20.5 4 A 1.50015 1.50015 0 0 0 19.066406 6 L 14.640625 6 C 12.803372 6 11.082924 6.9194511 10.064453 8.4492188 L 7.6972656 12 L 7.5 12 A 1.50015 1.50015 0 1 0 7.5 15 L 8.2636719 15 A 1.50015 1.50015 0 0 0 8.6523438 15.007812 L 11.125 38.085938 C 11.423352 40.868277 13.795836 43 16.59375 43 L 31.404297 43 C 34.202211 43 36.574695 40.868277 36.873047 38.085938 L 39.347656 15.007812 A 1.50015 1.50015 0 0 0 39.728516 15 L 40.5 15 A 1.50015 1.50015 0 1 0 40.5 12 L 40.302734 12 L 37.935547 8.4492188 C 36.916254 6.9202798 35.196001 6 33.359375 6 L 28.933594 6 A 1.50015 1.50015 0 0 0 27.5 4 L 20.5 4 z M 14.640625 9 L 33.359375 9 C 34.196749 9 34.974746 9.4162203 35.439453 10.113281 L 36.697266 12 L 11.302734 12 L 12.560547 10.113281 A 1.50015 1.50015 0 0 0 12.5625 10.111328 C 13.025982 9.4151428 13.801878 9 14.640625 9 z M 11.669922 15 L 36.330078 15 L 33.890625 37.765625 C 33.752977 39.049286 32.694383 40 31.404297 40 L 16.59375 40 C 15.303664 40 14.247023 39.049286 14.109375 37.765625 L 11.669922 15 z">
                                                </path>
                                            </svg>
                                        </button>

                                    </div>
                                </div>
                                <div class="mt-4 text-gray-500 font-bold text-sm"> {{ __('AssociatedPatientFullName') }}
                                    <span
                                        class="text-gray-900 dark:text-gray-100">{{ $device->associatedPatientFullName }}</span>

                                </div>
                            </div>

                            <div class="flex items-center gap-4">
                                @if (!$prescriptions->isEmpty())
                                    <x-modal id="delete-device-modal-{{ $device->id }}"
                                        name="delete-device-modal-{{ $device->id }}" focusable>
                                        <div class="p-6">
                                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                                {{ __('DeleteDevice') }}
                                            </h2>
                                            <form method="POST" action="{{ route('devices.destroy', [$device->id]) }}"
                                                class="p-6">
                                                @csrf
                                                @method('delete')

                                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                                    {{ __('AreYouSureYouWantToDeleteThisDevice') }}
                                                </h2>
                                                <div class="mt-6 flex justify-center">

                                                    <x-secondary-button x-on:click="$dispatch('close')">
                                                        {{ __('Cancel') }}
                                                    </x-secondary-button>

                                                    <x-danger-button class="ms-3">
                                                        {{ __('Delete') }}
                                                    </x-danger-button>
                                                </div>
                                            </form>
                                        </div>
                                    </x-modal>
                                @endif
                            </div>
                    @endforeach
                @endif
                <x-href-button-primary
                    href="{{ route('prescriptions.create') }}">{{ __('Add') }}</x-href-button-primary>
            </div>

        </div>
    </div>
    </div>

</x-app-layout>
