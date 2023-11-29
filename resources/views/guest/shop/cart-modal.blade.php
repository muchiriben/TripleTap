<section class="space-y-6">

    <x-modal name="cart" focusable>
        <div class="flex flex-col bg-neutral-color py-4 mx-8 w-auto h-full">
    
            <div class="flex justify-center items-center bg-white shadow-md p-4 rounded-lg my-4">
            
            <table class="table sm:hidden sm:shadow-2xl border-collapse w-fullxx">
                <thead class="sm:visible invisible absolute sm:relative bg-primary-color">
                <tr class="border-t-2 border-secondary-color sm:flexxx sm:inline-block">
                    <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Id</span>
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-accent-color uppercase tracking-wider">
                    Product Name
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-accent-color uppercase tracking-wider">
                    Product Price
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-accent-color uppercase tracking-wider">
                    Quantity
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-accent-color uppercase tracking-wider">
                    Total 
                </th> 
                <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Remove</span>
                </th> 
                </tr>
                </thead>
                <tbody>
                <tr class="bg-white shadow-lg sm:shadow-none mb-12 sm:mb-0 flex flex-row flex-wrap cursor-pointer hover:bg-gray-100 sm:flex-no-wrap border-l-2 border-r-2 hover:border-gray-600">
                    @foreach (Cart::content() as $item)
                    <td class="pl-4 pt-8 sm:pt-0 pb-2 text-left relative w-2/4 border-t border-l sm:border-l-0 border-gray-400 sm:flex-1">
                    <span class="font-bold text-xs text-gray-700 uppercase sm:hidden absolute top-0 inset-x-0 p-1 bg-primary-color pl-2">
                        Id
                    </span>
                    {{ $loop->iteration }}
                    </td>
                    <td class="pl-4 pt-8 sm:pt-0 pb-2 text-left text-gray-800 relative w-2/4 border-t border-l border-r sm:border-l-0 sm:border-r-0 border-gray-400">
                    <span class="font-bold text-xs text-gray-700 uppercase sm:hidden absolute top-0 inset-x-0 p-1 bg-primary-color pl-2">
                        Product Name
                    </span>
                    <div class="flex items-center">
                        <div class="flex justify-center items-center h-16 w-16 rounded-lg   bg-neutral-color">
                        @foreach ($products as $product) 
                        @if ($product->id == $item->model->id)
                        @if ($product->image != NULL)
                        <img class="h-16 w-16 rounded-lg object-cover" src="{{ $product->image }}" alt="">
                        @endif
                        @endif
                        @endforeach
                    </div>  
                        <div class="ml-6">
                        <div class="text-sm font-medium text-black">
                        {{ $item->model->name }}
                        </div>
                        </div>
                    </div>
                    </td>
                    <td class="pl-4 sm:pl-0 pt-8 sm:pt-0 pb-2 sm:text-center text-left text-gray-800 relative w-2/4 border-t border-l sm:border-l-0 border-gray-400">
                    <span class="font-bold text-xs text-gray-700 uppercase sm:hidden absolute top-0 inset-x-0 p-1 bg-primary-color pl-2">
                        Product Price
                    </span>
                    {{ $item->model->price }}            
                    </td>
                    <td class="pl-4 sm:pl-0 pt-8 sm:pt-0 pb-2 sm:text-center text-left text-gray-800 relative w-2/4 border-t border-l border-r sm:border-l-0 sm:border-r-0 border-gray-400">
                    <span class="font-bold text-xs text-gray-700 uppercase sm:hidden absolute top-0 inset-x-0 p-1 bg-primary-color pl-2">
                        Quantity
                    </span>
                    <select class="quantity" data-id="{{ $item->rowId }}" data-price="{{$item->model->price}}" data-productQuantity="{{ $item->model->quantity }}">
                        @for ($i = 1; $i < 5 + 1 ; $i++)
                            <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                    </td>
                    <td class="pl-4 sm:pl-0 pt-8 sm:pt-0 pb-2 sm:pr-4 sm:text-right text-left text-gray-800 relative w-2/4 border-t border-l sm:border-l-0 border-gray-400">
                    <span class="font-bold text-xs text-gray-700 uppercase sm:hidden absolute top-0 inset-x-0 p-1 bg-primary-color pl-2">
                        Total Price
                    </span>
                    Ksh {{ $item->model->price * $item->qty}}
                    </td>
                    <td class="px-4 pt-8 sm:pt-0 pb-2 text-left text-gray-800 relative w-2/4 border sm:border-0 sm:border-t border-gray-400">
                    <span class="font-bold text-xs text-gray-700 uppercase sm:hidden absolute top-0 inset-x-0 p-1 bg-primary-color pl-2">
                        Delete
                    </span>
                    <form action="{{ route('cart.remove',  $item->rowId) }}" method="POST">
                        @csrf
                    
                        <x-primary-button id="delete" name="remove" class="bg-red-700 shadow-md rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </x-primary-button>
                    </form>
                    </td> <br>
                    @endforeach
                </tr>  
                </tbody>
            </table>
    
            <table class="hidden sm:table min-w-full divide-y-2 divide-gray-200">
                <thead class="w-full">
                <tr>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Id</span>
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-secondary-color uppercase tracking-wider">
                    Product Name
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-secondary-color uppercase tracking-wider">
                        Product Price
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-secondary-color uppercase tracking-wider">
                        Quantity
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-secondary-color uppercase tracking-wider">
                        Total 
                    </th> 
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Remove</span>
                    </th> 
                </tr>
                </thead>
                <tbody class="bg-white w-full divide-y divide-gray-200">
                    
                @foreach (Cart::content() as $item)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-black"> {{ $loop->iteration }} </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                        <div class="flex justify-center items-center h-16 w-16 rounded-lg   bg-neutral-color">
                            @foreach ($products as $product) 
                            @if ($product->id == $item->model->id)
                            @if ($product->image != NULL)
                            <img class="h-16 w-16 rounded-lg object-cover" src="{{ $product->image }}" alt="">
                            @endif
                            @endif
                            @endforeach
                        </div>  
                        <div class="ml-6">
                            <div class="text-sm font-medium text-black">
                            {{ $item->model->name }}
                            </div>
                        </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-black">Ksh {{ $item->model->price }} /=</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                    <select class="quantity" data-id="{{ $item->rowId }}" data-price="{{$item->model->price}}" data-productQuantity="{{ $item->model->quantity }}">
                        @for ($i = 1; $i < 100 + 1 ; $i++)
                            <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-black">Ksh {{ $item->model->price * $item->qty}} /=</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <form action="{{ route('cart.remove',  $item->rowId) }}" method="POST">
                            @csrf
                            
                            <x-primary-button id="delete" name="remove" class="bg-red-700 shadow-md rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </x-primary-button>
                        </form>
                    </td>
                </tr>
                @endforeach
            
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="pt-4 text-xl font-bold text-accent-color">Total:<span class="text-left font-semibold text-xl text-secondary-color"> {{ Cart::instance('default')->subtotal(0) }} /=</span></td>
                    <td></td>
                </tr>
                <!-- More items... -->
                </tbody>
            </table>
        
            </div>
            <x-link-button :href=" route('checkout.index')" class="flex self-end mx-8 my-2 w-fit bg-light-color text-secondary-color font-semibold">
                    {{ __('Checkout') }}
                    <img class="h-6 w-6 mx-2" src="{{ asset('images/checkout.svg') }}" alt="">
                </x-link-button>
        </div>
    </x-modal>    
          
      <script src="{{ asset('js/app.js') }}"></script>
      <script>
        (function(){
            const classname = document.querySelectorAll('.quantity')
            Array.from(classname).forEach(function(element) {
                element.addEventListener('change', function() {
                    const id = element.getAttribute('data-id')
                    const price = element.getAttribute('data-price')
                    const productQuantity = element.getAttribute('data-productQuantity')
                    axios.patch(`/updateCart/${id}`, {
                        quantity: this.value,
                        price: price,
                        productQuantity: productQuantity,
                    })
                    .then(function (response) {
                        //console.log(response);
                        window.location.href = '{{ route('cart') }}'
                    })
                    .catch(function (error) {
                         //console.log(error);
                        window.location.href = '{{ route('cart') }}'
                    });
                })
            })
        })();
    </script>
</section>