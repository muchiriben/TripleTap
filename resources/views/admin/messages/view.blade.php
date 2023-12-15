<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Messages') }}
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
                                First Name
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs tracking-wider text-left text-white font-bold uppercase dark:text-gray-400">
                                Last Name
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs tracking-wider text-left text-white font-bold uppercase dark:text-gray-400">
                                Phone
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs tracking-wider text-left text-white font-bold uppercase dark:text-gray-400">
                                Email
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs tracking-wider text-left text-white font-bold uppercase dark:text-gray-400">
                                Message
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
                      @foreach ($messages as $message)
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td class="p-1 w-4">
                              {{ $message->id }}
                            </td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $message->fname }}</td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $message->lname }}</td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $message->phone }}</td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $message->email }}</td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $message->message }}</td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $message->created_at->toDateString() }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <x-link-button class="bg-red-500 text-light-color" :href=" route('admin.message.destroy', $message->id)">
                                    {{ __('Delete') }}
                                </x-link-button>
                              </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            {{ $messages->links() }}
        </div>
    </div>
</x-app-layout>
