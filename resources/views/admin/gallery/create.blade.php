<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-accent-color leading-tight">
            {{ __('New Gallery Image(s)') }}
        </h2>
    </x-slot>


        <div class="max-w-7lx h-5/6 py-12 px-2 m-auto sm:px-8 lg:px-12">
            <div class="bg-white shadow-md w-full h-5/6 m-auto py-6 px-4 sm:px-6 lg:px-8 rounded-md">
        <form method="POST" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data">
            @csrf

             <!-- gallery image -->
             <div class="mt-4">
                <x-input-label for="images" :value="__('Gallery Image(s)')" />

                <x-text-input id="images" class="block mt-1 w-full" type="file" name="images[]" :value="old('images[]')" placeholder="Gallery Image" required autofocus multiple/>
            </div>


            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Add Image(s)') }}
                </x-primary-button>
            </div>
        </form>
            </div>
        </div>

</x-app-layout>
