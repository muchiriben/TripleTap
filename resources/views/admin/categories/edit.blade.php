<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-accent-color leading-tight">
            {{ __('Edit Category ') }}
        </h2>
    </x-slot>

        <div class="max-w-7lx h-5/6 py-12 px-2 m-auto sm:px-8 lg:px-12">
            <div class="bg-white shadow-md w-full h-5/6 m-auto py-6 px-4 sm:px-6 lg:px-8 rounded-md">
        <form method="POST" action="{{ route('admin.categories.update', $category) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Category Name')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $category->name }}" required autofocus />
            </div>

             <!-- Category image -->
             <div class="mt-4">
                <x-input-label for="image" :value="__('Change Menu Category Image')" />
    
                <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" placeholder="category Image" autofocus />
    
                <x-text-input id="old_image" type="hidden" name="old_image" value="{{ $category->image }}" autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Edit Category') }}
                </x-primary-button>
            </div>
        </form>
            </div>
        </div>

</x-app-layout>
