<x-guests-layout>

  
    <div class="w-full min-h-screen bg-neutral-color p-4">
  
      <x-link-button :href="route('home')" class="w-fit py-4">
        {{ __('Home') }}
      </x-link-button>
  
      <div class="flex flex-col justify-center items-center bg-white shadow-lg p-4 rounded-lg my-4">
           <h1 class="uppercase font-bold text-xl sm:text-4xl text-accent-color">Thank you for registering for the course!!</h1>
           <span class="font-medium text-lg">You will be contacted in regards to your acceptance and payment.</span>
      </div>
    </div>
  
  </x-guests-layout>