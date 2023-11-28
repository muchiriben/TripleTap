<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-accent-color leading-tight">
            {{ __('Edit Manufacturer ') }}
        </h2>
    </x-slot>

        <div class="max-w-7lx h-5/6 py-12 px-2 m-auto sm:px-8 lg:px-12">
            <div class="bg-white shadow-md w-full h-5/6 m-auto py-6 px-4 sm:px-6 lg:px-8 rounded-md">
        <form method="POST" action="{{ route('admin.manufacturers.update', $manufacturer) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Manufacturer Name')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $manufacturer->name }}" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Edit Manufacturer') }}
                </x-primary-button>
            </div>
        </form>
            </div>
        </div>

</x-app-layout>
