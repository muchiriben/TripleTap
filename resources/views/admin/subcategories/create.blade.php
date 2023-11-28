<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-accent-color leading-tight">
            {{ __('New SubCategory ') }}
        </h2>
    </x-slot>


        <div class="max-w-7lx h-5/6 py-12 px-2 m-auto sm:px-8 lg:px-12">
            <div class="bg-white shadow-md w-full h-5/6 m-auto py-6 px-4 sm:px-6 lg:px-8 rounded-md">
        <form method="POST" action="{{ route('admin.subcategories.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('SubCategory Name')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <div>
                <x-input-label for="category_id" :value="__('Category')" />

                <x-text-input id="category_id" class="block mt-1 w-full" type="text" name="category_id" value="1" required autofocus />
            </div>

             <!-- category image -->
             <div class="mt-4">
                <x-input-label for="image" :value="__('SubCategory Image')" />

                <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" placeholder="SubCategory Image" required autofocus />
            </div>


            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Add SubCategory') }}
                </x-primary-button>
            </div>
        </form>
            </div>
        </div>

</x-app-layout>
