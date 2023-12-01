<!-- check for error messages -->
@if (count($errors)> 0)

        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-nuetral overflow-hidden shadow-lg rounded-lg">
                    <div class="p-4 bg-red-600 border-b border-gray-200 text-light-color">
                        @foreach ($errors->all() as $error)
                        {{$error}} 
                        <br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    
@endif

<!-- check for success message -->
@if (session('success'))

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-nuetral overflow-hidden shadow-lg rounded-lg">
                <div class="p-4 bg-primary-color border-b border-gray-200 text-light-color">
                    {{session('success')}} 
                </div>
            </div>
        </div>
    </div>
    
@endif

<!-- check for error message -->
@if (session('error'))

<div class="py-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-nuetral overflow-hidden shadow-lg rounded-lg">
            <div class="p-4 bg-red-600 border-b border-gray-200 text-light-color">
                {{session('error')}} 
            </div>
        </div>
    </div>
</div>   

@endif