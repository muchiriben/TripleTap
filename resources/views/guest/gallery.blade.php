<x-guests-layout>

        <section class="container_gallery">
            <div class="gallery">
                @foreach ($images as $image)
                    <a href="{{$image->image}}" data-lightbox="rfm" data-title="Gallery">
                        <img src="{{$image->image}}" alt="" />
                    </a>
                @endforeach
            </div>    
        </div>
    </section>

    <script src="{{ asset('js/lightbox-plus-jquery.js') }}"></script>

</x-guests-layout>    