<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-accent-color leading-tight">
            {{ __('New Product ') }}
        </h2>
    </x-slot>


        <div class="max-w-7lx h-5/6 py-12 px-2 m-auto sm:px-8 lg:px-12">
            <div class="bg-white shadow-md w-full h-5/6 m-auto py-6 px-4 sm:px-6 lg:px-8 rounded-md">
        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Product Name')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

             <!-- Price -->
             <div class="mt-4">
                <x-input-label for="price" :value="__('Price')" />

                <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" required />
            </div>

             <!-- Product image -->
             <div class="mt-4">
                <x-input-label for="product_image" :value="__('Product Image')" />

                <x-text-input id="product_image" class="block mt-1 w-full" type="file" name="product_image" :value="old('product_image')" placeholder="Product Image" autofocus />
            </div>

            <!-- Description -->
            <div class="mt-4">
                <x-input-label for="description" :value="__('Description')" />

                <x-textarea id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" placeholder="Description" autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Add Product') }}
                </x-primary-button>
            </div>
        </form>
            </div>
        </div>

</x-app-layout>
