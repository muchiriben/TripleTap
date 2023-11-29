<x-guests-layout>

    <section class="w-full" name="title">
        <div class="py-2 flex justify-around items-center h-auto w-full bg-secondary-color">
            
              <h2 class="font-bold text-xl text-accent-color leading-tight">
                {{ __('Register Course:') }} {{ $course->name }}
            </h2>
        
        </div>
    </section>

    <!-- products section -->
    <section class="course">

        <div class="max-w-7lx h-5/6 py-12 px-2 m-auto bg-light-color shadow-lg sm:px-8 lg:px-12">

            <fieldset class="border-2 border-secondary-color rounded-md">
                <legend class="mx-8">Individual Registration:</legend>
                <form method="POST" action="{{ route('courses.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="flex flex-row items-center ">
                        <x-text-input id="course_id" type="hidden" name="course_id" value="{{$course->id}}"/>
                        <x-text-input id="group_no" type="hidden" name="group_no" value="1"/>    
                
                        <div class="flex flex-row items-center mr-6">
                            <x-input-label for="individual_name" :value="__('Full Name')" />
                            <x-text-input id="individual_name" class="block mt-1 w-full" type="text" name="individual_" :value="old('individual_')" required autofocus />
                            <x-input-error :messages="$errors->get('individual_')" class="mt-2" />
                        </div> 

                        
                
                
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Register') }}
                            </x-primary-button>
                        </div>
                        
                    </div>  
                </form>
              </fieldset><br>
           
        </div>
        
    </section>

</x-guests-layout>
