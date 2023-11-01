<x-guests-layout>

  
    <div class="bg-neutral-color w-1/2 m-8 py-4 mx-8">
  
      <x-link-button :href="route('home')">
        {{ __('Back Home') }}
      </x-link-button>
  
      <div class="flex flex-col justify-center items-center bg-white shadow-md p-4 rounded-lg my-4">
           <h1 class="uppercase font-bold text-xl sm:text-4xl text-accent-color">Order placement is successfull!!.</h1>
           <span class="font-medium text-lg">You will be contacted by the delivery person.</span>
      </div>
    </div>
  
  </x-guests-layout>