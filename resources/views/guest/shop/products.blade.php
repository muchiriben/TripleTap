<x-guest-layout>

    <section name="title">
        <div class="p-8 flex justify-center items-center">
            <h2 class="font-bold text-xl text-accent-color leading-tight">
                {{ __('Our Menu') }}
            </h2>
        </div>
    </section>

    <!-- products section -->
    <section class="products">
        <x-secondary-button :href="route('cart')" class="mx-8 my-2">
            {{ __('View Cart') }}
        </x-secondary-button>

        <div class="grid grid-cols-2 gap-6 my-4 mx-8  sm:grid-cols-3 lg:grid-cols-1">
            @foreach($products as $product)
            <a href="">
              <div class="flex flex-col h-60">
                   <div class="flex justify-center items-center h-3/5 shadow-xl rounded-lg bg-nuetral-color">
                       <img class="h-full w-full m-4 object-contain" src="{{ $product->image }}" alt="">
                   </div>
                   <div class="flex flex-row justify-between m-2 h-1/5 px-2 w-full">
                     <div class="flex flex-col">
                        <h2 class="font-bold text-sm lg:text-base">KSh {{ $product->price }}</h2>
                        <h2 class="font-bold text-sm lg:text-base">{{ $product->name }}</h2>
                     </div>
                     <div class="flex justify-center items-center p-2">
                        <form action="{{ route('cart.store') }}" method="POST">
                            @csrf
                            <x-text-input type="hidden" name="id" value="{{ $product->id }}"/>
                            <x-text-input type="hidden" name="name" value="{{ $product->name }}"/>
                            <x-text-input type="hidden" name="price" value="{{ $product->price }}"/>
                            <x-primary-button class="bg-white shadow-md rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 lg:h-8 lg:w-8" fill="none" viewBox="0 0 24 24" stroke="#ffffff" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /> 
                          </x-primary-button>
                          </form> 
                        
                     </div>
                </div>
              </div>
            </a>  
              @endforeach
        </div>

        <x-secondary-button :href="route('cart')" class="flex self-end mx-8 my-2">
            {{ __('View Cart') }}
        </x-secondary-button>
    </section>

</x-guest-layout>
