<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Event Registrations') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-x-auto shadow-sm sm:rounded-lg">
                
                <table class="min-w-full divide-y divide-gray-200 table-fixed">
                    <thead class="bg-primary-color">
                        <tr>
                            <th scope="col" class="p-4">
                                <div class="flex items-center text-white">
                                    Id
                                </div>
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs tracking-wider text-left text-white font-bold uppercase dark:text-gray-400">
                                Event Id
                             </th>
                            <th scope="col" class="py-3 px-6 text-xs tracking-wider text-left text-white font-bold uppercase dark:text-gray-400">
                                Event Name
                             </th>
                            <th scope="col" class="py-3 px-6 text-xs tracking-wider text-left text-white font-bold uppercase dark:text-gray-400">
                               Individual Name
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs tracking-wider text-left text-white font-bold uppercase dark:text-gray-400">
                                Individual Age
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs tracking-wider text-left text-white font-bold uppercase dark:text-gray-400">
                                Individual Phone
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs tracking-wider text-left text-white font-bold uppercase dark:text-gray-400">
                                Individual National Id
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs tracking-wider text-left text-white font-bold uppercase dark:text-gray-400">
                                Individual Location
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs tracking-wider text-left text-white font-bold uppercase dark:text-gray-400">
                                Individual Proffession
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs tracking-wider text-left text-white font-bold uppercase dark:text-gray-400">
                                Leader Name
                             </th>
                             <th scope="col" class="py-3 px-6 text-xs tracking-wider text-left text-white font-bold uppercase dark:text-gray-400">
                                 Leader Phone
                             </th>
                             <th scope="col" class="py-3 px-6 text-xs tracking-wider text-left text-white font-bold uppercase dark:text-gray-400">
                                 Leader National Id
                             </th>
                             <th scope="col" class="py-3 px-6 text-xs tracking-wider text-left text-white font-bold uppercase dark:text-gray-400">
                                 Leader Location
                             </th>
                             <th scope="col" class="py-3 px-6 text-xs tracking-wider text-left text-white font-bold uppercase dark:text-gray-400">
                                Group Relation
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs tracking-wider text-left text-white font-bold uppercase dark:text-gray-400">
                                From Age
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs tracking-wider text-left text-white font-bold uppercase dark:text-gray-400">
                                To Age
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs tracking-wider text-left text-white font-bold uppercase dark:text-gray-400">
                                Group No
                            </th>
                           <th scope="col" class="py-3 px-6 text-xs tracking-wider text-left text-white font-bold uppercase dark:text-gray-400">
                            Date
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                      @foreach ($registrations as $registration)
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td class="p-1 w-4">
                              {{ $registration->id }}
                            </td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $registration->event_id }}</td>    
                            @foreach ($events as $event) 
                                @if ($event->id == $registration->event_id)
                                    <td class="py-1 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $event->name }}
                                    </td>   
                                @endif
                            @endforeach
                            <td class="py-1 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $registration->individual_name }}</td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">{{ $registration->individual_age }}</td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">{{ $registration->individual_phone }}</td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">{{ $registration->individual_national_id }}</td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">{{ $registration->individual_location }}</td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">{{ $registration->individual_proffession }}</td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">{{ $registration->leader_name }}</td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">{{ $registration->leader_phone }}</td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">{{ $registration->leader_national_id }}</td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">{{ $registration->leader_location }}</td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">{{ $registration->group_relation }}</td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">{{ $registration->from_age }}</td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">{{ $registration->to_age }}</td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">{{ $registration->group_no }}</td>
                            <td class="py-1 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $registration->created_at->toDateString() }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
