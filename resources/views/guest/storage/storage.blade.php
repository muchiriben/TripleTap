<x-guests-layout>

    <section class="w-full" name="title">
        <div class="py-2 flex justify-around items-center h-auto w-full bg-secondary-color">
            <h2 class="font-bold text-xl text-accent-color leading-tight">
                {{ __('Storage Service') }}
            </h2>
        </div>
    </section>

    <!-- products section -->
    <section class="course min-h-screen w-full p-2 flex items-center justify-center flex-col">

        <div class="max-w-7lx h-5/6 w-full py-12 px-2 m-4 bg-light-color shadow-xl sm:px-8 lg:px-12">    

        <fieldset id="individual_form" class="flex flex-col items-start w-full p-4 border-2 border-secondary-color rounded-md mt-4">
            <legend class="px-2 font-bold">Storage Form:</legend>
            <form id="individual-form" class="w-full" method="POST" action="{{ route('storage.store') }}">
                @csrf
                
                    <div class="flex flex-col items-start justify-center w-full mb-2">
                        <x-input-label for="name" :value="__('Full Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    
                    <div class="flex flex-col items-start justify-center w-full mb-2">
                        <x-input-label for="phone" :value="__('Phone Number')" />
                        <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('individual_phone')" required autofocus />
                        <x-input-error :messages="$errors->get('individual_phone')" class="mt-2" />
                    </div>

                    <div class="flex flex-col items-start justify-center w-full mb-2">
                        <x-input-label for="serial_no" :value="__('Item Serial No.')" />
                        <x-text-input id="serial_no" class="block mt-1 w-full" type="text" name="serial_no" :value="old('serial_no')" required autofocus />
                        <x-input-error :messages="$errors->get('serial_no')" class="mt-2" />
                    </div>

                    <div class="flex flex-col items-start justify-center w-full mb-2">
                        <x-input-label for="fc_no" :value="__('FC No.')" />
                        <x-text-input id="fc_no" class="block mt-1 w-full" type="text" name="fc_no" :value="old('fc_no')" required autofocus />
                        <x-input-error :messages="$errors->get('fc_no')" class="mt-2" />
                    </div>

                    <div class="flex flex-col items-start justify-center w-full mb-2">
                        <x-input-label for="item_type" :value="__('Item Type')" />
                        <x-text-input id="item_type" class="block mt-1 w-full" type="text" name="item_type" :value="old('item_type')" required autofocus />
                        <x-input-error :messages="$errors->get('item_type')" class="mt-2" />
                    </div>

                    <div class="flex flex-col items-start justify-center w-full mb-2">
                        <x-input-label for="model" :value="__('Model')" />
                        <x-text-input id="model" class="block mt-1 w-full" type="text" name="model" :value="old('model')" required autofocus />
                        <x-input-error :messages="$errors->get('model')" class="mt-2" />
                    </div>

                    <div class="flex flex-col items-start justify-center w-full mb-2">
                        <x-input-label for="duration" :value="__('Expected Duration')" />
                        <select name="duration" id="duration" class= "block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                            <option value="year">1 year - Ksh 7000/-</option>
                            <option value="half_year">6 months/less - Ksh 5000/- </option>
                        </select>
                    </div>

                    <div class="flex flex-col items-start justify-center w-full mb-2">
                        <x-input-label for="expected_deposit_date" :value="__('Expected Deposit Date')" />
                        <x-text-input id="expected_deposit_date" class="block mt-1 w-full" type="date" name="expected_deposit_date" :value="old('expected_deposit_date')" required autofocus />
                        <x-input-error :messages="$errors->get('expected_deposit_date')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ml-4">
                            {{ __('Save') }}
                        </x-primary-button>
                    </div> 
            </form>                     
        </fieldset>
    </div>    
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
        $('#type').on('change', function() {
           var type = $(this).val();
           var individual = document.getElementById("individual_form");
           const course_id = document.querySelector('div[id=course_id]').textContent;
           if(type === 'group') {
                window.location = '/courses/register/group/'+course_id;
           }else{
                console.log(course_id);
           }
       });
   });
   </script>


</x-guests-layout>

