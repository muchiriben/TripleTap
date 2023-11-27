<x-guests-layout>

    <section class="w-full" name="title">
        <div class="py-2 flex justify-around items-center h-auto w-full bg-secondary-color">
            <div class="pt-2 relative text-gray-600">
                <form method="POST" action="{{ route('search') }}">
                    @csrf
                <input class="border-2 border-light-color bg-white h-10 px-5 pr-16 rounded-lg text-sm text-accent-color focus:outline-none"
                  type="search" name="search" placeholder="Search course">
                <button type="submit" class="absolute right-0 top-0 mt-5 mr-4">
                  <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                    viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                    width="512px" height="512px">
                    <path
                      d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                  </svg>
                </button>
            </form>
              </div>
              <h2 class="font-bold text-xl text-accent-color leading-tight">
                {{ __('Our Courses') }}
            </h2>
            <x-link-button :href=" route('cart')" class="mx-8 my-2 w-fit bg-light-color text-secondary-color font-semibold">
                {{ __('View Cart') }}
                <img class="h-6 w-6 mx-2" src="{{ asset('images/shopping-cart2.svg') }}" alt="">
            </x-link-button>
        </div>
    </section>

    <section class="courses">
        <div class="grid grid-cols-1 gap-6 my-4 mx-8  sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($courses as $course)
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#" class="rounded-t-lg">
                        <img class="border rounded-t-lg" src="{{ asset('images/taurus2.jpg') }}" alt="" />
                    </a>
                    <div class="p-4">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$course->name}}</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$course->description}}</p>
                        <a href="/courses/register/{{$course->id}}" class="inline-flex self-end w-fit items-center px-3 py-2 text-sm font-medium text-center text-light-color bg-primary-color rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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
