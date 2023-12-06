<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Storage Applications') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg overflow-x-auto">
                
                <table class="min-w-full divide-y divide-gray-200 table-fixed overflow-x-auto">
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
                                Phone
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs tracking-wider text-left text-white font-bold uppercase dark:text-gray-400">
                              Serial No
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs tracking-wider text-left text-white font-bold uppercase dark:text-gray-400">
                                FC No
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs tracking-wider text-left text-white font-bold uppercase dark:text-gray-400">
                               Item Type
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs tracking-wider text-left text-white font-bold uppercase dark:text-gray-400">
                                Model
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs tracking-wider text-left text-white font-bold uppercase dark:text-gray-400">
                               Expected Deposited Date
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs tracking-wider text-left text-white font-bold uppercase dark:text-gray-400">
                                Actual Deposited Date
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs tracking-wider text-left text-white font-bold uppercase dark:text-gray-400">
                                Collection Date
                            </th> 
                            <th scope="col" class="py-3 px-6 text-xs tracking-wider text-left text-white font-bold uppercase dark:text-gray-400">
                                Status
                             </th>
                             <th scope="col" class="p-4">
                                <span class="sr-only">Deposit</span>
                            </th>
                            <th scope="col" class="p-4">
                                <span class="sr-only">Collection</span>
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs tracking-wider text-left text-white font-bold uppercase dark:text-gray-400">
                                application Date
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                      @foreach ($applications as $application)
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td class="p-1 w-4">
                              {{ $application->id }}
                            </td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $application->name }}</td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">{{ $application->phone }}</td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">{{ $application->serial_no }}</td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">{{ $application->fc_no }}</td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">{{ $application->item_type }}</td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">{{ $application->model }}</td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">{{ $application->expected_deposit_date }}</td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">{{ $application->actual_deposit_date }}</td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">{{ $application->actual_collection_date }}</td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">
                                @if ($application->actual_collection_date)
                                    Collected/Sold
                                @else
                                    Not Collected
                                @endif
                            </td>
                            <td class="py-1 px-6 text-sm font-medium text-right whitespace-nowrap">
                                <x-secondary-button class="gradient" :href=" route('admin.storage.update', $application->id)">
                                  {{ __('Set Deposit Date') }}
                              </x-secondary-button>
                              </td>
                            <td class="py-1 px-6 text-sm font-medium text-right whitespace-nowrap">
                            <x-secondary-button class="gradient" :href=" route('admin.storage.update', $application->id)">
                                {{ __('Set Collection Date') }}
                            </x-secondary-button>
                            </td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $application->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div id="deposit">
            <form method="POST" action="{{ route('admin.storage.update', $application->id) }}">
                @csrf

                <!-- actual_deposit_date -->
                <div>
                    <x-input-label for="actual_deposit_date" :value="__('Set Actual Deposit Date')" />
    
                    <x-text-input id="actual_deposit_date" class="block mt-1 w-full" type="text" name="actual_deposit_date" :value="old('actual_deposit_date')" required autofocus />
                </div>
    
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ml-4">
                        {{ __('Add Date') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
