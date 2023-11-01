<x-guests-layout>
  
    <div class="bg-neutral-color py-4">
      <div class="flex flex-col sm:flex-row justify-center bg-white shadow-lg p-8 rounded-lg my-4 mx-4">
          
        <div class="w-full border-r-2 border-gray-300 sm:w-3/5">
  
          <form method="POST" action="{{ route('checkout.store') }}">
              @csrf
     
              <div id="billing" class="flex flex-col justify-center mr-8">
                  <h1 class="font-semibold capitalize text-base sm:text-lg mb-2 text-accent-color">Billing Details.</h1>
                  <span class="text-primary-color font-semibold">Payment through Mpesa Till(Till Number: 11223344)</span>
  
              <!-- mpesa code -->
              <div class="mt-4">
                <x-input-label for="mpesa_code" :value="__('Mpesa Payment Code')" />

                <x-text-input id="mpesa_code" class="block mt-1 w-full" type="text" name="mpesa_code" placeholder="e.g. QWE34RTY" required />
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
                  <x-input-label for="phone" :value="__('Mpesa Phone Number(For payment)')" />
  
                  <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" placeholder="e.g. 0712345678" required />
              </div>
  
              <!-- notes -->
              <div class="mt-4">
                <x-input-label for="notes" :value="__('Order Notes')" /><span class="text-primary-color font-semibold">(Optional: Any additional delivery instructions)</span>
  
                <x-textarea id="notes" class="block mt-1 w-full" type="text" name="notes" :value="old('notes')" placeholder="notes" autofocus/>
            </div>
  
              <div class="flex items-center justify-end mt-4">
                  <x-primary-button class="ml-4">
                      {{ __('Checkout') }}
                  </x-primary-button>
              </div>
          </div>
              
      </form>
  </div>
  
          <div class="w-full sm:w-2/5 p-4 text-center">
              <h1 class="font-semibold capitalize text-lg mb-6 text-accent-color">Your Orders</h1>
              <table class="min-w-full divide-y-2 divide-gray-200">
                  
                  <tbody class="bg-white divide-y divide-gray-200">
                      
                    @foreach (Cart::content() as $item)
                    <tr>
                      <td class="py-4 whitespace-nowrap">
                          <div class="flex items-center">
                            <div class="flex justify-center items-center h-16 w-16 rounded-lg   bg-neutral-color">
                              @foreach ($products as $product) 
                              @if ($product->id == $item->model->id)
                              @if ($product->image != null)
                              <img class="h-12 w-12 rounded-lg object-cover" src="{{ $product->image }}" alt="">
                              @endif
                              @endif
                              @endforeach
                          </div>  
                            <div class="ml-6">
                              <div class="text-sm font-medium text-black">
                              {{ $item->model->name }}
                              </div>
                            </div>
                          </div>
                        </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm text-black">Ksh {{ $item->model->price }} /=</div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm text-black">{{ $item->qty }}</div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm text-black">{{ $item->model->price * $item->qty}} /=</div>
                      </td>
                    </tr>
                    @endforeach
          
                    <!-- More items... -->
                  </tbody>
                  <span class="text-left font-semibold text-xl text-accent-color">Total to be paid(Including delivery fee( KSh 60): {{ Cart::instance('default')->subtotal(0) + 60 }} /=</span>
                </table>
          </div>
        
      </div>
    </div>
        
  </x-guests-layout>