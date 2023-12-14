<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-link-button class="w-fit shadow-xl bg-secondary-color text-light-color hover:text-accent-color" :href="route('admin.events.create')">
                {{ __('Add Event') }}
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
                                Title
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs tracking-wider text-left text-white font-bold uppercase dark:text-gray-400">
                                Description
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs tracking-wider text-left text-white font-bold uppercase dark:text-gray-400">
                              Price
                           </th>
                           <th scope="col" class="py-3 px-6 text-xs tracking-wider text-left text-white font-bold uppercase dark:text-gray-400">
                            Date
                            </th>
                            <th scope="col" class="p-4">
                                <span class="sr-only">View Registered</span>
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
                      @foreach ($events as $event)
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td class="p-2">
                                <img class="h-16 w-16 rounded-lg object-cover" src="{{ $event->thumbnail }}" alt="">
                              </td>
                            <td class="p-1 w-4">
                              {{ $event->id }}
                            </td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $event->title }}</td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">{{ $event->description }}</td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">{{ $event->price }}</td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $event->created_at->toDateString() }}</td>
                            <td class="py-1 px-6 text-sm font-medium text-right whitespace-nowrap">
                                <x-link-button class="bg-secondary-color text-light-color" :href=" route('admin.event.registrations', $event->id)">
                                  {{ __('Registrations') }}
                                </x-link-button>
                              </td>
                            <td class="py-1 px-6 text-sm font-medium text-right whitespace-nowrap">
                                <x-link-button class="bg-secondary-color text-light-color" :href=" route('admin.events.edit', $event->id)">
                                  {{ __('Edit') }}
                                </x-link-button>
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                  <form action="{{ route('admin.events.destroy',  $event) }}" method="POST">
                                      @csrf
                                      @method("DELETE")
                                      <x-primary-button class="ml-4 p-2 bg-red-500 rounded-md text-white shadow-md cursor-pointer">
                                          {{ __('Delete') }}
                                      </x-primary-button>
                                  </form>
                              </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
