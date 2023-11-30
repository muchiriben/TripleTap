<x-guests-layout>

    <section class="w-full" name="title">
        <div class="py-2 flex justify-around items-center h-auto w-full bg-secondary-color">
            
              <h2 class="font-bold text-xl text-accent-color leading-tight">
                {{ __('Course Registration') }}
            </h2>
        
        </div>
    </section>

    <!-- products section -->
    <section class="course min-h-screen w-full p-2 flex items-center justify-center flex-col">

        <h1 class="font-bold text-center text-xl my-2">{{ $course->name }}</h1>

        <div class="max-w-7lx h-5/6 w-full py-12 px-2 m-4 bg-light-color shadow-xl sm:px-8 lg:px-12">    

        <select name="type" id="type" class= "block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            <option value="individual">Individual Registration</option>
            <option value="group">Group Registration</option>
        </select>

        <fieldset id="individual_form" class="flex flex-col items-start w-full p-4 border-2 border-secondary-color rounded-md mt-4">
            <legend class="px-2">Individual Registration:</legend>
            <form id="individual-form" class="w-full" method="POST" action="{{ route('courses.store.individual') }}">
                @csrf
                    <x-text-input id="course_id" type="hidden" name="course_id" value="{{$course->id}}"/> 
                
                    <div class="flex flex-col items-start justify-center w-full mb-2">
                        <x-input-label for="individual_name" :value="__('Full Name')" />
                        <x-text-input id="individual_name" class="block mt-1 w-full" type="text" name="individual_name" :value="old('individual_name')" required autofocus />
                        <x-input-error :messages="$errors->get('individual_name')" class="mt-2" />
                    </div>
                    
                    <div class="flex flex-col items-start justify-center w-full mb-2">
                        <x-input-label for="individual_phone" :value="__('Phone Number')" />
                        <x-text-input id="individual_phone" class="block mt-1 w-full" type="text" name="individual_phone" :value="old('individual_phone')" required autofocus />
                        <x-input-error :messages="$errors->get('individual_phone')" class="mt-2" />
                    </div>

                    <div class="flex flex-col items-start justify-center w-full mb-2">
                        <x-input-label for="individual_national_id" :value="__('National ID No.')" />
                        <x-text-input id="individual_national_id" class="block mt-1 w-full" type="number" name="individual_national_id" :value="old('individual_national_id')" required autofocus />
                        <x-input-error :messages="$errors->get('individual_national_id')" class="mt-2" />
                    </div>

                    <div class="flex flex-col items-start justify-center w-full mb-2">
                        <x-input-label for="individual_age" :value="__('Age')" />
                        <x-text-input id="individual_age" class="block mt-1 w-full" type="number" name="individual_age" :value="old('individual_age')" required autofocus />
                        <x-input-error :messages="$errors->get('individual_age')" class="mt-2" />
                    </div>

                    <div class="flex flex-col items-start justify-center w-full mb-2">
                        <x-input-label for="individual_location" :value="__('Location(Residency)')" />
                        <x-text-input id="individual_location" class="block mt-1 w-full" type="text" name="individual_location" :value="old('individual_location')" required autofocus />
                        <x-input-error :messages="$errors->get('individual_location')" class="mt-2" />
                    </div>

                    <div class="flex flex-col items-start justify-center w-full mb-2">
                        <x-input-label for="individual_proffession" :value="__('Proffession')" />
                        <x-text-input id="individual_proffession" class="block mt-1 w-full" type="text" name="individual_proffession" :value="old('individual_proffession')" required autofocus />
                        <x-input-error :messages="$errors->get('individual_proffession')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ml-4">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div> 
            </form>                     
        </fieldset><br>

        
        <fieldset id="group_form" class="hidden flex-col items-start w-full p-4 border-2 border-secondary-color rounded-md mt-4">
            <legend class="px-2">Group Registration:</legend>
            <form id="group-form" class="w-full" method="POST" action="{{ route('courses.store.group') }}" enctype="multipart/form-data">
                @csrf
                    <x-text-input id="course_id" type="hidden" name="course_id" value="{{$course->id}}"/>   
                
                    <div class="flex flex-col items-start justify-center w-full mb-2">
                        <x-input-label for="leader_name" :value="__('Group Leader`s Name')" />
                        <x-text-input id="leader_name" class="block mt-1 w-full" type="text" name="leader_name" :value="old('leader_name')" required autofocus />
                        <x-input-error :messages="$errors->get('leader_name')" class="mt-2" />
                    </div>
                    
                    <div class="flex flex-col items-start justify-center w-full mb-2">
                        <x-input-label for="leader_phone" :value="__('Leader`s Phone Number')" />
                        <x-text-input id="leader_phone" class="block mt-1 w-full" type="text" name="leader_phone" :value="old('leader_phone')" required autofocus />
                        <x-input-error :messages="$errors->get('leader_phone')" class="mt-2" />
                    </div>

                    <div class="flex flex-col items-start justify-center w-full mb-2">
                        <x-input-label for="leader_national_id" :value="__('Leader`s National ID No.')" />
                        <x-text-input id="leader_national_id" class="block mt-1 w-full" type="text" name="leader_national_id" :value="old('leader_national_id')" required autofocus />
                        <x-input-error :messages="$errors->get('leader_national_id')" class="mt-2" />
                    </div>

                    <div class="flex flex-col items-start justify-center w-full mb-2">
                        <x-input-label for="leader_location" :value="__('Leader`s Location(Residency)')" />
                        <x-text-input id="leader_location" class="block mt-1 w-full" type="text" name="leader_location" :value="old('leader_location')" required autofocus />
                        <x-input-error :messages="$errors->get('leader_location')" class="mt-2" />
                    </div>

                    <div class="flex flex-col items-start justify-center w-full mb-2">
                        <x-input-label for="group_relation" :value="__('Group Relation(e.g. Family)')" />
                        <x-text-input id="group_relation" class="block mt-1 w-full" type="text" name="group_relation" :value="old('group_relation')" required autofocus />
                        <x-input-error :messages="$errors->get('group_relation')" class="mt-2" />
                    </div>

                    <div class="flex flex-col items-start justify-center w-full mb-2">
                        <x-input-label for="group_no" :value="__('Number of persons in Group')" />
                        <x-text-input id="group_no" class="block mt-1 w-full" type="number" name="group_no" :value="old('group_no')" required autofocus />
                        <x-input-error :messages="$errors->get('group_no')" class="mt-2" />
                    </div>

                    <div class="flex flex-col items-start justify-center w-full mb-2">
                        <x-input-label for="from_age" :value="__('From Age(Age Range)')" />
                        <x-text-input id="from_age" class="block mt-1 w-full" type="number" name="from_age" :value="old('from_age')" required autofocus />
                        <x-input-error :messages="$errors->get('from_age')" class="mt-2" />
                    </div>

                    <div class="flex flex-col items-start justify-center w-full mb-2">
                        <x-input-label for="to_age" :value="__('To Age(Age Range)')" />
                        <x-text-input id="to_age" class="block mt-1 w-full" type="number" name="to_age" :value="old('to_age')" required autofocus />
                        <x-input-error :messages="$errors->get('to_age')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ml-4">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>                   
        </fieldset>
    </div>    
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
        $('#type').on('change', function() {
           var type = $(this).val();
           var individual = document.getElementById("individual_form");
           var group = document.getElementById("group_form");
           if(type === 'individual') {
                individual.classList.remove("hidden");
                individual.classList.add("flex");
                group.classList.remove("flex");
                group.classList.add("hidden");
           }else{
                individual.classList.add("hidden");
                individual.classList.remove("flex");
                group.classList.add("flex");
                group.classList.remove("hidden");
           }
       });
   });
   </script>
   
   <script>
    $(document).ready(function() {
    
   });
  </script>


</x-guests-layout>
