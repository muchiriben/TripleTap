<x-guests-layout>

    <section class="w-full" name="title">
        <div class="py-2 flex justify-around items-center h-auto w-full bg-secondary-color">
            <div class="pt-2 relative text-gray-600">
                <form method="POST" action="{{ route('search') }}">
                    @csrf
                <input class="border-2 border-light-color bg-white h-10 px-5 pr-16 rounded-lg text-sm text-accent-color focus:outline-none"
                  type="search" name="search" placeholder="Search event">
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
                {{ __('Register event:') }} {{ $event->title }}
            </h2>
            <x-link-button :href=" route('cart')" class="mx-8 my-2 w-fit bg-light-color text-secondary-color font-semibold">
                {{ __('View Cart') }}
                <img class="h-6 w-6 mx-2" src="{{ asset('images/shopping-cart2.svg') }}" alt="">
            </x-link-button>
        </div>
    </section>

    <!-- products section -->
    <section class="event">

        <div class="max-w-7lx h-5/6 py-12 px-2 m-auto sm:px-8 lg:px-12">
           
            <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data">
                @csrf
    
                <x-text-input id="event_id" type="hidden" name="event_id" value="{{$event->id}}"/>
                <!-- full name -->
                <div class="mt-4">
                    <x-input-label for="name" :value="__('Full Name')" />
    
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
    
                <!-- Phone -->
                <div class="mt-4">
                    <x-input-label for="phone" :value="__('Phone')" />
    
                    <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                <!-- mpesa_code -->
                <div class="mt-4">
                    <x-input-label for="mpesa_code" :value="__('Mpesa Code')" />
    
                    <x-text-input id="mpesa_code" class="block mt-1 w-full" type="text" name="mpesa_code" :value="old('mpesa_code')" required autofocus />
                    <x-input-error :messages="$errors->get('mpesa_code')" class="mt-2" />
                </div>
    
    
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ml-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
            </div>
        
    </section>

</x-guests-layout>
