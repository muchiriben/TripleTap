<x-guests-layout>

  <section name="title" class="w-full flex justify-center items-center">
    <div class="p-2 flex justify-around items-center flex-col sm:flex-row h-auto w-full sm:w-1/2 bg-secondary-color sm:rounded-lg">
      <x-link-button href="{{url()->previous()}}" class="mx-8 my-2 w-fit bg-light-color text-secondary-color font-semibold">
        <img class="h-6 w-6 mx-2" src="{{ asset('images/back.svg') }}" alt="">
        {{ __('Back') }}
      </x-link-button>
        <h2 class="font-bold text-xl text-accent-color leading-tight">
            {{ __('Checkout') }}
        </h2>
        <x-link-button :href=" route('cart')" class="my-2 w-fit h-8 bg-light-color text-secondary-color font-semibold">
          <img class="h-6 w-6 mx-2" src="{{ asset('images/shopping-cart2.svg') }}" alt="">
            {{ __('Cart') }} ( {{Cart::instance('default')->count() }} )
        </x-link-button>
    </div>
</section>
  
    <div class="bg-neutral-color py-4 px-4 w-full">
      <div class="flex flex-col sm:flex-row justify-center bg-white shadow-lg p-8 rounded-lg my-4">
          
        <div class="w-full">
  
          <form method="POST" action="{{ route('checkout.store') }}">
              @csrf
     
              <div id="billing" class="flex flex-col justify-center mr-8">
                  <h1 class="font-semibold capitalize text-base sm:text-lg mb-2 text-accent-color">Payment Details.</h1>
                  <span class="text-primary-color font-semibold">Payment through Mpesa: Pay Bill</span>
                  <span class="text-primary-color font-semibold">Bussiness Number: 400200 </span>
                  <span class="text-primary-color font-semibold">Account Number: 01143756330700 </span>
                  <span class="text-primary-color font-semibold">Total to be paid: <span class="text-accent-color font-bold" >{{ Cart::instance('default')->subtotal(0) }} /=</span></span>
  
              <!-- mpesa code -->
              <div class="mt-4">
                <x-input-label for="mpesa_code" :value="__('Mpesa Payment Code')" />

                <x-text-input id="mpesa_code" class="block mt-1 w-full" type="text" name="mpesa_code" placeholder="e.g. QWE34RTY" required/>
            </div>

              <!-- Name -->
              <div class="mt-4">
                  <x-input-label for="Name" :value="__('Full Name')" />
  
                  <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" placeholder="e.g. John Doe" required />
              </div>
  
               <!-- Location -->
               <div class="mt-4">
                  <x-input-label for="location" :value="__('Delivery Location')" />
  
                  <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" placeholder="e.g. Madaraka, Siwaka Estate" required />
              </div>
  
              <!-- Phone -->
              <div class="mt-4">
                  <x-input-label for="phone" :value="__('Contact Phone Number - During Delivery')" />
  
                  <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" placeholder="e.g. 0712345678" required />
              </div>
  
              <!-- notes -->
              <div class="mt-4">
                <x-input-label for="notes" :value="__('Order Notes')" /><span class="text-primary-color font-semibold">(Optional: Any additional delivery instructions)</span>
  
                <x-textarea id="notes" class="block mt-1 w-full" type="text" name="notes" :value="old('notes')" placeholder="notes"/>
            </div>
  
              <div class="flex items-center justify-end mt-4">
                  <x-primary-button class="ml-4">
                      {{ __('Finish') }}
                  </x-primary-button>
              </div>
          </div>
              
      </form>
  </div>
        
  </div>
  </div>
        
  </x-guests-layout>