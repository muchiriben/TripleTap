<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('SubCategories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                
                <table class="min-w-full divide-y divide-gray-200 table-fixed">
                    <thead class="bg-primary-color">
                        <tr>
                            <th scope="col" class="p-4">
                                <div class="flex items-center text-white">
                                    Id
                                </div>
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs tracking-wider text-left text-white font-bold uppercase dark:text-gray-400">
                                SubCategory Name
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs tracking-wider text-left text-white font-bold uppercase dark:text-gray-400">
                                Category Name
                            </th>
                            <th scope="col" class="p-4">
                                <span class="sr-only">Edit</span>
                            </th>
                            <th scope="col" class="p-4">
                              <span class="sr-only">Delete</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                      @foreach ($subcategories as $subcategory)
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td class="p-1 w-4">
                              {{ $subcategory->id }}
                            </td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $subcategory->name }}</td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">{{ $subcategory->category_id  }}</td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $subcategory->created_at }}</td>
                            <td class="py-1 px-6 text-sm font-medium text-right whitespace-nowrap">
                              <x-secondary-button class="gradient" :href="route('admin.subcategories.update', $subcategory->id)">
                                {{ __('Edit') }}
                            </x-secondary-button>
                            </td>
                            <td class="py-1 px-6 text-sm font-medium text-right whitespace-nowrap">
                                <x-secondary-button class="gradient" :href=" route('admin.subcategories.update', $subcategory->id)">
                                  {{ __('Delete') }}
                              </x-secondary-button>
                              </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
