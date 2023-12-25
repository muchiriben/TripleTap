<!-- check for success message -->
@if (session('wishes'))

    <div class="py-2">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-nuetral overflow-hidden shadow-lg rounded-lg">
                <div id="particles-js" class="snow"></div>
                <div class="trees">
                    <div class="merry">
                        <h1>{{session('wishes')}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endif