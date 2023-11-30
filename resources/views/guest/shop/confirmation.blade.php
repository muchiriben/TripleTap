<x-guests-layout>

  
    <div class="w-full min-h-screen bg-neutral-color p-4">
  
      <x-link-button :href="route('shop')" class="w-fit py-4">
        {{ __('Continue Shopping') }}
      </x-link-button>
  
      <div class="flex flex-col justify-center items-center bg-white shadow-lg p-4 rounded-lg my-4">
           <h1 class="uppercase font-bold text-xl sm:text-4xl text-accent-color">Thank you for shopping with us!!</h1>
           <span class="font-medium text-lg">You will be contacted in regards to delivery/pick-up.</span>
      </div>
    </div>
  
  </x-guests-layout>