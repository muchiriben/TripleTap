<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-secondary-color leading-tight">
            {{ __('Order Products') }}
        </h2>
    </x-slot>

    <div class="bg-white py-4">
        <div class="flex flex-col mx-6 my-2">

            <div class="flex flex-row">
                    <div class="text-lg text-secondary-color font-semibold p-2 mx-6">Customer Name: <br> {{ $order->name}}</div>
                    <div class="text-lg text-secondary-color font-semibold p-2 mx-6">Customer Location:<br>  {{ $order->location}}</div>
                    <div class="text-lg text-secondary-color font-semibold p-2 mx-6">Customer Phone:<br>  {{ $order->phone}}</div>
            </div>  

            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="mb-4 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-secondary-color">
                      <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-light-color uppercase tracking-wider">
                          Id
                      </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-light-color uppercase tracking-wider">
                          Product Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-light-color uppercase tracking-wider">
                          Unit Price
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-light-color uppercase tracking-wider">
                            Quantity
                          </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-light-color uppercase tracking-wider">
                          Total
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-light-color uppercase tracking-wider">
                            Date
                        </th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php
                          $total_paid = 0;
                        ?>
                      @foreach ($orderProducts as $product)
                      <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm text-black"> {{ $loop->iteration }} </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm text-black">{{ $product->product_name}}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm text-black">{{ $product->unit_price}} /=</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm text-black">{{ $product->quantity}}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-black">{{ $product->total_price}} /=</div>
                            <?php $total_paid += $product->total_price ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-black">{{ $product->created_at->toDateString() }}</div>
                          </td>
                      </tr>
                      @endforeach
          
                      <!-- More items... -->
                    </tbody>
                  </table>
                </div>
                <span class="text-2xl font-semibold text-seconndary-color">Total Paid: Ksh {{ $total_paid }} /=</span> <br>
                {{ $orderProducts->links()}}
              </div>
            </div>
          </div>
        
      
      </div>
</x-app-layout>
