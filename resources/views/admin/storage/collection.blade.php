<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-accent-color leading-tight">
            {{ __('Collect Item') }}
        </h2>
    </x-slot>


        <div class="max-w-7lx h-5/6 py-12 px-2 m-auto sm:px-8 lg:px-12">
            <div class="bg-white shadow-md w-full h-5/6 m-auto py-6 px-4 sm:px-6 lg:px-8 rounded-md">

            <form method="POST" action="{{ route('admin.storage.collect.update', $application->id) }}">
                @csrf
                @method('PATCH')
                
                <!-- actual_collect_date -->
                <div>
                    <x-input-label for="actual_collection_date" :value="__('Set Actual Collection Date')" />
    
                    <x-text-input id="actual_collection_date" class="block mt-1 w-full" type="date" name="actual_collection_date" :value="old('actual_collection_date')" required autofocus />
                </div>
    
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ml-4">
                        {{ __('Set Date') }}
                    </x-primary-button>
                </div>
            </form>
            </div>
        </div>

</x-app-layout>
