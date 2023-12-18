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
        <div hidden id="course_id">{{$course->id}}</div>

        <div class="max-w-7lx h-5/6 w-full py-4 px-2 m-4 bg-light-color shadow-xl sm:px-8 lg:px-12">    

        <select name="type" id="type" class= "block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            <option value="individual">Individual Registration</option>
            <option value="group">Group Registration</option>
        </select>

        <div class="flex flex-col sm:flex-row  items-start justify-center p-4">

        <div class="w-full sm:w-1/2 p-4">
            <div class="rounded-lg">
                <img class="rounded-lg" src="{{$course->thumbnail}}" alt="">
            </div>
            <h1 class="font-bold text-lg mt-2">About the Course</h1>
            <p class="text-secondary-color">{!! $course->description !!}</p>
            <p class="mt-2 font-bold text-lg"><span class="text-primary-color">Estimated Price per Session:</span> Ksh {{ $course->price }}/-</p>
        </div>   

        <fieldset id="individual_form" class="flex flex-col items-start w-full sm:w-1/2 p-4 border-2 border-secondary-color rounded-md mt-4">
            <legend class="px-2 font-bold">Individual Registration:</legend>
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

                    <div class="mt-[0.125rem] mb-[0.125rem] block min-h-[1.5rem] pl-[1.5rem]">
                        <input
                          class="relative float-left -ml-[1.5rem] mr-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent dark:border-neutral-600 dark:checked:border-primary dark:checked:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                          type="checkbox"
                          value="agree"
                          name="agreement"
                          id="agreement" required/>
                        <label
                          class="inline-block pl-[0.15rem] hover:cursor-pointer"
                          for="agreement">
                          By checking the provided checkbox, you acknowledge that the information provided is accurate and true at the time of application. However, you understand and agree that Triple Tap Limited assumes no responsibility or liability for the accuracy, completeness, or reliability of the information or any any consequences resulting from this inaccuracies.
                        </label>
                      </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ml-4">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div> 
            </form>                     
        </fieldset>
        </div>
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
