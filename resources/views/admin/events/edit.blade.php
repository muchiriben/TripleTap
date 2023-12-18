<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-accent-color leading-tight">
            {{ __('Edit Event ') }}
        </h2>
    </x-slot>

        <div class="max-w-7lx h-5/6 py-12 px-2 m-auto sm:px-8 lg:px-12">
            <div class="bg-white shadow-md w-full h-5/6 m-auto py-6 px-4 sm:px-6 lg:px-8 rounded-md">
        <form method="POST" action="{{ route('admin.events.update', $event->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <!-- Name -->
            <div>
                <x-input-label for="title" :value="__('Event Title')" />

                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ $event->title }}" required autofocus />
            </div>

            <!-- Description -->
            <div class="mt-4">
                <x-input-label for="description" :value="__('Description')" />

                <x-textarea id="description" class="ckeditor block mt-1 w-full" type="text" name="description" value="{{ $event->description }}" placeholder="Description" autofocus required>{{ $event->description }}</x-textarea>
            </div>

            <!-- event price -->
            <div class="mt-4">
                <x-input-label for="price" :value="__('event Price')" />

                <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" value="{{ $event->price }}" required autofocus />
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>

             <!-- event image -->
             <div class="mt-4">
                <x-input-label for="image" :value="__('Event Image')" />
    
                <x-text-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" :value="old('thumbnail')" placeholder="event thumbnail" autofocus />
    
                <x-text-input id="old_image" type="hidden" name="old_image" value="{{ $event->thumbnail }}" autofocus />
                <x-text-input id="old_imageId" type="hidden" name="old_imageId" value="{{ $event->imageId }}" autofocus />  
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Edit Event') }}
                </x-primary-button>
            </div>
        </form>
            </div>
        </div>

    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
</x-app-layout>
