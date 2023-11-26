<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-accent-color leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="bg-white py-4">

        <div class="flex flex-col mx-6 my-2">

            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="mb-4 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-accent-color">
                      <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-primary-color uppercase tracking-wider">
                          Id
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-primary-color uppercase tracking-wider">
                        Customer Name
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-primary-color uppercase tracking-wider">
                        Delivery Location
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-primary-color uppercase tracking-wider">
                        Phone Number
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-primary-color uppercase tracking-wider">
                        Total Price
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-primary-color uppercase tracking-wider">
                        Notes
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-primary-color uppercase tracking-wider">
                        Date
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-primary-color uppercase tracking-wider">
                        Status
                       </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Update Status </span>
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                          <span class="sr-only">Cancell Order </span>
                      </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">View </span>
                        </th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        
                      @foreach ($orders as $order)
                      <tr>
                        <td class="px-3 py-4 whitespace-nowrap">
                          <div class="text-sm text-black"> {{ $loop->iteration }} </div>
                        </td>
                        <td class="px-3 py-4 whitespace-nowrap">
                            <div class="text-sm text-black">{{ $order->name }}</div>
                        </td>
                        <td class="px-3 py-4 whitespace-nowrap">
                          <div class="text-sm text-black">{{ $order->location }}</div>
                        </td>
                        <td class="px-3 py-4 whitespace-nowrap">
                          <div class="text-sm text-black">{{ $order->phone }}</div>
                      </td>
                      <td class="px-3 py-4 whitespace-nowrap">
                        <div class="text-sm text-black">KSh {{ $order->total }}</div>
                    </td>
                    <td class="px-3 py-4 whitespace-nowrap">
                      <div class="text-sm text-black break-all">{{ $order->notes }}</div>
                  </td>
                        <td class="px-3 py-4 whitespace-nowrap">
                          <div class="text-sm text-black">{{ $order->created_at->toDateString() }}</div>
                        </td>
                        <td class="px-3 py-4 whitespace-nowrap">
                          <div class="text-sm text-black">{{ $order->delivery_status}}</div>
                        </td>
                        <td class="px-3 py-4 whitespace-nowrap">
                            <form action="{{ route('orders.update', $order->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                
                                @if ($order->delivery_status != 'Delivered')

                                <x-text-input id="delivery_status" type="hidden" name="delivery_status" value="Delivered"/>
                                <x-primary-button class=" bg-accent-color rounded-md text-neutral-color shadow-md cursor-pointer">
                                  {{ __('Delivered') }}
                               </x-primary-button>

                                @else

                                <x-text-input id="delivery_status" type="hidden" name="delivery_status" value="Not Delivered"/>
                                <x-primary-button class=" bg-accent-color rounded-md text-neutral-color shadow-md cursor-pointer">
                                  {{ __('Not Delivered') }}
                                </x-primary-button>

                                @endif
                              
                              </form>  
                        </td>
                        <td class="px-3 py-4 whitespace-nowrap">
                          <form action="{{ route('orders.update', $order->id) }}" method="POST">
                              @csrf
                              @method('PATCH')
                              
                              @if ($order->delivery_status != 'Cancelled')

                              <x-text-input id="delivery_status" type="hidden" name="delivery_status" value="Cancelled"/>
                              <x-primary-button class=" bg-accent-color rounded-md text-neutral-color shadow-md cursor-pointer">
                                {{ __('Cancell') }}
                             </x-primary-button>

                              @else

                              <x-text-input id="delivery_status" type="hidden" name="delivery_status" value="Not Delivered"/>
                              <x-primary-button class=" bg-accent-color rounded-md text-neutral-color shadow-md cursor-pointer">
                                {{ __('Uncancell') }}
                              </x-primary-button>

                              @endif
                            
                            </form>  
                      </td>
                        <td class="px-3 py-4 whitespace-nowrap">
                            <x-link-button :href="route('orders.show', $order->id)">
                                {{ __('View') }}
                            </x-link-button>
                        </td>
                      </tr>
                      @endforeach
          
                      <!-- More items... -->
                    </tbody>
                  </table>
                </div>
                {{ $orders->links()}}
              </div>
            </div>
          </div>
        
      
      </div>
</x-app-layout>
