<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-accent-color leading-tight">
            {{ __('Edit Product ') }}
        </h2>
    </x-slot>

        <div class="max-w-7lx h-5/6 py-12 px-2 m-auto sm:px-8 lg:px-12">
            <div class="bg-white shadow-md w-full h-5/6 m-auto py-6 px-4 sm:px-6 lg:px-8 rounded-md">
        <form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Product Name')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $product->name }}" required autofocus />
            </div>

             <!-- Manufacturer -->
          <div class="mt-4">
            <x-input-label for="manufacturer_id" :value="__('Accessory Manufacturer')" />

            <select name="manufacturer_id" id="manufacturer_id" class= "block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
              <option value="{{$product->manufacturer_id}}">{{$manufacturer->name}}</option>
                @foreach ($manufacturers as $manufacturer)
                    <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                @endforeach
            </select>
          </div>

          <!-- Category -->
          <div class="mt-4">
            <x-input-label for="category_id" :value="__('Category')" />

            <select name="category_id" id="category_id" class= "block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
              <option value="{{$category->id}}">{{$category->name}}</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
          </div>

          <!-- SubCategory -->
          <div class="mt-4">
            <x-input-label for="subcategory_id" :value="__('SubCategory')" />

            <select name="subcategory_id" id="subcategory_id" class= "block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                <option value="{{$product->subcategory_id}}">{{$subcategory->name}}</option>
                
            </select>
        </div>

            <!-- Purchase Price -->
            <div class="mt-4">
                <x-input-label for="purchase_price" :value="__('Purchase Price')" />

                <x-text-input id="purchase_price" class="block mt-1 w-full" type="number" name="purchase_price" value="{{$product->purchase_price}}" required />
            </div>

            <!-- Selling Price -->
            <div class="mt-4">
                <x-input-label for="selling_price" :value="__('Selling Price')" />

                <x-text-input id="selling_price" class="block mt-1 w-full" type="number" name="selling_price" value="{{$product->selling_price}}" required />
            </div>

            <!-- quantity -->
            <div class="mt-4">
                <x-input-label for="quantity" :value="__('Quantity')" />

                <x-text-input id="quantity" class="block mt-1 w-full" type="number" name="quantity" value="{{$product->quantity}}" required />
            </div>

             <!-- Product image -->
             <div class="mt-4">
                <x-input-label for="image" :value="__('Product/Accessory Image')" />
    
                <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" placeholder="Product Image" autofocus />
    
                <x-text-input id="old_image" type="hidden" name="old_image" value="{{ $product->image }}" autofocus />
                <x-text-input id="old_imageId" type="hidden" name="old_imageId" value="{{ $product->imageId }}" autofocus />      
            </div>

            <!-- Description -->
         <div class="mt-4">
            <x-input-label for="description" :value="__('Description')" />

            <x-textarea id="description" class="block mt-1 w-full" type="text" name="description" value="{{ $product->description }}" placeholder="Description" autofocus>{{ $product->description }}</x-textarea>
        </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Edit Product') }}
                </x-primary-button>
            </div>
        </form>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	    <script>
         $(document).ready(function() {
        $('#category_id').on('change', function() {
            var categoryID = $(this).val();
            if(categoryID) {
                $.ajax({
                    url: '/admin/findsubcategories/'+categoryID,
                    type: "GET",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success:function(data) {
                        //console.log(data);
                      if(data){
                        $('#subcategory_id').empty();
                        $('#subcategory_id').focus;
                        $('#subcategory_id').append('<option value="">-- Select subcategory --</option>'); 
                        $.each(data, function(key, value){
                        $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.name + '</option>');
                    });
                  }else{
                    $('#subcategory_id').empty();
                  }
                  }
                });
            }else{
              $('#subcategory_id').empty();
            }
        });
    });
    </script>

</x-app-layout>
