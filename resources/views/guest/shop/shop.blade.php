<x-guests-layout>

    <section class="w-full" name="title">
        <div class="py-1 flex justify-around items-center h-auto w-full bg-secondary-color">
            <div class="pt-3 pb-2 relative text-center text-gray-600">
                <form method="POST" action="{{ route('search') }}">
                    @csrf
                <input class="border-2 border-light-color bg-white h-8 px-5 pr-16 rounded-lg text-sm text-accent-color focus:outline-none"
                  type="search" name="search" placeholder="Manufacturer">
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

        <div class="pt-3 pb-2 relative text-center text-gray-600">
                <form method="POST" action="{{ route('search') }}">
                    @csrf
                <input class="border-2 border-light-color bg-white h-8 px-5 pr-16 rounded-lg text-sm text-accent-color focus:outline-none"
                  type="search" name="search" placeholder="Accessories">
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

            <x-link-button :href=" route('cart')" class="mx-8 my-2 w-fit h-8 bg-light-color text-secondary-color font-semibold">
              <img class="h-6 w-6 mx-2" src="{{ asset('images/shopping-cart2.svg') }}" alt="">
                {{ __('Cart') }} ( {{Cart::instance('default')->count() }} )
            </x-link-button>
        </div>
    </section>

    <!-- products section -->
    <section class="categories">

        <div class="grid grid-cols-1 gap-8 my-4 mx-8  sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach($categories as $category)
            <a href="/shop/{{ $category->id }}" class="h-60 w-56">
              <div class="flex flex-col h-full w-full">
                   <div class="flex justify-center items-center h-48 w-full shadow-xl rounded-lg bg-nuetral-color">
                       <img class="h-full w-full rounded-lg object-cover" src="{{ $category->image }}" alt="">
                   </div>
                   <div class="flex flex-row justify-between m-2 h-1/5 px-2 w-full">
                        <h2 class="font-bold text-sm lg:text-base">{{ $category->name }}</h2>
                </div>
              </div>
            </a>  
              @endforeach
        </div>
    </section>

</x-guests-layout>
