<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
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
                                Name
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs tracking-wider text-left text-white font-bold uppercase dark:text-gray-400">
                                Description
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs tracking-wider text-left text-white font-bold uppercase dark:text-gray-400">
                              Price
                           </th>
                            <th scope="col" class="p-4">
                                <span class="sr-only">View</span>
                            </th>
                            <th scope="col" class="p-4">
                              <span class="sr-only">Status</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                      @foreach ($products as $product)
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td class="p-1 w-4">
                              {{ $product->id }}
                            </td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $product->name }}</td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">{{ $product->description }}</td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">{{ $product->price }}</td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $product->created_at }}</td>
                            <td class="py-1 px-6 text-sm font-medium text-right whitespace-nowrap">
                              <x-secondary-button class="gradient" :href=" route('products.update', $product->id)">
                                {{ __('Edit') }}
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
