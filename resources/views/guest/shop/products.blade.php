<x-guests-layout>

    <section class="w-full" name="title">
        <div class="py-1 flex justify-around items-center flex-col sm:flex-row h-auto w-full bg-secondary-color">
          <div class="relative text-center text-gray-600">
            <form method="POST" action="{{ route('search') }}">
              @csrf
                <select name="manufacturer_id" id="manufacturer_id" class= "block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                  <option value="">--Select Manufacturer--</option>
                    @foreach ($manufacturers as $manufacturer)
                        <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                    @endforeach
                </select>
            </form>
          </div>

        <div class="pt-3 pb-2 relative text-center text-gray-600">
                <form method="POST" action="{{ route('search') }}">
                    @csrf
                <input class="border-2 border-light-color bg-white h-8 px-4 pr-16 rounded-lg w-64 text-sm text-accent-color focus:outline-none"
                  type="search" name="search" placeholder="Search Accessories">
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

          <div class="flex items-center justify-center flex-row gap-1">
            <x-link-button :href=" route('cart')" class="my-2 w-fit h-8 bg-light-color text-secondary-color font-semibold">
              <img class="h-6 w-6 mx-2" src="{{ asset('images/shopping-cart2.svg') }}" alt="">
                {{ __('Cart') }} ( {{Cart::instance('default')->count() }} )
            </x-link-button>
            <x-modal-button x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'cart')" class="my-2 w-fit h-8 bg-light-color text-secondary-color font-semibold">
            <img class="h-8 w-8" src="{{ asset('images/dropdown.svg') }}" alt="">
            </x-modal-button>
          </div>
        </div>
    </section>

    <!-- products section -->
    <section class="products min-h-screen">
      @include('includes.messages')

        <div class="grid grid-cols-1 gap-8 my-4 mx-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach($products as $product)
            <a href="" class="h-72 w-72 mb-2 sm:w-72">
              <div class="flex flex-col h-full w-full">
                   <div class="flex justify-center items-center h-3/5 shadow-xl rounded-lg bg-nuetral-color">
                       <img class="h-full w-full rounded-lg object-contain" src="{{ $product->image }}" alt="">
                   </div>
                   <div class="flex flex-col justify-between m-1 h-1/5 px-2 w-full">
                     <div class="flex flex-col w-full">
                        <h2 class="font-bold text-lg lg:text-base">KSh {{ $product->selling_price }}</h2>
                        <h2 class="font-bold text-lg lg:text-base">{{ $product->name }}</h2>
                        @if ($product->quantity == 0)
                          <h2 class="font-bold text-md lg:text-base text-red-500">(Out of Stock)
                          </h2>
                        @endif
                     </div>
                     <div class="flex justify-center items-center p-2 w-full">
                        <form action="{{ route('cart.store') }}" method="POST">
                            @csrf
                            <x-text-input type="hidden" name="id" value="{{ $product->id }}"/>
                            <x-text-input type="hidden" name="name" value="{{ $product->name }}"/>
                            <x-text-input type="hidden" name="quantity" value="{{ $product->quantity }}"/> 
                            <x-text-input type="hidden" name="price" value="{{ $product->selling_price }}"/>
                            <x-primary-button class="bg-secondary-color shadow-md rounded-md flex flex-row gap-2 w-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 lg:h-8 lg:w-8" fill="none" viewBox="0 0 24 24" stroke="#F2F7FF" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                    <span class="font-medium text-xs text-center text-color-light">Add To Cart</span> 
                          </x-primary-button>
                          
                          </form> 
                        
                     </div>
                </div>
              </div>
            </a>  
              @endforeach
        </div>
    </section>

    @include('guest.shop.cart-modal')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script>
         $(document).ready(function() {
        $('#manufacturer_id').on('change', function() {
            var manufacturerID = $(this).val();
            if(manufacturerID) {
              window.location = '/shop/manufacturer/accessories/'+manufacturerID;
              }else{
                $('#manufacturer_id').empty();
              }
        });
    });
    </script>

</x-guests-layout>
