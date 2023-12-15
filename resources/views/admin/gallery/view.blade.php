<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gallery Images') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-link-button class="w-fit shadow-xl bg-secondary-color text-light-color hover:text-accent-color" :href="route('admin.gallery.create')">
                {{ __('Add New Image') }}
              </x-link-button>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                
                <table class="min-w-full divide-y divide-gray-200 table-fixed">
                    <thead class="bg-primary-color">
                        <tr>
                            <th scope="col" class="p-4">
                                <span class="sr-only">Image</span>
                            </th>
                            <th scope="col" class="p-4">
                                <div class="flex items-center text-white">
                                    Id
                                </div>
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs tracking-wider text-left text-white font-bold uppercase dark:text-gray-400">
                                Link
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs tracking-wider text-left text-white font-bold uppercase dark:text-gray-400">
                                Date
                            </th>
                            <th scope="col" class="p-4">
                              <span class="sr-only">Delete</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                      @foreach ($images as $image)
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td class="p-2">
                                <img class="h-24 w-24 rounded-lg object-cover" src="{{ $image->image }}" alt="">
                              </td>
                            <td class="p-1 w-4">
                              {{ $image->id }}
                            </td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"><a href="{{$image->image}}" target="_blank">{{ $image->image }}</a></td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $image->created_at->toDateString() }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <x-link-button class="bg-red-500 text-light-color" :href=" route('admin.gallery.destroy', $image->id)">
                                    {{ __('Delete') }}
                                </x-link-button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            {{ $images->links() }}
        </div>
    </div>
</x-app-layout>
