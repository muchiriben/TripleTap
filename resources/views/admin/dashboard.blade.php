<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mx-8 grid grid-cols-3 gap-6">

                <a href="/admin/orders">
                    <div class="flex flex-col  bg-white px-4 py-6 rounded-md border-t-8 shadow-lg border-secondary-color">
                        <span class="mb-2 text-secondary-color">Orders</span>
                        <div class="text-secondary-color text-4xl font-semibold">{{$order_count}} </div>
                    </div>
                </a>

                <a href="/admin/products">
                    <div class="flex flex-col  bg-white px-4 py-6 rounded-md border-t-8 shadow-lg border-secondary-color">
                        <span class="mb-2 text-secondary-color">Accessories</span>
                        <div class="text-secondary-color text-4xl font-semibold">{{$product_count}} </div>
                    </div>
                </a>

                <a href="/admin/messages">
                    <div class="flex flex-col  bg-white px-4 py-6 rounded-md border-t-8 shadow-lg border-secondary-color">
                        <span class="mb-2 text-secondary-color">Messages</span>
                        <div class="text-secondary-color text-4xl font-semibold">{{$message_count}} </div>
                    </div>
                </a>

                <a href="/admin/storage">
                    <div class="flex flex-col  bg-white px-4 py-6 rounded-md border-t-8 shadow-lg border-accent-color">
                        <span class="mb-2 text-secondary-color">Storage</span>
                        <div class="text-secondary-color text-4xl font-semibold">{{$storage_count}} </div>
                    </div>
                </a>

                <a href="/admin/courses">
                    <div class="flex flex-col  bg-white px-4 py-6 rounded-md border-t-8 shadow-lg border-accent-color">
                        <span class="mb-2 text-secondary-color">Courses</span>
                        <div class="text-secondary-color text-4xl font-semibold">{{$course_count}} </div>
                    </div>
                </a>

                <a href="/admin/events">
                    <div class="flex flex-col  bg-white px-4 py-6 rounded-md border-t-8 shadow-lg border-accent-color">
                        <span class="mb-2 text-secondary-color">Events</span>
                        <div class="text-secondary-color text-4xl font-semibold">{{$event_count}} </div>
                    </div>
                </a>

                <a href="/admin/manufacturers">
                    <div class="flex flex-col  bg-white px-4 py-6 rounded-md border-t-8 shadow-lg border-primary-color">
                        <span class="mb-2 text-secondary-color">Manufacturers</span>
                        <div class="text-accent-color text-4xl font-semibold"> {{$manufacturer_count}} </div>
                    </div>
                </a>
    
                <a href="/admin/categories">
                    <div class="flex flex-col  bg-white px-4 py-6 rounded-md border-t-8 shadow-lg border-primary-color">
                        <span class="mb-2 text-secondary-color">Categories</span>
                        <div class="text-accent-color text-4xl font-semibold"> {{$category_count}} </div>
                    </div>
                </a>
            
                <a href="/admin/subcategories">
                    <div class="flex flex-col  bg-white px-4 py-6 rounded-md border-t-8 shadow-lg border-primary-color">
                        <span class="mb-2 text-secondary-color">Subcategories</span>
                        <div class="text-accent-color text-4xl font-semibold"> {{$subcategory_count}}  </div>
                    </div>
                </a>

                <a href="/admin/gallery">
                    <div class="flex flex-col  bg-white px-4 py-6 rounded-md border-t-8 shadow-lg border-accent-color">
                        <span class="mb-2 text-secondary-color">Gallery</span>
                        <div class="text-accent-color text-4xl font-semibold"> {{$gallery_count}}  </div>
                    </div>
                </a>
    
            </div> 
        </div>
    </div>
</x-app-layout>
