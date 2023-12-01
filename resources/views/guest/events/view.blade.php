<x-guests-layout>

    <section class="w-full" name="title">
        <div class="py-2 flex justify-around items-center h-auto w-full bg-secondary-color">
            
            <h2 class="font-bold text-xl text-accent-color leading-tight">
                {{ __('Our Events') }}
            </h2>
            
        </div>
    </section>

    <section class="events min-h-screen">
        <div class="grid grid-cols-1 gap-6 my-4 mx-8  sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($events as $event)
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="/events/register/individual/{{$event->id}}" class="rounded-t-lg">
                        <img class="border rounded-t-lg" src="{{ $event->thumbnail }}" alt="" />
                    </a>
                    <div class="p-4">
                        <a href="/events/register/individual/{{$event->id}}">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$event->name}}</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$event->description}}</p>
                        <a href="/events/register/individual/{{$event->id}}" class="inline-flex self-end w-fit items-center px-3 py-2 text-sm font-medium text-center text-light-color bg-primary-color rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Register
                            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach    
        </div>
    </section>

</x-guests-layout>
