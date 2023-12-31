<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('New Event') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                

        <div class="max-w-7lx h-5/6 py-12 px-2 m-auto sm:px-8 lg:px-12">
           
        <form method="POST" action="{{ route('admin.events.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- event name -->
            <div class="mt-4">
                <x-input-label for="title" :value="__('Event title')" />

                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <!-- Description -->
            <div class="mt-4">
                <x-input-label for="description" :value="__('Description')" />

                <x-textarea id="description" class="ckeditor block mt-1 w-full" type="text" name="description" :value="old('description')" placeholder="Description" autofocus required />
            </div>

            <!-- event price -->
            <div class="mt-4">
                <x-input-label for="price" :value="__('Event Price')" />

                <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required autofocus />
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>

             <!-- thumbnail -->
             <div class="mt-4">
                <x-input-label for="thumbnail" :value="__('Thumbnail')" />

                <x-text-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" :value="old('thumbnail')" placeholder="Thumbnail" required autofocus/>
            </div>


            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Add event') }}
                </x-primary-button>
            </div>
        </form>
        </div>
        </div>

            </div>
        </div>
    </div>

    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
</x-app-layout>
