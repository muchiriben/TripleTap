<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-accent-color leading-tight">
            {{ __('Edit SubCategory ') }}
        </h2>
    </x-slot>

        <div class="max-w-7lx h-5/6 py-12 px-2 m-auto sm:px-8 lg:px-12">
            <div class="bg-white shadow-md w-full h-5/6 m-auto py-6 px-4 sm:px-6 lg:px-8 rounded-md">
        <form method="POST" action="{{ route('admin.subcategories.update', $subcategory->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('SubCategory Name')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $subcategory->name }}" required autofocus />
            </div>

             <!-- Category -->
          <div class="mt-4">
            <x-input-label for="category_id" :value="__('Category')" />

            <select name="category_id" id="category_id" class= "block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
              <option value="{{ $category->id }}">{{ $category->name }}</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
          </div>

             <!-- subCategory image -->
             <div class="mt-4">
                <x-input-label for="image" :value="__('SubCategory Image')" />
    
                <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" placeholder="subcategory Image" autofocus />
    
                <x-text-input id="old_image" type="hidden" name="old_image" value="{{ $subcategory->image }}" autofocus />
                <x-text-input id="old_imageId" type="hidden" name="old_imageId" value="{{ $subcategory->imageId }}" autofocus />    
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Edit SubCategory') }}
                </x-primary-button>
            </div>
        </form>
            </div>
        </div>

</x-app-layout>
