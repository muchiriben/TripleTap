<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-accent-color leading-tight">
            {{ __('Edit Course ') }}
        </h2>
    </x-slot>

        <div class="max-w-7lx h-5/6 py-12 px-2 m-auto sm:px-8 lg:px-12">
            <div class="bg-white shadow-md w-full h-5/6 m-auto py-6 px-4 sm:px-6 lg:px-8 rounded-md">
        <form method="POST" action="{{ route('admin.courses.update', $course->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Course Name')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $course->name }}" required autofocus />
            </div>

            <!-- Description -->
            <div class="mt-4">
                <x-input-label for="description" :value="__('Description')" />

                <x-textarea id="description" class="block mt-1 w-full" type="text" name="description" value="{{ $course->description }}" placeholder="Description" autofocus required />
            </div>

            <!-- course price -->
            <div class="mt-4">
                <x-input-label for="price" :value="__('Course Price')" />

                <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" value="{{ $course->price }}" required autofocus />
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>

             <!-- course image -->
             <div class="mt-4">
                <x-input-label for="image" :value="__('course Image')" />
    
                <x-text-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" :value="old('thumbnail')" placeholder="course thumbnail" autofocus />
    
                <x-text-input id="old_image" type="hidden" name="old_image" value="{{ $course->thumbnail }}" autofocus />
                <x-text-input id="old_imageId" type="hidden" name="old_imageId" value="{{ $course->imageId }}" autofocus />  
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Edit course') }}
                </x-primary-button>
            </div>
        </form>
            </div>
        </div>

</x-app-layout>
